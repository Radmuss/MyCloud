<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title> Radosław Musiał </title>
</head>

<BODY>
    <?php

    //declare(strict_types=1); // włączenie typowania zmiennych w PHP >=7
    session_start(); // zapewnia dostęp do zmienny sesyjnych w danym pliku
    echo "Jestem zalogowany <br>";
    echo "Użytkownik: ";
    echo $_SESSION['username'];
    ?>
    <a href="https://radek0109.beep.pl/z5/sesja/logout.php"><br>Log out<br></a>
    <a href="https://radek0109.beep.pl/z5/index.php"><br>Strona główna<br></a>
</BODY>

</HTML>