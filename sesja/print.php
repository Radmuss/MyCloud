<?php
// include "../header.php";
?>

<html>

<body>

    <script>
    if (localStorage.getItem("attempts") === null) {
        localStorage.setItem("attempts", 0);
        document.getElementById("dupa").innerHTML = 'dupa'
    } else {
        var attempts = parseInt(localStorage.getItem("attempts"));
        localStorage.setItem("attempts", ++attempts);
    }

    if (localStorage.getItem('attempts') > 2) {
        document.cookie = "proby=" + true + "; max-age=1";
        localStorage.setItem("attempts", 0)
    }
    window.location.assign('badcredentials.php');
    </script>
</body>

</html>