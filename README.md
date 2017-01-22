# mt4_Internship
Php code created for the MT4 internship skill test.

[ÚLTIMA ATUALIZAÇÃO - 22/01/2017]

## Ambiente de execução:

- Linux Ubuntu 16.04.1
- Apache2
- PHP v7.0.13-0
- Biblioteca ssh2

## Tutoriais para instalação e configuração do ambiente:

- Ambiente apache e php (LAMP):
[Acesso 22/01/2017]
https://www.digitalocean.com/community/tutorials/how-to-install-linux-apache-mysql-php-lamp-stack-on-ubuntu-16-04 

- Biblioteca ssh2 php7.0
 [Acesso 22/01/2017]
http://php.net/manual/en/ssh2.installation.php
Obs.: Alguns dos links está quebrado, segue link com os arquivos utilizados e direcionamento corrigido:
[library libssh2](https://libssh2.org/)
[library libssh2_1.8.0.tar.gz download](https://github.com/palominogabriel/mt4_Internship/raw/master/phplibs/libssh2-1.8.0.tar.gz)
[package php-ssh2 pecl.php.net](https://pecl.php.net/package/ssh2)
[package php-ssh2-1.0.tgz download](https://github.com/palominogabriel/mt4_Internship/raw/master/phplibs/ssh2-1.0.tgz)
Obs2.: Reinicie o serviço do apache ao término da instalação.

## Descrição:

Projeto utilizando HTML, CSS e PHP. A página Web contém uma interface para execução remota via SSH de comandos, onde o há o retorno do comando é feito na mesma página no campo RESULT. Além disso é possível criptografar um texto inserido junto com uma chave utilizando AES256 ou descriptografar com o código criptografado mais a chave utilizada na criptografia.

index.php:
- Pela tarefa realizar apenas duas funções, optei por utilizar apenas uma única página. Para a tarefa de criptografia, encontrei o algoritmo como citei na seção de referência e após lê-lo e testa-lo incorporei na versão final, para isso criei duas classes como indicado e coloquei-as no modelo, pasta "model".

- Para o acesso SSH e execução de comando, utilizei a biblioteca ssh2 pois foi possível encontrar bastante referência de utilização.

## Imagens:

![alt tag](https://github.com/palominogabriel/mt4_Internship/blob/master/images/Internship_encrypt.png)
![alt tag](https://github.com/palominogabriel/mt4_Internship/blob/master/images/Internship_decrypt.png)
![alt tag](https://github.com/palominogabriel/mt4_Internship/blob/master/images/Internship_ssh.png)

## Referências:

O algoritmo de criptografia foi retirado da seguinte fonte:
[Acesso 22/01/2017]
http://www.movable-type.co.uk/scripts/aes-php.html
