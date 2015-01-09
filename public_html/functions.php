<?php
function addGuest($firstname, $surname, $address, $city, $email, $phone, $button, $mysqli)
{
    if(isset($button))
    {
        $insertGuest = $mysqli->query("INSERT INTO klanten (id, voornaam, achternaam, email, telefoon, adres, woonplaats) VALUES(NULL,'$firstname','$surname','$email','$phone','$address','$city')");
        echo "<div id='toast'>Klant: " . $firstname . " " . $surname . " is toegevoegd</div>";
        echo "<script>setTimeout(function(){ $('#toast').hide('slow'); }, 3000);</script>";
        if($insertGuest)
        {
            $guestID = $mysqli->insert_id;
        }
        else
        {
            die('Error : ('. $mysqli->errno .') '. $mysqli->error);
        }
    }
}

function searchGuest($name, $button, $mysqli)
{
    if(isset($button))
    {
        $searchGuests = $mysqli->query("SELECT id, voornaam, achternaam FROM klanten WHERE voornaam LIKE '%$name%' OR achternaam LIKE '%$name%'");
        
        while($searchGuest = mysqli_fetch_array($searchGuests))
        {
            echo "<li><a href='#' data-id='$searchGuest[id]'>" . $searchGuest[voornaam] . " " .  $searchGuest[achternaam] . "</a></li>";
        } 
    }
}

function checkReserved($date, $time, $amount, $menu1, $menu2, $menu3, $button, $mysqli)
{
    if(isset($button))
    {
        $guestID = $_POST['selectedGuest'];
        $datetime = $time . $date;//string
        
        $datetimeStamp = strtotime($datetime);//timestamp
        $endDatetimeStamp = strtotime("$datetime + 2 hours");//timestamp
        $preDatetimeStamp = strtotime("$datetime - 2 hours");//timestamp
        
        $datetime = date("Y-m-d H:i:s", $datetimeStamp);//time
        $endDatetime = date("Y-m-d H:i:s", $endDatetimeStamp);//time
        $preDatetime = date("Y-m-d H:i:s", $preDatetimeStamp);//time
                
        $setAmount = 50;
        $currentAmount = 0;
        $preAmount = 0;

        $searchGuestAmounts = $mysqli->query("SELECT aantal_personen FROM reserveringen WHERE datumtijd BETWEEN '$datetime' AND '$endDatetime'");
        if ($searchGuestAmounts == false)
        {
            echo "Query mislukt. Foutmelding: " . $mysqli->error;
            die;
        }
        
        while($searchGuestAmount = mysqli_fetch_array($searchGuestAmounts))
        {
            $currentAmount = $currentAmount + $searchGuestAmount[aantal_personen];
        } 
        
        $searchPreGuestAmounts = $mysqli->query("SELECT aantal_personen FROM reserveringen WHERE datumtijd BETWEEN '$preDatetime' AND '$datetime'");
        if ($searchPreGuestAmounts == false)
        {
            echo "Query mislukt. Foutmelding: " . $mysqli->error;
            die;
        }
        
        while($searchPreGuestAmount = mysqli_fetch_array($searchPreGuestAmounts))
        {
            $preAmount = $preAmount + $searchPreGuestAmount[aantal_personen];
        }
      
        if($currentAmount + $amount > $setAmount || $preAmount + $amount > $setAmount)
        {
            echo "<script>alert('Er is geen plaats meer op dit tijdstip');</script>";
        }
        else if($guestID == "")
        {
            echo "<script>alert('Er is geen gast geselecteerd');</script>";
        }
        else
        {
            echo "<script>alert('Reservering geplaatst');</script>";
            sleep ( 2 );
            $insertReservation = $mysqli->query("INSERT INTO reserveringen (id, klantid, datumtijd, aantal_personen) VALUES (NULL, '$guestID', '$datetime', '$amount')");
            
            if($insertReservation)
            {
                $reservationID = $mysqli->insert_id;
            }
            else
            {
                die('Error : ('. $mysqli->errno .') '. $mysqli->error);
            }
            
            for($i = 0; $i < $menu1; $i++)
            {
                $insertMenu1 = $mysqli->query("INSERT INTO bestellingen (id, reserveringid, bestelde_gerechtenid) VALUES (NULL, '$reservationID', 1)");
            }

            for($i = 0; $i < $menu2; $i++)
            {
                $insertMenu2 = $mysqli->query("INSERT INTO bestellingen (id, reserveringid, bestelde_gerechtenid) VALUES (NULL, '$reservationID', 2)");
            }

            for($i = 0; $i < $menu3; $i++)
            {
                $insertMenu3 = $mysqli->query("INSERT INTO bestellingen (id, reserveringid, bestelde_gerechtenid) VALUES (NULL, '$reservationID', 3)");
            }
        }
    }
}

function searchDate($date, $button, $mysqli)
{
    if(isset($button))
    {
        $datestamp = strtotime($date);
        $date = date("Y-m-d H:i:s", $datestamp);
        
        $endDatestamp = strtotime("$date + 23 hours" );
        $endDate = date("Y-m-d H:i:s", $endDatestamp);
        
        
        $getReservations = $mysqli->query("SELECT klantid, id FROM reserveringen WHERE datumtijd BETWEEN '$date' AND '$endDate'");
        if ($getReservations == false)
        {
            echo "Query mislukt. Foutmelding: " . $mysqli->error;
            die;
        }
        while($getReservation = mysqli_fetch_array($getReservations))
        {
            $klantID = $getReservation[klantid];
            $reservationID = $getReservation[id];
            
            $getGuests = $mysqli->query("SELECT voornaam, achternaam FROM klanten WHERE id = '$klantID'");
            if ($getGuests == false)
            {
                echo "Query mislukt. Foutmelding: " . $mysqli->error;
                die;
            }
            while($getGuest = mysqli_fetch_array($getGuests))
            {
                echo "<li><a href='#' data-id='$reservationID'>" . $getGuest[voornaam] . " " .  $getGuest[achternaam] . "</a></li>";
            }
        }
    }
}

