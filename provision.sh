#!/bin/bash
sudo apt-get install -y language-pack-en-base
sudo LC_ALL=en_US.UTF-8 add-apt-repository ppa:ondrej/php
sudo apt-get update && sudo apt-get upgrade
#sudo apt-get -y install git zip apache2 php7.2 php7.2-cli php7.2-fpm php7.2-gd php7.2-json php7.2-mysql php7.2-readline libapache2-mod-php7.2 
sudo apt-get -y install php7.2 php7.2-cli
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer
sudo chmod +x /usr/local/bin/composer
cd ~/work
composer global require sstalle/php7cc
mkdir ~/work/source
export PATH="$PATH:$HOME/.config/composer/vendor/bin"
