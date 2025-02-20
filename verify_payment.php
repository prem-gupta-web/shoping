<?php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $order_id = $_POST['order_id'];

    if (isset($_POST['confirm_payment'])) {
        $status = 'Confirmed';
    } elseif (isset($_POST['reject_payment'])) {
        $status = 'Rejected';
    } else {
        die("Invalid action.");
    }

    $stmt = $conn->prepare("UPDATE orders SET status = ? WHERE id = ?");
    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }

    $stmt->bind_param("si", $status, $order_id);

    if ($stmt->execute()) {
        header('Location: admin_dashboard.php');
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>