<?php
//Checking for all the times if there taken
include_once "vars.php";
foreach ($times as $takentimes) {
    // Timecheck 9:00
    if ($takentimes["times"] == $time1 || $takentimes["times2"] == $secondtime1 || $takentimes["times3"] == $thirdtime1) {
        $show1 = false;
    }
    if ($takentimes["times"] == $time2) {
        $show2 = false;
    }
    if ($takentimes["times"] == $time3) {
        $show3 = false;
    }
    if ($takentimes["times"] == $time4) {
        $show4 = false;
    }
    if ($takentimes["times"] == $time5) {
        $show5 = false;
    }
    if ($takentimes["times"] == $time6) {
        $show6 = false;
    }
    if ($takentimes["times"] == $time7) {
        $show7 = false;
    }
    if ($takentimes["times"] == $time8) {
        $show8 = false;
    }
    if ($takentimes["times"] == $time9) {
        $show9 = false;
    }
    if ($takentimes["times"] == $time10) {
        $show10 = false;
    }
    if ($takentimes["times"] == $time11) {
        $show11 = false;
    }
    if ($takentimes["times"] == $time12) {
        $show12 = false;
    }
    if ($takentimes["times"] == $time13) {
        $show13 = false;
    }
    if ($takentimes["times"] == $time14) {
        $show14 = false;
    }
    if ($takentimes["times"] == $time15) {
        $show15 = false;
    }
    if ($takentimes["times"] == $time16) {
        $show16 = false;
    }
}