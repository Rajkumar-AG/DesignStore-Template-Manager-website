<?php
session_start();
include '../config.php';
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    if ($user === 'admin' && $pass === 'admin123') {
        $_SESSION['admin'] = true;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid login credentials!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin Login - RK</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      background: #f0f4f8;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .login-box {
      background: white;
      padding: 2rem;
      border-radius: 12px;
      box-shadow: 0 6px 12px rgba(0,0,0,0.1);
      width: 100%;
      max-width: 400px;
    }
    .login-box h2 {
      text-align: center;
      color: #0d0d2b;
    }
    form {
      margin-top: 2rem;
    }
    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 0.75rem;
      margin-bottom: 1rem;
      border-radius: 6px;
      border: 1px solid #ccc;
      font-size: 1rem;
    }
    button {
      width: 100%;
      padding: 0.75rem;
      background: #009dff;
      color: white;
      font-size: 1rem;
      border: none;
      border-radius: 8px;
      cursor: pointer;
    }
    .error {
      color: red;
      text-align: center;
      margin-bottom: 1rem;
    }
    .back-link {
      display: block;
      text-align: center;
      margin-top: 1rem;
      color: #009dff;
      text-decoration: none;
    }
  </style>
</head>
<body>
  <div class="login-box">
    <h2>Admin Login</h2>
    <?php if ($error): ?>
      <p class="error"><?= $error ?></p>
    <?php endif; ?>
    <form method="POST">
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Login</button>
    </form>
    <a class="back-link" href="../index.php">← Back to Home</a>
  </div>
</body>
</html>
