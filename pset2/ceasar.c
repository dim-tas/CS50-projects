#include <cs50.h>
#include <stdio.h>
#include <string.h>
#include <ctype.h>
#include <stdlib.h>

void encrypt(char c1, char c2, int key)
{
    int trans_c1 = (int) c1 - (int) c2;
    int trans_ciph = (trans_c1 + key) % 26;
    printf("%c", trans_ciph + c2);
} 


int main(int argc, string argv[])
{
    if (argc != 2)
    {
        printf("Run the program again and give one command-line argument (non-negative integer) for the key\n");
        return 1;
    }
    else
    {
        int k = atoi(argv[1]);
        printf("Give a message for encryption:");
        string p = GetString();
        int n = strlen(p);
        for (int i = 0; i < n; i++)
        {
            if (isalpha(p[i]))
            {
               if (isupper(p[i]))
               {
                  encrypt(p[i], 'A', k);
               }
               else
               {
                  encrypt(p[i], 'a', k);
               }
            }
            else
            {
                printf("%c", p[i]);
            }
         }
         printf("\n");
         return 0;
     }
}
