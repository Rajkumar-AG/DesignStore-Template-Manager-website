<?php
include 'config.php';

$sql = "SELECT * FROM portfolio_items ORDER BY id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Explore Our Templates – RK</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0; padding: 0; box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }
    body {
      background: #f0f4f8;
      color: #1e1e1e;
    }
    header {
      background: #0d0d2b;
      padding: 2rem;
      text-align: center;
      color: white;
    }
    header h1 {
      font-size: 2.5rem;
      margin-bottom: 0.5rem;
    }
    header p {
      font-size: 1.1rem;
      color: #cccccc;
    }

    .grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
      gap: 2rem;
      max-width: 1200px;
      margin: 3rem auto;
      padding: 0 1rem;
    }

    .card {
      background: white;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.08);
      overflow: hidden;
      transition: 0.3s ease;
    }
    .card:hover {
      transform: translateY(-5px);
    }
    .card img {
      width: 100%;
      height: 180px;
      object-fit: cover;
    }
    .card-content {
      padding: 1rem;
    }
    .card h3 {
      font-size: 1.2rem;
      color: #0d0d2b;
      margin-bottom: 0.5rem;
    }
    .card p {
      color: #555;
      font-size: 0.95rem;
    }

    footer {
      background: #0d0d2b;
      color: #ccc;
      text-align: center;
      padding: 1.5rem;
      margin-top: 4rem;
    }
    footer a {
      color: #009dff;
      text-decoration: none;
      font-weight: bold;
    }
  </style>
</head>
<body>

  <!-- Header -->
  <header>
    <h1>Explore Our Templates</h1>
    <p>Professionally crafted designs by RK</p>
  </header>

 <div class="grid">
  <?php while ($row = $result->fetch_assoc()): ?>
    <div class="card">
      <a href="view.php?id=<?= $row['id'] ?>" style="text-decoration: none; color: inherit;">

        <img src="<?= htmlspecialchars($row['image']) ?>" alt="<?= htmlspecialchars($row['title']) ?>">
        <div class="card-content">
          <h3><?= htmlspecialchars($row['title']) ?></h3>
          <p><?= htmlspecialchars($row['description']) ?></p>
        </div>
      </a>
    </div>
  <?php endwhile; ?>
</div>


  <!-- Footer -->
  <footer>
    © <?= date("Y") ?> RK. All Rights Reserved. |
    <a href="index.php">Back to Home</a>
  </footer>

</body>
</html>
