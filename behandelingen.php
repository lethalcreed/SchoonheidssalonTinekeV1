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
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<!--ophalen verbindings info-->
<?php require_once 'includes/company.php' ?>
<!--ophalen bedrijfsinfo-->
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
                <h2 class="intro-text text-center">Behandelingen
                    <strong>Schoonheidssalon Tineke</strong>
                </h2>
                <hr>
            </div>
<!--            This is the script for showing the list of treatments.-->
            <table class="table">
                <tr>
                    <th>Soort behandeling</th>
                    <th>Omschrijving</th>
                    <th>Prijs</th>
                    <th>Duur</th>
                    <th>Reserveren</th>
                </tr>

                <?php foreach ($behandelingen as $behandeling){ ?>
                <tr>
                    <th><?=$behandeling["kind"]?></th>
                    <th><?=$behandeling["description"]?></th>
                    <th><?=$behandeling["price"]?>,-</th>
                    <th><?=$behandeling["time"]?> minuten</th>
                    <th><a href="reserveren.php?id=<?=$behandeling['idbehandelingen']?>">>>></a></th>
                </tr>
                <?php } ?>
            </table>

            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- /.container -->
<!--opahlen footer-->
<?php require_once 'includes/footer.php' ?>

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>

</html>
