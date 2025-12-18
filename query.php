<?php
session_start();
require 'db.php'; // Already connected

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: contact.php");
    exit;
}

// Get data
$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$subject = trim($_POST['subject'] ?? '');
$message = trim($_POST['message'] ?? '');

// Validation
if(empty($name) || empty($email) || empty($subject) || empty($message)) {
    $_SESSION['message'] = "All fields are required.";
    header("Location: contact.php");
    exit;
}

if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['message'] = "Invalid email format.";
    header("Location: contact.php");
    exit;
}

// Insert into DB
$stmt = $conn->prepare("INSERT INTO queries (name, email, subject, message) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $email, $subject, $message);

if($stmt->execute()) {
    $_SESSION['message'] = "Your query has been submitted successfully!";
} else {
    $_SESSION['message'] = "Something went wrong. Try again.";
}

header("Location: index.html");
exit;
