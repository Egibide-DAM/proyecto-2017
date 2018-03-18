// This #include statement was automatically added by the Particle IDE.
#include <MQTT.h>
// This #include statement was automatically added by the Particle IDE.
#include <Adafruit_DHT_Particle.h>

#define DHTPIN D2     
#define DHTTYPE DHT22	
char server[]="10.1.104.22";//es la direccion de la maquina vistual en la que esta mosquitto
void callback(char* topic, byte* payload, unsigned int lenght){}//ni idea de porque es necesario
MQTT client(server,1883,callback);//1883 es el puerto de moquitto
DHT dht(DHTPIN, DHTTYPE);
String lecturas;

void setup() {
    Serial.begin(9600);//orden de inicio de conexion    
}

void loop() {
	float h = dht.getHumidity();
	float t = dht.getTempCelcius();
	float f = dht.getTempFarenheit();
	if (isnan(h) || isnan(t) || isnan(f)) {
		Serial.println("Fallo de dht sensor");
		return;
	}

	float hi = dht.getHeatIndex();
	float dp = dht.getDewPoint();
	float k = dht.getTempKelvin();

	Serial.print("Humid: "); 
	Serial.print(h);
	Serial.print("% - ");
	Serial.print("Temp: "); 
	Serial.print(t);
	Serial.print("*C ");
	Serial.print(f);
	Serial.print("*F ");
	Serial.print(k);
	Serial.print("*K - ");
	Serial.print("DewP: ");
	Serial.print(dp);
	Serial.print("*C - ");
	Serial.print("HeatI: ");
	Serial.print(hi);
	Serial.println("*C");
	Serial.println(Time.timeStr());
	Particle.publish("lecturas", String::format("\Hum(\porc)\ : %4.2f, \ Temp(°C)\ : %4.2f, \ DP(°C)\ : %4.2f, \ HI(°C)\ : %4.2f ", h, t, dp, hi));
	String ht=(String)h+" porcentaje de humedad "+","+t+" grados de temperatura";
	String lecturas=(String)h+","+t;
	if(client.isConnected()){
	    Particle.publish("publicacion correcta");//comprobador de que entra
	    client.publish("datos",lecturas);
	}else{
	    client.connect("sparkclient");//conectar mosquitto a la fuerza si no esta conectado
	}
	delay(5000);
}