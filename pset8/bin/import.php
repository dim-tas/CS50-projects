#!/usr/bin/env php
<?php

    // configuration
    require("../includes/config.php"); 
    $filename = $argv[1];
    $count = 0;
    if (is_readable($filename)) 
    {
        //echo "The file $filename is readable\n";
        if (($handle = fopen($filename, "r")) !== FALSE)
        {
            while (($data = fgetcsv($handle, 1000, "\t")) !== FALSE)
            {
                $count++;
                //echo $data[1]."\n";
                query("INSERT INTO places (country_code, postal_code, place_name, admin_name1, admin_code1,
                        admin_name2, admin_code2, admin_name3, admin_code3, latitude, longitude, accuracy)
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", $data[0], $data[1], $data[2], $data[3],
                        $data[4], $data[5], $data[6], $data[7], $data[8], $data[9], $data[10], $data[11]);
            }    
            
        }
        fclose($handle);
        
    } 
    else 
    {
        echo "The file $filename is not readable\n";
    }
    echo $count."\n";
   

?>
