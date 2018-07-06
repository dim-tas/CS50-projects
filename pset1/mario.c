/* mario.c creates the half pyramid that super mario
*  has to climb at the end of level 1-1, the height of
*  the pyramid is given by the user i.e. a non-negative
*  integer no bigger than 23
*/

#include <stdio.h>
#include <cs50.h>

int main(void)
{
    int rows, cols, blank_index;
    do
    {
        printf("height:");
        // the function GetInt "reads" the input for the height
        rows = GetInt();
        // the number of columns is bigger by 1 than the rows
        cols = rows + 1;
        // blank_index shows the position of the last space (" ") in every row
        blank_index = cols - 3;
      // reprompts the user to give a suitable integer in case of "wrong" input
    } while (rows < 0 || rows > 23);
   
    for (int i = 0; i < rows; i++)
    {
        // creates spaces and hashes (#) for each row
        for (int j = 0; j < cols; j++)
        {
            if (j <= blank_index)
                printf(" ");
            else
                printf("#");
         }       
        blank_index = blank_index - 1;
        printf("\n");
      }      
}
