<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Behandelingen - Schoonheissalon Tineke</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/business-casual.css" rel="stylesheet">
    <link href="css/stylesheet.css" rel="stylesheet">
    <link
        href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800"
        rel="stylesheet" type="text/css">
    <link
        href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic"
        rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<?php require_once 'includes/company.php' ?>
<?php require_once 'includes/connect.inc.php' ?>
<!-- Navigation -->
<nav class="navbar navbar-default" role="navigation">
    <?php require_once 'includes/nav.php' ?>
</nav>
<div class="container">

    <div class="row">
        <div class="box">
            <div class="col-lg-12">
                <hr>
                <h2 class="intro-text text-center">Registreren
                    <strong>Schoonheidssalon Tineke</strong>
                </h2>
                <hr>
            </div>
            Maak hier een account aan door alle velden in te vullen en op verzenden te drukken.
            Met dit account kun je dan een reservering maken voor een behandeling.
            <div class="error">
                <?php
                $message= [];
                if (isset($_POST["submit"])) {
                    $dead = "false";
                    $message[] = "Vul alles correct in:";
                    $firstname = cleanUserInput($_POST["firstname"]);
                    $lastname = cleanUserInput($_POST["lastname"]);
                    $username = cleanUserInput($_POST["name"]);
                    $email = cleanUserInput($_POST["mail"]);
                    $pass1 = cleanUserInput($_POST["pass1"]);
                    $pass2 = cleanUserInput($_POST["pass2"]);
                    $adress = cleanUserInput($_POST["adress"]);
                    $city = cleanUserInput($_POST["city"]);
                    $zipcode = cleanUserInput($_POST["zipcode"]);
                    $tel = cleanUserInput($_POST["telnr"]);
                    $ip = $_SERVER["REMOTE_ADDR"];
                    $status = "1";
                    // error detectie
                    if (strlen($username) <= 2 || strlen($username) >= 14) {
                        $dead = "true";
                        $message[] = "* Kies een gebruikersnaam met 2 tot 14 tekens.";
                    }
                    if (!isset($firstname) || $firstname == "") {
                        $dead = "true";
                        $message[] = "* Vul een voornaam in";
                    }
                    if (!isset($lastname)|| $lastname == "") {
                        $dead = "true";
                        $message[] = "* Vul een achternaam in";
                    }
                    if (!isset($email)|| $email == "") {
                        $dead = "true";
                        $message[] = "* Vul een E-mail adres in";
                    }
                    if (!isset($adress) || $adress == "") {
                        $dead = "true";
                        $message[] = "* Vul een adres en huisnummer in";
                    }
                    if (!isset($city)|| $city == "") {
                        $dead = "true";
                        $message[] = "* Vul een woonplaats in";
                    }
                    if (!isset($zipcode)|| $zipcode == "") {
                        $dead = "true";
                        $message[] = "* Vul een postcode in";
                    }
                    if (!isset($tel) || strlen($tel) <= 7 || strlen($tel) >= 15) {
                        $dead = "true";
                        $message[] = "* Vul een geldig telefoon nummer in";
                    }
                    if (strlen($pass1) < 6 || strlen($pass1) > 20) {
                        $dead = "true";
                        $message[] = "* Het wachtwoord is te kort. Hij moet minimaal 6 en maximaal 20 tekens zijn.";
                    }
                    if ($pass1 !== $pass2) {
                        $dead = "true";
                        $message[] = "* De twee wachtwoorden zijn niet hetzelfde";
                    }
                    if ($dead == "false") {
                        $username = strtolower(trim(strip_tags($username)));
                        $pass1 = trim($pass1);
                        $pass1 = md5($pass1);
                        $query = mysqli_query($link, "SELECT * FROM members WHERE username ='$username'");
                        $rows = mysqli_num_rows($query);
                        if ($rows == 1) {
                            echo "* Deze gebruikersnaam is al bezet.";
                        } else {
                            $query1 = "INSERT INTO members (firstname, lastname, username, email, password, ip, status, adress, city, zipcode, telnr)
                                       VALUES ('$firstname','$lastname','$username','$email','$pass1','$ip','$status','$adress','$city','$zipcode','$tel')";
                            if (mysqli_query($link, $query1)) {
                                echo "Je hebt succesvol een account aangemaakt.<br><a href=unused/login.php>Log nu in</a>";
                            }
                        }
                    } elseif ($dead == "true") {
                        foreach($message as $error){
                            echo $error; ?><br><?php }
                    }
                }
                ?>
            </div>
            <div class="col-md-6">
                <form action="<?php $_SERVER['REQUEST_URI'] ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="firstname">Voornaam:</label>
                        <input type="text" name="firstname" class="form-control" id="firstname" maxlength="50"
                               value="<?php if (isset($_POST["submit"]) && $dead == 'true') {
                                   echo htmlentities($_POST["firstname"]);
                               } ?>">
                    </div>
                    <div class="form-group">
                        <label for="lastname">Achternaam:</label>
                        <input type="text" name="lastname" class="form-control" id="lastname" maxlength="50"
                               value="<?php if (isset($_POST["submit"]) && $dead == 'true') {
                                   echo htmlentities($_POST["lastname"]);
                               } ?>">
                    </div>
                    <div class="form-group">
                        <label for="name">Gebruikersnaam: </label>
                        <input type="text" name="name" class="form-control" id="name" maxlength="15"
                               value="<?php if (isset($_POST["submit"]) && $dead == 'true') {
                                   echo htmlentities($_POST["name"]);
                               } ?>">
                    </div>
                    <div class="form-group">
                        <label for="mail">E-mail:</label>
                        <input type="email" name="mail" class="form-control" id="mail" maxlength="50"
                               value="<?php if (isset($_POST["submit"]) && $dead == 'true') {
                                   echo htmlentities($_POST["mail"]);
                               } ?>">
                    </div>
                    <div class="form-group">
                        <label for="pass1">Wachtwoord:</label>
                        <input type="password" name="pass1" class="form-control" id="pass1" maxlength="20"
                               value="<?php if (isset($_POST["submit"]) && $dead == 'true') {
                                   echo htmlentities($_POST["pass1"]);
                               } ?>">
                    </div>
                    <div class="form-group">
                        <label for="pass2">Bevestig wachtwoord: </label>
                        <input type="password" name="pass2" class="form-control" id="pass2" maxlength="20"
                               value="<?php if (isset($_POST["submit"]) && $dead == 'true') {
                                   echo htmlentities($_POST["pass2"]);
                               } ?>">
                    </div>
                    <div class="form-group">
                        <label for="adress">Adres:</label>
                        <input type="text" name="adress" class="form-control" id="adress" maxlength="50"
                               value="<?php if (isset($_POST["submit"]) && $dead == 'true') {
                                   echo htmlentities($_POST["adress"]);
                               } ?>">
                    </div>
                    <div class="form-group">
                        <label for="city">Woonplaats:</label>
                        <input type="text" name="city" class="form-control" id="city" maxlength="50"
                               value="<?php if (isset($_POST["submit"]) && $dead == 'true') {
                                   echo htmlentities($_POST["city"]);
                               } ?>">
                    </div>
                    <div class="form-group">
                        <label for="zipcode">Postcode:</label>
                        <input type="text" name="zipcode" class="form-control" id="zipcode" maxlength="50"
                               value="<?php if (isset($_POST["submit"]) && $dead == 'true') {
                                   echo htmlentities($_POST["zipcode"]);
                               } ?>">
                    </div>
                    <div class="form-group">
                        <label for="telnr">Telefoonnummer:</label>
                        <input type="text" name="telnr" class="form-control" id="telnr" maxlength="50"
                               value="<?php if (isset($_POST["submit"]) && $dead == 'true') {
                                   echo htmlentities($_POST["telnr"]);
                               } ?>">
                    </div>
                    <button name="submit" type="submit" class="btn btn-default">Verstuur</button>
                </form>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>

<!-- /.container -->

<?php require_once 'includes/footer.php' ?>

<!-- Security function -->
<script src="js/app.js"></script>

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>

</html>