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
  <title>Dance Fusion Studio</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/dropdown.css">
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

  <section class="homepage" id="home">
    <div class="content">
      <div class="text">
        <h1>Unleash Your Rhythm</h1>
        <p>
          Dance Fusion Studio offers a range of dynamic dance classes for all ages and skill levels. <br> Join us to
          discover your passion for dance and unleash your full potential!</p>
      </div>
      <a href="#services">Our Services</a>
    </div>
  </section>

  <section class="services" id="services">
    <h2>Our Services</h2>
    <p>Explore our wide range of dance course and accessories</p>
    <ul class="cards">
      <li class="card">
        <img src="https://i.ibb.co/zHSDTzT/service-1.jpg" alt="img">
        <h3>Personalized Learning</h3>
        <p>Experience the best tutoring experience from our experienced world class tutors</p>
      </li>
      <li class="card">
        <img src="https://i.ibb.co/2jgnML5/service-2.jpg" alt="img">
        <h3>Convinient Dancing</h3>
        <p>Learn the ways of convinient dancing with out tutors offering a great flexibility and strength exercises.</p>
      </li>
      <li class="card">
        <img src="https://i.ibb.co/0ZqzKss/service-3.jpg" alt="img">
        <h3>Dance Theater</h3>
        <p>Get to perform in out state of the Art dance theater infornt of thousand of people.</p>
      </li>
      <li class="card">
        <img src="https://i.ibb.co/CH1TK7Q/service-4.jpg" alt="img">
        <h3>Classical Dance Class</h3>
        <p>Classical dance class taught by the very best in the state.</p>
      </li>
      <li class="card">
        <img src="https://i.ibb.co/m0dV7Rn/service-5.jpg" alt="img">
        <h3>Act based dance.</h3>
        <p>Unleash your true actor with out act based dance that has the potential of a cockroach.</p>
      </li>
      <li class="card">
        <img src="https://i.ibb.co/2jgnML5/service-2.jpg" alt="img">
        <h3>Light night class</h3>
        <p>Classical dance set on a themed basis to spread awareness of our culture and customs.</p>
      </li>
    </ul>
  </section>

  <section class="about-us">
    <div class="about">
      <img src="https://i.ibb.co/Rb1sVsT/about-us.png" class="pic" />
      <div class="text">
        <h3>About Us</h3>
        <h5>Dance Fusion & <span>Studio</span></h5>
        <p>Dance Fusion Studio is a vibrant community-driven space where passion for dance comes to life. Our mission is
          to inspire creativity, confidence, and self-expression through a variety of dance styles taught by experienced
          and dedicated instructors.</p>
      </div>
    </div>
  </section>

  <section class="testimonials">
    <h2>Testimonials</h2>
    <div class="wrapper">
      <div class="box">
        <i class="fas fa-quote-left quote"></i>
        <p>Dance Fusion Studio has been a life-changing experience for me! The instructors are patient, skilled, and
          truly passionate about teaching. I’ve never felt more confident on the dance floor.</p>
        <div class="content">
          <div class="info">
            <div class="name">Alex Smith</div>
            <div class="job">Designer | Developer</div>
            <div class="stars">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="far fa-star"></i>
              <i class="far fa-star"></i>
              <i class="far fa-star"></i>
            </div>
          </div>
          <div class="image">
            <img src="https://i.ibb.co/xHnKF6v/testimonial-1.jpg" alt="testimonial-1">
          </div>
        </div>
      </div>
      <div class="box">
        <i class="fas fa-quote-left quote"></i>
        <p>Joining Dance Fusion Studio was the best decision I made this year. The classes are fun. I always leave
          feeling accomplished and energized.</p>
        <div class="content">
          <div class="info">
            <div class="name">Steven Chris</div>
            <div class="job">YouTuber | Blogger</div>
            <div class="stars">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="far fa-star"></i>
              <i class="far fa-star"></i>
            </div>
          </div>
          <div class="image">
            <img src="https://i.ibb.co/3kfGg2M/testimonial-3.jpg" alt="test-1">
          </div>
        </div>
      </div>
      <div class="box">
        <i class="fas fa-quote-left quote"></i>
        <p>I was a complete beginner, but the supportive environment at Dance Fusion Studio made it so easy to learn.
          The instructors break down every move step-by-step, and now I’m dancing with confidence!</p>
        <div class="content">
          <div class="info">
            <div class="name">Kristina Bellis</div>
            <div class="job">Freelancer | Advertiser</div>
            <div class="stars">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="far fa-star"></i>
            </div>
          </div>
          <div class="image">
            <img src="https://i.ibb.co/2c22fWL/testimonial-2.jpg" alt="test-2">
          </div>
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
      // Check if the click is on the button or its children
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