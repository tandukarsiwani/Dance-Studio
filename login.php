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
  <title>Login Form</title>
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
            unset($_SESSION['error']);
            }
        ?>
      </form>
      <p class="toggle-text">Don't have an account? <a href="signup.php">Signup</a></p>
    </div>
  </div>
</body>
</html>