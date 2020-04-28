#include<stdio.h>
int main(void)
{
    int var1 = 100;
    
    printf("十进制：%d\n",var1);
    printf("八进制：%#o\n",var1);
    printf("十六进制：%#x\n",var1);

    return 0;
}