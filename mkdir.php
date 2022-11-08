<?php
include "sesja/header.php";
$dir = $_GET['dir'];
if (isset($_GET['lokacja'])) {
    $user = $user . "/" . $_GET['lokacja'];
    mkdir("/home/virtualki/220482/labs/z5/users/$user/$dir");
    $lokacja = $_GET['lokacja'];
    header("Location: exploredir.php?location=$lokacja");
} else {
    mkdir("/home/virtualki/220482/labs/z5/users/$user/$dir");
    header("Location: exploredir.php");
}