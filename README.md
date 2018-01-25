# Proyecto DAM 2017

Repositorio del módulo de proyecto de Desarrollo de Aplicaciones Multiplataforma en [Egibide Arriaga](http://www.egibide.org/2/es/25/donde-nos-encontramos.html).

La carpeta [docs](./docs/) contiene el [sitio web](https://egibide-dam.github.io/proyecto-2017/) con la documentación.

## Material utilizado
- [Photon Kit](https://store.particle.io/products/photon-kit)
- [Adafruit DHT22](https://www.adafruit.com/product/385)
- [Scotch-box](https://box.scotch.io/)

## Tecnologías utilizadas
- Ubuntu 14.04 como servidor.
- MySQL como base de datos.
- API REST para interactuar con la base de datos.
- MQTT como protocolo de comunicación para IoT.
- Mosquitto como broker de mensajes MQTT.
- Arduino para la aplicación de Photon.
- PHP para la aplicación Web del Photon.
- NodeJS para la aplicación intermediaria entre los mensajes MQTT y la base de datos.

## Recursos utilizados
- [StartBootstrap template](https://startbootstrap.com/template-categories/all/)
- [PHP CRUD API](https://github.com/mevdschee/php-crud-api)
- [jQuery](https://jquery.com/)
- [MorrisJS](https://github.com/morrisjs/morris.js)
- [node request package](https://www.npmjs.com/package/request)
- [node mqtt package](https://www.npmjs.com/package/mqtt)
- [Adafruit_DHT Arduino](https://build.particle.io/libs/Adafruit_DHT/0.0.2)
- [MQTT Arduino](https://build.particle.io/libs/MQTT/0.4.23)
- [ArduinoJson](https://build.particle.io/libs/ArduinoJson/5.11.2)
- [Ejemplo DataLogger Photon](https://openhomeautomation.net/cloud-data-logger-particle-photon/)
- [Ejemplo NodeJS MQTT - MySQL](http://ediy.com.my/blog/item/143-store-messages-from-mosquitto-mqtt-broker-into-sql-database)

## Instalaciones

### Instalar Scotch-box
1. Descargamos [Vagrant](https://www.vagrantup.com/downloads.html).
2. Clonamos la repo de Scotch-box `git clone https://github.com/scotch-io/scotch-box`
3. Cambiamos de directorio `cd scotch-box`
4. Editamos el archivo `Vagrantfile` y le asignamos una IP pública dentro de nuestro rango `config.vm.network "public_network", ip: "10.1.103.226", netmask: "255.255.0.0"`
5. Levantamos la máquina `vagrant up`

### Configurar Photon
1. Una vez tengamos nuestro Photon montado, lo configuraremos con nuestro smartphone. Para ello, utilizaremos [esta guía](https://docs.particle.io/guide/getting-started/start/photon/#step-2b-connect-your-photon-to-the-internet-using-your-smartphone).
2. Desde [Particle IDE](https://build.particle.io/build/new) importaremos el script Arduino `photon/arduino/photonapp.ino` y lo flashearemos en nuestro dispositivo.
3. **Nota:** En caso de utilizar una IP diferente en el servidor, deberemos especificarla en la variable `server`.

### Instalar Mosquitto MQTT Messaging Broker en el servidor
1. Instalamos Mosquitto: `sudo apt-get install mosquitto mosquitto-clients`. Por defecto, Ubuntu iniciará el servicio Mosquitto después de la instalación.
2. Nos subscribimos al topic photon y a todos sus sub-topics: `mosquitto_sub -h localhost -t photon/+`

### Instalar el proyecto
1. Clonamos la repo del proyecto `https://github.com/Romerski/proyecto-2017 photon`
2. Importamos el script `photon/database/photon.sql` en la base de datos.
3. Instalamos las dependencias de la aplicación NodeJS: `cd photon/nodeapp/` y `npm install --no-bin-links`

### Inicializar la aplicación NodeJS
1. Cambiamos al directorio de la aplicación `cd photon/nodeapp/`
2. Especificamos la IP del servidor OpenHAB en la variable `ip_openhab` del fichero `app.js`
3. Ejecutamos la aplicación: `node app.js`

### Acceder a la aplicación Web
1. Accedemos a `http://10.1.103.226/photon/webapp`
2. **Nota:** En caso de utilizar una IP diferente en el servidor, deberemos especificarla en la URL. También deberemos cambiar la variable `ip` en `photon/webapp/resources/js/grafica.js` y en `photon/webapp/resources/js/admin.js`
