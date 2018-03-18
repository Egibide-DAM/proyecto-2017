#include "Adafruit_DHT.h"

#include "MQTT.h"

#define DHTPIN 2

#define DHTTYPE DHT22

void callback(char* topic, byte* payload, unsigned int length);

byte server[] = { 10,1,103,232 };
MQTT client(server, 1883, callback);

DHT dht(DHTPIN, DHTTYPE);

int led1 = D7;

void callback(char* topic, byte* payload, unsigned int length) {
    Spark.publish("callback");
    /*
    char p[length + 1];
    memcpy(p, payload, length);
    p[length] = NULL;

    if (!strcmp(p, "RED"))
        RGB.color(255, 0, 0);
    else if (!strcmp(p, "GREEN"))
        RGB.color(0, 255, 0);
    else if (!strcmp(p, "BLUE"))
        RGB.color(0, 0, 255);
    else
        RGB.color(255, 255, 255);
    delay(1000);
    */
}

void setup() {
    
    Serial.begin(9600); 
	Particle.publish("DHT22 test!");
	
    pinMode(led1, OUTPUT);
    digitalWrite(led1, HIGH);
    
    RGB.control(true);
    RGB.color(0, 255, 0);
    
    client.connect("sparkclient");

    if (client.isConnected()) {
        Spark.publish("El cliente está conectado");
        //client.subscribe("inTopic/message");
    }else{
        Spark.publish("El cliente no está conectado");
    }
    
    dht.begin();
}

void loop() {
    digitalWrite(led1, HIGH);
    delay(1000);
    
    float h = dht.getHumidity();
    float t = dht.getTempCelcius();
    
    if (isnan(h) || isnan(t)) {
		Serial.println("Error al leer de DHT sensor!");
		return;
	}
    
    Spark.publish("Humedad: ", (String)h);
	Spark.publish("Temperatura - C ", (String)t);
	
	client.publish("photon/humedad",(String)h);
	client.publish("photon/temperatura",(String)t);
	
	digitalWrite(led1, LOW);
	delay(2000);
}
