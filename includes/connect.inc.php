<?php
//Database connection
$database = "sst";
$server = "localhost";
$user = "root";
$passw = "";
$link = mysqli_connect($server, $user, $passw, $database) or die("Error: " . mysqli_connect_error());
//Getting treatments form the db
$result = $link->query("SELECT * FROM behandelingen");
//Creating a array with the data form the db
$behandelingen = [];
while ($row = mysqli_fetch_assoc($result)) {
    $behandelingen[] = $row;
}
