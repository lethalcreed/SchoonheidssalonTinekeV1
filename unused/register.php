<?php
//Session
session_start();
if (isset($_SESSION["login"])) {
    if ($_SESSION['login'] == "true") {
        echo "Je hebt al een account.";
    }
}
require_once("../schoonheidssalontineke/includes/connect.inc.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/carousel.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <title>Registreer</title>
</head>
<body>
<div class="container2">
    <?php if (isset($_POST["submit"])) {
        $dead = "false";
        $message = "Vul alles correct in:";
        $username = $_POST["name"];
        $pass1 = $_POST["pass1"];
        $pass2 = $_POST["pass2"];
        $ip = $_SERVER["REMOTE_ADDR"];
        $status = "1";
        // error detectie
        if (strlen($username) <= 1 || strlen($username) >= 15) {
            $dead = "true";
            $message = "Kies een gebruikersnaam met 2 tot 14 tekens.";
        }
        if (strlen($pass1) < 6 || strlen($pass1) > 20) {
            $dead = "true";
            $message = "Het wachtwoord is te kort. Hij moet minimaal 6 en maximaal 20 tekens zijn.";
        }
        if ($pass1 !== $pass2) {
            $dead = "true";
            $message = "De twee wachtwoorden zijn niet hetzelfde";
        }
        if ($dead == "false") {
            $username = strtolower(trim(strip_tags($username)));
            $pass1 = trim($pass1);
            $pass1 = md5($pass1);
            $query = mysqli_query($link, "SELECT * FROM members WHERE username ='$username'");
            $rows = mysqli_num_rows($query);
            if ($rows == 1) {
                echo "Deze gebruikersnaam is al bezet.";
            } else {
                $query1 = "INSERT INTO members(username, password, ip, status) VALUES ('$username','$pass1', '$ip','$status')";
                if (mysqli_query($link, $query1)) {
                    echo "Je hebt succesvol een account aangemaakt.<br><a href=login.php>Login</a>";
                }
            }
        } elseif ($dead == "true") {
            print $message;
        }
    }
    ?>
    <form action="<?php $_SERVER['REQUEST_URI'] ?>" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Gebruikersnaam: </label>
            <input type="text" name="name" class="form-control" id="name" maxlength="15"
                   value="<?php if (isset($_POST["submit"]) && $dead == 'true') {
                       echo $_POST["name"];
                   } ?>">
        </div>
        <div class="form-group">
            <label for="pass1">Wachtwoord:</label>
            <input type="password" name="pass1" class="form-control" id="pass1" maxlength="20"
                   value="<?php if (isset($_POST["submit"]) && $dead == 'true') {
                       echo $_POST["pass1"];
                   } ?>">
        </div>
        <div class="form-group">
            <label for="pass2">Bevestig wachtwoord: </label>
            <input type="password" name="pass2" class="form-control" id="pass2" maxlength="20"
                   value="<?php if (isset($_POST["submit"]) && $dead == 'true') {
                       echo $_POST["pass2"];
                   } ?>">
        </div>
        <button name="submit" type="submit" class="btn btn-default">Submit</button>
    </form>
</div>
</body>
</html>