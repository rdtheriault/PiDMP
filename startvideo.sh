#!/bin/bash

libreoffice --quickstart &

pkill omxplayer
sleep 2
pkill soffice.bin


while true; do
if pgrep omxplayer > /dev/null
then
    echo 'running'
else
    DISPLAY=':0.0' omxplayer $1
fi
if ps ax | grep -v grep | grep libreoffice > /dev/null
then
    break
fi
done
