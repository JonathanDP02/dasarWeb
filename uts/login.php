<?php
include 'koneksi.php';
session_start();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = pg_query($conn, "SELECT * FROM users WHERE username='$username'");
    $data = pg_fetch_assoc($query);


    if ($data && password_verify($password, $data['password'])) {
        $_SESSION['user'] = $data['username'];
        header("Location: revisi_uts.php");
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body class="bg-light">
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-4">
      <div class="card shadow p-4">
        <h3 class="text-center mb-3">Login</h3>
        <?php if (!empty($_SESSION['success'])) { echo "<div class='alert alert-success'>".$_SESSION['success']."</div>"; unset($_SESSION['success']); } ?>
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
          <button type="submit" name="login" class="btn btn-success w-100">Masuk</button>
          <p class="text-center mt-3">Belum punya akun? <a href="register.php">Daftar</a></p>
        </form>
      </div>
    </div>
  </div>
</div>
</body>
</html>
