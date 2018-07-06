/****************************************************************************
 * dictionary.c
 *
 * Computer Science 50
 * Problem Set 5
 *
 * Implements a dictionary's functionality.
 ***************************************************************************/

#include <stdbool.h>

#include <string.h>
#include <stdio.h>
#include <stdlib.h>
#include <ctype.h>

#include "dictionary.h"





/**
 * Returns true if word is in dictionary else false.
 */
bool check(const char* word)
{
    int slot;
    int s = strlen(word);
    
    char d_word[s+1];
    for (int i = 0; i <= s; i++)
    {
        if (isalpha(word[i]))
        {
            d_word[i] = tolower(word[i]);
        }
        else
        {
            d_word[i] = word[i];
        }
        
        
    }
    
    slot = hash(d_word);
    
    
    for (node* cur = head[slot]; cur != NULL; cur = cur->next)
    {
        if (strcmp(cur->key, d_word) == 0)
        {
            
            return true;
        }
    }
    
    return false;
}

/**
 * Loads dictionary into memory.  Returns true if successful else false.
 */
bool load(const char* dictionary)
{
    FILE* in = fopen(dictionary, "r");
    for (int i = 0; i < SIZE; i++)
    {
        head[i] = NULL;
    }
    char temp[LENGTH + 1];
    int index = 0;
    int pt;    //index of hash table
    if (in == NULL)
    {
        return false;
    }
    for (int d = fgetc(in); d != EOF; d = fgetc(in))
    {
        if (d != '\n')
        {
            temp[index] = d;
            index++;
        }
        else
        {
            temp[index] = '\0';
            index = 0;
            
            //hash function
            pt = hash(temp);
                      
            //make new node
             node* new = malloc(sizeof(node));

             if (new == NULL)
             {
             return false;
             }

             strcpy(new->key, temp);
             new->next = NULL;

    
             node* prev = NULL;
             for (node* cur = head[pt]; cur != NULL; cur = cur->next)
             {
                 prev = cur;
             }

    
            if (prev == NULL)
            {
                head[pt] = new;
            }

            else
            {
                prev->next = new;
            }
           
        }
    }
    
    
   return true; 
}

/**
 * Returns number of words in dictionary if loaded else 0 if not yet loaded.
 */
unsigned int size(void)
{
    unsigned int counter = 0;
    for (int i = 0; i < SIZE; i++)
    {
        if (head[i] != NULL)
        {
            for (node* cur = head[i]; cur != NULL; cur = cur->next)
            {
                counter++;
            }
        }
    }
    
    return counter;
}

/**
 * Unloads dictionary from memory.  Returns true if successful else false.
 */
bool unload(void)
{
    for (int i = 0; i < SIZE; i++)
    {
        if (head[i] != NULL)
        {
            node* sweep = NULL;
            for (node* pt = head[i]; pt != NULL; pt = pt->next)
            {
                sweep = pt;
                free(sweep);
            }   
        }
    }
    return true;
}


int hash(const char *str)
    {
        unsigned long hash = 5381;
        int c;

        while ((c = *str++))
            hash = ((hash << 5) + hash) + c; /* hash * 33 + c */

        return hash % SIZE;
    }
