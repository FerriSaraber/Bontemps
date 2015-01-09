<?php
    require_once("config.php");
    require_once( "header.php");
    session_start();
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
            <input name="btnMenu" type="submit" value="Menu aanpassen">           
        </form>
    </div>
</div>
<hr>
<div id="aanpassen">
    <div class="linkerdiv">
        <fieldset><legend><h3>Selecteer een reservering: </h3></legend>
            <form action="" id="selecteer-reservering" method="post">
                <label>Datum: </label><input type="date" name="datum" required="true" placeholder="DD-MM-JJJJ">
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
        <h3 class="geselecteerde-reservering">Geselecteerde reservering: <span class="geselecteerde-gast" id="lblSelectedReservation" >
            <?php 
            if(isset($_SESSION[reservering]))
            {
                echo $_SESSION[reservering];
            }
            else
            {
                echo "Geen";
            }
            ?>
            </span></h3>
        <div class="menu-items-toevoegen">
            <fieldset><legend><h3>Menu items toevoegen: </h3></legend>
                <button type="submit" form="toonBestelling" value="Submit" id="btnMenu1" name="btnMenu1">Menu 1</button>
                <button type="submit" form="toonBestelling" value="Submit" id="btnMenu2" name="btnMenu2">Menu 2</button>
                <button type="submit" form="toonBestelling" value="Submit" id="btnMenu3" name="btnMenu3">Menu 3</button>
                <button type="submit" form="toonBestelling" value="Submit" name="btnFris">Frisdrank</button>
                <button type="submit" form="toonBestelling" value="Submit" name="btnTheeKoffie">Thee/koffie</button>
                <button type="submit" form="toonBestelling" value="Submit" name="btnBier">Bier</button>
                <button type="submit" form="toonBestelling" value="Submit" name="btnWijn">Wijn</button>
            </fieldset>
        </div>
        <div class="menu-item-overzicht">
            <fieldset><legend><h3>Bestelling: </h3></legend>
                <form action="" method="post" id="toonBestelling">
                    <input type="hidden" name="selectedReservation" id="selectedReservation" value="<?php echo $_POST[selectedReservation]; ?>">
                </form>
                <button type="submit" form="toonBestelling" value="Submit" name="btnShowOrder">Toon bestelling</button>
                <ul>
                    <?php
                    $reservationID = $_POST[selectedReservation];
                    $btnShowOrder = $_POST[btnShowOrder];
                    showOrderedItems($reservationID, $btnShowOrder, $mysqli);
                    ?>
                </ul>
            </fieldset>
        </div>
    </div>
</div>
<?php
//Declare variables
$btnMenu1 = $_POST[btnMenu1];
$btnMenu2 = $_POST[btnMenu2];
$btnMenu3 = $_POST[btnMenu3];
$btnFris = $_POST[btnFris];
$btnTheeKoffie = $_POST[btnTheeKoffie];
$btnBier = $_POST[btnBier];
$btnWijn = $_POST[btnWijn];


//Call methods
addItem($reservationID, $btnMenu1, $btnMenu2, $btnMenu3, $btnFris, $btnTheeKoffie, $btnBier, $btnWijn, $mysqli)

?>

<script type="text/javascript" src="aanpassen.js"></script>
<?php
	require_once( "footer.php");
?> 