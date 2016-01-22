<?php
session_start();
if ($_SESSION['login'] == false || $_SESSION['rank'] == 1 || $_SESSION['rank'] == 2) {
    header("Location: index.php");
}
$ok = false;
require_once('includes/connect.inc.php');
if(isset($_POST['submit'])){
    $ok = $_POST['ok'];
    $reservation_id = $_POST['reservation_id'];
}else{
    $reservation_id = $_GET['reservation_id'];
}
if ($ok == true) {
    mysqli_query($link, "DELETE FROM reservations WHERE id_reservation='$reservation_id'");
    header("Location: reservations.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete</title>
</head>
<body>
Weet je zeker dat je reservering met id: <?= $reservation_id ?> wilt verwijderen?
<form action="<?php $_SERVER['REQUEST_URI'] ?>" method="POST">
    <input type="hidden" name="ok" value="true">
    <input type="hidden" name="reservation_id" value="<?=$reservation_id?>">
    <button name="submit" type="submit" class="btn btn-default">Reservering <?= $reservation_id ?> verwijderen</button>
</form>
<a href="reservations.php">Terug naar reserveringen</a>
</body>
</html>