<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Location</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/4c729db828.js" crossorigin="anonymous"></script>
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
    <!-- Our Location Section -->
<section class="location-section">
    <div class="container">
        <h2 class="location-heading">Our Location</h2>
        <p class="location-description">Visit us at our store or find us on the map below:</p>
        <div class="map-container">
            <iframe 
                class="location-map"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3649.8516312543214!2d79.9468741153965!3d23.18093961322826!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3981ae54afc54d77%3A0x1c8a6eb7c6b8ed5c!2sJayanti%20Complex%2C%20Jabalpur!5e0!3m2!1sen!2sin!4v1694467866453!5m2!1sen!2sin"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
            ></iframe>
        </div>
        <div class="location-info">
            <p><i class="fa-solid fa-location-dot"></i> Jayanti Complex, Jabalpur, India</p>
            <p><i class="fa-solid fa-phone"></i> +91 8839895124</p>
            <p><i class="fa-solid fa-envelope"></i> alltoall@gmail.com.com</p>
        </div>
    </div>
</section>
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
</html>