var request = require('request');
var mqtt = require('mqtt');
var topic = 'photon/data'; //Topic suscritos
var broker_url = 'mqtt://localhost'; //IP del broket MQTT
var ip_openhab = "10.1.3.14:8080" //IP del servidor OpenHAB

//MQTT
var options = {
	clientId: 'MQTTapp',
	port: 1883,	
	keepalive : 60,
	protocolId: 'MQIsdp', 
	protocolVersion: 3, 
	connectTimeout:1000, 
	debug:true
};

var client  = mqtt.connect(broker_url, options);
client.on('connect', mqtt_connect);
client.on('reconnect', mqtt_reconnect);
client.on('error', mqtt_error);
client.on('message', mqtt_messsageReceived);
client.on('close', mqtt_close);

function mqtt_connect() {
    console.log("Conectado a MQTT");
    client.subscribe(topic, mqtt_subscribe);
};

function mqtt_reconnect(err) {
    console.log("Reconectado a MQTT...");
    if (err) {console.log(err);}
	client = mqtt.connect(broker_url, options);
};

function mqtt_close() {
	console.log("Conexión MQTT cerrada");
};

function mqtt_subscribe(err, granted) {
    console.log("Suscrito a " + topic);
    if (err) {console.log(rer);}
};

function mqtt_error(err) {
    console.log("Error con la conexión MQTT");
	if (err) {console.log(err);}
};

function after_publish() {
	//do nothing
};

//Mensaje recibido desde el broker MQTT
function mqtt_messsageReceived(topic, data, packet) {
	if (topic == "photon/data") {

		//Check temperatura para apagar/encender enchufe
		checkTemperatura(JSON.parse(data).temperatura);

		// Insertamos el mensaje recibido en la base de datos mediante una llamada POST a la API
		request.post({
		  	headers: {'content-type' : 'application/x-www-form-urlencoded'},
		  	url:     'http://localhost/photon/api.php/data',
		 	body:    data
		}, function(error, response, body){
		  	console.log("Datos insertados -> ID: " + body); // Nos devuelve el ID de la fila insertada
		});
	}
};

//Funcion para check de temperatura
function checkTemperatura(temperatura_actual) {
	request.get({
  		url : 'http://10.1.103.226/photon/api.php/config?transform=1&filter=clave,sw,temperatura'
	}, function(error, response) {
  		if (!error) {
  			//Get variables
  			var temperatura_min;
  			var temperatura_max;
	  		JSON.parse(response.body).config.forEach(function(value) {
	  			switch (value.clave) {
	  				case 'temperatura_min':
	  					temperatura_min = value.valor;
	  					break;
  					case 'temperatura_max':
  						temperatura_max = value.valor;
  						break;
	  			}
  			});

	  		//Logica para apagar/encender enchufe dependiendo de la temperatura
	  		if (temperatura_actual > temperatura_min && temperatura_actual < temperatura_max && temperatura_actual < temperatura_max) {
	  			sendOpenhabRequest('Enchufe', 'OFF');
				console.log('Apagando enchufe...');
	  		} else {
	  			sendOpenhabRequest('Enchufe', 'ON')
				console.log("Encendiendo enchufe...");
	  		}
  		}
	});
};

//Request al servidor OpenHAB
function sendOpenhabRequest(item, value) {
	request.post({
	  		headers: {'content-type' : 'text/plain'},
		  	url:     'http://'+ip_openhab+'/rest/items/'+item,
		 	body:    value
		}, function(error, response, body) {
		  	if (error) console.log(error);
		})
};