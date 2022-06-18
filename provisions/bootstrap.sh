#!/usr/bin/env bash
apt update
# Enable use of PHP 8.1
apt install -y lsb-release ca-certificates apt-transport-https software-properties-common
add-apt-repository ppa:ondrej/php
# Install Apache2, PHP, MySQL, and other required packages
apt update
apt install -y apache2 mysql-server php8.1 php8.1-mysql

cp /home/vagrant/it-development-portfolio/setup/development.conf /etc/apache2/sites-available/development.conf
a2ensite development.conf
a2dissite 000-default.conf
# The above looks for a file to load the page, but since we're using a route instead we need the following line to make
# it rewrite the information into a readable format for the pages to load.
a2enmod rewrite
systemctl reload apache2

# Setting up Database and User
echo "create database development" | mysql
echo "CREATE USER 'development'@'localhost' IDENTIFIED BY 'development'" | mysql
echo "GRANT ALL PRIVILEGES ON development.* TO 'development'@'localhost';" | mysql
echo "flush privileges" | mysql

