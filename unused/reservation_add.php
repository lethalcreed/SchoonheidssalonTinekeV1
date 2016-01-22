<?php session_start();
require_once 'includes/connect.inc.php';
if ($_SESSION['login'] == false || $_SESSION['rank'] == 1 || $_SESSION['rank'] == 2) {
    header("Location: index.php");
}
//As soon as a date has been choosen, Taken times wil be fetched.
if (isset($_POST["submitdate"])) {
    $date = $_POST["dates"];
    $result = mysqli_query($link, "SELECT * FROM reservations WHERE dates= '$date'");
    $times = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $times[] = $row;
    }
    require_once "includes/timecheck.php";
}
$showdate = false;
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
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/business-casual.css" rel="stylesheet">
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
                <h2 class="intro-text text-center">Behandelingen
                    <strong>Schoonheidssalon Tineke</strong>
                </h2>
                <hr>
            </div>
            <?php
            if (isset($_POST["submitform"])) {
                $errors = [];
                $ok = true;
                $mysqlok = false;
                if (!isset($_POST["user_id"]) || $_POST["user_id"] == "") {
                    $errors[] = "Vul een Gebruikers id in. Deze kun je vinden in de lijst met accounts.<br>";
                    $ok = false;
                }
                if (!isset($_POST["tm_id"]) || $_POST["tm_id"] == "") {
                    $errors[] = "Vul een Behandelingsid<br>";
                    $ok = false;
                }
                $user_id = $_POST["user_id"];
                $tm_id = $_POST["tm_id"];
                $showdate = true;
            }
            if (isset($_POST["submitdate"])) {
                if (!isset($_POST["dates"]) || $_POST["dates"] == "") {
                    $errors[] = "Vul een datum in<br>";
                    $ok = false;
                }
                $dates = $_POST["dates"];
                $showdate = true;
            }
            if (isset($_POST["submittimes"])) {
                if ($ok == true) {
                    $email = $_POST["email"];
                    $onlyonce = false;
                    $mysqlok = true;
                    $sql = "INSERT INTO reservations (members_id, behandelingen_idbehandelingen, dates, times) VALUES('$user_id', '$tm_id', '$dates', '$times')";
                    $result = mysqli_query($link, $sql);
                    if ($mysqlok == true) {
                        echo "De reservering is toegevoegd!";
                        ?><a href="../reservations.php"> Klik hier om terug naar het overzicht te gaan</a><?php
                    } elseif ($mysqlok == false) {
                        echo "Er is een fout opgetreden. Neem contact op met de systeembeheerder";
                    }
                } else {
                    foreach ($errors as $error) {
                        echo $error;
                    }
                }
            } ?>
            <div class="col-md-4">
                <form action="<?php $_SERVER['REQUEST_URI'] ?>" method="POST">
                    <div class="form-group">
                        <label for="user_id">Gebruikers id: </label>
                        <input type="text" name="user_id" class="form-control" id="user_id"
                               placeholder="Vul het id van de gebruiker in.">
                    </div>
                    <div class="form-group">
                        <label for="th_id">Behandeling: </label>
                        <input type="text" name="tm_id" class="form-control" id="tm_id"
                               placeholder="Vul het id in van de behandeling">
                    </div>
                    <input type="submit" name="submitform" value="Id's Bevestigen">
                </form>
            </div>
            <div class="col-md-4">
                <hr2 class="intro-text text-center">
                    <strong>Datum:</strong>
                </hr2>
                <br>
                Selecteer een datum<br><br>
<?php if($showdate == true){ ?>
                <form action="<?php $_SERVER['REQUEST_URI'] ?>" method="POST">
                    <input type="date" id="dates" name="dates" placeholder="Date" value="<?= $dates ?>"><br><br>
                    <input type="submit" value="Datum Bevestigen" name="submitdate">
                </form>
<?php }?>
            </div>
            <div class="col-md-4">
                <hr2 class="intro-text text-center">
                    <strong>Tijd:</strong>
                </hr2>
                <br>
                Kies een tijd uit de onderstaande blokken:<br>
                <?php require_once "includes/timeblocks.php" ?>
            </div>

            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- /.container -->

<?php require_once 'includes/footer.php' ?>

<!-- jQuery -->
<script src="../js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../js/bootstrap.min.js"></script>

</body>

</html>
