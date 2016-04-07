<?php if (isset($_POST["submitdate"])) {
    if ($show1 == true) { ?>
        <form action="reserveren_overzicht.php" method="POST">
            <input type="hidden" value="<?= $number ?>" name="id">
            <input type="hidden" value="<?= $date ?>" name="date">
            <input type="hidden" value="9:00" name="time">
            <input type="hidden" value="<?php $secondtimehidden ?>" name="secondtimehidden">
            <input type="hidden" value="<?php $thirdtimehidden ?>" name="thirdtimehidden"
            <input type="submit" value=" 9:00 " name="timesubmit">
        </form>
        <?php }
    if ($show2 == true) { ?>
        <form action="reserveren_overzicht.php" method="POST">
            <input type="hidden" value="<?= $number ?>" name="id">
            <input type="hidden" value="<?= $date ?>" name="date">
            <input type="hidden" value="9:30" name="time">
            <input type="submit" value=" 9:30 " name="timesubmit">
        </form>
        <?php }
    if ($show3 == true) { ?>
        <form action="reserveren_overzicht.php" method="POST">
            <input type="hidden" value="<?= $number ?>" name="id">
            <input type="hidden" value="<?= $date ?>" name="date">
            <input type="hidden" value="10:00" name="time">
            <input type="submit" value="10:00" name="timesubmit">
        </form>
    <?php }
    if ($show4 = true) { ?>
        <form action="reserveren_overzicht.php" method="POST">
            <input type="hidden" value="<?= $number ?>" name="id">
            <input type="hidden" value="<?= $date ?>" name="date">
            <input type="hidden" value="10:30" name="time">
            <input type="submit" value="10:30" name="timesubmit">
        </form>
    <?php }
    if ($show5 == true) { ?>
        <form action="reserveren_overzicht.php" method="POST">
            <input type="hidden" value="<?= $number ?>" name="id">
            <input type="hidden" value="<?= $date ?>" name="date">
            <input type="hidden" value="11:00" name="time">
            <input type="submit" value="11:00" name="timesubmit">
        </form>
    <?php }
    if ($show6 == true) { ?>
        <form action="reserveren_overzicht.php" method="POST">
            <input type="hidden" value="<?= $number ?>" name="id">
            <input type="hidden" value="<?= $date ?>" name="date">
            <input type="hidden" value="11:30" name="time">
            <input type="submit" value="11:30" name="timesubmit">
        </form>
    <?php }
    if ($show7 == true) { ?>
        <form action="reserveren_overzicht.php" method="POST">
            <input type="hidden" value="<?= $number ?>" name="id">
            <input type="hidden" value="<?= $date ?>" name="date">
            <input type="hidden" value="12:00" name="time">
            <input type="submit" value="12:00" name="timesubmit">
        </form>
    <?php }
    if ($show8 = true) { ?>
        <form action="reserveren_overzicht.php" method="POST">
            <input type="hidden" value="<?= $number ?>" name="id">
            <input type="hidden" value="<?= $date ?>" name="date">
            <input type="hidden" value="12:30" name="time">
            <input type="submit" value="12:30" name="timesubmit">
        </form>
    <?php }
    if ($show9 == true) { ?>
        <form action="reserveren_overzicht.php" method="POST">
            <input type="hidden" value="<?= $number ?>" name="id">
            <input type="hidden" value="<?= $date ?>" name="date">
            <input type="hidden" value="13:00" name="time">
            <input type="submit" value="13:00" name="timesubmit">
        </form>
    <?php }
    if ($show10 == true) { ?>
        <form action="reserveren_overzicht.php" method="POST">
            <input type="hidden" value="<?= $number ?>" name="id">
            <input type="hidden" value="<?= $date ?>" name="date">
            <input type="hidden" value="13:30" name="time">
            <input type="submit" value="13:30" name="timesubmit">
        </form>
    <?php }
    if ($show11 == true) { ?>
        <form action="reserveren_overzicht.php" method="POST">
            <input type="hidden" value="<?= $number ?>" name="id">
            <input type="hidden" value="<?= $date ?>" name="date">
            <input type="hidden" value="14:00" name="time">
            <input type="submit" value="14:00" name="timesubmit">
        </form>
    <?php }
    if ($show12 = true) { ?>
        <form action="reserveren_overzicht.php" method="POST">
            <input type="hidden" value="<?= $number ?>" name="id">
            <input type="hidden" value="<?= $date ?>" name="date">
            <input type="hidden" value="14:30" name="time">
            <input type="submit" value="14:30" name="timesubmit">
        </form>
    <?php }
    if ($show13 == true) { ?>
        <form action="reserveren_overzicht.php" method="POST">
            <input type="hidden" value="<?= $number ?>" name="id">
            <input type="hidden" value="<?= $date ?>" name="date">
            <input type="hidden" value="15:00" name="time">
            <input type="submit" value="15:00" name="timesubmit">
        </form>
    <?php }
    if ($show14 == true) { ?>
        <form action="reserveren_overzicht.php" method="POST">
            <input type="hidden" value="<?= $number ?>" name="id">
            <input type="hidden" value="<?= $date ?>" name="date">
            <input type="hidden" value="15:30" name="time">
            <input type="submit" value="15:30" name="timesubmit">
        </form>
    <?php }
    if ($show15 == true) { ?>
        <form action="reserveren_overzicht.php" method="POST">
            <input type="hidden" value="<?= $number ?>" name="id">
            <input type="hidden" value="<?= $date ?>" name="date">
            <input type="hidden" value="16:00" name="time">
            <input type="submit" value="16:00" name="timesubmit">
        </form>
    <?php }
    if ($show16 = true) { ?>
        <form action="reserveren_overzicht.php" method="POST">
            <input type="hidden" value="<?= $number ?>" name="id">
            <input type="hidden" value="<?= $date ?>" name="date">
            <input type="hidden" value="16:30" name="time">
            <input type="submit" value="16:30" name="timesubmit">
        </form>
    <?php }
}
