<!--<div>
    <img alt="Under Construction" src="/img/construction.gif"/>     
</div>-->
<div id="middle">
    <ul class="nav nav-pills nav-justified ">
        
        <li>
            <a href="transactions.php">Transactions</a>
        </li> 
        <li>
            <a href="statistics.php">Statistics</a>
        </li>
        <li>
            <a href="savemoney.php">Save money!</a>
        </li> 
        <li>
            <a href="logout.php"><b>Sign Out</b></a>
        </li>  
    </ul>
   
</div>

<div id="home">
    <p> TODAY:  <i><?=$today?></i></p>
    <p> Until the end of your money: <b><?=$balance?></b> </p>
    <p> Target of savings:</p>
    

</div>


<!--    <table class = "table table-stripped">
        
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
    </table>   -->
