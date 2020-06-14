

#define enA 10
#define in1 9
#define in2 8

#define enB 6
#define bn1 5
#define bn2 4

void setup()
{
    pinMode(enA, OUTPUT);
    pinMode(in1, OUTPUT);
    pinMode(in2, OUTPUT);

    pinMode(enB, OUTPUT);
    pinMode(bn1, OUTPUT);
    pinMode(bn2, OUTPUT);
}

void loop()
{
    digitalWrite(in1, HIGH);
    digitalWrite(in2, LOW);
    analogWrite(enA, 200);

    digitalWrite(bn1, LOW);
    digitalWrite(bn2, HIGH);
    analogWrite(enB, 200);
    delay(5000);

    digitalWrite(in1, LOW);
    digitalWrite(in2, LOW);

    digitalWrite(in1, LOW);
    digitalWrite(in2, HIGH);

    digitalWrite(bn1, LOW);
    digitalWrite(bn2, HIGH);
    analogWrite(enA, 200);

    digitalWrite(bn1, HIGH);
    digitalWrite(bn2, LOW);
    analogWrite(enB, 200);
    delay(5000);
}