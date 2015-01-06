<?php
    require_once("config.php");
    require_once( "header.php");
?>

<div></div>

<div class="header">
    <div class="menupositie">
        <form action="index.php">
            <input type="submit" value="Terug naar start">
        </form>
        <form action="#">
            <input type="submit" value="Reservering aanpassen">
        </form>
        <form action="#">
            <input type="submit" value="Menu aanpassen">
        </form>
    </div>
</div>
<hr>
<div class="container-add" id="add">
    <div class="gast-toevoegen">
        <fieldset><legend><h3>Gast toevoegen: </h3></legend>
        <form action="" method="post" id="gast-toevoegen">
            <label>Voornaam:</label> <input type="text" name="voornaam" required="true"><br>
            <label>Achternaam:</label> <input type="text" name="achternaam" required="true"><br>
            <label>Adres: </label> <input type="text" name="adres"><br>
            <label>Woonplaats: </label> <input type="text" name="woonplaats"><br>
            <label>Email: </label> <input type="email" name="email"><br>
            <label>Telefoon: </label> <input type="text" name="telefoon" required="true"><br>  
        </form>
            <button type="submit" form="gast-toevoegen" value="Submit" name="btnAddGuest">Voeg gast toe</button></fieldset>
    </div>
    <div class="gast-zoeken">
       <fieldset><legend><h3>Gast zoeken: </h3></legend>
        <form action="#" method="get" id="gast-zoeken">
            <label>Naam:</label> <input type="text" name="naam" required="true"><br>
        </form>
            <button type="submit" form="gast-zoeken" value="Submit">Zoek</button>
        <textarea placeholder="Hier komen lekker namen, mmmm">
        
        </textarea>
        </fieldset> 
    </div>
    <div class="gevonden-gast">
        <h3 class="left">Datum: <span class="left-span">Zaterdag 10 januari</span></h3>
        <h3 class="left">Geselecteerde gast: <span class="left-span">Super Sanne</span></h3><h3 class="right"> Stoelen beschikbaar: <span class="right-span">123</span></h3>
        <div class="toevoegen"><fieldset><legend><h3>Reservering toevoegen:   </h3></legend>
            <form class="reservering-toevoegen" action="#" method="get" id="reservering-toevoegen">
                <label>Datum: </label> <input type="date" name="datum" required="true" placeholder="UU:MM">
                <label>Tijd: </label> <input type="time" name="tijd" required="true" placeholder="DD/MM/JJJJ">
                <label>Aantal personen: </label> <input type="number" name="personen">
                <label class="menu1">Menu 1</label> <input type="number" name="menu1">
                <label class="menu2">Menu 2</label> <input type="number" name="menu2">
                <label class="menu3">Menu 3</label> <input type="number" name="menu3">
            </form>
               <button type="submit" form="reservering-toevoegen" value="Submit">Toevoegen</button></fieldset>
        </div>
        <div class="bestellen" id="toevoegen">
            <fieldset><legend><h3>Reservering doorvoeren:   </h3></legend>
            <form class="reservering-plaatsen" id="reservering-plaatsen">
                <textarea> </textarea>
            </form>
            <button class="right-button" type="submit" form="reservering-plaatsen" value="Submit">Plaatsen</button> 
            <button class="left-button" type="submit" form="reservering-plaatsen" value="Submit">Verwijderen</button>  
            </fieldset>
        
        </div>
        </div> 

</div>
</div>
<?php
//declare variables
$guestFirstname = $mysqli->real_escape_string($_POST[voornaam]);
$guestSurname = $mysqli->real_escape_string($_POST[achternaam]);
$guestAddress = $mysqli->real_escape_string($_POST[adres]);
$guestCity = $mysqli->real_escape_string($_POST[woonplaats]);
$guestEmail = $mysqli->real_escape_string($_POST[email]);
$guestPhone = $mysqli->real_escape_string($_POST[telefoon]);
$btnAddGuest = $_POST['btnAddGuest'];

//call functions
addGuest($guestFirstname, $guestSurname, $guestAddress, $guestCity, $guestEmail, $guestPhone, $btnAddGuest, $mysqli);
?>


<?php
    require_once( "footer.php");
?> 