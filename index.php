<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include 'config.php';
include 'cart.php';

$cart = new Cart();

// Check if search query is set
$search_query = isset($_GET['search']) ? $_GET['search'] : '';

// Fetch products from the database
if ($search_query) {
    $stmt = $conn->prepare("SELECT * FROM products WHERE name LIKE ? OR description LIKE ?");
    $search_term = '%' . $search_query . '%';
    $stmt->bind_param("ss", $search_term, $search_term);
} else {
    $stmt = $conn->prepare("SELECT * FROM products");
}

$stmt->execute();
$result = $stmt->get_result();

// Handle Add to Cart
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_to_cart'])) {
    $productId = $_POST['product_id'];
    $quantity = 1; // Default quantity

    // Fetch product price from the database
    $stmt = $conn->prepare("SELECT price FROM products WHERE id = ?");
    $stmt->bind_param("i", $productId);
    $stmt->execute();
    $stmt->bind_result($price);
    $stmt->fetch();
    $stmt->close();

    $cart->addProduct($productId, $price, $quantity);
    header("Location: cart-view.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All To All Mobile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/4c729db828.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">

    <style>
        body {
            background-color: #121212;
            color: #ffffff;
        }
        .card {
            background-color:rgb(26, 25, 25);
            color: #ffffff;
        }
        .btn-primary {
            background-color:rgb(9, 95, 234);
            border: none;
        }
        .btn-outline-success {
            color: #ff5722;
            border-color: #ff5722;
        }
        .btn-outline-success:hover {
            background-color: #ff5722;
            color: #ffffff;
        }
        .navbar-dark .navbar-nav .nav-link {
            color: #ffffff;
        }
        .navbar-brand {
            color: #ffffff;
        }
        .carousel-caption p {
            color: #ffffff;
        }
        .review-heading {
            color: #ffffff;
        }
        .customer-review-section {
            background-color: #1e1e1e;
            color: #ffffff;
        }
        .social-description {
            color: #ffffff;
        }
        .social-icon {
            color: #ffffff;
        }
        .policy-header {
    font-size: 2.5rem;
    font-weight: 600;
    color: #ff5722;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.card {
    background-color: #1e1e1e;
    color: #fff;
    border-radius: 15px;
}

.card-body {
    padding: 30px;
}

.card-body h4 {
    font-size: 1.25rem;
    font-weight: 500;
    color: #ff5722;
}

.card-body p {
    font-size: 1rem;
    line-height: 1.6;
    color: #d1d1d1;
}

.card-body hr {
    border: 0;
    border-top: 1px solid #444;
    margin-top: 20px;
    margin-bottom: 20px;
}

.card-body .text-primary {
    color: #ff5722 !important;
}

/* Hover effect on card */
.card:hover {
    transform: scale(1.03);
    transition: transform 0.3s ease-in-out;
}

/* Responsive Design */
@media (max-width: 768px) {
    .card-body {
        padding: 20px;
    }
    .policy-header {
        font-size: 2rem;
    }
    .card-body h4 {
        font-size: 1.125rem;
    }
}

    </style>
</head>
<body>

 <!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-dark sticky-top" style="background: linear-gradient(to right, #6a11cb, #2575fc);">
    <!-- Brand Logo -->
    <a class="navbar-brand fw-bold fs-4" href="index.php">
        <i class="fa fa-mobile-alt"></i> All To All Mobile
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse text-center" id="navbarNav">
        <ul class="navbar-nav mx-auto">
            <li class="nav-item">
                <a class="nav-link text-white" href="index.php"><i class="fa fa-home"></i> Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="about.php"><i class="fa fa-info-circle"></i> About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="faq.php"><i class="fa fa-question-circle"></i> FAQ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="contact.php"><i class="fa fa-phone-alt"></i> Contact</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="feedback.php"><i class="fa fa-comment-dots"></i> Feedback</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="location.php"><i class="fa fa-map-marker-alt"></i> Location</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="cart-view.php"><i class="fa fa-shopping-cart"></i> Cart</a>
            </li>
        </ul>

        <!-- User Authentication Links -->
        <ul class="navbar-nav">
            <?php if (isset($_SESSION['user_id'])): ?>
                <li class="nav-item">
                    <a class="btn btn-warning" href="logout.php"><i class="fa fa-sign-out"></i> Logout</a>
                </li>
            <?php else: ?>
                <li class="nav-item">
                    <a class="btn btn-light text-primary" href="login.php"><i class="fa fa-sign-in-alt"></i> Login</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-light text-primary" href="register.php"><i class="fa fa-user-plus"></i> Register</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>


 <!-- Carousel Section -->
<section id="carousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="images/15.jpg" class="d-block w-100" >
            <div class="carousel-caption d-none d-md-block">
              <p>Welcome to our All To All Mobile!</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="images/16.jpg" class="d-block w-100" alt="">
            <div class="carousel-caption d-none d-md-block">
              <p>Discover the best products at unbeatable prices.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="images/3.png" class="d-block w-100" alt="">
            <div class="carousel-caption d-none d-md-block">
                 <p>Enjoy a seamless shopping experience.</p>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</section>

 <!-- Search Form -->
     <div class="container mt-4">
            <form method="GET" action="index.php" class="d-flex">
                <input class="form-control me-2" type="search" name="search" placeholder="Search for products" aria-label="Search" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    
 <!-- Product Section -->
 <div class="container my-5">
    <h2 class="text-center policy-header mb-4">Our Products</h2>
    <div class="row">
        <?php if ($result->num_rows > 0): ?>
            <?php $delay = 100; // Initial delay ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="col-md-4 mb-4" data-aos="zoom-in" data-aos-delay="<?php echo $delay; ?>" data-aos-duration="1200">
                    <div class="card h-100 shadow-sm">
                        <img src="<?php echo $row['image']; ?>" class="card-img-top" alt="<?php echo $row['name']; ?>">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title"><?php echo $row['name']; ?></h5>
                            <p class="card-text"><?php echo substr($row['description'], 0, 100) . '...'; ?></p>
                            <p class="fw-bold text-danger">₹<?php echo $row['price']; ?></p>
                            <form method="POST" action="" class="mt-auto">
                                <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
                                <button type="submit" name="add_to_cart" class="btn btn-primary w-100">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
                <?php $delay += 100; ?>
            <?php endwhile; ?>
        <?php else: ?>
            <p class="text-center">No products found matching your search criteria.</p>
        <?php endif; ?>
    </div>
</div>

 
<!-- Policy and Conditions Content -->
<div class="container my-5">
    <h2 class="text-center policy-header mb-4">Policy and Conditions</h2>

    <div class="card shadow-lg border-0 rounded-3">
        <div class="card-body policy-content">
            <h4 class="text-primary">Introduction</h4>
            <p>Welcome to All To All Mobile! By using our website, you agree to abide by the terms and conditions set forth in this policy. Please read them carefully.</p>

            <hr class="my-4">

            <h4 class="text-primary">Privacy Policy</h4>
            <p>Your privacy is important to us. We collect personal information only for the purpose of improving your shopping experience. We do not share your data with third parties without your consent.</p>

            <hr class="my-4">

            <h4 class="text-primary">Product Information</h4>
            <p>All product details, including descriptions, images, and prices, are accurate to the best of our knowledge. However, we reserve the right to modify any product details or pricing at any time.</p>

            <hr class="my-4">

            <h4 class="text-primary">Shipping and Delivery</h4>
            <p>We strive to process and deliver your orders as quickly as possible. Shipping times vary based on location, and shipping fees are calculated during checkout.</p>

            <hr class="my-4">

            <h4 class="text-primary">Returns and Exchanges</h4>
            <p>If you are unsatisfied with your purchase, we offer returns and exchanges within 30 days of delivery. Products must be in new, unused condition to be eligible for a return.</p>

            <hr class="my-4">

            <h4 class="text-primary">Payment</h4>
            <p>We accept various payment methods, including credit/debit cards and online payment platforms. All transactions are secured with encryption technology.</p>

            <hr class="my-4">

            <h4 class="text-primary">Limitation of Liability</h4>
            <p>All To All Mobile is not liable for any damages arising from the use of our products, including but not limited to indirect, incidental, or consequential damages.</p>

            <hr class="my-4">

            <h4 class="text-primary">Governing Law</h4>
            <p>This policy is governed by the laws of the jurisdiction in which All To All Mobile operates. Any disputes arising from the use of this site will be resolved under the laws of that jurisdiction.</p>
        </div>
    </div>
</div>


 <!-- Footer Section -->
 <footer class="bg-dark text-white py-4">
        <div class="container text-center">
            <p class="social-description">Stay connected with us on social media:</p>
            <div class="social-icons">
                <a href="https://www.facebook.com/profile.php?id=100091625616068" class="social-icon"><i class="fa-brands fa-facebook"></i></a>
                <a href="#" class="social-icon"><i class="fa-brands fa-twitter"></i></a>
                <a href="https://www.instagram.com/premguptaa_?utm_source=qr" class="social-icon"><i class="fa-brands fa-instagram"></i></a>
                <a href="#" class="social-icon"><i class="fa-brands fa-linkedin"></i></a>
                <a href="#" class="social-icon"><i class="fa-brands fa-youtube"></i></a>
            </div>
            <p>&copy; 2025 Shopping Website. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="script.js"></script>
</body>
</html>
