/* This program is an implementation of greedy algorithm
*  The user must give a non-negative float number
*/

#include <stdio.h>
#include <cs50.h>
#include <math.h>

// The function idivide has output the integer quotient of a division
int idivide(int num1, int num2)
{
    int res = num1 / num2;
    return res;
}

int main(void)
{
    int quarters = 25;
    int dimes = 10;
    int nickels = 5;
    int coin_num = 0;
    float change;
    int rest_of_change;
    
    /* the function prompts the user to give a non-negative number and 
    * reprompts them in case of "wrong" input
    */
    do
    {
        printf("O hai! How much change is owed?\n");
        change = GetFloat();
    } while (change < 0.00);
    // typecasting from float to int
    rest_of_change = round((float) change * 100);
    
    
    /* quarters, dimes and nickels are represented as integers with values 
    *25(cents), 10 (cents) and 5 (cents)
    */
    
    coin_num = coin_num + idivide(rest_of_change, quarters);
    rest_of_change = rest_of_change % quarters;
    coin_num = coin_num + idivide(rest_of_change, dimes);
    rest_of_change = rest_of_change % dimes;
    coin_num = coin_num + idivide(rest_of_change, nickels);
    rest_of_change = rest_of_change % nickels;
    coin_num = coin_num + rest_of_change;
    printf("%d\n",coin_num);
}
