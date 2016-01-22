<?php session_start();
require_once 'includes/connect.inc.php';
if ($_SESSION['login'] == false) {
    header("Location: index.php");
}
$memberid = $_SESSION["member_id"];
$result = $link->query("SELECT *
FROM reservations
INNER JOIN members
ON reservations.members_id=members.id
INNER JOIN behandelingen
ON reservations.behandelingen_idbehandelingen=behandelingen.idbehandelingen
WHERE members_id='$memberid'");
//Creating a array with the data form the db
$reservatie = [];
while ($row = mysqli_fetch_assoc($result)) {
    $reservatie[] = $row;
}
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
                <h2 class="intro-text text-center">Behandelingen
                    <strong>Schoonheidssalon Tineke</strong>
                </h2>
                <hr>
            </div>
            <table class="table">
                <tr>
                    <th>Behandeling</th>
                    <th>Kosten</th>
                    <th>Datum</th>
                    <th>Tijd</th>
                    <th>Duur</th>
                </tr>

                <?php foreach ($reservatie as $reservation) { ?>
                    <tr>
                        <th>
                            <?= $reservation["kind"]; ?>
                        </th>
                        <th>
                            <?= $reservation["price"]; ?>
                        </th>
                        <th>
                            <?= $reservation["dates"]; ?>
                        </th>
                        <th>
                            <?= $reservation["times"]; ?>
                        </th>
                        <th>
                            <?= $reservation["time"]; ?>
                        </th>
                    </tr>
                <?php } ?>
            </table>

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
