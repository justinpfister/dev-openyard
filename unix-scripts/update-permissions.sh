#!/bin/sh

sudo chown -R www-data:webdev /var/www


sudo chmod -R ug=wrx,o= /var/www


#echo 'updated permissions'