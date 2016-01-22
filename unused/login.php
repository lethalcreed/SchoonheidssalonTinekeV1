<?php
session_start();
if (isset($_SESSION["login"])) {
    if ($_SESSION["login"] == "true") {
       $user = $_SESSION["username"];
        echo "Welkom $user";
        ?> <a href="../logout.php">Log uit</a> <?php
    }
} else {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/stylesheet.css">
        <title>Login</title>
    </head>
    <body>
    <form action="login.php" method="post">

        <input id="login" type="text" name="username" placeholder="Email">
        <input id="pass" type="password" name="pass" placeholder="Wachtwoord">
        <input type="submit" value="Login" name="submit">
    </form>
    </body>
    </html>

<?php }
if (isset($_POST["submit"])) {
    $username = trim(strtolower($_POST["username"]));
    $pass1 = $_POST["pass"];
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
            $_SESSION['rank'] = $row['status'];
            header("Location: index.php");
        } else {
            echo "Verkeerde gebruikersnaam en/of wachtwoord";
        }
    } else {
        echo "$message";
    }
}
?>