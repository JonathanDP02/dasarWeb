<?php
include 'koneksi.php';
session_start();

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Cek apakah username sudah ada
    $check = pg_query($conn, "SELECT * FROM users WHERE username='$username'");
    if (pg_num_rows($check) > 0) {
        $error = "Username sudah digunakan!";
    } else {
        $insert = pg_query($conn, "INSERT INTO users (username, password) VALUES ('$username', '$password')");
        if ($insert) {
            $_SESSION['success'] = "Registrasi berhasil, silakan login!";
            header("Location: login.php");
            exit;
        } else {
            $error = "Terjadi kesalahan saat menyimpan data!";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body class="bg-light">
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-4">
      <div class="card shadow p-4">
        <h3 class="text-center mb-3">Register</h3>
        <?php if (!empty($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
        <form method="POST">
          <div class="mb-3">
            <label>Username</label>
            <input type="text" name="username" class="form-control" required>
          </div>
          <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
          </div>
          <button type="submit" name="register" class="btn btn-primary w-100">Daftar</button>
          <p class="text-center mt-3">Sudah punya akun? <a href="login.php">Login</a></p>
        </form>
      </div>
    </div>
  </div>
</div>
</body>
</html>