function showOrderedItems($reservationID, $button, $mysqli)
{
    if(isset($button))
    {
        if($reservationID == "")
        {
            echo "<script>alert('Er is geen reservering geselecteerd');</script>";
        }
        else
        {
            echo "<li>Bestelde menu's:</li>";
            $getMenuIDs = $mysqli->query("SELECT bestelde_gerechtenid FROM bestellingen WHERE reserveringid = '$reservationID'");
            if ($getMenuIDs == false)
            {
                echo "Query mislukt. Foutmelding: " . $mysqli->error;
                die;
            }
            while($getMenuID = mysqli_fetch_array($getMenuIDs))
            {
                $orderedMenuID = $getMenuID[bestelde_gerechtenid];

                $getMenunames = $mysqli->query("SELECT naam FROM menu_lijst WHERE id = '$orderedMenuID'");
                if($getMenunames == FALSE)
                {
                    echo "Query mislukt. Foutmelding: " . $mysqli->error;
                    die();
                }
                while($getMenuname = mysqli_fetch_array($getMenunames))
                {
                    echo "<li><a href='#' data-id='$orderedMenuID'>" . $getMenuname[naam] . "</a></li>";
                }
            }

            echo "<li>Bestelde dranken:</li>";
            $getDrinkIDs = $mysqli->query("SELECT bestelde_drankenid FROM bestellingen WHERE reserveringid = '$reservationID'");
            if ($getDrinkIDs == false)
            {
                echo "Query mislukt. Foutmelding: " . $mysqli->error;
                die;
            }
            while($getDrinkID = mysqli_fetch_array($getDrinkIDs))
            {
                $orderedDrinkID = $getDrinkID[bestelde_drankenid];

                $getDrinknames = $mysqli->query("SELECT naam FROM dranken_lijst WHERE id = '$orderedDrinkID'");
                if($getDrinknames == FALSE)
                {
                    echo "Query mislukt. Foutmelding: " . $mysqli->error;
                    die();
                }
                while($getDrinkname = mysqli_fetch_array($getDrinknames))
                {
                    echo "<li><a href='#' data-id='$orderedDrinkID'>" . $getDrinkname[naam] . "</a></li>";
                }
            }
        }
    }
}

function addItem($reservationID, $button1, $button2, $button3, $button4, $button5, $button6, $button7, $mysqli)
{
    if(isset($button1))
    {
        if($reservationID)
        {
            $addItems = $mysqli->query("INSERT INTO bestellingen (id, reserveringid, bestelde_gerechtenid) VALUES (NULL, '$reservationID', 1)");    
        }
        else
        {
            echo "<script>alert('Er is geen reservering geselecteerd');</script>";
        }
    }    
    else if(isset($button2))
    {
        if($reservationID)
        {
            $addItems = $mysqli->query("INSERT INTO bestellingen (id, reserveringid, bestelde_gerechtenid) VALUES (NULL, '$reservationID', 2)");
        }
        else
        {
            echo "<script>alert('Er is geen reservering geselecteerd');</script>";
        }
    }
    else if(isset($button3))
    {
        if($reservationID)
        {
            $addItems = $mysqli->query("INSERT INTO bestellingen (id, reserveringid, bestelde_gerechtenid) VALUES (NULL, '$reservationID', 3)");
        }
        else
        {
            echo "<script>alert('Er is geen reservering geselecteerd');</script>";
        }
    }        
    else if(isset($button4))
    {
        if($reservationID)
        {
            $addItems = $mysqli->query("INSERT INTO bestellingen (id, reserveringid, bestelde_drankenid) VALUES (NULL, '$reservationID', 1)");
        }
        else
        {
            echo "<script>alert('Er is geen reservering geselecteerd');</script>";
        }
    }
    else if(isset($button5))
    {
        if($reservationID)
        {
            $addItems = $mysqli->query("INSERT INTO bestellingen (id, reserveringid, bestelde_drankenid) VALUES (NULL, '$reservationID', 2)");
        }
        else
        {
            echo "<script>alert('Er is geen reservering geselecteerd');</script>";
        }
    }
    else if(isset($button6))
    {
        if($reservationID)
        {
            $addItems = $mysqli->query("INSERT INTO bestellingen (id, reserveringid, bestelde_drankenid) VALUES (NULL, '$reservationID', 3)");
        }
        else
        {
            echo "<script>alert('Er is geen reservering geselecteerd');</script>";
        }
    }
    else if(isset($button7))
    {
        if($reservationID)
        {
            $addItems = $mysqli->query("INSERT INTO bestellingen (id, reserveringid, bestelde_drankenid) VALUES (NULL, '$reservationID', 4)");
        }
        else
        {
            echo "<script>alert('Er is geen reservering geselecteerd');</script>";
        }
    }
}

function changeMenu($menuID, $name, $discription, $price, $button, $mysqli)
{
    if(isset($button))
    {
        $updateMenu = $mysqli->query("UPDATE menu_lijst SET naam='$name', beschrijving='$discription', prijs='$price' WHERE id='$menuID'");
        echo "<script>alert('Menu is gewijzigd');</script>";
    }
}

function deleteCookie($button)
{
    if(isset($button))
    {
        echo "<script>alert('Test');</script>";
        setcookie('reservering', ' ', time()-3600);
    }
}

?> 