#include<stdio.h>
void jolly(void);
void deny(void);
int main(void)
{
   jolly();
   jolly(); 
   jolly();
   deny();

}

//jolly function
void jolly(void)
{
    printf("For he is a jolly good fellow!\n");
}

//deny function
void deny(void)
{
    printf("Which nobody can deny!\n");
}