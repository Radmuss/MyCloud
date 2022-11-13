<?php
include "../header.php";
include "../BD.php";
echo "<a href=\"https://radek0109.beep.pl/z5/exploredir.php\">moje pliki<br></a>";
echo "<br><br>Historia logowania do portalu: <br>";
$rezultat = mysqli_query($link, "SELECT * FROM goscieportalu ORDER BY id DESC") or die("Błąd zapytania do bazy: $dbname");
print "<TABLE CELLPADDING=5 BORDER=1>";
print "<TR><TD>id</TD><TD>Użytkownik</TD><TD>IP</TD><TD>Data</TD><TD>Lokalizacja</TD><TD>Współrzędne</TD><TD>Google Maps</TD><TD>Browser</TD><TD>Rozdzielczość okna</TD><TD>Rozdzielczość ekranu </TD><TD>Ilość kolorów</TD><TD>Język</TD><TD>Zezwolenie na Jave</TD><TD>Zezwolenie na ciasteczka</TD></TR>\n";
while ($wiersz = mysqli_fetch_array($rezultat)) {
    $id = $wiersz[0];
    $datetime = $wiersz[1];
    $username = $wiersz[2];
    $loc = $wiersz[3];
    $lokalizacja = $wiersz[4];
    $ipaddress = $wiersz[5];
    $browser = $wiersz[6];
    $windows_size = $wiersz[7];
    $screen_size = $wiersz[8];
    $colors = $wiersz[9];
    $lang = $wiersz[10];
    $java = $wiersz[11];
    $cookies = $wiersz[12];
    print "<TR><TD>$id</TD><TD>$username</TD><TD>$ipaddress</TD><TD>$datetime</TD><TD>$lokalizacja</TD><TD>$loc</TD><TD><a href='https://www.google.pl/maps/place/$loc' target='_blank'>LINK</a></TD><TD>$browser</TD><TD>$windows_size</TD><TD>$screen_size</TD><TD>$colors</TD><TD>$lang</TD><TD>$java</TD><TD>$cookies</TD></TR>\n";
}
print "</TABLE>";
mysqli_close($link);