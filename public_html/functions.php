<?php
function addGuest($firstname, $surname, $address, $city, $email, $phone, $button, $mysqli)
{
    if(isset($button))
    {
        $insertGuest = $mysqli->query("INSERT INTO klanten (id, voornaam, achternaam, email, telefoon, adres, woonplaats) VALUES(NULL,'$firstname','$surname','$email','$phone','$address','$city')");
        
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

?> 