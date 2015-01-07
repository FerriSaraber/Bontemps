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
            $place = false;
        }
        else
        {
            $place = true;
        }
        
        if($place == false)
        {
            echo "<script>alert('Er is geen plaats meer op dit tijdstip');</script>";
        }
        else
        {
            echo "<script>alert('Datum en tijd geselecteerd');</script>";
            $insertReservation = $mysqli->query("INSERT INTO reserveringen (id, klantid, datumtijd, aantal_personen) VALUES (NULL, '$guestID', '$datetime', '$amount')");
            
            if($insertReservation)
            {
                $reservationID = $mysqli->insert_id;
            }
            else
            {
                die('Error : ('. $mysqli->errno .') '. $mysqli->error);
            }
        }
        
        for($i = 0; $i < $menu1; $i++)
        {
            $insertMenu1 = $mysqli->query("INSERT INTO bestellingen (id, reserveringid, bestelde_gerechtenid) VALUES (NULL, '$guestID', '$reservationID')");
        }
        
        for($i = 0; $i < $menu2; $i++)
        {
            $insertMenu2 = $mysqli->query("INSERT INTO bestellingen (id, reserveringid, bestelde_gerechtenid) VALUES (NULL, '$guestID', '$reservationID')");
        }
        
        for($i = 0; $i < $menu3; $i++)
        {
            $insertMenu3 = $mysqli->query("INSERT INTO bestellingen (id, reserveringid, bestelde_gerechtenid) VALUES (NULL, '$guestID', '$reservationID')");
        }
    }
}

?> 