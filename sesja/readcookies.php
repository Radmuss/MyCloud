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

    function get_browser_name($user_agent)
    {
        if (strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR/')) return 'Opera';
        elseif (strpos($user_agent, 'Edge')) return 'Edge';
        elseif (strpos($user_agent, 'Chrome')) return 'Chrome';
        elseif (strpos($user_agent, 'Safari')) return 'Safari';
        elseif (strpos($user_agent, 'Firefox')) return 'Firefox';
        elseif (strpos($user_agent, 'MSIE') || strpos($user_agent, 'Trident/7')) return 'Internet Explorer';

        return 'Other';
    }

    $ipaddress = $_SERVER["REMOTE_ADDR"];
    setcookie("ip", $ipaddress, time() + 10);
    setcookie("browser", Get_browser_name($_SERVER['HTTP_USER_AGENT']), time() + 10);
    ?>
    <script>
    document.cookie = "width=" + screen.width + "; max-age=10";
    document.cookie = "height=" + screen.height + "; max-age=10";
    document.cookie = "screenwidth=" + screen.availWidth + "; max-age=10";
    document.cookie = "screenheight=" + screen.availHeight + "; max-age=10";
    document.cookie = "colors=" + screen.colorDepth + "; max-age=10";
    document.cookie = "lang=" + navigator.language + "; max-age=10";
    document.cookie = "java=" + navigator.javaEnabled() + "; max-age=10";
    document.cookie = "cookies=" + navigator.cookieEnabled + "; max-age=10";
    window.location.assign('savetoBD.php');
    </script>

</BODY>

</HTML>