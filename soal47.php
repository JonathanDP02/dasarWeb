<?php
$hargaProduk = 120000;
$diskon = 0;

if ($hargaProduk > 100000) {
    $diskon = 0.2 * $hargaProduk; // 20% dari harga
}

$hargaAkhir = $hargaProduk - $diskon;

echo "Harga produk: Rp $hargaProduk <br>";
echo "Diskon: Rp $diskon <br>";
echo "Harga yang harus dibayar: Rp $hargaAkhir";
?>
