// Includes
#include <ArduinoJson.h>
#include <MQTT.h>
#include "Adafruit_DHT.h"

//Defines
#define DHTPIN D2       // DHT Sensor pin
#define DHTTYPE DHT22   // DHT 22 (AM2302)

// Pins
int light_sensor_pin = A1;
int light_sensor_power = A5;
int led = D7;

// Variables
char *device_id = "4c0024000151353532373238";
char *device_name = "ElmillorPhoton";
byte server[] = { 10,1,103,226 }; //IP del servidor web
int estado = 1; //Estado para recoger datos
// Datos
float t; //Temperatura
float h; //Humedad
int light; //Luz
int refresh_time = 5000; //Tiempo de espera entre toma de datos

// MQTT Callback
void callback(char* topic, byte* payload, unsigned int length);

// DHT & MQTT
DHT dht(DHTPIN, DHTTYPE);
MQTT client(server, 1883, callback);

////////////////////////////////////////////////////////////////////////////

void callback(char* topic, byte* payload, unsigned int length) {}

void setup()
{
    // Inicializamos
    pinMode(led, OUTPUT);
    pinMode(light_sensor_pin, INPUT);
    pinMode(light_sensor_power, OUTPUT);
    digitalWrite(light_sensor_power, HIGH);
    dht.begin();
    Particle.function("estado", estadoToggle);
    
    // Conectamos con el servidor
    client.connect("ElmillorPhoton");
    if (client.isConnected()) {
        client.publish("photon/info", "Conectado!");
    } else {
        Particle.publish("Error", "No se ha podido conectar al servidor MQTT");
    }
}

void loop()
{
    //Miramos si debemos recoger datos o no
    if (estado == 1) {
        // Encendemos el led mientras recoge datos
        digitalWrite(led, HIGH);
        
        // Get temperatura Celsius
        t = dht.getTempCelcius();
        // Get humedad
        h = dht.getHumidity();
        // Get nivel de luz
        light = (int)analogRead(light_sensor_pin);
      
        // Check si algun valor es nulo
        if (isnan(h) || isnan(t) || isnan(light)) {
            Particle.publish("Aviso", "Error en la lectura de algún sensor");
            return;
        }
        
        // Publicamos los datos en particle
        publishOnParticle();
        
        // Comprobamos que estamos conectados al servidor MQTT
        if (client.isConnected() ) {
    
            // Creamos un JSON
            StaticJsonBuffer<300> JSONbuffer;
            JsonObject& JSONencoder = JSONbuffer.createObject();
            
            JSONencoder["device_id"] = device_id;
            JSONencoder["device_name"] = device_name;
            JSONencoder["temperatura"] = t;
            JSONencoder["humedad"] = h;
            JSONencoder["luz"] = light;
            JSONencoder["fecha"] = Time.now();
            
            char JSONmessageBuffer[300];
            JSONencoder.printTo(JSONmessageBuffer, sizeof(JSONmessageBuffer));
    
            // Enviamos el JSON
            client.publish("photon/data", JSONmessageBuffer);
        } else {
            client.connect("ElmillorPhoton");
        }
        
        // Apagamos el LED
        digitalWrite(led, LOW);
    } else {
        digitalWrite(led, HIGH);
        Particle.publish("Aviso", "La toma de datos está desactivada. Actívalo en el admin de la aplicación.");
    }

    // Esperamos X tiempo para volver a recoger datos
    delay(refresh_time);
    client.loop();
}

//Publicar los datos en particle
void publishOnParticle()
{
    Particle.publish("Fecha", String(Time.now()));
    //delay(1000);
    Particle.publish("Temperatura C", String(t) + " ºC");
    //delay(1000);
    Particle.publish("Humedad", String(h) + "%");
    //delay(1000);
    Particle.publish("Luz", String(light) + "%");
}

//Cambiar el estado para el envio de datos al servidor MQTT
int estadoToggle(String e)
{
    if (e == "on") {
        estado = 1;
        return 1;
    }
    else if (e == "off") {
        estado = 0;
        return 0;
    } else {
        return -1;
    }
}