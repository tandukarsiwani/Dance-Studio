<?php
session_start();

if (isset($_SESSION['username'])) {
  header("Location: index.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Dance Fusion Studio</title>
  <meta name="description" content="Login to Dance Fusion Studio to access exclusive dance classes, workshops, and products. Join our community of dance enthusiasts today!">
  <meta name="keywords" content="Dance login, Dance Fusion Studio login, dance workshops, dance classes, dance community">
  <meta name="author" content="Dance Fusion Studio">
  <meta name="robots" content="index, follow">
  <link rel="stylesheet" href="css/login.css">
</head>

<body>
  <div class="form-container">
    <div class="login-section">
      <h2>Login</h2>
      <form action="server/process.php" method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="login" class="action-btn">Login</button>
        <?php
        if (isset($_SESSION['error'])) {
          echo "<p class='error'>" . $_SESSION['error'] . "</p>";
          unset($_SESSION['error']); // Clear the error after displaying
        }
        ?>
      </form>
      <p class="toggle-text">Don't have an account? <a href="signup.php">Signup</a></p>
    </div>
  </div>
</body>

</html>