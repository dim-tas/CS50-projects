/* This program encypts a message using the caesar method. The user must give a command-line argument,
*  particularly a non-negative integer, for the key of the caesar encryption.
*/


#include <cs50.h>
#include <stdio.h>
#include <string.h>
#include <ctype.h>
#include <stdlib.h>



int main(int argc, string argv[])
{
// If there is no command-line argument for key, the program terminates with a warning message
    if (argc != 2)
    {
        printf("Run the program again and give one command-line argument (non-negative integer) for the key\n");
        return 1;
    }
// If the key exists, the encryption begins. Only letters are ecrypted
    else
    {
        int k = atoi(argv[1]);
        string p = GetString();
        int n = strlen(p);
        for (int i = 0; i < n; i++)
        {
// If the ith element of p--> plain text is letter, then it is encrypted
            if (isalpha(p[i]))
            {
// Uppercase letters are ciphered into uppercase and lowercase are cihered into lowercase
// In order to be consistent both with the ASCII table and the formula of Caesar encryption,
// we transpose our chars in the 0 index by subtracting 'A' or 'a' in case of uppercase or
// lowercase respectively. Then we add what we subtracted previously
                if (isupper(p[i]))
                {
                    int trans_P = p[i] - 'A';
                    int trans_C = (trans_P + k) % 26;
                    int C = trans_C + 'A';
                    printf("%c", C);
                }
                else
                {
                    int trans_p = p[i] - 'a';
                    int trans_c = (trans_p + k) % 26;
                    int c = trans_c + 'a';  
                    printf("%c", c);
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
