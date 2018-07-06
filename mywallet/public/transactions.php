<?php
 // configuration
    require("../includes/config.php"); 
    
     $lists = [];
     //dump($_POST["username"]);
     if (empty($_POST["date"]) || empty($_POST["in_out"]) || empty($_POST["amount"]) || empty($_POST["notes"]) )
   {
       
        render("transactionsform.php", ["title" => "Transactions"]);
   }
   else
   {
        $result = query("INSERT INTO transactions (id, date, in_out, amount, notes) VALUES(?, ?, ?, ?, ?)", 
            $_SESSION["id"], $_POST["date"], $_POST["in_out"], $_POST["amount"], $_POST["notes"]);
        if($result === false)
        {
            apologize("Your transaction is not recorded. You may have entered the same transaction for the same day");
        }
        if ($_POST["in_out"] == "Income")
        {
            query("UPDATE tameio SET esoda = esoda + ? WHERE id = ?", $_POST["amount"], $_SESSION["id"]);
        }
        else if ($_POST["in_out"] == "Expenses")
        {
            query("UPDATE tameio SET exoda = exoda + ? WHERE id = ?", $_POST["amount"], $_SESSION["id"]);
        }
        
        
        
        redirect("/");
   }










?>
