# LAMP Demo

## Update Server
- sudo apt update
  
## Mysql Setup
- sudo apt install mysql-server -y 
- sudo mysql_secure_installation
- mysql --version
- sudo systemctl status mysql

## Mysql Password Setup
- sudo mysql -u root -p
- sudo systemctl restart mysql

## PHP App Setup
- git clone https://github.com/muralialakuntla3/Book-store.git
- sudo apt install apache2 -y
- ss -ntpl

## PHP & PHP-Mysql Install
- sudo apt install php -y
- php -v
- sudo apt install php-mysql -y

## Hosting app to Apache2
- sudo rm -f /var/www/html/*
- sudo vi Book-store/php/db.php
- sudo cp -rf Book-store/* /var/www/html/
- sudo systemctl restart apache2
