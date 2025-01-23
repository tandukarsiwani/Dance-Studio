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
  <meta name="description" content="Dance Fusion Studio offers dynamic dance classes for all ages and skill levels. Discover your passion for dance today!">
  <meta name="keywords" content="dance classes, dance studio, personalized dance lessons, classical dance, dance theater">
  <meta name="author" content="Dance Fusion Studio">
  <title>Dance Fusion Studio | Unleash Your Rhythm</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/dropdown.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
</head>

<body>
  <header>
    <nav class="navbar">
      <h1 class="logo"><a href="index.php" title="Dance Fusion Studio Home">Dance Fusion Studio</a></h1>
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
            <button onclick="myFunction()" id="user-icon" class="dropbtn" title="User Options"><i class="fas fa-user-circle"></i></button>
            <div id="myDropdown" class="dropdown-content">
              <p class="username">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></p>
              <a href="server/logout.php" class="logout-btn">Logout</a>
            </div>
          </li>
        <?php endif; ?>
      </ul>
    </nav>
  </header>

  <main>
    <section class="homepage" id="home">
      <div class="content">
        <div class="text">
          <h1>Unleash Your Rhythm</h1>
          <p>Dance Fusion Studio offers a range of dynamic dance classes for all ages and skill levels. Join us to discover your passion for dance and unleash your full potential!</p>
        </div>
        <a href="#services" class="cta-button">Our Services</a>
      </div>
    </section>

    <section class="services" id="services">
      <h2>Our Services</h2>
      <p>Explore our wide range of dance courses and accessories to enhance your dancing journey.</p>
      <ul class="cards">
        <li class="card">
          <img src="https://i.ibb.co/zHSDTzT/service-1.jpg" alt="Personalized dance tutoring">
          <h3>Personalized Learning</h3>
          <p>Experience the best tutoring from our world-class instructors.</p>
        </li>
        <li class="card">
          <img src="https://i.ibb.co/2jgnML5/service-2.jpg" alt="Convenient dancing techniques">
          <h3>Convenient Dancing</h3>
          <p>Learn flexible and strength-focused dance exercises with ease.</p>
        </li>
        <li class="card">
          <img src="https://i.ibb.co/0ZqzKss/service-3.jpg" alt="State-of-the-art dance theater">
          <h3>Dance Theater</h3>
          <p>Perform in our state-of-the-art theater in front of a captivated audience.</p>
        </li>
        <li class="card">
          <img src="https://i.ibb.co/CH1TK7Q/service-4.jpg" alt="Classical dance class">
          <h3>Classical Dance Class</h3>
          <p>Learn classical dance styles from the best instructors in the region.</p>
        </li>
        <li class="card">
          <img src="https://i.ibb.co/m0dV7Rn/service-5.jpg" alt="Act-based dance program">
          <h3>Act-Based Dance</h3>
          <p>Discover your inner actor with our unique act-based dance programs.</p>
        </li>
        <li class="card">
          <img src="https://i.ibb.co/2jgnML5/service-2.jpg" alt="Themed cultural dance nights">
          <h3>Late Night Class</h3>
          <p>Join themed classes to explore cultural dance traditions and customs.</p>
        </li>
      </ul>
    </section>

    <section class="about-us">
      <div class="about">
        <img src="https://i.ibb.co/Rb1sVsT/about-us.png" class="pic" alt="About Dance Fusion Studio">
        <div class="text">
          <h3>About Us</h3>
          <h5>Dance Fusion & <span>Studio</span></h5>
          <p>Dance Fusion Studio is a vibrant, community-driven space where passion for dance comes to life. Our mission is to inspire creativity, confidence, and self-expression through a variety of dance styles taught by experienced and dedicated instructors.</p>
        </div>
      </div>
    </section>

    <section class="testimonials">
      <h2>Testimonials</h2>
      <div class="wrapper">
        <div class="box">
          <i class="fas fa-quote-left quote"></i>
          <p>Dance Fusion Studio has been a life-changing experience for me! The instructors are patient, skilled, and truly passionate about teaching. I’ve never felt more confident on the dance floor.</p>
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
              <img src="https://i.ibb.co/xHnKF6v/testimonial-1.jpg" alt="Alex Smith testimonial">
            </div>
          </div>
        </div>
        <div class="box">
          <i class="fas fa-quote-left quote"></i>
          <p>Joining Dance Fusion Studio was the best decision I made this year. The classes are fun. I always leave feeling accomplished and energized.</p>
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
              <img src="https://i.ibb.co/3kfGg2M/testimonial-3.jpg" alt="Steven Chris testimonial">
            </div>
          </div>
        </div>
        <div class="box">
          <i class="fas fa-quote-left quote"></i>
          <p>I was a complete beginner, but the supportive environment at Dance Fusion Studio made it so easy to learn. The instructors break down every move step-by-step, and now I’m dancing with confidence!</p>
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
              <img src="https://i.ibb.co/2c22fWL/testimonial-2.jpg" alt="Kristina Bellis testimonial">
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <footer>
    <div>
      <span>@2025 Dance Fusion Studio. All Rights Reserved.</span>
      <span class="link">
        <a href="https://www.facebook.com" class="social_media_icon" aria-label="Visit our Facebook"><i class="fab fa-facebook-f"></i></a>
        <a href="https://twitter.com" class="social_media_icon" aria-label="Visit our Twitter"><i class="fab fa-twitter"></i></a>
        <a href="https://www.instagram.com" class="social_media_icon" aria-label="Visit our Instagram"><i class="fab fa-instagram"></i></a>
      </span>
    </div>
  </footer>

  <script>
    function myFunction() {
      document.getElementById("myDropdown").classList.toggle("show");
    }

    window.onclick = function (event) {
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
