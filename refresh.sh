#!/bin/sh

git clone git@github.com:justinpfister/dev-openyard.git dev-openyard

git submodule update --init --recursive

sudo chown -R www-data:webdev /var/www

sudo chmod -R ug=wrx,o= /var/www


#Boot strap permisions
sudo chown -R www-data:webdev /var/www/*/web/assets

sudo chmod -R ug=wrx,o= /var/www/*/web/assets

