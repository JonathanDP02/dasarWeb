<?php
$a = 10;
$b = 5;

$hasilTambah = $a + $b;
$hasilKurang = $a - $b;
$hasilKali = $a * $b;
$hasilBagi = $a / $b;
$sisaBagi = $a % $b;
$hasilPangkat = $a ** $b;
$hasilSama = $a == $b;
$hasilTidakSama = $a != $b;
$hasilLebihKecil = $a < $b;
$hasilLebihBesar = $a > $b;
$hasilLebihKecilSama = $a <= $b;
$hasilLebihBesarSama = $a >= $b;
$hasilAnd = $a && $b;
$hasilOr = $a || $b;
$hasilNotA = !$a;
$hasilNotB = !$b;
$hasilTambahSama = $a += $b;
$hasilKurangSama = $a -= $b;
$hasilKaliSama = $a *= $b;
$hasilBagiSama = $a /= $b;
$sisaBagiSama = $a %= $b;
$hasilIdentik = $a === $b;
$hasilTidakIdentik = $a !== $b;

echo "Hasil penjumlahan $a + $b = $hasilTambah <br>";
echo "Hasil pengurangan $a - $b = $hasilKurang <br>";
echo "Hasil perkalian $a * $b = $hasilKali <br>";
echo "Hasil pembagian $a / $b = $hasilBagi <br>";
echo "Hasil sisa bagi $a % $b = $sisaBagi <br>";
echo "Hasil pangkat $a ** $b = $hasilPangkat <br>";
echo "Apakah $a sama dengan $b? " . ($hasilSama ? 'true' : 'false') . "<br>";
echo "Apakah $a tidak sama dengan $b? " . ($hasilTidakSama ? 'true' : 'false') . "<br>";
echo "Apakah $a lebih kecil dari $b? " . ($hasilLebihKecil ? 'true' : 'false') . "<br>";
echo "Apakah $a lebih besar dari $b? " . ($hasilLebihBesar ? 'true' : 'false') . "<br>";
echo "Apakah $a lebih kecil atau sama dengan $b? " . ($hasilLebihKecilSama ? 'true' : 'false') . "<br>";
echo "Apakah $a lebih besar atau sama dengan $b? " . ($hasilLebihBesarSama ? 'true' : 'false') . "<br>";
echo "Hasil AND $a && $b = " . ($hasilAnd ? 'true' : 'false') . "<br>";
echo "Hasil OR $a || $b = " . ($hasilOr ? 'true' : 'false') . "<br>";
echo "Hasil NOT !$a = " . ($hasilNotA ? 'true' : 'false') . "<br>";
echo "Hasil NOT !$b = " . ($hasilNotB ? 'true' : 'false') . "<br>";
echo "Hasil tambah sama $a += $b = $hasilTambahSama <br>";
echo "Hasil kurang sama $a -= $b = $hasilKurangSama <br>";
echo "Hasil kali sama $a *= $b = $hasilKaliSama <br>";
echo "Hasil bagi sama $a /= $b = $hasilBagiSama <br>";
echo "Hasil sisa bagi sama $a %= $b = $sisaBagiSama <br>";
echo "Apakah $a identik dengan $b? " . ($hasilIdentik ? 'true' : 'false') . "<br>";
echo "Apakah $a tidak identik dengan $b? " . ($hasilTidakIdentik ? 'true' : 'false') . "<br>";
echo "<br>";

?>