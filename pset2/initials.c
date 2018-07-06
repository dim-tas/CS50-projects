#include <cs50.h>
#include <stdio.h>
#include <string.h>
#include <ctype.h>

int main(void)
{
    string s = GetString();
    int n = strlen(s);
    printf("%c", toupper(s[0]));
    for (int i = 1; i < n; i++)
    {
        if (s[i-1] == ' ')
        {
            printf("%c",toupper(s[i]));
        }
    }
    printf("\n");
}
