# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|
  config.vm.box = "ubuntu/xenial64"
  config.vm.network "private_network", ip: "192.168.33.10"
  config.vm.synced_folder "./", "/home/vagrant/work", owner: 'www-data', group: 'vagrant', mount_options: ['dmode=777', 'fmode=666']
  config.ssh.forward_agent = true
  config.vm.provision :shell, :path => "./provision.sh", :privileged => false  
end