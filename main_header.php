<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title> Musiał Radosław </title>
</head>

<BODY>
    PROJEKTOWANIE APLIKACJI SIECIOWYCH
    Musiał Radosław<br>
    <?php
    session_start();
    if (!isset($_SESSION['loggedin'])) {
        if (isset($_GET['pleaselogin'])) {
            echo '<p style="color:red">MUSISZ BYC ZALOGOWANY ABY PRZEGLĄDAĆ POZOSTAŁE ZAKŁADKI.<br></p>';
        }
        if (isset($_GET['badcredentials'])) {
            echo '<p style="color:red">BŁĘDNE DANE LOGOWANIA.<br></p>';
        }
        session_unset();
        include 'sesja/logowanie.php';
    } else {
        include 'sesja/zalogowany.php';
    }
    ?>
</BODY>

</HTML>