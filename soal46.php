<?php
$nilaiSiswa = [85, 92, 78, 64, 90, 75, 88, 79, 70, 96];

$totalNilai = 0;
foreach ($nilaiSiswa as $nilai) {
    $totalNilai += $nilai;
}

$max1 = $max2 = PHP_INT_MIN;
$min1 = $min2 = PHP_INT_MAX;

foreach ($nilaiSiswa as $nilai) {

    if ($nilai > $max1) {
        $max2 = $max1;
        $max1 = $nilai;
    } elseif ($nilai > $max2) {
        $max2 = $nilai;
    }

    if ($nilai < $min1) {
        $min2 = $min1;
        $min1 = $nilai;
    } elseif ($nilai < $min2) {
        $min2 = $nilai;
    }
}

$totalSetelahBuang = $totalNilai - ($max1 + $max2 + $min1 + $min2);

$rataRata = $totalSetelahBuang / (count($nilaiSiswa) - 4);

echo "Total nilai setelah mengabaikan 2 nilai tertinggi dan 2 nilai terendah adalah: $totalSetelahBuang <br>";
echo "Rata-rata nilai adalah: $rataRata";
?>
