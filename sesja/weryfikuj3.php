<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title> Radosław Musiał </title>
</head>

<BODY>
    <?php




    $user = htmlentities($_POST['user'], ENT_QUOTES, "UTF-8"); // rozbrojenie potencjalnej bomby w zmiennej $user
    $pass = htmlentities($_POST['pass'], ENT_QUOTES, "UTF-8"); // rozbrojenie potencjalnej bomby w zmiennej $pass
    include '../BD.php';
    $result = mysqli_query($link, "SELECT * FROM users WHERE username='$user'"); // wiersza, w którym login=login z formularza
    $rekord = mysqli_fetch_array($result); // wiersza z BD, struktura zmiennej jak w BD 
    if (!$rekord) //Jeśli brak, to nie ma użytkownika o podanym loginie
    {
        mysqli_close($link); // zamknięcie połączenia z BD
        // header("Location: /z5/index.php/?badcredentials=true");
        header("Location: print.php");
        // echo "Brak użytkownika o takim loginie !"; // UWAGA nie wyświetlamy takich podpowiedzi dla hakerów
        // echo '<br><a href="https://radek0109.beep.pl/z5/rejestracja/rejestruj.php">Rejestracja<br></a>';
        // echo '<a href="https://radek0109.beep.pl/z5/index.php">Spróbuj ponownie - powrót do logowania</a>';
        exit;
    } else { // jeśli $rekord istnieje
        if ($rekord['password'] == $pass) // czy hasło zgadza się z BD
        {
            session_start(); //rozpoczęcie sesji logowania
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $user; //zapamiętanie nazwy użytkownika celem przedstawienia jej w następnym oknie
            $_SESSION['user_id'] = $rekord['id'];
            $_SESSION['e_directory'] = "users/$user";
            $_SESSION['d_directory'] = $rekord['directory'];
            header("Location: /z5/sesja/readcookies.php");
            exit();
        } else {
            // mysqli_query($link, "INSERT INTO users (username, password, directory) VALUES ('$user', '$pass', '/home/virtualki/220482/labs/z5/users/$user')"); // dodanie wiersza do bazy danych
            mysqli_close($link);
            header("Location: print.php");
            // header("Location: print.php");
            // header("Location: /z5/index.php/?badcredentials=true");
            echo "Błędne dane logowania - wprowadź je ponownie.";
            echo '<br><a href="https://radek0109.beep.pl/z5/rejestracja/rejestruj.php">Rejestracja<br></a>';
            echo '<a href="https://radek0109.beep.pl/z5/index.php">Spróbuj ponownie - powrót do logowania</a>';
            exit;
        }
    }
    ?>
</BODY>

</HTML>