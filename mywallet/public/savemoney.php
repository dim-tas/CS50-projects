<?php

    require("../includes/config.php"); 

    if (empty($_POST["target"]))
    {
        render("savemoneyform.php", ["title" => "Save money!"]);
        
    }
    else
    {
        query("UPDATE stoxos SET target = ? WHERE id = ?", $_POST["target"], $_SESSION["id"]);
    }













?>
