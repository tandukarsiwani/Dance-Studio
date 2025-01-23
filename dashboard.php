<?php
session_start();
require_once 'server/db.php';

// Check if user is admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: index.php");
    exit;
}

// Fetch all products
$sql = "SELECT * FROM products ORDER BY id DESC";
$result = $conn->query($sql);
$products = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Products</title>
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/dropdown.css">
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
                        <button onclick="myFunction()" id="user-icon" class="dropbtn"><i
                                class="fas fa-user-circle"></i></button>
                        <div id="myDropdown" class="dropdown-content">
                            <p class="username"><?php echo htmlspecialchars($_SESSION['username']); ?></p>
                            <a href="server/logout.php" class="logout-btn">Logout</a>
                        </div>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
    <div class="ad-container">
        <h1 class="ad-title">Product Management</h1>

        <!-- Add Product Form -->
        <div class="ad-form-container">
            <h2 class="ad-subtitle">Add New Product</h2>
            <form action="server/product_process.php" method="POST" class="ad-form">
                <div class="ad-form-group">
                    <input type="text" name="title" placeholder="Product Title" required class="ad-input">
                </div>
                <div class="ad-form-group">
                    <input type="text" name="image_url" placeholder="Image URL" required class="ad-input">
                </div>
                <div class="ad-form-group">
                    <input type="number" name="rating" min="1" max="5" placeholder="Rating (1-5)" required
                        class="ad-input">
                </div>
                <div class="ad-form-group">
                    <input type="number" name="price" step="0.01" placeholder="Price" required class="ad-input">
                </div>
                <div class="ad-form-group">
                    <input type="text" name="category" placeholder="Category" required class="ad-input">
                </div>
                <div class="ad-form-group">
                    <input type="number" name="discount" min="0" max="100" placeholder="Discount %" class="ad-input">
                </div>
                <button type="submit" name="add_product" class="ad-button ad-button-primary">Add Product</button>
            </form>
        </div>

        <!-- Products Table -->
        <div class="ad-table-container">
            <h2 class="ad-subtitle">Existing Products</h2>
            <table class="ad-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Rating</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Discount</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($product['id']); ?></td>
                            <td><?php echo htmlspecialchars($product['title']); ?></td>
                            <td><img src="<?php echo htmlspecialchars($product['image_url']); ?>" alt="Product"
                                    class="ad-thumbnail"></td>
                            <td><?php echo htmlspecialchars($product['rating']); ?></td>
                            <td>$<?php echo number_format($product['price'], 2); ?></td>
                            <td><?php echo htmlspecialchars($product['category']); ?></td>
                            <td><?php echo isset($product['discount']) ? $product['discount'] . '%' : '0%'; ?></td>
                            <td>
                                <button onclick="editProduct(<?php echo htmlspecialchars(json_encode($product)); ?>)"
                                    class="ad-button ad-button-edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <form action="server/product_process.php" method="POST" style="display: inline;">
                                    <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                                    <button type="submit" name="delete_product" class="ad-button ad-button-delete"
                                        onclick="return confirm('Are you sure you want to delete this product?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Edit Modal -->
    <div id="editModal" class="ad-modal">
        <div class="ad-modal-content">
            <span class="ad-close">&times;</span>
            <h2>Edit Product</h2>
            <form action="server/product_process.php" method="POST" class="ad-form">
                <input type="hidden" name="product_id" id="edit_id">
                <div class="ad-form-group">
                    <label class="ad-label" for="edit_title">Product Title:</label>
                    <input type="text" name="title" id="edit_title" required class="ad-input">
                </div>
                <div class="ad-form-group">
                    <label class="ad-label" for="image_url">Image URL:</label>
                    <input type="text" name="image_url" id="edit_image_url" required class="ad-input">
                </div>
                <div class="ad-form-group">
                    <label class="ad-label" for="rating">Rating:</label>
                    <input type="number" name="rating" id="edit_rating" min="1" max="5" required class="ad-input">
                </div>
                <div class="ad-form-group">
                    <label class="ad-label" for="price">Price</label>
                    <input type="number" name="price" id="edit_price" step="0.01" required class="ad-input">
                </div>
                <div class="ad-form-group">
                    <label class="ad-label" for="category">Category</label>
                    <input type="text" name="category" id="edit_category" required class="ad-input">
                </div>
                <div class="ad-form-group">
                    <label class="ad-label" for="discount">Discount (%)</label>
                    <input type="number" name="discount" id="edit_discount" min="0" max="100" class="ad-input">
                </div>
                <button type="submit" name="update_product" class="ad-button ad-button-primary">Update Product</button>
            </form>
        </div>
    </div>

    <script>
        const modal = document.getElementById('editModal');
        const span = document.getElementsByClassName('ad-close')[0];

        function editProduct(product) {
            document.getElementById('edit_id').value = product.id;
            document.getElementById('edit_title').value = product.title;
            document.getElementById('edit_image_url').value = product.image_url;
            document.getElementById('edit_rating').value = product.rating;
            document.getElementById('edit_price').value = product.price;
            document.getElementById('edit_category').value = product.category;
            document.getElementById('edit_discount').value = product.discount || 0;
            modal.style.display = "block";
        }

        span.onclick = function () {
            modal.style.display = "none";
        }

        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
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