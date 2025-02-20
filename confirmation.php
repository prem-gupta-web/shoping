<?php
session_start();
include 'config.php';

if (!isset($_SESSION['upload_success'])) {
    header('Location: index.php');
    exit();
}

$upload_success = $_SESSION['upload_success'];
unset($_SESSION['upload_success']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
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
      
    </div>
</nav>

    <main class="container py-5">
        <h2 class="text-center mb-4">Payment Proof Uploaded</h2>
        <div class="alert alert-success text-center" role="alert">
            <?php echo $upload_success; ?><br>
            Your order is now pending verification. We will notify you once the payment is confirmed.
        </div>
        <div class="text-center">
            <a href="index.php" class="btn btn-primary">Continue Shopping</a>
        </div>
    </main>
    
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
</body>