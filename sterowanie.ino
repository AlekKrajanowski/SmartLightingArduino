#include <ArduinoJson.h>
#include <Ethernet.h>
#include <SPI.h>


byte mac[] = { 0xDE, 0xAD, 0xBE, 0xEF, 0xFE, 0xED };
byte ip[] = { 192, 168, 0, 46 };
byte server[] = { 192, 168, 0, 151 }; // Google

int ledKitchen = 2;
int ledLivingRoom = 3;
int ledBathRoom = 4;
 
EthernetClient client;

void setup()
{
  Ethernet.begin(mac, ip);
  Serial.begin(9600);

  delay(1000);
  Serial.println("connecting...");

   
  pinMode(ledKitchen, OUTPUT);
  pinMode(ledLivingRoom, OUTPUT);
  pinMode(ledBathRoom, OUTPUT);
  
}

void loop()
{
getID();
  //if (client.available()) {
    //char c = client.read();
    //Serial.print(c);
  //}

  //if (!client.connected()) {
    //Serial.println();
    //Serial.println("disconnecting.");
    //client.stop();
    //for(;;)
      //;
  //}
}
void getID(){

 if (client.connect(server, 80)) {
    Serial.println("connected");
    client.println("GET /logowanie2/fragrancecontroller.php?view=all");
     client.println("Connection: close"); 
     client.println();  
  } else {
    Serial.println("connection failed");
  }
delay(5000); 
 String line = ""; 
 while (client.connected()) { 
   line = client.readStringUntil('\n'); 
   //Serial.println(line); 
   Serial.println("parsingValues"); 
   //create a json buffer where to store the json data 
   StaticJsonBuffer<5000> jsonBuffer; 
   JsonObject& root = jsonBuffer.parseObject(line); 
   if (!root.success()) { 
     Serial.println("parseObject() failed"); 
     return; 
   } 
 //get the data from the json tree 
 String Kitchen = root["fragrances"][0]["ofon"]; 
 String LivingRoom = root["fragrances"][1]["ofon"]; 
 String BathRoom = root["fragrances"][2]["ofon"]; 

if(Kitchen.toInt()==1)
{
  digitalWrite(ledKitchen, HIGH);
}
else{
  digitalWrite(ledKitchen, LOW);
}


if(LivingRoom.toInt()==1)
{
  digitalWrite(ledLivingRoom, HIGH);
}
else{
  digitalWrite(ledLivingRoom, LOW);
}

if(BathRoom.toInt()==1)
{
  digitalWrite(ledBathRoom, HIGH);
}
else{
  digitalWrite(ledBathRoom, LOW);
}
 
 // Print values. 
 Serial.println(Kitchen); 
 Serial.println(LivingRoom); 
 Serial.println(BathRoom); 


 
 } 
} 
