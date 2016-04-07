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
                <h2 class="intro-text text-center">Reserveren
                    <strong>Schoonheidssalon Tineke</strong>
                </h2>
                <hr>
            </div>
            <?php if (isset($_SESSION["login"])) {
                if ($_SESSION["login"] !== "true") { ?>
                    Kies een behandeling om te reserveren. Als je meerdere behandelingen wilt kiezen zult u een extra
                    reservering moeten maken.<br><br>
                    <table class="table">
                        <tr>
                            <th>Soort behandeling</th>
                            <th>Omschrijving</th>
                            <th>Prijs</th>
                            <th>Duur</th>
                            <th>Reserveren</th>
                        </tr>
                        <?php foreach ($behandelingen as $behandeling) { ?>
                            <tr>
                                <th><?= $behandeling["kind"] ?></th>
                                <th><?= $behandeling["description"] ?></th>
                                <th><?= $behandeling["price"] ?></th>
                                <th><?= $behandeling["time"] ?></th>
                                <th>
                                    <form action="reserveren1.php" method="POST">
                                        <input type="hidden" name="id" value="<?= $behandeling['idbehandelingen'] ?>">
                                        <input type="submit" value="Reserveren">
                                    </form>
                                </th>
                            </tr>
                        <?php } ?>
                    </table>
                <?php }
            } else { ?>
                <!--Login script-->
                <div>
                    Log in met een account of <a href="registreren.php">Maak een account aan</a>

                    <form action="<?php $_SERVER['REQUEST_URI'] ?>" method="post">
                        <div class="form-group">
                            <input type="text" name="username" class="form-control" id="login"
                                   placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input type="password" name="pass" class="form-control" id="pass"
                                   placeholder="Wachtwoord">
                        </div>
                        <input type="submit" value="Login" name="submit">
                    </form>
                </div>
                <?php
                if (isset($_POST["submit"])) {
                    $username = trim(strtolower($_POST["username"]));
                    $username = cleanUserInput($username);
                    $pass1 = cleanUserInput($_POST["pass"]);
                    $dead = "false";
                    $message = "Vul de velden correct in";
                    $_SESSION["username"] = $username;
                    if (strlen($username) <= 1 || strlen($username) >= 15) {
                        $dead = "true";
                        $message = "Gebruikersnaam moet tussen de 1 en 15 tekens zijn";
                    }
                    if (strlen($pass1) < 6 || strlen($username) >= 15) {
                        $dead = "true";
                        $message = "Wachtwoord moet tussen de 6 en 20 tekens zijn";
                    }
                    if ($dead = "false") {
                        require_once('../v1/includes/connect.inc.php');
                        $pass1 = md5($pass1);
                        $query = mysqli_query($link, "SELECT status FROM members WHERE username = '$username' and password = '$pass1'");
                        $rows = mysqli_num_rows($query);
                        /*        echo("$rows.<br>");
                                echo("$username.<br>");
                                echo("$pass1.<br>");
                        */
                        if ($rows > 0) {
                            $row = mysqli_fetch_assoc($query);
                            $username = mysqli_real_escape_string($link, $username);
                            $_SESSION['login'] = true;
                            $_SESSION["username"] = $username;
                            $id = mysqli_query($link, "SELECT id FROM members WHERE username = '$username' and password = '$pass1'");
                            $member_id = mysqli_fetch_assoc($id);
                            $_SESSION["member_id"] = $member_id["id"];
                            $_SESSION['rank'] = $row['status'];
                        } else {
                            echo "Verkeerde gebruikersnaam en/of wachtwoord";
                        }
                    } else {
                        echo "$message";
                    }
                }
            }
            ?>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- /.container -->

<?php require_once 'includes/footer.php' ?>
<!--security function-->
<script src="js/app.js"></script>
<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>

</html>
