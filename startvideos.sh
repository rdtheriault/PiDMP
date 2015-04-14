#!/bin/bash

libreoffice --quickstart &

pkill omxplayer
sleep 2
pkill soffice.bin

declare -A vids

FILES=/home/pi/temp/pres/

#Make a newline a delimiter instead of a space 
SAVEIFS=$IFS 
IFS=$(echo -en "\n\b")


current=0
for f in `ls $FILES | grep ".mp4$\|.avi$\|.mkv$\|.mp3$\|.mov$\|.mpg$\|.flv$\|.m4v$"`
do
        vids[$current]="$f"
        let current+=1
	echo "$f"
done
max=$current
current=0

#Reset the IFS
IFS=$SAVEIFS

while true; do
if pgrep omxplayer > /dev/null
then
	echo 'running'
else
	let current+=1
	if [ $current -ge $max ]
	then
		current=0
	fi

	DISPLAY=':0.0' omxplayer "$FILES${vids[$current]}"
fi
if ps ax | grep -v grep | grep libreoffice > /dev/null
then
    break
fi
done
