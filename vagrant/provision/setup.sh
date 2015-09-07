#!/bin/bash

echo "Provisioning virtual machine..."

echo "Updating repository"
sudo apt-get update > /dev/null

echo "Installing MC"
sudo apt-get install mc -y > /dev/null

echo "Installing Git"
sudo apt-get install git -y > /dev/null

echo "Installing Nginx"
sudo apt-get install nginx -y > /dev/null

echo "Updating PHP repository"
sudo apt-get install python-software-properties build-essential -y > /dev/null
sudo add-apt-repository ppa:ondrej/php5 -y > /dev/null
sudo apt-get update > /dev/null

echo "Installing PHP"
sudo apt-get install php5-common php5-dev php5-cli php5-fpm -y > /dev/null
    
echo "Installing PHP extensions"
sudo apt-get install curl php5-curl php5-gd php5-mcrypt php5-mysql php5-intl php-pear php5-imagick php5-imap php5-memcached php5-ming php5-ps php5-pspell php5-recode php5-snmp php5-sqlite php5-tidy php5-xmlrpc php5-xsl php5-xcache libapache2-mod-php5 -y > /dev/null

echo "Setting the MySQL server root password"
sudo apt-get install debconf-utils -y > /dev/null
sudo debconf-set-selections <<< "mysql-server mysql-server/root_password password my5qlr007pa55"
sudo debconf-set-selections <<< "mysql-server mysql-server/root_password_again password my5qlr007pa55"

echo "Installing MySQL server"
sudo apt-get install mysql-server mysql-client -y > /dev/null

echo "Configuring Nginx"
sudo cp /var/www/provision/config/nginx_vhost /etc/nginx/sites-available/nginx_vhost > /dev/null
sudo ln -s /etc/nginx/sites-available/nginx_vhost /etc/nginx/sites-enabled/
sudo rm -rf /etc/nginx/sites-available/default
sudo service nginx restart > /dev/null

echo "Installing Composer"
sudo curl -sS https://getcomposer.org/installer | sudo php
sudo mv composer.phar /usr/local/bin/composer