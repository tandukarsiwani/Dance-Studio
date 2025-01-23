<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About us</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/dropdown.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body>
  <header>
    <nav class="navbar">
      <h2 class="logo"><a href="index.php">Dance Fusion Studio</a></h2>
      <input type="checkbox" id="menu-toggler">
      <label for="menu-toggler" id="hamburger-btn">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" width="24px" height="24px">
          <path d="M0 0h24v24H0z" fill="none" />
          <path d="M3 18h18v-2H3v2zm0-5h18V11H3v2zm0-7v2h18V6H3z" />
        </svg>
      </label>
      <ul class="all-links">
        <li><a href="index.php">Home</a></li>
        <?php if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin'): ?>
          <li><a href="product.php">Products</a></li>
          <li><a href="classes.php">Classes</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="contact.php">Contact</a></li>
        <?php endif; ?>
        <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
          <li><a href="dashboard.php">Dashboard</a></li>
        <?php endif; ?>
        <?php if (isset($_SESSION['username'])): ?>
          <li class="dropdown">
            <button onclick="myFunction()" id="user-icon" class="dropbtn"><i class="fas fa-user-circle"></i></button>
            <div id="myDropdown" class="dropdown-content">
              <p class="username"><?php echo htmlspecialchars($_SESSION['username']); ?></p>
              <a href="server/logout.php" class="logout-btn">Logout</a>
            </div>
          </li>
        <?php endif; ?>
      </ul>
    </nav>
  </header>
  <section class="about-us" id="fullAbout">
    <div class="about">
      <img src="https://i.ibb.co/Rb1sVsT/about-us.png" class="pic" />
      <div class="text">
        <h3>About Us</h3>
        <h5>Dance Fusion & <span>Studio</span></h5>
        <p>Dance Fusion Studio is more than just a place to dance; it is a vibrant, community-driven space where
          passion, artistry, and movement come to life. Our mission is to inspire creativity, confidence, and
          self-expression through a diverse array of dance styles taught by a team of experienced, passionate, and
          dedicated instructors. We believe in fostering a love for dance in a supportive and inclusive environment,
          where individuals of all ages and skill levels can thrive. From beginners taking their first steps to seasoned
          dancers honing their craft, our classes are designed to challenge, motivate, and empower every participant.
          Beyond technique and performance, we strive to nurture personal growth, encourage lifelong friendships, and
          create unforgettable experiences. At Dance Fusion Studio, every dancer becomes part of a close-knit community
          united by the joy of movement, the rhythm of music, and the shared pursuit of excellence.</p>
      </div>
    </div>
    </div>
  </section>
  <footer>
    <div>
      <span>Copyright © 2024 All Rights Reserved</span>
      <span class="link">
        <a href="https://www.facebook.com" class="social_media_icon"><i class="fab fa-facebook-f"></i></a>
        <a href="https://twitter.com" class="social_media_icon"><i class="fab fa-twitter"></i></a>
        <a href="https://www.instagram.com" class="social_media_icon"><i class="fab fa-instagram"></i></a>
      </span>
    </div>
  </footer>
  <script>
    function myFunction() {
      document.getElementById("myDropdown").classList.toggle("show");
    }

    window.onclick = function (event) {
      // checks if the click is on the button or its children and hides the dropdown based on that
      if (!event.target.closest('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        for (var i = 0; i < dropdowns.length; i++) {
          var openDropdown = dropdowns[i];
          if (openDropdown.classList.contains('show')) {
            openDropdown.classList.remove('show');
          }
        }
      }
    };
  </script>
</body>

</html>