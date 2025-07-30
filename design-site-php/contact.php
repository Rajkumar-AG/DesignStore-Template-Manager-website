<?php
include 'config.php';
$msg = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $conn->real_escape_string($_POST["name"]);
  $email = $conn->real_escape_string($_POST["email"]);
  $message = $conn->real_escape_string($_POST["message"]);
  $conn->query("INSERT INTO messages (name, email, message) VALUES ('$name', '$email', '$message')");
  $msg = "Thank you for your message!";
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Contact - Saarzo</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <style>
    body { font-family: 'Poppins', sans-serif; margin: 0; background: #f0f4f8; color: #333; }
    header {
      background: #0d0d2b; color: white;
      display: flex; justify-content: space-between; align-items: center;
      padding: 1.5rem 2rem;
    }
    header img { height: 50px; }
    nav a {
      color: white; margin-left: 1.5rem;
      text-decoration: none; font-weight: 600;
    }
    .section {
      padding: 3rem 2rem; max-width: 600px; margin: auto;
    }
    h2 { color: #0d0d2b; text-align: center; }
    form input, form textarea {
      width: 100%; padding: 0.75rem; margin-bottom: 1rem;
      border-radius: 6px; border: 1px solid #ccc; font-size: 1rem;
    }
    form button {
      background: #009dff; color: white;
      padding: 0.75rem 1.5rem; border: none;
      border-radius: 8px; font-size: 1rem; cursor: pointer;
    }
    .msg { text-align: center; color: green; margin-bottom: 1rem; }
    .footer {
      text-align: center; padding: 1rem; background: #0d0d2b; color: #ccc;
    }
  </style>
</head>
<body>
<header>
  <img src="https://dummyimage.com/150x50/ffffff/000000.png&text=Saarzo" alt="Logo" />
  <nav>
    <a href="index.php">Home</a>
    <a href="about.php">About</a>
    <a href="work.php">Templates</a>
    <a href="contact.php">Contact</a>
  </nav>
</header>

<section class="section">
  <h2>Contact Us</h2>
  <?php if ($msg) echo "<p class='msg'>$msg</p>"; ?>
  <form method="POST">
    <input type="text" name="name" required placeholder="Your Name">
    <input type="email" name="email" required placeholder="Your Email">
    <textarea name="message" rows="5" required placeholder="Your Message"></textarea>
    <button type="submit">Send Message</button>
  </form>
</section>

<footer class="footer">
  &copy; 2025 RK. All rights reserved. <br>
   <a href="index.php">Back to Home</a>
</footer>
</body>
</html>
