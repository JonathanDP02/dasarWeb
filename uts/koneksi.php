<?php
// ==== KONEKSI KE POSTGRES ====
$host = "localhost";
$port = "5432";
$dbname = "onic_esports";
$user = "postgres";
$password = "02122005";

$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");
if (!$conn) {
    die("Koneksi ke database gagal: " . pg_last_error());
}
?>