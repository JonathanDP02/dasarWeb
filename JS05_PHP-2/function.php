<?php
function perkenalan($nama, $salam="Assalamualaikum") {
    echo $salam.", ";
    echo "Perkenalkan, nama saya ".$nama."<br>";
    echo "Senang berkenalan dengan Anda<br>";
}

perkenalan("Jonathan", "Hallo");

echo "<hr>";

$saya = "Jonathan";
$ucapanSalam = "Selamat pagi";

perkenalan($saya);
?>