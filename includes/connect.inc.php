<?php
//Database connection
$database = "Database Naam";
$server = "Server adress";
$user = "Gebruikers Naam";
$passw = "Database Wachtwoord";
$link = mysqli_connect($server, $user, $passw, $database) or die("Error: " . mysqli_connect_error());


//De behandelingen uit de database halen
$result = $link->query("SELECT * FROM behandelingen");
//Creating a array with the data form the db
$behandelingen = [];
while ($row = mysqli_fetch_assoc($result)) {
    $behandelingen[] = $row;
}
