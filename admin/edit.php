<?php
include '../config.php';
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

$result = $conn->query("SELECT * FROM portfolio_items ORDER BY id DESC");
?>
<!DOCTYPE html>
<html>
<head>
  <title>Edit Templates - RK Admin</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      background: #f0f4f8;
      color: #333;
    }
    header {
      background: #0d0d2b;
      color: white;
      padding: 1.5rem 2rem;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    header h1 {
      margin: 0;
      font-size: 1.5rem;
    }
    nav a {
      color: white;
      text-decoration: none;
      margin-left: 1.5rem;
      font-weight: 600;
    }
    .container {
      padding: 2rem;
      max-width: 1100px;
      margin: auto;
    }
    h2 {
      color: #0d0d2b;
      margin-bottom: 1.5rem;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      background: white;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.08);
    }
    th, td {
      padding: 1rem;
      text-align: left;
      border-bottom: 1px solid #eee;
    }
    th {
      background: #009dff;
      color: white;
    }
    tr:hover {
      background-color: #f1f1f1;
    }
    a.edit-btn {
      background: #009dff;
      color: white;
      padding: 6px 12px;
      border-radius: 6px;
      text-decoration: none;
      font-size: 0.9rem;
    }
    .no-data {
      text-align: center;
      padding: 2rem;
      background: white;
      border-radius: 10px;
    }
  </style>
</head>
<body>

<header>
  <h1>Admin Dashboard</h1>
  <nav>
    <a href="dashboard.php">Dashboard</a>
    <a href="message.php">Messages</a>
    <a href="edit.php">Edit Templates</a>
    <a href="logout.php">Logout</a>
  </nav>
</header>
<div class="container">
  <h2>All Templates</h2>

  <?php if ($result->num_rows > 0): ?>
    <table>
      <tr>
        <th>Preview</th>
        <th>Title</th>
        <th>Description</th>
        <th>Category</th>
        <th>Edit</th>
      </tr>
      <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
          <td>
            <?php if (!empty($row['image'])): ?>
              <img src="../<?= htmlspecialchars($row['image']) ?>" alt="Preview" width="80" height="60" style="object-fit:cover; border-radius:6px;">
            <?php else: ?>
              <span style="color:#aaa;">No Image</span>
            <?php endif; ?>
          </td>
          <td><?= htmlspecialchars($row['title']) ?></td>
          <td><?= htmlspecialchars($row['description']) ?></td>
          <td><?= htmlspecialchars($row['category']) ?></td>
          <td><a class="edit-btn" href="update.php?id=<?= $row['id'] ?>">Edit</a></td>
        </tr>
      <?php endwhile; ?>
    </table>
  <?php else: ?>
    <div class="no-data">No templates found.</div>
  <?php endif; ?>
</div>


</body>
</html>
