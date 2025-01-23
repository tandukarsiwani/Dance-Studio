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
  <meta name="description" content="Sign up for Dance Fusion Studio to start your journey in the art of dance. Join our community of passionate dancers and explore various dance styles.">
  <meta name="keywords" content="Dance Fusion Studio, dance signup, dance classes, join dance classes, beginner dance, professional dance training, dance community">
  <meta name="author" content="Dance Fusion Studio">
  <meta name="robots" content="index, follow">
  <title>Signup - Dance Fusion Studio</title>
  <link rel="stylesheet" href="css/signup.css">
</head>

<body>
  <div class="form-container">
    <div class="signup-section">
      <h2>Signup</h2>
      <form action="server/process.php" method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Create Password" required>
        <input type="password" name="confirm_password" placeholder="Confirm Password" required>
        <button type="submit" name="signup" class="action-btn">Signup</button>
        <?php
        if (isset($_SESSION['error'])) {
          echo "<p class='error'>" . $_SESSION['error'] . "</p>";
          unset($_SESSION['error']);
        }
        ?>
      </form>
      <p class="toggle-text">Already have an account? <a href="login.php">Login</a></p>
    </div>
  </div>
</body>

</html>