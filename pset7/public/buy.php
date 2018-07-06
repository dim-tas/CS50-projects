<?php

    // configuration
    require("../includes/config.php"); 
#    $cash = query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
#    dump($cash);
        
    if(empty($_SESSION["buyf1"]) /*&& empty($_SESSION["buyf2"])*/)
    {
        unset($_SESSION["buyf2"]);
        render("buyform1.php", ["title" => "Buy: Step1"]);
    }
    else if(empty($_SESSION["buyf2"]))
    {
        unset($_SESSION["buyf1"]);
        if (empty($_POST["symbol"]))
        {
            apologize("You must provide a stock symbol");
        }
        $metoxi = lookup($_POST["symbol"]);
        
      
        if ($metoxi !== false)
        {
            $_SESSION["marouli"] = $_POST["symbol"];
            $twodeci = number_format($metoxi["price"], 2);
            $row = query("SELECT * FROM users WHERE id = ?", $_SESSION["id"]);
            #dump($row[0]["cash"]);
            $_SESSION["quantity"] = floor($row[0]["cash"] / $twodeci);
            render("buyform2.php", ["title" => "Buy: Step 2", "priceof" => number_format($metoxi["price"], 2) , 
            "nameof" => $metoxi["name"] , "symbolof" => $metoxi["symbol"]]);
        }
        else
        {
           render("buyform1.php", ["title" => "Buy: Step 1"]); 
        }
     }
     else if(!empty($_SESSION["buyf2"]))
     {
        unset($_SESSION["buyf2"]);
        unset($_SESSION["buyf1"]);
        if (empty($_POST["numof"]) || !preg_match("/^\d+$/", $_POST["numof"]) || ($_POST["numof"] > $_SESSION["quantity"]))
        {
            apologize("Please give the number of stocks you want to purchase");
        }
        else
        {
            #dump($_SESSION["marouli"]);
            $result = query("INSERT INTO sharesumm (id, symbol, shares) VALUES(?, ?, ?)ON
            DUPLICATE KEY UPDATE shares = shares + VALUES(shares)", 
            $_SESSION["id"], strtoupper($_SESSION["marouli"]),
             $_POST["numof"]);
            redirect("/");
             
        }
     } 
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
?>    
