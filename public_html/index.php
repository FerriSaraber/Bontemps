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

        <form action="aanpassen.php" method="post">
            <input name="btnReservering" type="submit" value="Reservering wijzigen">
        </form>

        <form action="menuwijzigen.php" method="post">
            <input name="btnMenu" type="submit" value="Menu aanpassen">           
        </form>
    </div>
</div>
<hr>
<div class="container">
    <div id="printRekening">
        <fieldset><legend><h3>Selecteer een reservering: </h3></legend>
            <form action="" id="selecteer-rekening" method="post">
                <h3><label>Datum: </label></h3><input type="date" name="datum" placeholder="DD-MM-JJJJ">
            </form>
            <button type="submit" form="selecteer-rekening" value="Submit" name="btnSelectBill">Selecteer</button>
            <ul>
                <?php
                $selectedDay =  $mysqli->real_escape_string($_POST[datum]);
                $btnSelectBill = $_POST[btnSelectBill];
                searchDate($selectedDay, $btnSelectBill, $mysqli);
                ?>
            </ul>
        </fieldset>
    </div>
    <textfield id="menu-overzicht">
            <?php
            
            echo "<h1>Menu's: </h1>";
            
                $getMenus = $mysqli->query('select * from menu_lijst');

                    while($getMenu = mysqli_fetch_array($getMenus)) {
                        echo " <h3>" . $getMenu[naam] . "&nbsp &nbsp &nbsp &#8364;" . $getMenu[prijs] . "</h3><p>" . $getMenu[beschrijving] . "</p>" ;
                    }
             echo "<h1>Dranken: </h1>";    
                    
                $getDrinks = $mysqli->query('select * from dranken_lijst');

                    while($getDrink = mysqli_fetch_array($getDrinks)) {
                        echo " <h3> " . $getDrink[naam] . "&nbsp &nbsp &nbsp &#8364;" . $getDrink[prijs] . "</h3>";
                    }
            ?>
    </textfield>
</div>
<script type="text/javascript" src="index.js"></script>
<?php
	require_once( "footer.php");
?>