<?php
session_start();
if($_SESSION['login'] == false || $_SESSION['rank'] == 1 || $_SESSION['rank'] == 2) {
        header("Location: index.php");
}
require_once 'includes/connect.inc.php';

//De behandelingen uit de database halen
$result = mysqli_query($link, "SELECT * FROM members");
//Creating a array with the data form the db
$users = [];
while ($row = mysqli_fetch_assoc($result)) {
    $users[] = $row;
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
                <h2 class="intro-text text-center">Gebruikers
                    <strong>Schoonheidssalon Tineke</strong>
                </h2>
                <hr>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Gebruikersnaam</th>
                        <th>Voornaam</th>
                        <th>Achternaam</th>
                        <th>E-mail</th>
                        <th>Tel. Nr</th>
                        <th>Adres</th>
                        <th>Woonplaats</th>
                        <th>Postcode</th>
                        <th>Ip</th>
                        <th>Rank</th>
                        <th>Wijzigen</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($users as $member) { ?>
                        <tr>
                            <td><?= $member['id'] ?></td>
                            <td><?= $member['username'] ?></td>
                            <td><?= $member['firstname'] ?></td>
                            <td><?= $member['lastname'] ?></td>
                            <td><?= $member['email'] ?></td>
                            <td><?= $member['telnr'] ?></td>
                            <td><?= $member['adress'] ?></td>
                            <td><?= $member['city'] ?></td>
                            <td><?= $member['zipcode'] ?></td>
                            <td><?= $member['ip'] ?></td>
                            <td><?= $member['status'] ?></td>
                            <td><a href="edit_user.php?userid=<?= $member['id']?>">Wijzigen</a></td>
                        </tr>
                    <?php } ?>
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
