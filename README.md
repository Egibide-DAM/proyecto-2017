# Proyecto DAM 2017

## Preparacion

1. Tener un servidor del mosquitto :

Primero, para poder tener un servidor de mqtt hay que instalar una maquina virtual servidor , en nuestro caso fue ubuntu, en el cual se escriben las siguientes sentencias :
		
```bash
$ sudo apt-get upgrade
$ sudo apt-get update
$ sudo apt-get install mosquitto 
```

Cuidado con tener la direccion oculta, para lo cual has de poner el adaptador de red en modo bridge,en nuestro caso tenia una ayuda gráfica.
Luego hay que hacer que mosquito se suscriba al topic que enviara el sensor con esta sentencia:

```bash
$ sudo mosquitto_sub -v -h 10.1.104.22 -p 1883 -t 'datos'
 														ip			      puerto    topic
```
														
2. Tener la maquina photon instalada (adjuntada foto) y reclamar dispositivo.
Una vez conectado todo adecuadamente y dándole alimentación, hay que instalarse una aplicación en el móvil llamada  particle y darle a añadir dispositivo, siguiendo los pasos que indique el dispositivo.
 
3. Programar una aplicación de medición de temperatura y humedad
Mediante web particle te da acceso a una manera sencilla de  programar.
Nuestra aplicacion viene adjunta en el archivo: ParticleBuil.ino.	  			

4. Crear una web (WampServer)
Instalar WampServer y luego en su carpeta www añadir la carpeta :web.

5. Crear la base de datos( phpmyadmin)		
Copiar el contenido del archivo sql en SQL y ejecutar.

## Uso
Conecta la maquina y entra en la pagina web, en ella primero dale al boton de subscribir y luego mostrar	 														
