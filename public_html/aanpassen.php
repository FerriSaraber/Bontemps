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
        <form action="index.php">
            <input type="submit" value="Terug naar start">
        </form>
        <form action="menuwijzigen.php">
            <input type="submit" value="Menu aanpassen">
        </form>
    </div>
</div>

<hr>
<div id="aanpassen">
    <div class="linkerdiv">
        <fieldset><legend><h3>Selecteer een reservering: </h3></legend>
            <form action="#" id="selecteer-reservering" method="get">
            <textarea>

            </textarea>
            </form>
            <button type="submit" form="selecteer-reservering" value="Submit">Selecteer</button>
        </fieldset>
    </div>
    <div class="rechterdiv">
    <h3 class="geselecteerde-reservering">Geselecteerde reservering: <span class="geselecteerde-gast">Super Sanne</span></h3>
        <div class="menu-items-toevoegen">
            <fieldset><legend><h3>Menu items toevoegen: </h3></legend>
                <form action="#" method="get" id="item-toevoegen">
                    <label>Menu 1:</label> <input type="number" name="menu1">
                    <label>Menu 2: </label> <input type="number" name="menu2">
                    <label>Menu 3: </label> <input type="number" name="menu3">
                    <label>Frisdrank: </label> <input type="number" name="frisdrank">
                    <label>Bier: </label> <input type="number" name="bier">
                    <label>Wijn: </label> <input type="number" name="wijn">
                    <label>Koffie/Thee: </label> <input type="number" name="koffie">
                </form>
            <button type="submit" form="item-toevoegen" value="Submit">Toevoegen</button></fieldset>
            <form action="#" method="get" id="wijzig-aantal">
                <label>Wijzig aantal personen: </label><input type="number" name="wijzig-aantal">
                <label>Wijzig begintijd: </label><input type="text" name="wijzig-tijd" placeholder="uu:mm">
            </form>
            <button type="submit" form="wijzig-aantal" value="Submit">Opslaan</button>
        </div>
        <div class="menu-item-overzicht">
            <fieldset><legend><h3>Gewijzigde bestelling: </h3></legend>
                <form action="#" method="get" id="gewijzigd-menu">
                    <textarea>
                    </textarea>
                </form>
                <button type="submit" form="gewijzigd-menu" value="Submit">Doorvoeren</button>
                <button type="submit" form="gewijzigd-menu" value="Submit">Verwijderen</button>
            </fieldset>
        </div>
    </div>
</div>

<?php
	require_once( "footer.php");
?> 