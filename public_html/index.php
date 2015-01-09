<?php
    require_once("config.php");
    require_once( "header.php");
    
?>
<div></div>

<div class="header">
    <div class="menupositie">
        <form action="add.php">
            <input name="btnToevoegen" type="submit" value="Reservering toevoegen">       
        </form>

        <form action="index.php" method="post">
            <input name="btnStart" type="submit" value="Terug naar start">
        </form>

        <form action="menuwijzigen.php" method="post">
            <input name="btnAanpassen" type="submit" value="Menu aanpassen">           
        </form>
    </div>
</div>
<hr>
<div class="container">
    <form action="#">
    <textarea class="rekeningselectie" placeholder="voorbeeldnaam" id="rekening-selecteren"></textarea>
        <input type="submit" value="print rekening">
    </form>
    <textfield id="menu-overzicht">
        <h3>Menu overzichtje, wat heeft de gast gegeten en gedronken.</h3>
    </textfield>
</div>

<?php
	require_once( "footer.php");
?> 