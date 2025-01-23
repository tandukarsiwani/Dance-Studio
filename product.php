<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>

<?php
require_once 'server/db.php';

// Fetch all products from database
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
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Product</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/product.css">
    <link rel="stylesheet" href="css/dropdown.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
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

    <div class="products">
        <div class="container">
            <h1 class="lg-title">Holidays sale is live</h1>
            <p class="text-light">Enjoy the discounted price on every dance accessories and equipment this holiday. shop
                more with less. Get even more discount on referrals and win prizes.</p>

            <div class="product-items">
                <?php foreach ($products as $product): ?>
                    <div class="product">
                        <div class="product-content">
                            <div class="product-img">
                                <img src="<?php echo htmlspecialchars($product['image_url']); ?>" alt="product image">
                            </div>
                            <div class="product-btns">
                                <button type="button" class="btn-cart" data-product-id="<?php echo $product['id']; ?>">
                                    add to cart
                                    <span><i class="fas fa-plus"></i></span>
                                </button>
                                <button type="button" class="btn-buy" data-product-id="<?php echo $product['id']; ?>">
                                    buy now
                                    <span><i class="fas fa-shopping-cart"></i></span>
                                </button>
                            </div>
                        </div>

                        <div class="product-info">
                            <div class="product-info-top">
                                <h2 class="sm-title"><?php echo htmlspecialchars($product['category']); ?></h2>
                                <div class="rating">
                                    <?php
                                    // Display rating stars based on product rating
                                    $rating = intval($product['rating']);
                                    for ($i = 1; $i <= 5; $i++) {
                                        if ($i <= $rating) {
                                            echo '<span><i class="fas fa-star"></i></span>';
                                        } else {
                                            echo '<span><i class="far fa-star"></i></span>';
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                            <a href="#" class="product-name"><?php echo htmlspecialchars($product['title']); ?></a>
                            <p class="product-price">$ <?php echo number_format($product['price'], 2); ?></p>
                        </div>

                        <?php if (isset($product['discount']) && $product['discount'] > 0): ?>
                            <div class="off-info">
                                <h2 class="sm-title"><?php echo $product['discount']; ?>% off</h2>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

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