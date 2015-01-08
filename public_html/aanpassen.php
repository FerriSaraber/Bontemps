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
            <form action="" id="selecteer-reservering" method="post">
                <label>Datum: </label><input type="date" name="datum" required="true" placeholder="DD/MM/JJJJ">
            </form>
            <button type="submit" form="selecteer-reservering" value="Submit" name="btnSelectDate">Selecteer</button>
            <ul>
                <?php
                $selectedDay =  $mysqli->real_escape_string($_POST[datum]);
                $btnSelectDate = $_POST[btnSelectDate];
                searchDate($selectedDay, $btnSelectDate, $mysqli);
                ?>
            </ul>
        </fieldset>
    </div>
    <div class="rechterdiv">
        <h3 class="geselecteerde-reservering">Geselecteerde reservering: <span class="geselecteerde-gast" id="lblSelectedReservation">Geen</span></h3>
        <div class="menu-items-toevoegen">
            <fieldset><legend><h3>Menu items toevoegen: </h3></legend>
                <form action="" method="get" id="item-toevoegen">
                    <button type="submit" form="item-toevoegen" value="Submit">Menu 1</button>
                    <button type="submit" form="item-toevoegen" value="Submit">Menu 2</button>
                    <button type="submit" form="item-toevoegen" value="Submit">Menu 3</button>
                    <button type="submit" form="item-toevoegen" value="Submit">Fris</button>
                    <button type="submit" form="item-toevoegen" value="Submit">Thee/koffie</button>
                    <button type="submit" form="item-toevoegen" value="Submit">Bier</button>
                    <button type="submit" form="item-toevoegen" value="Submit">Wijn</button>
                </form>
            </fieldset>
        </div>
        <div class="menu-item-overzicht">
            <fieldset><legend><h3>Bestelling: </h3></legend>
                <form action="" method="post" id="toon-bestelling">
                    <input type="hidden" name="selectedReservation" id="selectedReservation">
                </form>
                <button type="submit" form="toon-bestelling" value="Submit" name="btnShowOrder">Toon bestelling</button>
                <ul>
                    <?php
                    $reservationID = $_POST[selectedReservation];
                    $btnShowOrder = $_POST[btnShowOrder];
                    showOrderedItems($reservationID, $btnShowOrder, $mysqli);
                    echo "<script>alert($reservationID);</script>";
                    ?>
                </ul>
            </fieldset>
        </div>
    </div>
</div>
<?php
//Declare variables



//Call methods


?>

<script type="text/javascript" src="aanpassen.js"></script>
<?php
	require_once( "footer.php");
?> 