<?php

    // configuration
    require("../includes/config.php");
     

    if(empty($_POST["symbol"]) && empty($_SESSION["flag"]))
    {
        
        {
            // render quote
            render("quote_form.php", ["title" => "Quote"]);
        }    
    }
    else
    {
        unset($_SESSION["flag"]);
        if (empty($_POST["symbol"]))
        {
            apologize("You must provide a stock symbol");
        }
        $metoxi = lookup($_POST["symbol"]);
        if ($metoxi === false)
        {
            apologize("You must provide a valid stock symbol");
        }
        else
        { 
              
            render("quote_results.php", ["priceof" => number_format($metoxi["price"], 2) , "nameof" => $metoxi["name"] , "symbolof" => $metoxi["symbol"]]);
        }
    }    
    
    
?>


