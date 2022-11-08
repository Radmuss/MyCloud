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
    float: left;
}

.back img {
    width: 80px;
    cursor: pointer;
    float: left;
}

.pliczki {
    clear: both;
}
</style>

<body>

    <div class="image-upload">
        <label for="fileToUpload">
            <img src="ikony/upload.png" />
        </label>

        <input id="file-input" type="file" />
        <form id="form" action="uploadfile.php" method="post" enctype="multipart/form-data"><input type="file"
                name="fileToUpload" id="fileToUpload" style="display:none">
            <?php
            if (isset($_GET['location'])) {
                $lokacja = $_GET['location'];
                echo "<input type='text' value='$lokacja' name='lokacja' style='display:none'>";
            }
            ?>
        </form>
    </div>
    <?php
    $dir = $_SESSION['d_directory'];
    $u_dir = $_SESSION['e_directory'];
    if (isset($_GET['location'])) {
        $dir = $dir . "/" . $_GET['location'];
        $u_dir = $u_dir . "/" . $_GET['location'];
        $lokacja = $_GET['location'];
        include "popup.php";
        $back = explode("/", $_GET['location']);
        array_pop($back);
        if (count($back) < 1) {
            echo " <div class='back'>
            <a href='https://radek0109.beep.pl/z5/exploredir.php'><label>
            <img src='ikony/levelup.png'>
        </label> </a></div>";
        } else {
            $back = implode("/", $back);
            echo "<div class='back'>
            <a href='https://radek0109.beep.pl/z5/exploredir.php?location=$back'<label>
            <img src='ikony/levelup.png'>
        </label> </a></div>";
            // echo $back;
        }
    } else {
        include "popup.php";
    }



    // print_r(explode("/", $_GET['location']));
    // print_r($back);

    ?>



    <script>
    document.getElementById("fileToUpload").onchange = function() {
        document.getElementById("form").submit();
    }
    </script>
    <div class="pliczki">
        <?php
        $dir = $_SESSION['d_directory'];
        $u_dir = $_SESSION['e_directory'];
        if (isset($_GET['location'])) {
            $dir = $dir . "/" . $_GET['location'];
            $u_dir = $u_dir . "/" . $_GET['location'];
        }

        // $files1 = scandir($dir);
        $files2 = array_diff(scandir($dir), array('..', '.'));

        // print_r($files1);
        // print_r($files2);

        echo "Twoje pliki:<br>";

        if (isset($_GET['location'])) {
            foreach ($files2 as $i => $value) {
                $sciezka = $dir . "/" . $files2[$i];
                if (is_dir($sciezka)) {
                    echo "<a href=\"https://radek0109.beep.pl/z5/exploredir.php?location=$lokacja/$files2[$i]\">$files2[$i]<br></a>";
                } else {
                    echo "<a href=\"https://radek0109.beep.pl/z5/$u_dir/$files2[$i]\">$files2[$i]<br></a>";
                }
            }
        } else {

            foreach ($files2 as $i => $value) {
                $sciezka = $dir . "/" . $files2[$i];
                if (is_dir($sciezka)) {
                    echo "<a href=\"https://radek0109.beep.pl/z5/exploredir.php?location=$files2[$i]\">$files2[$i]<br></a>";
                } else {
                    echo "<a href=\"https://radek0109.beep.pl/z5/$u_dir/$files2[$i]\">$files2[$i]<br></a>";
                }
            }
        }
        // foreach ($files2 as $i => $value) {
        //     $sciezka = $dir . "/" . $files2[$i];
        //     if (is_dir($sciezka)) {
        //         echo "<a href=\"https://radek0109.beep.pl/z5/exploredir.php?location=$files2[$i]\">$files2[$i]<br></a>";
        //     } else {
        //         echo "<a href=\"https://radek0109.beep.pl/z5/$u_dir/$files2[$i]\">$files2[$i]<br></a>";
        //     }
        // }
        ?>
    </div>

</body>

</html>