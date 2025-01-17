<?php
include '../db.php';

// SQL query to get all products
$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);

echo "<h1>Product List</h1>";
echo "<table border='1'>";
echo "<tr><th>Title</th><th>Image</th><th>Rating</th><th>Price</th><th>Category</th><th>Actions</th></tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['title'] . "</td>";
    echo "<td><img src='" . $row['image_url'] . "' width='100' /></td>";
    echo "<td>" . $row['rating'] . "</td>";
    echo "<td>$" . $row['price'] . "</td>";
    echo "<td>" . $row['category'] . "</td>";
    echo "<td>
            <a href='update_product.php?id=" . $row['id'] . "'>Update</a> | 
            <a href='delete_product.php?id=" . $row['id'] . "'>Delete</a>
          </td>";
    echo "</tr>";
}
echo "</table>";
?>
