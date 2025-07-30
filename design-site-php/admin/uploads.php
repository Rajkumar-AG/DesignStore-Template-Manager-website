<?php
session_start();
include '../config.php';

// Show error messages clearly
ini_set('display_errors', 1);
error_reporting(E_ALL);

$msg = "";

// Upload Logic
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $title = $_POST["title"] ?? '';
  $desc = $_POST["description"] ?? '';
  $imagePath = "";

  if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
    $allowed = ['jpg', 'jpeg', 'png', 'gif'];
    $ext = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));

    if (in_array($ext, $allowed)) {
      $folder = "../uploads/";
      if (!is_dir($folder)) {
        mkdir($folder, 0777, true); // ✅ create folder if not exists
      }

      $imagePath = "uploads/" . time() . "_" . basename($_FILES["image"]["name"]);
      $fullPath = "../" . $imagePath;

      if (move_uploaded_file($_FILES["image"]["tmp_name"], $fullPath)) {
        // ✅ INSERT INTO DB – only title, desc, image
        $stmt = $conn->prepare("INSERT INTO portfolio_items (title, description, image) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $title, $desc, $imagePath);
        $stmt->execute();
        $msg = "✅ Template uploaded successfully!";
      } else {
        $msg = "❌ Failed to move uploaded file.";
      }
    } else {
      $msg = "❌ Invalid file type (only jpg, jpeg, png, gif allowed).";
    }
  } else {
    $msg = "❌ No image uploaded or upload error.";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Upload Template - RK Admin</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: #f0f4f8;
      margin: 0;
    }
    .container {
      max-width: 600px;
      margin: 4rem auto;
      background: white;
      padding: 2rem;
      border-radius: 12px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    }
    h2 {
      text-align: center;
      color: #0d0d2b;
    }
    input, textarea {
      width: 100%;
      padding: 0.75rem;
      margin-bottom: 1rem;
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
    .msg {
      text-align: center;
      font-weight: bold;
      margin-bottom: 1rem;
      color: green;
    }
    .error {
      color: red;
      text-align: center;
      margin-bottom: 1rem;
      font-weight: bold;
    }
    .back-link {
      display: block;
      margin-top: 1rem;
      text-align: center;
      color: #009dff;
      text-decoration: none;
    }
  </style>
</head>
<body>

<div class="container">
  <h2>Upload New Template</h2>
  
  <?php if ($msg): ?>
    <p class="<?= str_contains($msg, '✅') ? 'msg' : 'error' ?>"><?= $msg ?></p>
  <?php endif; ?>

  <form method="POST" enctype="multipart/form-data">
    <input type="text" name="title" placeholder="Template Title" required>
    <textarea name="description" rows="4" placeholder="Template Description" required></textarea>
    <input type="file" name="image" accept="image/*" required>
    <button type="submit">Upload</button>
  </form>

  <a class="back-link" href="dashboard.php">← Back to Dashboard</a>
</div>

</body>
</html>
