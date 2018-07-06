<!--<div>
    <img alt="Under Construction" src="/img/construction.gif"/>
</div>-->
<div id="middle">
    <ul class="nav nav-pills nav-justified">
        <li>
            <a href="logout.php">Log Out</a>
        </li>
        <li>
            <a href="quote.php">Quote</a>
        </li> 
        <li>
            <a href="buy.php">Buy</a>
        </li> 
        <li>
            <a href="sell.php">Sell</a>
        </li> 
        <li>
            <a href="history.php">History</a>
        </li>
        <li>
            <a href="changepassword.php">Change Password</a>
        </li>  
    </ul>
   
</div>

<div>

    <table class = "table table-stripped">
        
            <thead>
                <tr>
                    <th> NAME </th>
                    <th> SYMBOL </th>
                    <th> SHARES </th>
                    <th> PRICE </th>
                    <th> <i>TOTAL</i> </th>
                </tr>
            </thead>        
            <tbody id = "middletd">
        <?php foreach ($positions as $position): ?>    
                <tr>
                    <td><?= $position["name"] ?></td>
                    <td><?= $position["symbol"] ?></td>
                    <td><?= $position["shares"] ?></td>
                    <td>$<?= $position["price"] ?></td>
                    <td>$<?= number_format($position["total"], 2, '.', ',') ?></td>
                <tr>
        <?php endforeach ?>            
                    <td colspan = "4">CASH</td>
                    <td>$<?= number_format($cash, 2, '.', ',')?></td>
                </tr>    
                </tr>
       
            </tbody>
    </table>   
</div>


