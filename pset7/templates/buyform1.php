<?php
    $_SESSION["buyf1"] = "enter";
?> 
<form action="buy.php" method="post">
    <fieldset>
        <div class="form-group">
            <input autofocus class="form-control" name="symbol" placeholder="stock symbol" type="text"/>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-default">Buy</button>
        </div>
    </fieldset>
