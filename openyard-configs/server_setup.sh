#!/bin/sh

#################
##
## Setup Script
##
#################


sudo apt-get -y update

sudo apt-get -y upgrade

sudo apt-get -y install aptitude

sudo aptitude -y install build-essential

sudo apt-get -y install python-software-properties

sudo apt-get -y install libxslt1-dev libgd2-xpm-dev libxt-dev libperl-dev libgeoip-dev imagemagick perlmagick git

sudo aptitude -y install libc6 libpcre3 libpcre3-dev libpcrecpp0 libssl0.9.8 libssl-dev zlib1g zlib1g-dev lsb-base ssl-cert



#################
## Install MySQL
##########################

#sudo add-apt-repository ppa:nathan-renniewaldock/ppa

#sudo apt-get update

#sudo apt-get -y install mysql-server



