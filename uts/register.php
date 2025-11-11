<?php
include 'koneksi.php';
session_start();

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];

    if ($password === $confirm) {
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO users (username, password) VALUES ('$username', '$hashed')";
        $result = pg_query($conn, $query);

        if ($result) {
            echo "<script>alert('Registrasi berhasil! Silakan login.'); window.location='login.php';</script>";
        } else {
            echo "<script>alert('Terjadi kesalahan saat menyimpan data.');</script>";
        }
    } else {
        $error = "Password tidak cocok!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register | ONIC Esports</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Poppins', sans-serif;
      height: 100vh;
      background-color: #000;
      overflow: hidden;
    }

    .register-container {
      display: flex;
      height: 100vh;
    }

    .register-image {
      flex: 3;
      background: url('onicbg.png') no-repeat center center/cover;
      background-size: cover;
    }

    .register-form {
      flex: 1;
      background-color: #0a0a0a;
      color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      padding: 50px;
    }

    .register-form h2 {
      font-weight: 700;
      margin-bottom: 10px;
    }

    .register-form p {
      color: #aaa;
      margin-bottom: 30px;
    }

    .form-control {
      border-radius: 25px;
      padding: 10px 20px;
      margin-bottom: 15px;
      border: none;
    }

    .btn-register {
      width: 100%;
      border-radius: 25px;
      background: linear-gradient(90deg, #ffaa00, #ffcc33);
      border: none;
      font-weight: bold;
      color: #000;
    }

    .btn-register:hover {
      background: linear-gradient(90deg, #ffcc33, #ffaa00);
    }

    .register-text {
      margin-top: 20px;
      color: #aaa;
    }

    .register-text a {
      color: #ffaa00;
      text-decoration: none;
      font-weight: bold;
    }

    .register-text a:hover {
      text-decoration: underline;
    }

  </style>
</head>
<body>

  <div class="register-container">
    <div class="register-image"></div>
    <div class="register-form text-center">
      <h2>Create Account</h2>
      <p>Join the SONIC comunity</p>

      <form method="POST">
        <input type="text" name="username" class="form-control" placeholder="Username" required>
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <input type="password" name="confirm" class="form-control" placeholder="Confirm Password" required>
        <button type="submit" name="register" class="btn btn-register mt-2">Register</button>
      </form>

      <?php if (!empty($error)) echo "<p class='text-danger mt-3'>$error</p>"; ?>

      <div class="register-text">
        Already have an account? <a href="login.php">Sign In</a>
      </div>
    </div>
  </div>

</body>
</html>
