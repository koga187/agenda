#!/bin/sh

DOCUMENT_ROOT="/var/www/html/agenda/";

sudo apt-get update;
echo "############ Instalando apache ############";
sudo apt-get install -y apache2;
echo "############ Instalando git ############";
sudo apt-get install -y git;
echo "############ Instalando curl ############";
sudo apt-get install -y curl;
echo "############ Instalando php-cli ############";
sudo apt-get install -y php5-cli;
echo "############ Instalando php ############";
sudo apt-get install -y php5;
echo "############ Instalando php-intl php5-mysql############";
sudo apt-get install -y php5-intl php5-mysql;
echo "############ Instalando libapache2-mod-php5 ############";
sudo apt-get install -y libapache2-mod-php5;

echo "############ Criando VirtualHost Apache ############"
echo "
<VirtualHost *:80>
    ServerName agenda.local
    DocumentRoot $DOCUMENT_ROOT
    <Directory $DOCUMENT_ROOT>
        DirectoryIndex index.php
        AllowOverride All
        Order allow,deny
        Allow from all
    </Directory>
</VirtualHost>
" > /etc/apache2/sites-available/agenda.conf;

echo "############ Habilitando Rewrite Mode ############"
a2enmod rewrite;
echo "############ Desabiliando VirtualHost padrão ############"
a2dissite 000-default;
echo "############ Habilitando VirtualHost do projeto ############"
a2ensite agenda;
echo "############ Reiniciando servidor Apache ############"
service apache2 restart;
echo "############ Entra no diretório do projeto ############"
cd DOCUMENT_ROOT;
echo "############ Baixa o composer utilizando o Curl ############"
curl -Ss https://getcomposer.org/installer | php;
sudo mv composer.phar /usr/bin/composer;
echo "############ Executa o composer do projeto ############"
composer install --no-progress;
echo "############ Instalando Mysql-Server ############"
export DEBIAN_FRONTEND=noninteractive;
sudo -E apt-get -q -y install mysql-server;
sudo service mysql restart;
echo "############ Trocando a senha do Mysql ############"
sudo mysqladmin -uroot password root



echo "** [AGENDA] http://agenda.local:8888 **";
''