<?php
session_start();
//Als je niet ingelogd bent word je doorgestuurt naar de home pagina
if ($_SESSION['login'] == false || $_SESSION['rank'] == 1 || $_SESSION['rank'] == 2) {
  header("Location: index.php");
}
$ok = false;
require_once('includes/connect.inc.php');
if(isset($_POST['submit'])){
  $ok = $_POST['ok'];
  $userid = $_POST['userid'];
}else{
  $userid = $_GET['userid'];
}

$member = mysqli_query($link, "SELECT username FROM members WHERE id='$userid'");
$user = mysqli_fetch_assoc($member);

if ($ok == true) {
  mysqli_query($link, "DELETE FROM members WHERE id='$userid'");
  header("Location: users.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Delete</title>
</head>
<body>
Weet je zeker dat je <?= $user['username'] ?> wilt verwijderen?
<form action="<?php $_SERVER['REQUEST_URI'] ?>" method="POST">
  <input type="hidden" name="ok" value="true">
  <input type="hidden" name="userid" value="<?=$userid?>">
  <button name="submit" type="submit" class="btn btn-default"><?= $user['username'] ?> verwijderen</button>
</form>
<a href="users.php">Terug naar gebruikers</a>
</body>
</html>