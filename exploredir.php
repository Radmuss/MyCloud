<?php
include "sesja/header.php";

?>
<!DOCTYPE html>
<html>

<head>
    <script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>

</head>

<style>
.image-upload>input {
    display: none;
}

.image-upload img {
    width: 80px;
    cursor: pointer;
}
</style>

<body>

    <div class="image-upload">
        <label for="fileToUpload">
            <img src="ikony/upload.png" />
        </label>

        <input id="file-input" type="file" />
        <form id="form" action="uploadfile.php" method="post" enctype="multipart/form-data">
            <input type="file" name="fileToUpload" id="fileToUpload" style="display:none">
        </form>
    </div>


    <script>
    document.getElementById("fileToUpload").onchange = function() {
        document.getElementById("form").submit();
    }
    </script>

    <?php

    $dir = $_SESSION['d_directory'];
    $u_dir = $_SESSION['e_directory'];
    // $files1 = scandir($dir);
    $files2 = array_diff(scandir($dir), array('..', '.'));

    // print_r($files1);
    // print_r($files2);
    echo "Twoje pliki:<br>";
    foreach ($files2 as $i => $value) {
        echo "<a href=\"https://radek0109.beep.pl/z5/$u_dir/$files2[$i]\">$files2[$i]<br></a>";
    }
    ?>

</body>

</html>