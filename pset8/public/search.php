<?php

    require(__DIR__ . "/../includes/config.php");

    // numerically indexed array of places
    $places = [];

    //search database for places matching $_GET["geo"]
    
    $str = preg_split('/[, ;+]/', $_GET["geo"]);
    for( $i = 0, $s = count($str); $i < $s; $i++)
    {
        if ($str[$i] !== "")
        {
            //Kane anazhthsh ston pinaka places kai apothikeuse sto $places
            //$rows = query("SELECT * FROM places WHERE id = ?", $_SESSION["id"]);
            $rows = query("SELECT * FROM places WHERE MATCH (postal_code, admin_name1, admin_name2, place_name)
                           AGAINST(?)", $str[$i]);
            foreach($rows as $row)
            {
                $places[] = [
                        "place_name" => $row["place_name"],
                        "admin_name1" => $row["admin_name1"],
                        "postal_code" => $row["postal_code"]];
                            
            }               
        }
    }
    
    
    
    
    
    
    
    // output places as JSON (pretty-printed for debugging convenience)
    header("Content-type: application/json");
    print(json_encode($places, JSON_PRETTY_PRINT));

?>
