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
    <?php
    function ip_details($ip)
    {
        $json = file_get_contents("http://ipinfo.io/{$ip}/geo");
        $details = json_decode($json);
        return $details;
    }
    $username = $_SESSION['username'];

    if (!isset($_COOKIE['ip'])) {
        // header("Location: historia.php");
        echo "Cookie IP doesn't exist";
        echo "<a href=\"https://radek0109.beep.pl/z5/index.php\"><br>Strona główna<br></a>";
        exit;
    }
    include "../BD.php";
    $ipdoBD = $_COOKIE['ip'];

    $browser = $_COOKIE['browser'];
    $details = ip_details($ipdoBD);

    $lokalizacja = "$details->country, $details->region, $details->city";
    $coordinates = $details->loc;

    $screen_size = "{$_COOKIE['screenwidth']}x{$_COOKIE['screenheight']}";
    $window_size = "{$_COOKIE['width']}x{$_COOKIE['height']}";
    $colors = $_COOKIE['colors'];
    $lang = $_COOKIE['lang'];
    $java = $_COOKIE['java'];
    $cookies = $_COOKIE['cookies'];
    mysqli_query($link, "SET NAMES 'utf8'"); // ustawienie polskich znaków
    mysqli_query(
        $link,
        "INSERT INTO `goscieportalu` (username, coordinates, localization, ipaddress, browser, window_size, screen_size, colors, lang, java, cookies) VALUES ('$username','$coordinates','$lokalizacja', '$ipdoBD','$browser', 
    '$window_size', '$screen_size', '$colors', '$lang', '$java', '$cookies')"
    ); // dodanie wiersza do bazy danych
    echo "{$_COOKIE['width']} x {$_COOKIE['height']}<br>";
    echo "{$_COOKIE['screenwidth']}<br>";
    echo "{$_COOKIE['screenheight']}<br>";
    echo "{$_COOKIE['colors']}<br>";
    echo "{$_COOKIE['lang']}<br>";
    echo "{$_COOKIE['java']}<br>";
    echo "{$_COOKIE['cookies']}<br>";
    header("Location: historia.php");
    ?>

</BODY>

</HTML>