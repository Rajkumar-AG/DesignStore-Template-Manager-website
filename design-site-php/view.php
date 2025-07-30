<?php
include 'config.php';

$id = $_GET['id'] ?? null;

if (!$id) {
  die("No template selected.");
}

$stmt = $conn->prepare("SELECT * FROM portfolio_items WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$template = $result->fetch_assoc();

if (!$template) {
  die("Template not found.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= htmlspecialchars($template['title']) ?> – Saarzo</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      background: #0d0d2b;
      color: white;
      font-family: 'Poppins', sans-serif;
      margin: 0;
      padding: 2rem;
      text-align: center;
    }
    h1 {
      font-size: 2rem;
      margin-bottom: 0.5rem;
    }
    p {
      color: #ccc;
    }
    img {
      margin-top: 2rem;
      max-width: 100%;
      max-height: 80vh;
      border-radius: 12px;
      box-shadow: 0 6px 30px rgba(0,0,0,0.4);
    }
    a {
      display: inline-block;
      margin-top: 2rem;
      color: #00bfff;
      text-decoration: none;
    }
  </style>
</head>
<body>

  <h1><?= htmlspecialchars($template['title']) ?></h1>
  <p><?= htmlspecialchars($template['description']) ?></p>
  <img src="<?= htmlspecialchars($template['image']) ?>" alt="<?= htmlspecialchars($template['title']) ?>">

  <br>
  <a href="work.php">← Back to Templates</a>

</body>
</html>
