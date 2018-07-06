<?php
    $_SESSION["buyf2"] = "enter";
?>
<div>
    <p>
        A share of <?= $nameof ?> (<?= $symbolof?>) costs <b>$<?= $priceof?></b>
    </p>
    <p>
        You can buy <b><?= $_SESSION["quantity"] ?></b> shares of this stock
    </p>
</div>

<div>
    <form action="buy.php" method="post">
    <fieldset>
        <div class="form-group">
            <input autofocus class="form-control" name="numof" placeholder="number of stocks" type="text"/>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-default">Purchase</button>
        </div>
    </fieldset>
</div>
<div>
    Please give an integer equal or less than the amount of shares you can purchase
</div>
