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
  <title>Login | ONIC Esports</title>
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

    .login-container {
      display: flex;
      height: 100vh;
    }

    /* Gambar 3/4 layar */
    .login-image {
      flex: 3; /* dulu 1, sekarang 3x lebih besar */
      background: url('robot.jpg') no-repeat center center/cover;
      background-size: cover;
    }

    /* Form 1/4 layar */
    .login-form {
      flex: 1; /* jadi 1/4 dari layar */
      background-color: #0a0a0a;
      color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      padding: 50px;
    }

    .login-form h2 {
      font-weight: 700;
      margin-bottom: 10px;
    }

    .login-form p {
      color: #aaa;
      margin-bottom: 30px;
    }

    .form-control {
      border-radius: 25px;
      padding: 10px 20px;
      margin-bottom: 15px;
      border: none;
    }

    .btn-login {
      width: 100%;
      border-radius: 25px;
      background: linear-gradient(90deg, #ffaa00, #ffcc33);
      border: none;
      font-weight: bold;
      color: #000;
    }

    .btn-login:hover {
      background: linear-gradient(90deg, #ffcc33, #ffaa00);
    }

    .social-buttons {
      display: flex;
      justify-content: center;
      gap: 10px;
      margin-top: 20px;
    }

    .social-buttons button {
      border: none;
      border-radius: 50%;
      width: 40px;
      height: 40px;
      background: #1f1f1f;
      color: white;
      font-size: 18px;
      transition: all 0.3s ease;
    }

    .social-buttons button:hover {
      background: #ffaa00;
      color: #000;
      transform: scale(1.1);
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

  <div class="login-container">
    <div class="login-image"></div>
    <div class="login-form text-center">
      <h2>Hello SONIC</h2>
      <p>Welcome to Onic</p>

        <form method="POST">
        <input type="username" name="username" class="form-control" placeholder="Username" required>
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <button type="submit" name="login" class="btn btn-login mt-2">Sign In</button>
        </form>


      <?php if (!empty($error)) echo "<p class='text-danger mt-3'>$error</p>"; ?>

      <div class="register-text">
        Don't have an account? <a href="register.php">Create Account</a>
      </div>
    </div>
  </div>

</body>
</html>
