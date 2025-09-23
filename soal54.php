<?php
$daftarNilai = [
    ['Alice', 85],
    ['Bob', 92],
    ['Charlie', 78],
    ['David', 64],
    ['Eva', 90],
];

$totalNilai = 0;
foreach ($daftarNilai as $siswa) {
    $totalNilai += $siswa[1];
}

$rataRata = $totalNilai / count($daftarNilai);

echo "Rata-rata kelas: $rataRata <br>";
echo "Daftar siswa dengan nilai di atas rata-rata:<br>";

foreach ($daftarNilai as $siswa) {
    if ($siswa[1] > $rataRata) {
        echo "Nama: {$siswa[0]}, Nilai: {$siswa[1]} <br>";
    }
}
?>
