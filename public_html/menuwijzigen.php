<?php
    require_once("config.php");
    require_once( "header.php");
?>
<div></div>
<div class="header">
    <div class="menupositie">
        <form action="add.php">
            <input type="submit" value="Reservering toevoegen">
        </form>
        <form action="aanpassen.php">
            <input type="submit" value="Reservering aanpassen">
        </form>
        <form action="index.php">
            <input type="submit" value="Terug naar start">
        </form>
    </div>
</div>
<hr>
<div id="menuwijzigen">
    <div class="linkerding">
        <fieldset><legend><h3>Menu items wijzigen: </h3></legend>
            <form action="#" method="get" id="menu-item-wijzigen">
                <textarea>
                </textarea>
            </form>
        <button type="submit" form="menu-item-wijzigen" value="Submit">Verwijder</button></fieldset>
        <form action="#" method="get" id="wijzig-item-prijs">
            <label>Nieuwe prijs: </label><input type="text" name="wijzig-item-prijs" placeholder="00,--">
        </form>
        <button type="submit" form="wijzig-item-prijs" value="Submit">Wijzigen</button>
    </div>
    <div class="rechterding">
        <fieldset><legend><h3>Menu items toevoegen: </h3></legend>
            <form action="#" method="get" id="menu-item-toevoegen">
                <label>Nieuw item: </label><input type="text" name="nieuw-menu-item">
                <label>Prijs item: </label><input type="text" name="nieuw-menu-prijs">
            </form>
            <button type="submit" form="menu-item-toevoegen" value="Submit">Toevoegen</button>
        </fieldset>
    </div>
</div>
<?php
	require_once( "footer.php");
?> 