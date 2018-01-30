# Proyecto DAM 2017

## Material
Photon
Adafruit DHT22

## Preparacion

1. Tener un servidor del mosquitto :

Primero, para poder tener un servidor de mqtt hay que instalar una maquina virtual servidor , en nuestro caso fue ubuntu-16.04.3-server-amd64, en el cual hay que hacer la instalacion basica y despues se escriben las siguientes sentencias :
		
```bash
$ sudo apt-get upgrade
$ sudo apt-get update
$ sudo apt-get install mosquitto 
```

Cuidado con tener la direccion oculta, para lo cual has de poner el adaptador de red en modo bridge,en nuestro caso tenia una ayuda gráfica.
Luego hay que hacer que mosquito se suscriba al topic que enviara el sensor con esta sentencia:

```bash
$ sudo mosquitto_sub -v -h 10.1.104.22 -p 1883 -t 'datos' 										
```
														
2. Tener la maquina photon instalada (adjuntada foto) y reclamar dispositivo.
Una vez conectado todo adecuadamente y dándole alimentación, hay que instalarse una aplicación en el móvil llamada  particle y darle a añadir dispositivo, siguiendo los pasos que indique el dispositivo.
 
3. Programar una aplicación de medición de temperatura y humedad
Mediante web particle te da acceso a una manera sencilla de  programar.
Nuestra aplicacion viene adjunta en el archivo: ParticleBuil.ino y añadimos las librerias Adafruit_DHT_Particle(0.0.2)	 
y MQTT(0.4.23). 			

4. Crear una web (WampServer)
Instalar WampServer2.2ephp5.4.3-httpd2.2.22-mysql5.5.24-32b y luego en su carpeta www añadir la carpeta :web.

5. Crear la base de datos( phpmyadmin)		
Copiar el contenido del archivo sql en SQL y ejecutar.

## Uso
Conecta la maquina y entra en la pagina web, en ella primero dale al boton de subscribir y luego mostrar(recargar para actualizar la tabla)	 														

## Enlaces de interes

https://www.dineshjoshi.com/2017/07/3-easy-steps-build-wifi-temperature-sensor-esp8266/

https://www.digitalocean.com/community/tutorials/how-to-install-and-secure-the-mosquitto-mqtt-messaging-broker-on-ubuntu-16-04

https://github.com/bluerhinos/phpMQTT/blob/master/examples/subscribe.php

https://docs.debops.org/en/latest/ansible/roles/debops.mosquitto/
