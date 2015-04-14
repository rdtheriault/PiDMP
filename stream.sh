 #!/bin/bash

libreoffice --quickstart &

pkill omxplayer
sleep 2
pkill soffice.bin

DISPLAY=':0.0' omxplayer $1

if pgrep omxplayer > /dev/null
then
    echo 'Displayed Stream'
fi
