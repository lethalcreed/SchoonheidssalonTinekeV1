<?php session_start();
require_once "includes/functions.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Contact - Schoonheidssalon Tineke</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/business-casual.css" rel="stylesheet">
    <link
        href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800"
        rel="stylesheet" type="text/css">
    <link
        href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic"
        rel="stylesheet" type="text/css">
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
</head>

<body>
<?php require_once 'includes/company.php' ?>

<!-- Navigation -->
<nav class="navbar navbar-default" role="navigation">
    <?php require_once "includes/nav.php"; ?>
</nav>

<div class="container">

    <div class="row">
        <div class="box">
            <div class="col-lg-12">
                <hr>
                <h2 class="intro-text text-center">Contact
                    <strong>Schoonheissalon Tineke</strong>
                </h2>
                <hr>
            </div>
            <div class="col-md-8">
                <!-- Embedded Google Map using an iframe - to select your location find it on Google maps and paste the link as the iframe src. If you want to use the Google Maps API instead then have at it! -->
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2447.061775330516!2d4.582440915958193!3d52.169568969892026!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c5c4926ee38a1f%3A0x2ab330f60b0812fa!2sVissersweg+6%2C+2355+AL+Hoogmade!5e0!3m2!1sen!2snl!4v1450431522951"
                    width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
            <div class="col-md-4">
                <p>Telefoon:
                    <strong>06 - 130 37920</strong>
                </p>

                <p>Email:
                    <strong><a
                            href="mailto:schoonheidssalontineke@gmail.com">schoonheidssalontineke@gmail.com</a></strong>
                </p>

                <p>Address:
                    <strong>Vissersweg 6
                        <br>2355AL Hoogmade</strong>
                </p>

                <p>
                    Openingstijden:
                <table>
                    <tr>
                        <td>Ma:</td>
                        <td>9.00 - 17.00</td>
                    </tr>
                    <tr>
                        <td>Di:</td>
                        <td>9.00 - 17.00</td>
                        <td>&nbsp;18.30 - 22.00</td>
                    </tr>
                    <tr>
                        <td>Wo:</td>
                        <td>Gesloten</td>
                    </tr>
                    <tr>
                        <td>Do:</td>
                        <td>9.00 - 17.00</td>
                        <td>&nbsp;18.30 - 22.00</td>
                    </tr>
                    <tr>
                        <td>Vr:</td>
                        <td>9.00 - 17.00</td>
                        <td>&nbsp;18.30 - 22.00</td>
                    </tr>
                    <tr>
                        <td>Za:</td>
                        <td>Gesloten</td>
                    </tr>
                    <tr>
                        <td>Zo:</td>
                        <td>Gesloten</td>
                    </tr>
                </table>
                </p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="row">
        <div class="box">
            <div class="col-lg-12">
                <hr>
                <h2 class="intro-text text-center">Contact
                    <strong>formulier</strong>
                </h2>
                <hr>
                <p>Heb je vragen of opmerkingen? Vul dan het formulier hieronder in en we nemen zo snel mogenlijk
                    contact met u op.</p>
                <?php
//                Check of het contact formulier juist is ingevuld. En niet gevuld is met neppe data.
                if (isset($_POST['submitcontact'])) {
                    $name = trim(strtolower($_POST['name']));
                    $email = $_POST['email'];
                    $tel = $_POST['tel'];
                    $message = $_POST['message'];
                    $ip = $_SERVER["REMOTE_ADDR"];
                    $dead = false;
                    $error = "wtf";
                    if (strlen($tel) <= 9 || strlen($tel) >= 12) {
                        $dead = true;
                        $error = "Het telefoonnummer bestaat niet";
                    }
                    if (validate_email($email) == false) {
                        $dead = true;
                        $error = "Het email adres bestaat niet";
                    }
                    if ($dead == false) {
                        require_once "includes/connect.inc.php";
                        $query1 = "INSERT INTO contact(name, email, tel, message, ip) VALUES ('$name','$email', '$tel','$message', '$ip')";
                        if (mysqli_query($link, $query1)) {
                            echo "Bedankt voor je bericht $name. Er word zo snel mogenlijk contact met je opgenomen.";
                        }

                    } else {
                        echo "$error";
                    }
                }
                ?>
<!--                Showing a form for loggin in -->
                <form method="post" action="<?php $_SERVER['REQUEST_URI'] ?>">
                    <div class="row">
                        <div class="form-group col-lg-4">
                            <label>Naam</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group col-lg-4">
                            <label>Email Adres</label>
                            <input type="text" class="form-control" name="email">
                        </div>
                        <div class="form-group col-lg-4">
                            <label>Telefoonnummer</label>
                            <input type="text" class="form-control" name="tel">
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group col-lg-12">
                            <label>Bericht</label>
                            <textarea class="form-control" rows="6" name="message"></textarea>
                        </div>
                        <div class="form-group col-lg-12">
                            <button name="submitcontact" type="submit" class="btn btn-default">Verstuur</button>
                        </div>
                    </div>
                </form>
            </div>
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
