<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title> Radosław Musiał </title>
</head>

<BODY>
    <?php
    if ($_POST['pass'] == $_POST['pass2']) { // sprawdzenie czy podana hasła są identyczne
        $user = htmlentities($_POST['user'], ENT_QUOTES, "UTF-8"); // rozbrojenie potencjalnej bomby w zmiennej $user
        $pass = htmlentities($_POST['pass'], ENT_QUOTES, "UTF-8"); // rozbrojenie potencjalnej bomby w zmiennej $pass
        include '../BD.php';
        $result = mysqli_query($link, "SELECT * FROM users WHERE username='$user'"); // poszukiwanie wiersza, w którym login=login z formularza
        $rekord = mysqli_fetch_array($result); // wiersza z BD, struktura zmiennej jak w BD 
        if (!$rekord) { //Jeśli brak, to rejestrujemy
            mkdir("/home/virtualki/220482/labs/z5/users/$user");
            mysqli_query($link, "INSERT INTO users (username, password, directory) VALUES ('$user', '$pass', '/home/virtualki/220482/labs/z5/users/$user')"); // dodanie wiersza do bazy danych
            echo nl2br("Zarejestrowano pomyślnie, możesz się zalogować.\n");
            echo '<a href="https://radek0109.beep.pl/z5/index.php">Logowanie</a>';
            exit;
        } else { // Jeśli rekord istnieje to wyświetl komunikat
            echo "Użytkownik o takim loginie już istnieje";
            echo '<br><a href="https://radek0109.beep.pl/z5/rejestracja/rejestruj.php">Spróbuj ponownie - powrót do rejestracji<br></a>';
            echo '<a href="https://radek0109.beep.pl/z5/index.php">Logowanie</a>';
            exit;
        }
    } else { // Jeśli hasła nie są jednakowe to zakomunikuj to
        echo "Wprowadzone hasła nie są jednakowe.";
        echo '<br><a href="https://radek0109.beep.pl/z5/rejestracja/rejestruj.php">Spróbuj ponownie - powrót do rejestracji</a>';
        echo '<a href="https://radek0109.beep.pl/z5/index.php"><br>Logowanie</a>';
        exit();
    }


    ?>
</BODY>

</HTML>