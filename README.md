# PiDMP

Under construction

Turn your PI into a digital Sign

***Use the following commands on your Pi to get the install started


sudo git clone https://github.com/rdtheriault/PiDMP.git

cd PiDMP

sudo chmod +x install.sh

./install.sh


***Processing instructions

LibreOffice will open (needs to do this to create configs) close it

When the sql line shows up enter -> .read /home/pi/create.sql   -> .exit


***Final setup

Add www-data to sudoer for certian scripts

sudo visudo

Add the following to the end

www-data ALL=(ALL) NOPASSWD: /home/pi/temp/


***Run commands at everystart up

vncserver - allows you to connect to second display via tightvnc client

