<?php
$connect = mysqli_connect("localhost", "root", "", "prakwebdb");

if (!$connect) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// $sql = "CREATE TABLE user (
//     id INT(11) AUTO_INCREMENT PRIMARY KEY,
//     username VARCHAR(50) NOT NULL,
//     password VARCHAR(100) NOT NULL
// )";

// $username = "admin";
// $password = ("123");
// $level= ("1");

// $username = "guest";
// $password = ("234");
// $level = ("2");

// $sql = "INSERT INTO user (username, password) VALUES ('$username', '$password')";

// if (mysqli_query($connect, $sql)) {
//     echo "Tabel user berhasil dibuat";
// } else {
//     echo "Error membuat tabel: " . mysqli_error($connect);
// }

?>
