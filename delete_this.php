<?php
include "sesja/header.php";

$target_dir = $_SESSION['e_directory'];
// if (isset($_GET['location'])) {
//     $location = $_GET['location'];
//     $target_dir = $target_dir . "/" . $location;
// }
echo $target_dir;
$todelete = $_GET['thing_to_delete'];
echo $todelete;
$plik = $target_dir . "/" . $todelete;

if (is_dir($plik) && is_dir_empty($plik)) {
    rmdir($plik);
    GoToDir();
} elseif (is_dir($plik) && !is_dir_empty($plik)) {
    if (isset($_GET['sure'])) {
        deleteDir($plik);
        GoToDir();
    } else {
        $uri = $_SERVER['REQUEST_URI'];
        echo "Katalog nie jest pusty, czy chcesz usunąć go razem z zawartością?<br>";
        echo "<a href='$uri&sure=true'>TAK    </a>";
        if (isset($_GET['location'])) {
            echo "<a href='https://radek0109.beep.pl/z5/exploredir.php?location=$location'>NIE<br></a>";
        } else echo "<a href='https://radek0109.beep.pl/z5/exploredir.php'>NIE<br></a>";
    }
} else {
    unlink($plik);
    GoToDir();
}


function deleteDir($dirPath)
{
    if (!is_dir($dirPath)) {
        throw new InvalidArgumentException("$dirPath must be a directory");
    }
    if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
        $dirPath .= '/';
    }
    $files = glob($dirPath . '*', GLOB_MARK);
    foreach ($files as $file) {
        if (is_dir($file)) {
            deleteDir($file);
        } else {
            unlink($file);
        }
    }
    rmdir($dirPath);
}
function is_dir_empty($dir)
{
    if (!is_readable($dir)) return null;
    return (count(scandir($dir)) == 2);
}

function GoToDir()
{

    if (isset($_GET['location'])) {
        $location = $_GET['location'];
        header("Location: exploredir.php?location=$location");
    } else {
        header("Location: exploredir.php");
    }
}