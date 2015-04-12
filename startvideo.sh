#!/bin/bash

libreoffice
pkill omxplayer
sleep 5
pkill soffice.bin


while true; do
if pgrep omxplayer > /dev/null
then
    echo 'running'
else
    omxplayer $1 -display :0.0
fi
if ps ax | grep -v grep | grep libreoffice > /dev/null
then
    break
fi
done
