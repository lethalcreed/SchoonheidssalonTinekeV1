<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Contact - Schoonheidssalon Tineke</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/business-casual.css" rel="stylesheet">
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

<div class="brand">Schoonheidssalon Tineke</div>
<div class="address-bar">Vissersweg 6 | 2355AL Hoogmade | 06-13037920</div>

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
                    <strong>formulier</strong>
                </h2>
                <hr>
                <p>Heb je vragen of opmerkingen? Vul dan het formulier hieronder in en we nemen zo snel mogenlijk
                    contact met u op.</p>

                <form role="form" type="post" action="">
                    <div class="row">
                        <div class="form-group col-lg-4">
                            <label>Naam</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group col-lg-4">
                            <label>Email Adres</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                        <div class="form-group col-lg-4">
                            <label>Telefoonnummer</label>
                            <input type="tel" class="form-control" name="tel">
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group col-lg-12">
                            <label>Bericht</label>
                            <textarea class="form-control" rows="6" name="message"></textarea>
                        </div>
                        <div class="form-group col-lg-12">
                            <button type="submit" class="btn btn-default">Verstuur</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
<!-- /.container -->

<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <p>Copyright &copy; Youri van Leeuwen 2015</p>
            </div>
        </div>
    </div>
</footer>

<!-- jQuery -->
<script src="../js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../js/bootstrap.min.js"></script>

</body>

</html>
