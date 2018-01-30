---

# PROCESO REALIZADO

- ## Montar Photon junto con el sensor.
  - Se coloca el Photon en la base de conexiones.
  - Se coloca el sensor y mediante jumper wires se conecta a Photon.
  > **Info** del [montaje](https://learn.adafruit.com/dht/connecting-to-a-dhtxx-sensor).<br/>
  
  `En ésta imagen se puede apreciar como están distribuidas las conexiones de la mini-breadboard.`
  ![Image](https://cdn.sparkfun.com/assets/3/d/f/a/9/518c0b34ce395fea62000002.jpg)
- ## Configurar conexion desde app móvil
  - Instalar en Android o IOs la aplicación "Particle".
  - Desde ella configurar la conexión a internet vía Wi-Fi del Photon.
- ## En la web de [Particle](https://build.particle.io/build) seleccionar nuestro dispositivo.
  > [Información](https://www.arduino.cc/reference/en/) de como programar Photon.<br/>
    [Ejemplo](https://openhomeautomation.net/cloud-data-logger-particle-photon/) de programa que lee con el sensor.
- ## Añadir las librerias:
  > Adafruit_DHT.h, MQTT.h, DHTPIN 2, DHTTYPE DHT22.
- ## Escibir el código y flashearlo en Photon.
  > [Código](https://github.com/AitorBM/proyecto-2017/blob/master/C%C3%B3digo/photon.ino) para el Photon.
  
  > Debes poner una dirección ip pública que esté disponible en tu red.
- ## Comprobar mediante los led que esta encendido y ejecutando el código correctamente.
  > Verde fijo si está encendido correctamente.
  > Otro led azul parpadeando por cada loop del código.
- ## Comprobar desde el log de la [consola](https://console.particle.io/events) que envia datos correctamente.
- ## Instalar [VirtualBox](https://www.virtualbox.org/wiki/Downloads) y su [Extension Pack](https://download.virtualbox.org/virtualbox/5.2.6/Oracle_VM_VirtualBox_Extension_Pack-5.2.6-120293.vbox-extpack).
- ## Instalar [Vagrant](https://www.vagrantup.com/downloads.html).
- ## Construir el VagrantBox.
    - Hemos seguido éste [tutorial](https://scotch.io/tutorials/how-to-create-a-vagrant-base-box-from-an-existing-one) como referencia.
    
    Queremos crear una máquina Ubuntu 16.04/Xenial64 por lo que ejecutamos:
```sh
$ sudo vagrant init ubuntu/xenial64
```
- ## Conectarse a el mediante ssh.
```sh
$ vagrant ssh
```
- ## Instalar programas y servicios necesarios en el servidor.
  > Seguimos el tutorial además de estos comandos.
  
```sh
$ sudo apt-get update
$ sudo apt-get install npm
$ sudo apt-get install nodejs
$ sudo npm install msql --save
$ sudo npm install mqtt --no-bin-links
$ cd ruta
$ sudo npm init
$ sudo apt-get clean
```

- ## Ejecutar el script de SQL para tener la base de datos y la tabla.
  > [Código](https://github.com/AitorBM/proyecto-2017/blob/master/C%C3%B3digo/bd.sql).
  
|       ID       |     TOPIC      |       MSG      |   FECHA|
|----------------|----------------|----------------|----------------|
|       `1`      |photon/temperatura|23.700001 Cº    |2018-01-30 18:06:58|
|                |                |                | |

- ## Compartir una carpeta para añadir y editar la [web](https://github.com/AitorBM/proyecto-2017/tree/master/C%C3%B3digo/Web) y el [script](https://github.com/AitorBM/proyecto-2017/blob/master/C%C3%B3digo/Web/app_prueba02.js) js.
> Ya incluido en el VagrantFile.
  - ### El objetivo es almacenar los datos en BD mediante MQTT.
  > Usamos un script js modificado que encontramos en este
  [ejemplo](http://ediy.com.my/blog/item/143-store-messages-from-mosquitto-mqtt-broker-into-sql-database).
  
- ## Apagar la máquina.
```sh
$ sudo vagrant halt
```
- ## Crear nueva VagrantBox.
```sh
$ sudo vagrant package --output mynew.box
```
- ## Añadir la VagrantBox a Vagrant.
```sh
$ sudo vagrant box add mynewbox mynew.box
```
- ## Inicializar la Box nueva.
```sh
$ sudo vagrant init mynewbox
```
- ## Configurar VagrantFile.
> [Código](https://github.com/AitorBM/proyecto-2017/blob/master/Vagrantfile).

> En esta línea debes poner una dirección ip pública que esté disponible en tu red.
```sh
config.vm.network "public_network", ip: "10.1.103.232", netmask: "255.255.0.0"
```
- ## Arrancar la Box nueva.
```sh
$ cd ruta
$ sudo vagrant up
```
  > Al tener indicado en el Vagrantfile que se el script se ejecute automáticamente ya estará escuchando.
