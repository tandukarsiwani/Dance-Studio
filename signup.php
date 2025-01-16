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
  <title>Signup Form</title>
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
