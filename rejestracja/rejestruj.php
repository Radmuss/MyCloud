<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title> Radosław Musiał </title>
</head>

<BODY>
    <?php
    session_start(); // zapewnia dostęp do zmienny sesyjnych w danym pliku
    if (isset($_SESSION['loggedin'])) {
        echo "Wyloguj się jeśli chcesz rejestrować kolejne konto!";
        echo '<a href="https://radek0109.beep.pl/z5/sesja/logout.php"><br>Log out<br></a>';
        echo '<a href="https://radek0109.beep.pl/z5/index.php"><br>Strona główna</a>';
        exit();
    }
    ?>
    Formularz rejestracji użytkownika
    <form method="post" action="add.php">
        Login:<input type="text" name="user" maxlength="20" size="20"><br>
        Hasło:<input type="password" name="pass" maxlength="20" size="20"><br>
        Powtórz hasło:<input type="password" name="pass2" maxlength="20" size="20"><br>
        <input type="submit" value="Rejestruj" />
    </form>
    <a href="https://radek0109.beep.pl/z5/index.php"><br>Strona główna</a>
</BODY>

</HTML>