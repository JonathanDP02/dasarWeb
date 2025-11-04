<?php
// ==== KONEKSI KE POSTGRES ====
$host = "localhost";
$port = "5432";
$dbname = "onic_esports";
$user = "postgres";
$password = "02122005"; // Catatan: Menyimpan password di sini tidak aman untuk produksi

$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");
if (!$conn) {
    // Tampilkan error yang lebih spesifik
    die("Koneksi ke database gagal: " . pg_last_error());
}
?>