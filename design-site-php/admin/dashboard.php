<?php
include '../config.php';
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin Dashboard - RK</title>
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
      margin-bottom: 1rem;
    }
    .cards {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 2rem;
    }
    .card {
      background: white;
      border-radius: 10px;
      padding: 1.5rem;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      text-align: center;
    }
    .card h3 {
      color: #009dff;
      font-size: 1.2rem;
    }
    .card p {
      font-size: 0.95rem;
      color: #555;
    }
    .btn {
  display: inline-block;
  margin-top: 1rem;
  padding: 0.5rem 1.2rem;
  background: #009dff;
  color: white;
  border-radius: 6px;
  text-decoration: none;
  font-weight: 600;
}

    .logout {
      margin-top: 2rem;
      text-align: center;
    }
    .logout a {
      background: red;
      color: white;
      padding: 0.75rem 1.5rem;
      text-decoration: none;
      border-radius: 8px;
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
  <h2>Welcome, Admin!</h2>
  <div class="cards">
  <div class="card">
    <h3>Templates</h3>
    <p>Manage uploaded Canva templates and digital assets.</p>
    <a href="edit.php" class="btn">Manage</a>
  </div>
  <div class="card">
    <h3>Messages</h3>
    <p>View and respond to messages sent by users via contact form.</p>
    <a href="message.php" class="btn">View</a>
  </div>
    <div class="card">
    <h3>Upload Template</h3>
    <p>Add new templates to your portfolio.</p>
    <a href="upload.php" class="btn">Upload</a>
  </div>
  <div class="card">
    <h3>Edit Section</h3>
    <p>Add, edit or remove portfolio items easily from here.</p>
    <a href="edit.php" class="btn">Edit</a>
  </div>

  </div>
</div>
    


  <div class="logout">
    <a href="logout.php">Logout</a>
  </div>
</div>

</body>
</html>
