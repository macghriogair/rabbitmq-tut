# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|

    config.vm.box = "scotch/box"
    config.vm.network "private_network", ip: "192.168.33.45"
    config.vm.hostname = "amqp-tuts.dev"
    config.vm.synced_folder ".", "/var/www",
        :mount_options => ["dmode=777", "fmode=777"]

    # Optional NFS. Make sure to remove other synced_folder line too
    #config.vm.synced_folder ".", "/var/www", :nfs => true
    #{ :mount_options => ["dmode=777","fmode=666"] }

    config.vm.provider :virtualbox do |vb|
      vb.customize [
        "modifyvm", :id,
        "--memory", 2048,            # How much RAM to give the VM (in MB)
        "--cpus", 2,                 # Muli-core in the VM
        "--ioapic", "on",
        "--natdnshostresolver1", "on",
        "--natdnsproxy1", "on"
      ]
    end

    config.vm.provision "shell", inline: <<-SHELL
    SHELL
end
