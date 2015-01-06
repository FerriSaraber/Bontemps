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

?> 