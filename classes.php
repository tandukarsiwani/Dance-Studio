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
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>classes</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/dropdown.css">
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
  <section class="table-container">
    <main class="table" id="customers_table">
      <section class="table__header">
        <h1>Our Classes</h1>
      </section>
      <div class="table__body">
        <table>
          <thead>
            <tr>
              <th> Age group</th>
              <th> Instructor </th>
              <th> Class Type </th>
              <th> Date</th>
              <th> Status</th>
              <th> Price </th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td> 10-20 </td>
              <td> <img src="https://i.ibb.co/3kfGg2M/testimonial-3.jpg" alt="">Zinzu Chan Lee</td>
              <td> Modern dance </td>
              <td> 22 Dec 2024 </td>
              <td>
                <p class="status delivered">Seats Available</p>
              </td>
              <td> <strong> $128.90 </strong></td>
            </tr>
            <tr>
              <td> 30-40 </td>
              <td><img src="https://i.ibb.co/xHnKF6v/testimonial-1.jpg" alt=""> Jeet Saru </td>
              <td> Tap dance </td>
              <td> 23 Aug, 2024 </td>
              <td>
                <p class="status cancelled">Fully Booked</p>
              </td>
              <td> <strong>$535.50</strong> </td>
            </tr>
            <tr>
              <td> 30-60</td>
              <td><img src="https://i.ibb.co/2c22fWL/testimonial-2.jpg" alt=""> Sonal Gharti </td>
              <td> Lyrical </td>
              <td> 19 Dec, 2024 </td>
              <td>
                <p class="status shipped">Limited Seats</p>
              </td>
              <td> <strong>$210.40</strong> </td>
            </tr>
            <tr>
              <td> 22-35</td>
              <td><img src="https://i.ibb.co/3kfGg2M/testimonial-3.jpg" alt=""> Alson GC </td>
              <td> Jazz </td>
              <td> 25 Dec, 2024 </td>
              <td>
                <p class="status delivered">Seats Available</p>
              </td>
              <td> <strong>$149.70</strong> </td>
            </tr>
            <tr>
              <td> 30-60</td>
              <td><img src="https://i.ibb.co/xHnKF6v/testimonial-1.jpg" alt=""> Sarita Limbu </td>
              <td> Ballet </td>
              <td> 23 Dec, 2025 </td>
              <td>
                <p class="status pending">Limited Seats</p>
              </td>
              <td> <strong>$399.99</strong> </td>
            </tr>
            <tr>
              <td>60-80</td>
              <td><img src="https://i.ibb.co/2c22fWL/testimonial-2.jpg" alt=""> Alex Gonley </td>
              <td> Hip Hop </td>
              <td> 23 Dec, 2024 </td>
              <td>
                <p class="status cancelled">Fully Booked</p>
              </td>
              <td> <strong>$399.99</strong> </td>
            </tr>
          </tbody>
        </table>
      </div>
    </main>
  </section>
  <section class="book-class-section">
    <h2 class="book-class-title">Book a Class</h2>
    <p class="book-class-subtitle">Reserve your spot today by filling out the form below.</p>

    <form class="book-class-form" id="bookClassForm">
      <div class="book-class-form-group">
        <label for="bookClassName">Name</label>
        <input type="text" id="bookClassName" class="book-class-input" placeholder="Enter your name" required>
        <small class="book-class-error" id="nameError">Name is required</small>
      </div>

      <div class="book-class-form-group">
        <label for="bookClassEmail">Email</label>
        <input type="email" id="bookClassEmail" class="book-class-input" placeholder="Enter your email" required>
        <small class="book-class-error" id="emailError">Valid email is required</small>
      </div>

      <div class="book-class-form-group">
        <label for="bookClassType">Class Type</label>
        <select id="bookClassType" class="book-class-input" required>
          <option value="">Select a class</option>
          <option value="Hip-Hop Basics">Hip-Hop Basics</option>
          <option value="Ballet for Beginners">Ballet for Beginners</option>
          <option value="Contemporary Dance">Contemporary Dance</option>
          <option value="Tap Dance">Tap Dance</option>
          <option value="Advanced Jazz">Advanced Jazz</option>
        </select>
        <small class="book-class-error" id="classTypeError">Please select a class</small>
      </div>

      <button type="submit" class="book-class-submit">Book Now</button>
    </form>
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
    document.getElementById('bookClassForm').addEventListener('submit', function (event) {
      event.preventDefault(); // Prevent form from refreshing the page

      const nameInput = document.getElementById('bookClassName');
      const emailInput = document.getElementById('bookClassEmail');
      const classTypeInput = document.getElementById('bookClassType');

      const nameError = document.getElementById('nameError');
      const emailError = document.getElementById('emailError');
      const classTypeError = document.getElementById('classTypeError');

      let isValid = true;

      if (!nameInput.value.trim()) {
        nameError.style.display = 'block';
        isValid = false;
      } else {
        nameError.style.display = 'none';
      }

      if (!emailInput.value.trim() || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailInput.value.trim())) {
        emailError.style.display = 'block';
        isValid = false;
      } else {
        emailError.style.display = 'none';
      }

      if (!classTypeInput.value.trim()) {
        classTypeError.style.display = 'block';
        isValid = false;
      } else {
        classTypeError.style.display = 'none';
      }

      if (isValid) {
        alert('Class successfully booked!');
        nameInput.value = '';
        emailInput.value = '';
        classTypeInput.value = '';
      }
    });
  </script>
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