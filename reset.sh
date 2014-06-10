#!/bin/bash
clear
a=0
until [ $a == 1 ]
do
	echo "Reset pixelMesh? (y/N)"
	read conf
	if [ "$conf" == "y" ]; then
		a=1
	elif [ "$conf" == "n" ]; then
		echo "aborting"
		exit 1
	else 
		echo "y or n"
	fi
done
echo "resetting. . . "
rm -rf res/* pages/* front.html 
find inc -type f -not -name 'defaults.txt' | xargs rm
mv FIRST_RUN{_BACKUP,}.php
pwd
