<?php
session_start();
if (session_destroy()) {//Sessie vernietigen
header("Location: index.php");
}
?>