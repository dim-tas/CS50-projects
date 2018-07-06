/* This program encypts a message using the vigenere method. The user must give a command-line argument,
*  particularly an alphabetical string, for the key of the caesar encryption.
*/



#include <cs50.h>
#include <stdio.h>
#include <string.h>
#include <ctype.h>
#include <stdlib.h>

void encrypt(char c1, char c2, char k3);

int main(int argc, string argv[])
{

// If there is no command-line argument for key, the program terminates with a warning message
    if (argc != 2)
    {
        printf("Run the program again and give one command-line argument (alphabetical string) for the key\n");
        return 1;
    }
    
// If the command-line argument for the key is not alphabetical string, the program 
// terminates with a warning message    
    string k = argv[1];
    int n = strlen(k);
    for (int j = 0; j < n; j++)
    {
        if (!isalpha(k[j]))
        {
            printf("Give an alphabetical string for the key\n");
            return 1;
        }
    }
    
// If the alphabetical key exists, the encryption begins. Only letters are encrypted
// Uppercase letters are ciphered into uppercase and lowercase are cihered into lowercase
// In order to be consistent both with the ASCII table and the formula of Caesar encryption,
// we transpose our chars in the 0 index by subtracting 'A' or 'a' in case of uppercase or
// lowercase respectively. Then we add what we subtracted previously
    string p = GetString();
    int m = strlen(p);
    int j = 0;
    for (int i = 0; i < m; i++)
    {
        if (isalpha(p[i]))
        {
            if (isupper(p[i]))
            {
                encrypt(p[i], 'A', k[j]);
            }
            else
            {
                encrypt(p[i], 'a', k[j]);
            }
            j = (j + 1) % n;
        }
        else
        {
            printf("%c", p[i]);
        }
    }
    printf("\n");
    return 0;
}

// The function for encryption. Uppercase and lower letters of the keyword have the same effect
// For example 'A' and 'a' transpose leters for 0 positions. 'B' and 'b' 1 position e.t.c
void encrypt(char c1, char c2, char c3)
{
    int trans_c1 = (int) c1 - (int) c2;
    int trans_ciph;
    if (isupper(c3))
    {
        trans_ciph = (trans_c1 + (int) (c3 - 'A')) % 26;
    }
    else
    {
        trans_ciph = (trans_c1 + (int) (c3 - 'a')) % 26;
    }
    int c = trans_ciph + c2;
    printf("%c", (char) c);
}





















