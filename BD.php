<?php
$dbhost = "mysql02.radek0109.beep.pl";
$dbuser = "radek0109z5";
$dbpassword = "haslo";
$dbname = "zadanie5-studia";
$link = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
mysqli_query($link, "SET NAMES 'utf8'");
if (!$link) {
    echo "Błąd połączenia z MySQL." . PHP_EOL;
    echo "Errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}