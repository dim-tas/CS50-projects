<?php

    // configuration
    require("../includes/config.php"); 
   
   
   $lists = [];
   if (empty($_POST["symbol"]))
   {
        $rows = query("SELECT * FROM sharesumm WHERE id = ?", $_SESSION["id"]);
        
        foreach ($rows as $row)
        {
            $lists[] = ["symbol" => $row["symbol"]];
        }
        render("sellform.php", ["lists" => $lists, "title" => "Sell"]);
   }
   
   else
   {
      #dump($_POST["symbol"]);
      query("DELETE FROM sharesumm WHERE id = ? AND symbol = ? ", $_SESSION["id"], $_POST["symbol"]);
      redirect("index.php"); 
   }
   
   
   
   
   
   
   
   
   
   
    
    
#    $rows = query("SELECT * FROM sharesumm WHERE id = ?", $_SESSION["id"]);
#  
#    $balance = 0;
#    $positions = [];
#    foreach ($rows as $row)
#    {
#        $stock = lookup($row["symbol"]);
#        if ($stock !== false)
#        {
#            $positions[] = [
#                "name" => $stock["name"],
#                "price" => number_format($stock["price"], 2),
#                "shares" => $row["shares"],
#                "symbol" => $row["symbol"],
#                "total" => number_format($stock["price"], 2) * $row["shares"]
#            ];
#            $balance = $balance + number_format($stock["price"], 2) * $row["shares"];
#        }
#    }
#    $cash = 10000 - $balance;

#    // render portfolio
#    render("portfolio.php", ["positions" => $positions, "title" => "Portfolio", "cash" => $cash]);
#    unset($_SESSION["flag"]);

?>
