#include<stdio.h>
#include<string.h>
#define DENSITY 62.4
int main(void)
{
    float weight, volume;
    int size,letters;
    char name[40];

    printf("Hi! What's your first name?\n");
    scanf("%s",name);
    printf("%s,woat's your weight in pounds?\n",name);
    scanf("%f",&weight);
    size = sizeof name;
    letters = strlen(name);
    volume = weight / DENSITY;
    printf("%s,your volume is %2.2f",name,volume);
    printf("Also,your first name has %d leters\n",letters);
    printf("and web have %d btes to store it.\n",size);

    return 0;
}