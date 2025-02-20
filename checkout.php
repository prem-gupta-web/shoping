<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include 'config.php';

// Check if the cart is empty
if (empty($_SESSION['cart'])) {
    header("Location: cart-view.php");
    exit();
}

// Function to calculate the total price of the cart
function calculateTotal() {
    $total = 0;
    foreach ($_SESSION['cart'] as $productId => $item) {
        $total += $item['price'] * $item['quantity'];
    }
    return $total;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['place_order'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $country = $_POST['country'];
    $total = calculateTotal();
    $order_date = date('Y-m-d H:i:s');
    $payment_method = $_POST['payment_method'];

    $stmt = $conn->prepare("INSERT INTO orders (name, email, phone, address, city, state, zip, country, total, order_date, payment_method, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'Pending Payment')");
    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }

    $stmt->bind_param("sssssssdsss", $name, $email, $phone, $address, $city, $state, $zip, $country, $total, $order_date, $payment_method);

    if ($stmt->execute()) {
        $_SESSION['order_id'] = $stmt->insert_id;
        if ($payment_method === 'UPI') {
            header('Location: upload_proof.php');
        } else {
            header('Location: confirm_order.php?order_id=' . $stmt->insert_id);
        }
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}

// Fetch QR code path
$qr_result = $conn->query("SELECT qr_code FROM settings WHERE id = 1");
if ($qr_result) {
    $qr_row = $qr_result->fetch_assoc();
    $qr_code_path = $qr_row['qr_code'] ?? null;
} else {
    $qr_code_path = null;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
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
        <h2 class="text-center mb-4">Checkout</h2>
        <p class="text-center">Please transfer the amount to the following bank account or UPI ID:</p>
        <p class="text-center"><strong>Bank Account:</strong> 1234567890<br><strong>IFSC Code:</strong> ABCD0123456<br><strong>UPI ID:</strong> example@upi</p>
        <?php if ($qr_code_path): ?>
            <div class="text-center mb-4">
                <h4>Scan QR Code:</h4>
                <img src="<?php echo $qr_code_path; ?>" alt="UPI QR Code" width="250">
            </div>
        <?php endif; ?>
        <?php if (isset($success_message)): ?>
            <div class="alert alert-success" role="alert">
                <?php echo $success_message; ?>
            </div>
        <?php elseif (isset($error_message)): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error_message; ?>
            </div>
        <?php endif; ?>
        <form method="POST" action="checkout.php">
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone:</label>
                <input type="text" class="form-control" id="phone" name="phone" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address:</label>
                <textarea class="form-control" id="address" name="address" required></textarea>
            </div>
            <div class="mb-3">
                <label for="city" class="form-label">City:</label>
                <input type="text" class="form-control" id="city" name="city" required>
            </div>
            <div class="mb-3">
                <label for="state" class="form-label">State:</label>
                <input type="text" class="form-control" id="state" name="state" required>
            </div>
            <div class="mb-3">
                <label for="zip" class="form-label">Zip Code:</label>
                <input type="text" class="form-control" id="zip" name="zip" required>
            </div>
            <div class="mb-3">
                <label for="country" class="form-label">Country:</label>
                <input type="text" class="form-control" id="country" name="country" required>
            </div>
            <div class="mb-3">
                <label for="payment_method" class="form-label">Payment Method:</label>
                <select class="form-control" id="payment_method" name="payment_method" required>
                    <option value="Cash on Delivery">Cash on Delivery</option>
                    <option value="UPI">UPI</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="place_order">Place Order</button>
        </form>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>