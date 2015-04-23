# PiDMP

Under construction (mostly done)

Turn your PI into a digital sign with Diet-Pi (light-weight version)

##Start up

###Install Diet-Pi
 
During config you will:
 - Install LDXE

###Use the following commands on your Pi to get the install started

```
apt-get install git
apt-get install sudo
sudo git clone https://github.com/rdtheriault/PiDMP.git
cd PiDMP
sudo chmod +x install.sh
./install.sh
```

###Processing instructions

LibreOffice will open (needs to do this to create configs) close it

When the sql line shows up enter

```
-> .read /home/pi/create.sql   
-> .exit
```

###Final setup

Add `www-data` to sudoer for certian scripts

```
sudo visudo
```

Add the following to the end:
```
www-data ALL=(ALL) NOPASSWD: /home/pi/temp/
```


##NOTES

 - Download tightvnc client (Java program for both x11 and vncserver) to remote onto the Pi (Putty works well, too)
 - x11vnc - use to remote view `DISPLAY 0:0` (the one showing on the TV) Port 5900
 - vncserver - allows you to connect to second display (allows non interuption of show) Port 5901
 - You will need to get the IP address so you can get to the webpage (ifconfig works)
 - You can also assign an IP and use ifconfig to get the MAC address for DHCP
 - You can set up the Wi-Fi under `Menu-> Preferences -> WiFi Config`
