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
    <title>contact</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/dropdown.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script>
        function validateForm(event) {
            var isValid = true;
            var firstName = document.getElementById('ijowk-3').value;
            var email = document.getElementById('ipmgh-3').value;
            var phoneNumber = document.getElementById('imgis-3').value;
            var message = document.getElementById('i5vyy-3').value;
            document.getElementById('firstNameError').innerText = '';
            document.getElementById('emailError').innerText = '';
            document.getElementById('phoneNumberError').innerText = '';
            document.getElementById('messageError').innerText = '';

            if (firstName === "") {
                document.getElementById('firstNameError').innerText = "First Name is required.";
                isValid = false;
            }
            if (email === "") {
                document.getElementById('emailError').innerText = "Email is required.";
                isValid = false;
            }
            if (phoneNumber === "") {
                document.getElementById('phoneNumberError').innerText = "Phone Number is required.";
                isValid = false;
            }
            if (message === "") {
                document.getElementById('messageError').innerText = "Message is required.";
                isValid = false;
            }
            if (!isValid) {
                event.preventDefault();
            } else {
                alert("Your message has been submitted successfully.");
            }
        }
    </script>
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
    <div class="contact_us_6">
        <div class="responsive-container-block container">
            <form class="form-box" onsubmit="validateForm(event)">
                <div class="container-block form-wrapper">
                    <div class="mob-text">
                        <p class="text-blk contactus-head">
                            Get in Touch
                        </p>
                        <p class="text-blk contactus-subhead">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Felis diam lectus sapien.
                        </p>
                    </div>
                    <div class="responsive-container-block" id="i2cbk">
                        <div class="responsive-cell-block wk-tab-12 wk-mobile-12 wk-desk-12 wk-ipadp-12" id="i10mt-3">
                            <p class="text-blk input-title">
                                FIRST NAME
                            </p>
                            <input class="input" id="ijowk-3" name="FirstName" placeholder="Please enter first name...">
                            <p id="firstNameError" style="color: red;"></p>
                        </div>
                        <div class="responsive-cell-block wk-tab-12 wk-mobile-12 wk-desk-12 wk-ipadp-12" id="ip1yp">
                            <p class="text-blk input-title">
                                EMAIL
                            </p>
                            <input class="input" id="ipmgh-3" name="Email" placeholder="Please enter email...">
                            <p id="emailError" style="color: red;"></p>
                        </div>
                        <div class="responsive-cell-block wk-tab-12 wk-mobile-12 wk-desk-12 wk-ipadp-12" id="ih9wi">
                            <p class="text-blk input-title">
                                PHONE NUMBER
                            </p>
                            <input class="input" id="imgis-3" name="PhoneNumber"
                                placeholder="Please enter phone number...">
                            <p id="phoneNumberError" style="color: red;"></p>
                        </div>
                        <div class="responsive-cell-block wk-tab-12 wk-mobile-12 wk-desk-12 wk-ipadp-12" id="i634i-3">
                            <p class="text-blk input-title">
                                WHAT DO YOU HAVE IN MIND ?
                            </p>
                            <textarea class="textinput" id="i5vyy-3" placeholder="Please enter query..."></textarea>
                            <p id="messageError" style="color: red;"></p>
                        </div>
                    </div>
                    <button class="submit-btn" id="w-c-s-bgc_p-1-dm-id-2" type="submit">
                        Submit
                    </button>
                </div>
            </form>
            <div class="responsive-cell-block wk-desk-7 wk-ipadp-12 wk-tab-12 wk-mobile-12" id="i772w">
                <div class="map-part">
                    <p class="text-blk map-contactus-head" id="w-c-s-fc_p-1-dm-id">
                        Reach us at
                    </p>
                    <p class="text-blk map-contactus-subhead">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Felis diam lectus sapien.
                    </p>
                    <div class="social-media-links mob">
                        <a class="social-icon-link" href="https://www.twitter.com" id="ix94i-2-2">
                            <img class="link-img image-block"
                                src="https://workik-widget-assets.s3.amazonaws.com/Footer1-83/v1/images/Icon-twitter.png">
                        </a>
                        <a class="social-icon-link" href="https://www.facebook.com" id="itixd">
                            <img class="link-img image-block"
                                src="https://workik-widget-assets.s3.amazonaws.com/Footer1-83/v1/images/Icon-facebook.png">
                        </a>
                        <a class="social-icon-link" href="https://www.instagram.com" id="izldf-2-2">
                            <img class="link-img image-block"
                                src="https://workik-widget-assets.s3.amazonaws.com/Footer1-83/v1/images/Icon-instagram.png">
                        </a>
                    </div>
                    <div class="map-box container-block">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="contact_info">
        <div class="section-header">
            <h2>Contact Us</h2>
        </div>
        <div class="contact_info_content">
            <div class="contact_info_row">
                <div class="contact_info_item">
                    <i class="fas fa-envelope contact_icon"></i>
                    <p class="contact_info_text">contact@fusionstudio.com</p>
                </div>
                <div class="contact_info_item">
                    <i class="fas fa-phone contact_icon"></i>
                    <p class="contact_info_text">+1 (555) 123-4567</p>
                </div>
                <div class="contact_info_item">
                    <i class="fas fa-map-marker-alt contact_icon"></i>
                    <p class="contact_info_text">123 fusion studio St., fusion, boombox</p>
                </div>
            </div>
        </div>
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