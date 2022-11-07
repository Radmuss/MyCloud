<?php
include "sesja/header.php";
// if(isset($_GET['dir'])){
//     $target_dir = "$_SESSION['e_directory'].$_GET['dir']"
// }
$target_dir = $_SESSION['e_directory'];
$target_file = $target_dir . "/" . basename($_FILES["fileToUpload"]["name"]);
if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " uploaded.";
    $file = $target_dir . "/" . htmlspecialchars(basename($_FILES['fileToUpload']['name']));
} else {
    echo "Plik nie został wrzucony, może po prostu nie został załączony do posta :))))";
    $file = null;
}