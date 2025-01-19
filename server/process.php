<?php
session_start();
require_once 'db.php';

// Login functionality
if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];
    
    // Checks if fields are empty and throws error when true
    if (empty($username) || empty($password)) {
        $_SESSION['error'] = "All fields are required";
        header("Location: ../login.php");
        exit;
    }
    
    // Query to check if user exists
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Verify if the password matches
        if (password_verify($password, $user['password'])) {
            // Create session when password is correct
            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];
            header("Location: ../index.php");
            exit;
        } else {
            // throw error when password is incorrect
            $_SESSION['error'] = "Invalid username or password";
            header("Location: ../login.php");
            exit;
        }
    } else {
        // throw error if user doesn't exist
        $_SESSION['error'] = "Invalid username or password";
        header("Location: ../login.php");
        exit;
    }
}

if (isset($_POST['signup'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    
    // Validation
    if (empty($username) || empty($password) || empty($confirm_password)) {
        $_SESSION['error'] = "All fields are required";
        header("Location: ../signup.php");
        exit;
    }
    
    // Check if passwords match
    if ($password !== $confirm_password) {
        $_SESSION['error'] = "Passwords do not match";
        header("Location: ../signup.php");
        exit;
    }
    
    // Password strength validation
    if (strlen($password) < 8) {
        $_SESSION['error'] = "Password must be at least 8 characters long";
        header("Location: ../signup.php");
        exit;
    }
    
    // Check if username already exists
    $check_sql = "SELECT username FROM users WHERE username = ?";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param("s", $username);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();
    
    if ($check_result->num_rows > 0) {
        $_SESSION['error'] = "Username already exists";
        header("Location: ../signup.php");
        exit;
    }
    
    // Hash password and insert user into database
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $insert_sql = "INSERT INTO users (username, password) VALUES (?, ?)";
    $insert_stmt = $conn->prepare($insert_sql);
    $insert_stmt->bind_param("ss", $username, $hashed_password);
    
    if ($insert_stmt->execute()) {
        $_SESSION['success'] = "Registration successful! Please login.";
        header("Location: ../login.php");
        exit;
    } else {
        $_SESSION['error'] = "Registration failed. Please try again.";
        header("Location: ../signup.php");
        exit;
    }
}
header("Location: ../login.php");
exit;
?>
