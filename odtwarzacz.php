<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title> Musiał Radosław </title>
</head>

<style>
.odtwarzacz img {
    max-height: 80px;
    width: max-content;
    cursor: default;
}

.odtwarzacz video {
    max-width: 200px;
    height: max-content;
}

.odtwarzacz audio {
    max-height: 20px;
}
</style>


<BODY>
    <div class="odtwarzacz">
        <?php
        session_start(); // zapewnia dostęp do zmienny sesyjnych w danym pliku
        $user = $_SESSION['username'];
        if (!isset($_SESSION['loggedin'])) {
            header("Location: index.php/?pleaselogin=true");
            exit();
        }
        $pliczek = $u_dir . "/" . $files2[$i];
        // echo $pliczek;
        $imageFileType = strtolower(pathinfo($pliczek, PATHINFO_EXTENSION));
        if (getimagesize($pliczek) == true) {
            $file = "<img src=\"$pliczek\" >";
            // echo "Fotka";
        } elseif ($imageFileType == "mp3") {
            // echo "mp3";
            $file = "<audio controls>\n<source src=\"$pliczek\" type='audio/mpeg'>\n</audio>";
        } elseif ($imageFileType == "mp4") {
            // echo "mp4";
            $file = "<video muted controls>\n<source src=\"$pliczek\" type=\"video/mp4\">";
        } else $file = null;
        echo $file;
        ?>
    </div>

</BODY>

</html>