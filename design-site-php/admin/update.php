<?php
include '../config.php';
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM portfolio_items WHERE id = $id");
$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $conn->real_escape_string($_POST['title']);
    $desc = $conn->real_escape_string($_POST['description']);
    $cat = $conn->real_escape_string($_POST['category']);
    $conn->query("UPDATE portfolio_items SET title='$title', description='$desc', category='$cat' WHERE id=$id");
    header("Location: edit.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Edit Template - RK Admin</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      background: #f0f4f8;
    }
    .container {
      max-width: 600px;
      margin: 4rem auto;
      background: white;
      padding: 2rem;
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    h2 {
      text-align: center;
      color: #0d0d2b;
      margin-bottom: 1.5rem;
    }
    input, textarea {
      width: 100%;
      padding: 0.75rem;
      margin-bottom: 1.2rem;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 1rem;
    }
    button {
      width: 100%;
      padding: 0.75rem;
      background: #009dff;
      color: white;
      border: none;
      border-radius: 8px;
      font-size: 1rem;
      cursor: pointer;
    }
    .back-link {
      display: block;
      margin-top: 1rem;
      text-align: center;
      text-decoration: none;
      color: #009dff;
    }
  </style>
</head>
<body>

<div class="container">
  <h2>Edit Template</h2>
  <form method="POST">
    <input type="text" name="title" value="<?= htmlspecialchars($row['title']) ?>" required>
    <textarea name="description" rows="4" required><?= htmlspecialchars($row['description']) ?></textarea>
    <input type="text" name="category" value="<?= htmlspecialchars($row['category']) ?>" required>
    <button type="submit">Update</button>
  </form>
  <a href="edit.php" class="back-link">← Back to Template List</a>
</div>

</body>
</html>
