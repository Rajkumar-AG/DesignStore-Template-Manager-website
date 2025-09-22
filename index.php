<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>RK – Style in Every Pixel</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
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
      align-items: center;
      justify-content: space-between;
    }
    header img {
      height: 50px;
    }
    header h1 {
      font-size: 1.8rem;
    }
    nav a {
      color: white;
      text-decoration: none;
      margin-left: 1.5rem;
      font-weight: 600;
    }
    .hero {
      text-align: center;
      padding: 4rem 2rem;
      background: linear-gradient(145deg, #ffffff, #e0e0e0);
    }
    .hero h2 {
      font-size: 2.5rem;
      color: #0d0d2b;
    }
    .hero p {
      font-size: 1.2rem;
      margin-top: 1rem;
      color: #555;
    }
    .cta-button {
      margin-top: 2rem;
      padding: 0.75rem 2rem;
      background-color: #009dff;
      color: white;
      border: none;
      border-radius: 8px;
      font-size: 1rem;
      cursor: pointer;
    }
    .section {
      padding: 3rem 2rem;
      max-width: 1100px;
      margin: auto;
    }
    .card-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 2rem;
    }
    .card {
      background: white;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      padding: 1.5rem;
      text-align: center;
    }
    .card h3 {
      margin-top: 0;
      color: #0d0d2b;
    }
    .footer {
      text-align: center;
      padding: 1rem;
      background: #0d0d2b;
      color: #ccc;
    }
  </style>
</head>
<body>

<header>
  <h1>RK DesignS</h1>
<nav>
  <a href="index.php">Home</a>
  <a href="about.php">About</a>
  <a href="work.php">Templates</a>
  <a href="contact.php">Contact</a>
  <a href="admin/login.php" style="background:#fff;color:#0d0d2b;padding:5px 12px;border-radius:6px;margin-left:1rem;">Admin</a>
</nav>

</header>

<section class="hero">
  <h2>Style in Every Pixel</h2>
  <p>Your go-to destination for premium digital designs and Canva templates</p>
  <button class="cta-button" onclick="window.location.href='work.php'">Explore Now</button>
</section>
   

<section class="section">
  <h2 style="text-align:center;">Featured Templates</h2>
  <div class="card-grid">
    <div class="card">
      <h3>Instagram Pack</h3>
      <p>Get stunning social media posts for your brand.</p>
    </div>
    <div class="card">
      <h3>Brand Kit</h3>
      <p>Consistent branding with logos, colors, and fonts.</p>
    </div>
    <div class="card">
      <h3>Resume Templates</h3>
      <p>Modern, ATS-friendly resume formats.</p>
    </div>
  </div>
</section>
<!-- Services Section -->
<section id="services" style="padding: 4rem 2rem; background: #0d0d2b; color: white;">
  <div style="max-width: 1100px; margin: auto; text-align: center;">
    <h2 style="font-size: 2.2rem; color: #009dff; margin-bottom: 1.2rem;">What We Offer</h2>
    <p style="color: #cccccc; font-size: 1.1rem; margin-bottom: 2.5rem;">
      At <strong>RK</strong>, we craft everything from print to pixels. Our team specializes in a variety of digital and design solutions tailored to elevate your brand.
    </p>

    <div style="
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
      gap: 2rem;
    ">
      <div class="service-box">
        <h3>Brand & Print Design</h3>
        <p>Posters, Flyers, Brochures, Invitations, Business Cards, Magazines, Book Covers</p>
      </div>
      <div class="service-box">
        <h3>Packaging Design</h3>
        <p>Product Packages, Labels, Stickers</p>
      </div>
      <div class="service-box">
        <h3>Digital Media</h3>
        <p>Website Banners, Social Media Ads, YouTube Thumbnails, GIFs</p>
      </div>
      <div class="service-box">
        <h3>Video Content</h3>
        <p>YouTube Intro/Outro Videos, Promo Reels</p>
      </div>
      <div class="service-box">
        <h3>Identity & Strategy</h3>
        <p>Logos, Brand Kits, Mood Boards, Visual Boards</p>
      </div>
      <div class="service-box">
        <h3>Professional Documents</h3>
        <p>Portfolios, Resumes, Slide Decks, Presentations</p>
      </div>
      <div class="service-box">
        <h3>Planning & Organization</h3>
        <p>Weekly & Monthly Planners, Task Boards, Work Charts</p>
      </div>
      <div class="service-box">
        <h3>Web & UI Design</h3>
        <p>Simple Websites, Landing Pages, Personal Portfolios</p>
      </div>
    </div>
  </div>
</section>

<!-- Services Box Hover Effect Style -->
<style>
  .service-box {
    background: #1a1a3a;
    padding: 1.5rem;
    border-radius: 12px;
    transition: 0.3s ease;
    text-align: left;
  }
  .service-box:hover {
    background: #009dff;
    color: white;
    transform: translateY(-5px);
    box-shadow: 0 6px 20px rgba(0, 157, 255, 0.3);
  }
  .service-box h3 {
    margin-bottom: 0.8rem;
    font-size: 1.2rem;
    color: #ffffff;
  }
  .service-box p {
    font-size: 0.95rem;
    color: #dddddd;
  }
  .service-box:hover h3,
  .service-box:hover p {
    color: white;
  }
</style>


<footer class="footer">
  &copy; 2025 RK. All rights reserved. | <a href="admin/login.php" style="color: #ffffff; text-decoration: underline;">Admin Login</a>
</footer>


</body>
</html>
