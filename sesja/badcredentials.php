<?php


if ($_COOKIE['proby']) {
    $ipaddress = $_SERVER["REMOTE_ADDR"];
    include "../BD.php";
    mysqli_query($link, "INSERT INTO break_ins (ip) VALUES ('$ipaddress')"); // dodanie wiersza do bazy danych
}
header("Location: /z5/index.php/?badcredentials=true");