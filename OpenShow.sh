#!/bin/bash
pkill soffice.bin
pkill omxplayer

DISPLAY=':0.0' libreoffice -show $1 --norestore &

echo "displayed show "

exit 
