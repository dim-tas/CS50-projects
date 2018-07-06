<?php
    $_SESSION["flag"] = "enter";
?>    
<form action="quote.php" method="post">
    <fieldset>
        <div class="form-group">
            <input autofocus class="form-control" name="symbol" placeholder="stock name" type="text"/>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-default">Search</button>
        </div>
    </fieldset>
    
   
