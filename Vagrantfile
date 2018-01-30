Vagrant.configure("2") do |config|

	config.vm.box = "jonaitorserver"
	config.vm.box_url = "https://www.dropbox.com/s/mhia93a6t7lnud9/29ene2155.box?dl=0"

  # Disable automatic box update checking. If you disable this, then
  # boxes will only be checked for updates when the user runs
  # `vagrant box outdated`. This is not recommended.
  # config.vm.box_check_update = false

  # Create a forwarded port mapping which allows access to a specific port
  # within the machine from a port on the host machine. In the example below,
  # accessing "localhost:8080" will access port 80 on the guest machine.
  # NOTE: This will enable public access to the opened port
  # config.vm.network "forwarded_port", guest: 80, host: 8080

  # Create a forwarded port mapping which allows access to a specific port
  # within the machine from a port on the host machine and only allow access
  # via 127.0.0.1 to disable public access
  # config.vm.network "forwarded_port", guest: 80, host: 8080, host_ip: "127.0.0.1"

  # Create a private network, which allows host-only access to the machine
  # using a specific IP.
  # config.vm.network "private_network", ip: "192.168.33.10"

  # Create a public network, which generally matched to bridged network.
  # Bridged networks make the machine appear as another physical device on
  # your network.
  # config.vm.network "public_network"
  config.vm.network "public_network", ip: "10.1.103.232", netmask: "255.255.0.0"

  # Share an additional folder to the guest VM. The first argument is
  # the path on the host to the actual folder. The second argument is
  # the path on the guest to mount the folder. And the optional third
  # argument is a set of non-required options.
  # config.vm.synced_folder "../data", "/vagrant_data"

  #config.vm.synced_folder "./public_html", "/var/www/html", :mount_options => ["dmode=777", "fmode=666"]

  # Provider-specific configuration so you can fine-tune various
  # backing providers for Vagrant. These expose provider-specific options.
  # Example for VirtualBox:
  #
   config.vm.provider "virtualbox" do |vb|
  #   # Display the VirtualBox GUI when booting the machine
     vb.gui = false
	 
  #   # Customize the amount of memory on the VM:
     vb.memory = "2048"
	 vb.cpus =  2 	 
 # Basebox ubuntu/xenial64 comes with following Vagrantfile config and causes https://github.com/joelhandwell/ubuntu_vagrant_boxes/issues/1
    # vb.customize [ "modifyvm", :id, "--uart1", "0x3F8", "4" ]
    # vb.customize [ "modifyvm", :id, "--uartmode1", "file", File.join(Dir.pwd, "ubuntu-xenial-16.04-cloudimg-console.log") ]
    # following config will address the issue
    vb.customize [ "modifyvm", :id, "--uartmode1", "disconnected" ]
   end
   
  # View the documentation for the provider you are using for more
  # information on available options.

  # Enable provisioning with a shell script. Additional provisioners such as
  # Puppet, Chef, Ansible, Salt, and Docker are also available. Please see the
  # documentation for more information about their specific syntax and use.
  # config.vm.provision "shell", inline: <<-SHELL
  #   apt-get update
  #   apt-get install -y apache2
	#sudo nodejs /var/www/html/web/app_prueba02.js
   #SHELL
   
   #config.vm.provision "shell", inline: "sudo nodejs /var/www/html/web/app_prueba02.js"
   
	#config.vm.define "web" do |web|
	#	web.vm.provision "shell", inline: "nodejs /var/www/html/web/app_prueba02.js"
	#end
end
