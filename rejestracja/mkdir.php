<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title> Musiał Radosław </title>
</head>

<BODY>
    PROJEKTOWANIE APLIKACJI SIECIOWYCH
    Musiał Radosław<br>
    <?php
    session_start(); // zapewnia dostęp do zmienny sesyjnych w danym pliku
    if (!isset($_SESSION['loggedin'])) {
        header("Location: index.php/?pleaselogin=true");
        exit();
    }



    ?>

    </form>

</BODY>

</HTML>