<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Schoonheidssalon Tineke</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/business-casual.css" rel="stylesheet">
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
</head>

<body>

<?php require_once'includes/company.php' ?>

<!-- Menu balk -->
<nav class="navbar navbar-default" role="navigation">
<?php include_once"includes/nav.php";?>
</nav>


<div class="container">

  <div class="row">
    <div class="box">
      <div class="col-lg-12 text-center">
        <div id="carousel-example-generic" class="carousel slide">
          <!-- Indicators -->
          <ol class="carousel-indicators hidden-xs">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner">
            <div class="item active">
              <img class="img-responsive img-full" src="img/slide-1.jpg" alt="">
            </div>
            <div class="item">
              <img class="img-responsive img-full" src="img/slide-2.jpg" alt="">
            </div>
            <div class="item">
              <img class="img-responsive img-full" src="img/slide-3.jpg" alt="">
            </div>
          </div>

          <!-- Controls -->
          <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
            <span class="icon-prev"></span>
          </a>
          <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
            <span class="icon-next"></span>
          </a>
        </div>
        <h2 class="brand-before">
          <small>Welkom op</small>
        </h2>
        <h1 class="brand-name">Schoonheidssalon Tineke</h1>
      </div>
    </div>
  </div>

<!--  <div class="row">-->
<!--    <div class="box">-->
<!--      <div class="col-lg-12">-->
<!--        <hr>-->
<!--        <h2 class="intro-text text-center">-->
<!--          <strong>worth visiting</strong>-->
<!--        </h2>-->
<!--        <hr>-->
<!--        <img class="img-responsive img-border img-left" src="img/intro-pic.jpg" alt="">-->
<!--        <hr class="visible-xs">-->
<!--      <p>Intro verhaaltje</p>  -->
<!--      </div>-->
<!--    </div>-->
<!--  </div>-->

</div>
<!-- /.container -->

<?php require_once'includes/footer.php' ?>
<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Script to Activate the Carousel -->
<script>
  $('.carousel').carousel({
    interval: 5000 //changes the speed
  })
</script>

</body>

</html>
