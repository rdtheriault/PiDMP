#!/bin/bash

sudo apt-get update -y
sudo apt-get dist-upgrade -y
sudo apt-get upgrade -y
sudo apt-get update -y
sudo apt-get install sqlite3 -y
sudo apt-get install apache2 -y
sudo apt-get install php5 php5-sqlite -y 
sudo apt-get install xRDP -y 
sudo apt-get install x11vnc -y 
sudo apt-get install tightvncserver -y 
sudo apt-get install libreoffice -y
sudo apt-get install xscreensaver -y

libreoffice --impress

sudo wget http://sagefirellc.com/PiDMP/template.odp
sudo wget http://sagefirellc.com/PiDMP/template.pptx

mkdir /home/pi/temp
mkdir /home/pi/temp/pres
sudo mkdir /var/www/templates

sudo rm /var/www/index.html
sudo mv index.php /var/www
sudo mv delete.php /var/www
sudo mv run2.php /var/www
sudo mv upload.php /var/www
sudo mv create.sql /home/pi
sudo mv OpenShow.sh /home/pi
sudo mv -f Module1.xba /home/pi/.config/libreoffice/3/user/basic/Standard
sudo mv -f .xscreensaver /home/pi
sudo mv template.opd /var/www/templates
sudo mv template.pptx /var/www/templates 
sudo mv info.txt /var/www/templates/info.txt
sudo chmod +x /home/pi/OpenShow.sh

cd /home/pi/temp
sqlite3 main.db

sudo chown -R www-data /home/pi/temp
sudo chmod 777 /home/pi/temp/main.db
