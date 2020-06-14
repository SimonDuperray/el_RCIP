// MOTOR A: OUT 1 & 2
#define enA 10 // vitesse
#define in1 9  // sens rotation
#define in2 8  // sens rotation

// MOTOR B: OUT 3 & 4
#define bn1 6  // vitesse
#define bn2 5  // sens rotation
#define enB 4  // sens rotation

#define pot A0
void setup()
{
    pinMode(enA, OUTPUT);
    pinMode(in1, OUTPUT);
    pinMode(in2, OUTPUT);

    pinMode(enB, OUTPUT);
    pinMode(bn1, OUTPUT);
    pinMode(bn2, OUTPUT);

    Serial.begin(9600);
}

void avancer()
{
    digitalWrite(bn1, HIGH);
    digitalWrite(bn2, LOW);
    analogWrite(enB, 100);
    digitalWrite(in1, HIGH);
    digitalWrite(in2, LOW);
    analogWrite(enA, 100);
}
void reculer()
{
  digitalWrite(bn1, LOW);
  digitalWrite(bn2, HIGH);
  analogWrite(enB, 100);
  digitalWrite(in1, LOW);
  digitalWrite(in2, HIGH);
  analogWrite(enA, 100);
}
void gauche()
{
  digitalWrite(bn1, LOW);
  digitalWrite(bn2, HIGH);
  analogWrite(enB, 100);
  digitalWrite(in1, HIGH);
  digitalWrite(in2, LOW);
  analogWrite(enA, 100);
}
void droite()
{
  digitalWrite(bn1, HIGH);
  digitalWrite(bn2, LOW);
  analogWrite(enB, 100);
  digitalWrite(in1, LOW);
  digitalWrite(in2, HIGH);
  analogWrite(enA, 100);
}
void loop()
{
    avancer();
    delay(1000);
    gauche();
    delay(500);
    droite();
    delay(500);
    reculer();
    delay(1000);
}
