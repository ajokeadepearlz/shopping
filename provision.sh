#!/bin/bash

DBPASSWD=vagrant
#UPDATE THE PACKAGE
apt-get update -y

apt-get install nginx -y
rm /etc/nginx/sites-available/default
cp /vagrant/default /etc/nginx/sites-available

apt-get install python-software-properties build-essential -y
add-apt-repository ppa:ondrej/php -y
apt-get update
apt-get install php7.0 php7.0-common php7.0-mysql php7.0-dev php7.0-cli php7.0-fpm php7.0-mcrypt php7.0-mbstring php7.0-curl -y
rm /etc/php/7.0/fpm/pool.d/www.conf
cp /vagrant/www.conf /etc/php/7.0/fpm/pool.d

apt-get install debconf-utils

debconf-set-selections <<< "mysql-server mysql-server/root_password password $DBPASSWD"
debconf-set-selections <<< "mysql-server mysql-server/root_password_again password $DBPASSWD"

apt-get install mysql-server -y

debconf-set-selections <<< "phpmyadmin phpmyadmin/dbconfig-install boolean true"
debconf-set-selections <<< "phpmyadmin phpmyadmin/app-password-confirm password $DBPASSWD"
debconf-set-selections <<< "phpmyadmin phpmyadmin/mysql/admin-pass password $DBPASSWD"
debconf-set-selections <<< "phpmyadmin phpmyadmin/mysql/app-pass password $DBPASSWD"
debconf-set-selections <<< "phpmyadmin phpmyadmin/reconfigure-webserver multiselect none"

apt-get -y install mysql-server phpmyadmin

phpenmod mbstring
phpenmod mcrypt

service nginx restart
service php7.0-fpm restart

ln -s /usr/share/phpmyadmin /vagrant/www



