<?php
session_start();
require 'db.php';

// Only allow POST requests
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: contact.php");
    exit;
}

// Trim inputs
$email = trim($_POST['email'] ?? '');
$password = trim($_POST['password'] ?? '');

// Validate inputs
if (empty($email) || empty($password)) {
    $_SESSION['message'] = "Email and password are required.";
    header("Location: contact.php");
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['message'] = "Invalid email format.";
    header("Location: contact.php");
    exit;
}

// Prepare and execute query
$stmt = $conn->prepare("SELECT fullName, password FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows === 0) {
    $_SESSION['message'] = "No account found with this email.";
    header("Location: contact.php");
    exit;
}

// Bind result
$stmt->bind_result($fullName, $hashed_password);
$stmt->fetch();

// Debugging (optional: remove in production)
// var_dump($password);
// var_dump($hashed_password);
// var_dump(password_verify($password, $hashed_password));
// exit;

// Verify password
if (!password_verify($password, $hashed_password)) {
    $_SESSION['message'] = "Incorrect password.";
    header("Location: contact.php");
    exit;
}

// Login successful
$_SESSION['email'] = $email;
$_SESSION['fullName'] = $fullName;
$_SESSION['message'] = "Login successful! Welcome $fullName.";

header("Location: index.html");
exit;
