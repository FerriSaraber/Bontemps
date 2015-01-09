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
            <form action="" method="post" id="menu-item-wijzigen">
                <label>Kies menu: </label>
                <select name="selectedMenu">
                    <option value="1">Menu 1</option>
                    <option value="2">Menu 2</option>
                    <option value="3">Menu 3</option>
                </select>
                <label>Nieuwe naam: </label><input type="text" name="newName">
                <label>Nieuwe beschrijving: </label><textarea name="newDiscription"></textarea>
                <label>Nieuwe prijs: </label><input type="text" name="newPrice" placeholder="00,--">
            </form>
            <button type="submit" form="menu-item-wijzigen" value="Submit" name="btnChange">Wijzig</button></fieldset>
    </div>
</div>
<?php
//delclare variables
$selectedMenu = $mysqli->real_escape_string($_POST[selectedMenu]);
$newName = $mysqli->real_escape_string($_POST[newName]);
$newDiscription = $mysqli->real_escape_string($_POST[newDiscription]);
$newPrice = $mysqli->real_escape_string($_POST[newPrice]);
$btnChange = $_POST[btnChange];


//call methods
changeMenu($selectedMenu, $newName, $newDiscription, $newPrice, $btnChange, $mysqli);
?>
<?php
	require_once( "footer.php");
?> 