<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">

</html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title> Musiał Radosław </title>
</head>

<BODY>
    Formularz logowania
    <form method="post" action="/z5/sesja/weryfikuj3.php">
        Login:<input type="text" name="user" maxlength="20" size="20"><br>
        Hasło:<input type="password" name="pass" maxlength="20" size="20"><br>
        <input type="submit" name="Loguj" value="Loguj" id="Button" style="display:none">
    </form>
    <?php
    $ipaddress = $_SERVER["REMOTE_ADDR"];
    // echo $ipaddress;
    include "BD.php";
    $result = mysqli_query($link, "SELECT * FROM break_ins AS difference WHERE TIMESTAMPDIFF(SECOND, datetime, CURRENT_TIMESTAMP)<=60;"); // wiersza, w którym login=login z formularza
    $rekord = mysqli_fetch_array($result); // wiersza z BD, struktura zmiennej jak w BD 
    if (!isset($rekord['datetime'])) {
        echo "<script>document.getElementById('Button').style.display = 'inline'</script>";
        mysqli_close($link); // zamknięcie połączenia z BD
    } else {
        echo '<p style="color:red">PRZEKROCZONO LIMIT PRÓB LOGOWANIA, ODCZEKAJ 5 SEKUND.<br></p>';
        echo     "<script>
        setTimeout(showStuff, 5000);
        function showStuff(Button){
            document.getElementById('Button').style.display = 'inline';
        }
        </script>";
        mysqli_close($link);
    }
    // $now = new DateTime();
    // echo date("Y-m-d h:i:s");
    // $date = date_create(date("Y-m-d h:i:s"));
    // $interval = date_diff($date, date_create($rekord['datetime']));
    // echo $interval->format('%R%a days');
    // print_r($rekord);

    ?>
    <a href="https://radek0109.beep.pl/z5/rejestracja/rejestruj.php">Rejestracja<br> </a>
</BODY>

</HTML>