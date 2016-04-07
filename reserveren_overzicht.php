<?php
session_start();
require_once 'includes/connect.inc.php';
if ($_SESSION['login'] == false) {
    header("Location: index.php");
}
$number = $_POST["id"];
$member = $_SESSION["username"];
$time = $_POST["time"];
$date = $_POST["date"];
$usersdata = mysqli_query($link, "SELECT * FROM members WHERE username= '$member'");
$userdata = mysqli_fetch_assoc($usersdata);
$behandelingen = mysqli_query($link, "SELECT * FROM behandelingen WHERE idbehandelingen= '$number'");
$behandeling = mysqli_fetch_assoc($behandelingen);
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
            <!--Overview of the order-->
            <div class="col-md-7">
                <table>
                    <hr2 class="intro-text text-center">
                        <strong>Gekozen behandeling:</strong>
                    </hr2>
                    <br><br>
                    <tr>
                        <td>
                            Naam:
                        </td>
                        <td>
                            <?= $behandeling["kind"]; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Omschrijving:
                        </td>
                        <td>
                            <?= $behandeling["description"]; ?>
                        </td>
                    </tr>
                </table><br><br>
                <table>
                    <hr2 class="intro-text text-center">
                        <strong>Datum:</strong>
                    </hr2><br><br>
                    <tr>
                        <td>
                            Datum:
                        </td>
                        <td>
                            <?= $date; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Tijd:
                        </td>
                        <td>
                            <?= $time; ?>
                        </td>
                    </tr>
                </table><br>
                <form action="complete.php" method="POST">
                    <input type="hidden" name="check" value="1">
                    <input type="hidden" name="date" value="<?= $date ?>">
                    <input type="hidden" name="id" value="<?= $number ?>">
                    <input type="hidden" name="time" value="<?= $time ?>">
                    <input type="submit" name="complete" value="Reservering bevestigen">
                </form>
            </div>
            <div class="col-md-5">
                <table>
                    <hr2 class="intro-text text-center">
                        <strong>Mijn Gegevens:</strong>
                    </hr2>
                    <br><br>
                    <tr>
                        <td>
                            Voornaam:
                        </td>
                        <td>
                            <?= $userdata["firstname"]; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Achternaam:
                        </td>
                        <td>
                            <?= $userdata["lastname"]; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            E-Mail:
                        </td>
                        <td>
                            <?= $userdata["email"]; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Adres:
                        </td>
                        <td>
                            <?= $userdata["adress"]; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Woonplaats:
                        </td>
                        <td>
                            <?= $userdata["city"]; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Postcode:
                        </td>
                        <td>
                            <?= $userdata["zipcode"]; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Telefoonnummer:
                        </td>
                        <td>
                            <?= $userdata["telnr"]; ?>
                        </td>
                    </tr>
                </table>
                <br><br>
                <table>
                    <hr2 class="intro-text text-center">
                        <strong>Totaal:</strong>
                    </hr2><br><br>
                    <tr>
                        <td>
                            Duur:
                        </td>
                        <td>
                            <?php echo $behandeling["time"]; ?> uur
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Prijs:
                        </td>
                        <td>
                            <?php echo $behandeling["price"]; ?>
                        </td>
                    </tr>
                </table>
            </div>

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
