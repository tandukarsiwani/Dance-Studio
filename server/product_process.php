<?php
session_start();
require_once 'db.php';

// Check if user is admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../index.php");
    exit;
}

// Add Product
if (isset($_POST['add_product'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $image_url = mysqli_real_escape_string($conn, $_POST['image_url']);
    $rating = intval($_POST['rating']);
    $price = floatval($_POST['price']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $discount = isset($_POST['discount']) ? intval($_POST['discount']) : 0;

    $sql = "INSERT INTO products (title, image_url, rating, price, category, discount) 
            VALUES (?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssidsi", $title, $image_url, $rating, $price, $category, $discount);
    
    if ($stmt->execute()) {
        $_SESSION['success'] = "Product added successfully";
    } else {
        $_SESSION['error'] = "Error adding product: " . $conn->error;
    }
    
    header("Location: ../dashboard.php");
    exit;
}

// Update Product
if (isset($_POST['update_product'])) {
    $id = intval($_POST['product_id']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $image_url = mysqli_real_escape_string($conn, $_POST['image_url']);
    $rating = intval($_POST['rating']);
    $price = floatval($_POST['price']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $discount = isset($_POST['discount']) ? intval($_POST['discount']) : 0;

    $sql = "UPDATE products SET title=?, image_url=?, rating=?, price=?, category=?, discount=? 
            WHERE id=?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssidsii", $title, $image_url, $rating, $price, $category, $discount, $id);
    
    if ($stmt->execute()) {
        $_SESSION['success'] = "Product updated successfully";
    } else {
        $_SESSION['error'] = "Error updating product: " . $conn->error;
    }
    
    header("Location: ../dashboard.php");
    exit;
}

// Delete Product
if (isset($_POST['delete_product'])) {
    $id = intval($_POST['product_id']);
    
    $sql = "DELETE FROM products WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        $_SESSION['success'] = "Product deleted successfully";
    } else {
        $_SESSION['error'] = "Error deleting product: " . $conn->error;
    }
    
    header("Location: ../dashboard.php");
    exit;
}

header("Location: ../dashboard.php");
exit;
?>