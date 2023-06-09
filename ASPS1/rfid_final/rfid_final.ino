#include <ESP8266WebServer.h>
#include <ESP8266HTTPClient.h>
#include <SPI.h>
#include <MFRC522.h>

// Pin definitions for MFRC522 RFID module
#define SS_PIN D2  // SDA / SS is connected to pinout D2
#define RST_PIN D1 // RST is connected to pinout D1

// Create MFRC522 instance
MFRC522 mfrc522(SS_PIN, RST_PIN);

// WiFi credentials
const char* ssid = "asus";
const char* password = "1122334455";

ESP8266WebServer server(80); // Server on port 80

int readsuccess;
byte readcard[4];
char str[32] = "";
String StrUID;

// On-board LED pin
#define ON_Board_LED 2

void setup() {
  Serial.begin(115200); // Initialize serial communications with the PC
  SPI.begin();          // Init SPI bus
  mfrc522.PCD_Init();   // Init MFRC522 card

  delay(500);

  // Connect to WiFi router
  WiFi.begin(ssid, password);
  Serial.println("");

  pinMode(ON_Board_LED, OUTPUT);
  digitalWrite(ON_Board_LED, HIGH); // Turn off On-Board LED

  // Wait for connection
  Serial.print("Connecting");
  while (WiFi.status() != WL_CONNECTED) {
    Serial.print(".");
    digitalWrite(ON_Board_LED, LOW);  // Flash On-Board LED while connecting to the WiFi router
    delay(250);
    digitalWrite(ON_Board_LED, HIGH);
    delay(250);
  }
  digitalWrite(ON_Board_LED, HIGH); // Turn off the On-Board LED when connected to the WiFi router

  // Display IP address if successfully connected to the WiFi router
  Serial.println("");
  Serial.print("Successfully connected to: ");
  Serial.println(ssid);
  Serial.print("IP address: ");
  Serial.println(WiFi.localIP());

  Serial.println("Please tag a card or keychain to see the UID !");
  Serial.println("");
}

void loop() {
  readsuccess = getid();
  
    
  if (readsuccess) {
    digitalWrite(ON_Board_LED, LOW);

    HTTPClient http; // Declare object of class HTTPClient

    String UIDresultSend, postData;
    UIDresultSend = StrUID;

    // Prepare POST data
    postData = "UIDresult=" + UIDresultSend;

    WiFiClient client;
    http.begin(client, "http://192.168.206.15/ASPS/rfid/getUID.php"); // Specify request destination

    http.addHeader("Content-Type", "application/x-www-form-urlencoded"); // Specify content-type header

    int httpCode = http.POST(postData); // Send the request
    String payload = http.getString(); // Get the response payload

    Serial.println(UIDresultSend);
    Serial.println(httpCode); // Print HTTP return code
    Serial.println(payload);  // Print request response payload

    http.end(); // Close connection
    delay(1000);
    digitalWrite(ON_Board_LED, HIGH);
  }
}

int getid() {
  if (!mfrc522.PICC_IsNewCardPresent()) {
    return 0;
  }
  if (!mfrc522.PICC_ReadCardSerial()) {
    return 0;
  }

  Serial.print("THE UID OF THE SCANNED CARD IS: ");

  for (int i = 0; i < 4; i++) {
    readcard[i] = mfrc522.uid.uidByte[i]; // Store the UID of the tag in readcard
    array_to_string(readcard, 4, str);
    StrUID = str;
  }
  mfrc522.PICC_HaltA();
  return 1;
}

void array_to_string(byte array[], unsigned int len, char buffer[]) {
  for (unsigned int i = 0; i < len; i++) {
    byte nib1 = (array[i] >> 4) & 0x0F;
    byte nib2 = (array[i] >> 0) & 0x0F;
    buffer[i * 2 + 0] = nib1 < 0xA ? '0' + nib1 : 'A' + nib1 - 0xA;
    buffer[i * 2 + 1] = nib2 < 0xA ? '0' + nib2 : 'A' + nib2 - 0xA;
  }
  buffer[len * 2] = '\0';
}
