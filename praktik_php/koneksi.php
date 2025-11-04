<?php
$koneksi = mysqli_connect("localhost", "root", "", "prakwebdb");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$sql = "CREATE TABLE user (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(100) NOT NULL
)";

$username = "admin";
$password = md5("12345");

$sql = "INSERT INTO user (username, password) VALUES ('$username', '$password')";
if (mysqli_query($koneksi, $sql)) {
    echo "Tabel user berhasil dibuat";
} else {
    echo "Error membuat tabel: " . mysqli_error($koneksi);
}

mysqli_close($koneksi);
?>
