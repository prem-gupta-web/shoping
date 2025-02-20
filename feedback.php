<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $rating = $_POST['rating'];
    $message = $_POST['message'];

    // Database connection
    include 'config.php';

    // Insert feedback into database
    $stmt = $conn->prepare("INSERT INTO feedback (name, email, rating, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssis", $name, $email, $rating, $message);

    if ($stmt->execute()) {
        echo "<script>alert('Feedback submitted successfully!');</script>";
    } else {
        echo "<script>alert('Error submitting feedback.');</script>";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/4c729db828.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background: #121212;
            color: #fff;
        }
        .feedback-container {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            background: #1f1f1f;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(255, 255, 255, 0.1);
        }
        .rating {
            display: flex;
            justify-content: center;
            flex-direction: row-reverse;
        }
        .rating input {
            display: none;
        }
        .rating label {
            font-size: 30px;
            color: gray;
            cursor: pointer;
            transition: color 0.3s;
        }
        .rating input:checked ~ label,
        .rating label:hover,
        .rating label:hover ~ label {
            color: gold;
        }
        .btn-submit {
            width: 100%;
            background: #ff9800;
            color: white;
            font-weight: bold;
            transition: 0.3s;
        }
        .btn-submit:hover {
            background: #e68900;
        }
        input, textarea {
            background: #333;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            border-radius: 5px;
        }
        input:focus, textarea:focus {
            outline: 2px solid #ff9800;
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
      
    </div>
</nav>

<div class="container">
    <div class="feedback-container">
        <h2 class="text-center"><i class="fa fa-star"></i> Your Feedback</h2>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="name" class="form-label"><i class="fa fa-user"></i> Name:</label>
                <input type="text" id="name" name="name" required placeholder="Enter your name">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label"><i class="fa fa-envelope"></i> Email:</label>
                <input type="email" name="email" id="email" required placeholder="Enter your email">
            </div>

            <div class="mb-3">
                <label class="form-label"><i class="fa fa-star"></i> Rating:</label>
                <div class="rating">
                    <input type="radio" name="rating" value="5" id="star5"><label for="star5">&#9733;</label>
                    <input type="radio" name="rating" value="4" id="star4"><label for="star4">&#9733;</label>
                    <input type="radio" name="rating" value="3" id="star3"><label for="star3">&#9733;</label>
                    <input type="radio" name="rating" value="2" id="star2"><label for="star2">&#9733;</label>
                    <input type="radio" name="rating" value="1" id="star1"><label for="star1">&#9733;</label>
                </div>
            </div>

            <div class="mb-3">
                <label for="message" class="form-label"><i class="fa fa-comments"></i> Message:</label>
                <textarea name="message" id="message" rows="4" required placeholder="Write your feedback"></textarea>
            </div>

            <button type="submit" class="btn btn-submit"><i class="fa fa-paper-plane"></i> Submit Feedback</button>
        </form>
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
</body>
</html>
