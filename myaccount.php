<?php session_start();
require_once 'includes/connect.inc.php';
if ($_SESSION['login'] == false) {
    header("Location: index.php");
}
$idaccount = $_SESSION["member_id"];
$gegeven = mysqli_query($link, "SELECT * FROM members WHERE id='$idaccount'");
$gegevens = mysqli_fetch_array($gegeven);
?>
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
<!-- Navigation -->
<nav class="navbar navbar-default" role="navigation">
    <?php require_once 'includes/nav.php' ?>
</nav>

<div class="container">
    <div class="row">
        <div class="box">
            <div class="col-lg-12">
                <hr>
                <h2 class="intro-text text-center">Mijn gegevens
                    <strong>Schoonheidssalon Tineke</strong>
                </h2>
                <hr>
            </div>
            <?php
            if (isset($_POST["submit"])) {
                $errors = [];
                $ok = true;
                $mysqlok = false;
                if (!isset($_POST["firstname"]) || $_POST["firstname"] == "") {
                    $errors[] = "Vul een voornaam in<br>";
                    $ok = false;
                }
                if (!isset($_POST["lastname"]) || $_POST["lastname"] == "") {
                    $errors[] = "Vul een achternaam in<br>";
                    $ok = false;
                }
                if (!isset($_POST["email"]) || $_POST["email"] == "") {
                    $errors[] = "Vul een e-mail adres in<br>";
                    $ok = false;
                }
                if (!isset($_POST["adress"]) || $_POST["adress"] == "") {
                    $errors[] = "Vul een adres in<br>";
                    $ok = false;
                }
                if (!isset($_POST["city"]) || $_POST["city"] == "") {
                    $errors[] = "Vul een woonplaats in<br>";
                    $ok = false;
                }
                if (!isset($_POST["zipcode"]) || $_POST["zipcode"] == "") {
                    $errors[] = "Vul een postcode in<br>";
                    $ok = false;
                }
                if (!isset($_POST["telnr"]) || $_POST["telnr"] == "") {
                    $errors[] = "Vul een telefoonnummer in<br>";
                    $ok = false;
                }
                if ($ok == true) {
                    $firstname = cleanUserInput($_POST["firstname"]);
                    $lastname = cleanUserInput($_POST["lastname"]);
                    $email = cleanUserInput($_POST["email"]);
                    $password = cleanUserInput($_POST["password"]);
                    if ($password == "") {
                        $password = cleanUserInput($gegevens["password"]);
                    } else {
                        $password = trim($password);
                        $password = md5($password);
                    }
                    $adress = $_POST["adress"];
                    $city = $_POST["city"];
                    $zipcode = $_POST["zipcode"];
                    $telnr = $_POST["telnr"];
                    $mysqlok = true;
                    $sql = "UPDATE members SET firstname='$firstname', lastname='$lastname', email='$email', password='$password', adress='$adress', city='$city', zipcode='$zipcode', telnr='$telnr' WHERE id='$idaccount'";
                    $result = mysqli_query($link, $sql);
                    if ($mysqlok == true) {
                        echo "De gegevens zijn gewijzigd!";
                    } elseif ($mysqlok == false) {
                        echo "Er is een fout opgetreden. Neem contact op met de systeembeheerder";
                    }
                } else {
                    foreach ($errors as $error) {
                        echo $error;
                    }
                }
            } ?>

            <form action="<?php $_SERVER['REQUEST_URI'] ?>" method="POST">
                <div class="form-group">
                    <label for="firstname">Voornaam: </label>
                    <input type="text" name="firstname" class="form-control" id="firstname" placeholder="Voornaam"
                           value="<?= htmlentities($gegevens["firstname"]); ?>">
                </div>
                <div class="form-group">
                    <label for="lastname">Achternaam: </label>
                    <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Achternaam"
                           value="<?= htmlentities($gegevens["lastname"]); ?>">
                </div>
                <div class="form-group">
                    <label for="email">E-mail: </label>
                    <input type="text" name="email" class="form-control" id="email" placeholder="E-mail adres"
                           value="<?= htmlentities($gegevens["email"]); ?>">
                </div>
                <div class="form-group">
                    <label for="password">Wachtwoord: </label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Wachtwoord">
                </div>
                <div class="form-group">
                    <label for="adress">Adres: </label>
                    <input type="text" name="adress" class="form-control" id="adress"
                           placeholder="Straatnaam + huisnummer" value="<?= htmlentities($gegevens["adress"]); ?>">
                </div>
                <div class="form-group">
                    <label for="city">Woonplaats: </label>
                    <input type="text" name="city" class="form-control" id="city" placeholder="Woonplaats"
                           value="<?= htmlentities($gegevens["city"]); ?>">
                </div>
                <div class="form-group">
                    <label for="zipcode">Postcode: </label>
                    <input type="text" name="zipcode" class="form-control" id="zipcode" placeholder="Postcode"
                           value="<?= htmlentities($gegevens["zipcode"]); ?>">
                </div>
                <div class="form-group">
                    <label for="telnr">Telefoon nummer: </label>
                    <input type="text" name="telnr" class="form-control" id="telnr" placeholder="Telefoon nummer"
                           value="<?= htmlentities($gegevens["telnr"]); ?>">
                </div>
                <button name="submit" type="submit" class="btn btn-default">Submit</button>
                <div class="form-group">

                </div>
            </form>
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
