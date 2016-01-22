<?php
session_start();
//ophalen connectie info
require_once 'includes/connect.inc.php';
//Ophalen alle meegestuurde gegevens die nodig zijn in de reservering
$number = $_POST["id"];
$member = $_SESSION["username"];
$time = $_POST["time"];
$date = $_POST["date"];
$check = $_POST["check"];
//verschillende dingen ophalen uit de database voor de reservering
$usersdata = mysqli_query($link, "SELECT * FROM members WHERE username= '$member'");
$userdata = mysqli_fetch_assoc($usersdata);
$behandelingen = mysqli_query($link, "SELECT * FROM behandelingen WHERE idbehandelingen= '$number'");
$behandeling = mysqli_fetch_assoc($behandelingen);
$idbh = $behandeling["idbehandelingen"];
$userid = $userdata["id"];
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
                <h2 class="intro-text text-center">Reserveren
                    <strong>Schoonheidssalon Tineke</strong>
                </h2>
                <hr>
            </div>
            <!--completion-->
            <?php if($check == 1){ ?>
<div>
    Uw reservering is bevestigd
    <?php
//    De reservering invoeren in de database met alle gevraagde info
    mysqli_query($link, "INSERT INTO reservations(members_id, behandelingen_idbehandelingen, dates, times) VALUES ('$userid', '$idbh', '$date', '$time')");
    ?>
</div>
<?php } else{ ?>
                Er is een fout opgetreden probeer het reserveren opnieuw of neem contact op met de beheerder.
            <?php } ?>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- /.container -->

<?php require_once 'includes/footer.php' ?>

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>

</html>
