<div id="fb-root"></div>
<!--<script>(function (d, s, id) {-->
<!--        var js, fjs = d.getElementsByTagName(s)[0];-->
<!--        if (d.getElementById(id)) return;-->
<!--        js = d.createElement(s);-->
<!--        js.id = id;-->
<!--        js.src = "//connect.facebook.net/nl_NL/sdk.js#xfbml=1&version=v2.5";-->
<!--        fjs.parentNode.insertBefore(js, fjs);-->
<!--    }(document, 'script', 'facebook-jssdk'));</script>-->
<div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
        <a class="navbar-brand" href="../v1/index.php">Schoonheidssalon Tineke</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li>
                <a href="../v1/index.php">Home</a>
            </li>
            <li>
                <a href="../v1/over.php">Over</a>
            </li>
            <li>
                <a href="../v1/behandelingen.php">Behandelingen</a>
            </li>
            <li>
                <a href="../v1/reserveren.php">Reserveren</a>
            </li>
            <li>
                <a href="../v1/contact.php">Contact</a>
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Account</a>
                <ul class="dropdown-menu dropdown-user">
                    <li>
                        <?php if (isset($_SESSION["login"])) {
                        if ($_SESSION["login"] == "true") {
                        $user = $_SESSION["username"];
                        echo "Welkom $user";
                        if ($_SESSION['rank'] == "1"){
                        ?>
                    <li class="divider"></li>
                    <a href="myaccount.php">Mijn Gegevens</a>
                    <li class="divider"></li>
                    <a href="myreservations.php">Mijn Reserveringen</a>
                    <?php
                    }
                    elseif ($_SESSION['rank'] == "3") { ?>
                        <li class="divider"></li>
                        <a href="myaccount.php">Mijn Gegevens</a>
                        <li class="divider"></li>
                        <a href="users.php">Gebruikers</a>
                        <li class="divider"></li>
                        <a href="reservations.php">Reserveringen</a>
                    <?php } ?>
                    <li class="divider"></li>
                    <a href="logout.php">Log uit</a>
                    <?php }
                    } else { ?>
                        <div>
                            <form action="<?php $_SERVER['REQUEST_URI'] ?>" method="post">
                                <div class="form-group">
                                    <input type="text" name="username" class="form-control" id="login"
                                           placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="pass" class="form-control" id="pass"
                                           placeholder="Wachtwoord">
                                </div>
                                <li class="divider"></li>
                                <input type="submit" value="Login" name="submit">
                                <li class="divider"></li>
                                <a href="registreren.php">Registreren</a>
                            </form>
                        </div>
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
                            $id = mysqli_query($link, "SELECT id FROM members WHERE username = '$username' and password = '$pass1'");
                            $member_id = mysqli_fetch_assoc($id);
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
                                $_SESSION["member_id"] = $member_id["id"];
                                $_SESSION['rank'] = $row['status'];
                                echo '<meta http-equiv="refresh" content="0" />';
                            } else {
                                echo "Verkeerde gebruikersnaam en/of wachtwoord";
                            }
                        } else {
                            echo "$message";
                        }
                    }
                    ?>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>

    </div>
    <!-- /.navbar-collapse -->
</div>
<!-- /.container -->


