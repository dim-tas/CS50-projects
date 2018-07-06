<?php
    // configuration
    require("../includes/config.php");  
    $metoxi = $_POST["symbol"];
    render("quote_results.php", ["priceof" => $metoxi]);
?>
