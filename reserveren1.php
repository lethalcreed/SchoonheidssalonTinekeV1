<?php
session_start();
require_once 'includes/connect.inc.php';
if ($_SESSION['login'] == false) {
    header("Location: index.php");
}

//As soon as a date has been choosen, Taken times wil be fetched.
if (isset($_POST["submitdate"])) {
    $date = $_POST["date"];
    $result = mysqli_query($link, "SELECT * FROM reservations WHERE dates= '$date'");
    $times = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $times[] = $row;
    }
    require_once "includes/timecheck.php";
}
$number = $_POST["id"];
$behandelingen = mysqli_query($link, "SELECT * FROM behandelingen WHERE idbehandelingen= '$number'");
$behandeling = mysqli_fetch_assoc($behandelingen);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!--    datepicker code-->
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css"/>

    <!--    end of datepicker code-->
    <link href="../v1/css/bootstrap.min.css" rel="stylesheet">
    <link href="../v1/css/business-casual.css" rel="stylesheet">
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
            <div class="col-md-4">
                <hr2 class="intro-text text-center">
                    <strong>Gekozen behandeling:</strong>
                </hr2>
                <br><br>
                Naam: <?= $behandeling["kind"]; ?><br>
                Omschrijving: <?= $behandeling["description"]; ?><br>
                Duur: <?= $behandeling["time"]; ?> uur<br>
                Prijs: <?= $behandeling["price"]; ?><br>
            </div>
            <div class="col-md-4">
                <hr2 class="intro-text text-center">
                    <strong>Datum:</strong>
                </hr2>
                <br>
                Selecteer een datum<br><br>

                <form action="<?php $_SERVER['REQUEST_URI'] ?>" method="POST">
                    <input type="date" id="date" name="date" placeholder="Date" value="<?= $date ?>"><br><br>
                    <input type="submit" value="Datum Bevestigen" name="submitdate">
                    <input type="hidden" name="id" value="<?= $number ?>">
                </form>
                <!--  jquery datepciker not in use     <div id="datepicker"></div>-->
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
<script src="../v1/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<!--<script src="js/bootstrap.min.js"></script>-->
<!---->
<!--<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>-->
<!--<script type="text/javascript" src="js/jquery-ui.js"></script>-->
<!--<script>-->
<!--    $(function () {-->
<!--        $("#datepicker").datepicker();-->
<!---->
<!--    });-->

</body>

</html>
