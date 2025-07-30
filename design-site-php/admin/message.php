<?php
include '../config.php';
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

$result = $conn->query("SELECT * FROM messages ORDER BY id DESC");
?>
<!DOCTYPE html>
<html>
<head>
  <title>Messages -  Admin</title>
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
      max-width: 1000px;
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
    .no-msg {
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
    <a href="uploads.php">Upload</a>
    <a href="edit.php">Edit Templates</a>
    <a href="logout.php">Logout</a>
  </nav>
</header>

<div class="container">
  <h2>User Messages</h2>

  <?php if ($result->num_rows > 0): ?>
    <table>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Message</th>
      </tr>
      <?php while($row = $result->fetch_assoc()): ?>
        <tr>
          <td><?= htmlspecialchars($row['name']) ?></td>
          <td><?= htmlspecialchars($row['email']) ?></td>
          <td><?= nl2br(htmlspecialchars($row['message'])) ?></td>
        </tr>
      <?php endwhile; ?>
    </table>
  <?php else: ?>
    <div class="no-msg">No messages yet.</div>
  <?php endif; ?>
</div>

</body>
</html>
