<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if name, email, and password are set
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

        // Debugging: Print the received values
        echo "Received values: Name = $name, Email = $email";

        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $password);

        if ($stmt->execute()) {
            header("Location: login.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "All fields are required.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/4c729db828.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
   <!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top shadow">
        <div class="container">
            <a class="navbar-brand fw-bold fs-4" href="index.php"><i class="fa fa-mobile-alt"></i> All To All Mobile</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse text-center" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link text-white" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="about.php">About</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="faq.php">FAQ</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="contact.php">Contact</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="feedback.php">FB</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="location.php">Location</a></li>                  
                    <li class="nav-item"><a class="nav-link text-white" href="cart-view.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                </ul>
                <ul class="navbar-nav">
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <li class="nav-item"><a class="btn btn-warning" href="logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
                    <?php else: ?>
                        <li class="nav-item"><a class="btn btn-light text-primary" href="login.php"><i class="fa fa-user"></i> Login</a></li>
                        <li class="nav-item"><a class="btn btn-light text-primary" href="register.php"><i class="fa fa-user"></i>Register</a></li>

                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container py-5">
        <section>
            <h2 class="text-center mb-4">Register</h2>
            <form method="POST" action="">
                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </section>
    </main>
    <!-- Footer Section -->
    <footer class="bg-dark text-white py-4">
        <div class="container text-center">
        <div class="footer-icons">
    <a href="https://www.facebook.com/profile.php?id=100091625616068"><i class="fab fa-facebook"></i></a>
    <a href="#"><i class="fab fa-twitter"></i></a>
    <a href="https://www.instagram.com/premguptaa_?utm_source=qr"><i class="fab fa-instagram"></i></a>
        </div>
            <p>&copy; 2025 Shopping Website. All Rights Reserved.</p>

        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>