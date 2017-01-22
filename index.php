<!DOCTYPE html>

<?php
require_once 'model/AesCtr.php';

if( isset($_POST['encrypt-button']) ){
  $data = $_POST['aes-txt'];
  $key = $_POST['aes-key'];
  $result = "AES256 encrypted: " . AesCtr::encrypt($data, $key, 256);
} 
elseif (isset($_POST['decrypt-button'])) {
  $data = $_POST['aes-txt'];
  $key = $_POST['aes-key'];
  $result = "AES256 decrypted: " . AesCtr::decrypt($_POST['aes-txt'], $_POST['aes-key'], 256);
}
elseif (isset($_POST['connect-button'])) {
  $host = $_POST['ip'];
  $username = $_POST['user'];
  $password = $_POST['password'];
  $command = $_POST['command'];

  $session = ssh2_connect($host);

  if(ssh2_auth_password($session, $username, $password)){
    $stream = ssh2_exec($session, $command);
    stream_set_blocking($stream, true);

    if($stream){
      $result = "COMMAND " . $command . " RESULT:\n" . stream_get_contents($stream);
    } else{
      $result = "ERROR: Failed to execute the command \"" . $command . "\"";
    }
  } else {
    $result = "ERROR: Failed to connect at \"" . $host . "\"";
  }
}
?>

<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>MT4 Internship - Gabriel Palomino</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>
<body style="background-image:url(http://www.publicdomainpictures.net/pictures/50000/nahled/gray-weave-wicker-pattern.jpg); background-repeat: repeat;">

    <div class="container" id="frame" style="width:80%; height:100vh; background:#000000; border-top-left-radius:50px; border-top-right-radius:50px; position:relative;">
        <div class="container" id="sound" style="width:25%; height:3%; background:#424242; position:relative; top:5%; border-radius:20px">
        </div>
        <div class="container" id="white-screen" style="width:95%; height:85%; background:#FFFFFF; position:relative; top:12%;">    
            <div id="screen-content" class="container" style="width:100%; height:90%; position:relative; top:5%;">
                <!-- SSH block -->
                <div id="ssh-block" class=".pull-left" style="width:50%; height:50%; position:float; display:inline-block;">
                    <form action="" method="POST">
                    <label for="ip" class="col-sm-6 col-form-label" style="text-align:center; margin-left:15%; margin-right:15%; ">SSH CONNECT</label>
                        <div class="form-group row">
                          <label for="ip" class="col-sm-3 col-form-label" style="text-align:right;">IP:</label>
                          <div class="col-sm-6">
                            <input type="text" class="form-control" id="ip" name="ip" placeholder="127.0.0.1">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="user" class="col-sm-3 col-form-label" style="text-align:right;">User:</label>
                          <div class="col-sm-6">
                            <input type="text" class="form-control" id="user" name="user" placeholder="gabrielpalomino">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="password" class="col-sm-3 col-form-label" style="text-align:right;">Password:</label>
                          <div class="col-sm-6">
                            <input type="password" class="form-control" id="password" name="password" placeholder="********">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="command" class="col-sm-3 col-form-label" style="text-align:right;">Command:</label>
                          <div class="col-sm-6">
                            <input type="text" class="form-control" id="command" name="command" placeholder="ps -ef">
                          </div>
                        </div>
                        <button type="submit" name="connect-button" class="btn btn-success" style="width:20%; height:8%; position:absolute; margin-left:15%; margin-right:15%;">CONNECT</button>
                    </form>
                </div><!-- AES block --><form action="" method="POST" id="aes-block" class=".pull-right" style="width:50%; height:80%; min-width:300px; position:absolute; display:inline-block;">
                    <div class="form-group">
                      <label for="aes">AES256:</label>
                      <textarea class="form-control" placeholder="Characters to be encrypted or decrypted;" rows="5" id="aes" name="aes-txt"></textarea>
                      <br>
                      <label for="aes-key" style="text-align:right;">Key:</label>
                      <input type="text" class="form-control" id="aes-key" name="aes-key" placeholder="key" >
                      <button type="submit" name="encrypt-button" class="btn btn-warning" style="width:40%; height:10%; position:float; margin:4px 0;">ENCRYPT</button>
                      <button type="submit" name="decrypt-button" class="btn btn-warning" style="width:40%; height:10%; position:float; margin:4px 0;">DECRYPT</button>
                    </div>
                </form>
                <!-- Result block -->
                <form action="index.php" id="result-block" method="POST" style="width:100%; height:50%;">
                    <br>
                    <label for="result">RESULT:</label>
                    <textarea type="text" name="result" placeholder="" class="form-control" rows="4" id="result" readonly="true"><?php echo (isset($result))?$result:'';?></textarea>
                    <br>
                    <button type="submit" value="submit" class="btn btn-danger" style="width:20%; height:16%;">RESET</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>