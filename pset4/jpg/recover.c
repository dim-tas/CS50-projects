/**
 * recover.c
 *
 * Computer Science 50
 * Problem Set 4
 *
 * Recovers JPEGs from a forensic image.
 */

#include <stdio.h>
#include <stdlib.h>



int main(int argc, char* argv[])
{
    // open input file 
    FILE* inptr = fopen("card.raw", "r");
    if (inptr == NULL)
    {
        printf("Could not open %s.\n", "card.raw");
        return 1;
    }
    unsigned char pic[512];
    int sn = -1;
    char title[8];
    FILE* img = NULL;
    
  
    while (fread(&pic, 512, 1, inptr) == 1)
    {
       
        
        if ((*(pic) == 0xff) && (*(pic+1) == 0xd8) && (*(pic+2) == 0xff) && ((*(pic+3) == 0xe0) || (*(pic+3) == 0xe1)))
        {
           if (sn >= 0)
           {
               fclose(img);
           }
           sn++;
           if (sn <10)
           {
           sprintf(title, "00%d.jpg", sn);
           }
           else
           {
           sprintf(title, "0%d.jpg", sn);
           }
           img = fopen(title, "a");
        }
        
        if (img != NULL)
        {
           fwrite(&pic, 512, 1, img);
        }
           
            
           
          
    }
    
  
    
    fclose(img);
    fclose(inptr);
}
