<?php
session_start();
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: contact.php");
    exit;
}

$fullName = trim($_POST['fullName'] ?? '');
$email = trim($_POST['email'] ?? '');
$phoneNo = trim($_POST['phoneNo'] ?? '');
$password = $_POST['password'] ?? '';
$confirmPassword = $_POST['confirmPassword'] ?? '';

if (
    empty($fullName) ||
    empty($email) ||
    empty($phoneNo) ||
    empty($password) ||
    empty($confirmPassword)
) {
    $_SESSION['message'] = "All fields are required.";
    header("Location: contact.php");
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['message'] = "Invalid email address.";
    header("Location: contact.php");
    exit;
}

if ($password !== $confirmPassword) {
    $_SESSION['message'] = "Passwords do not match.";
    header("Location: contact.php");
    exit;
}

if (!preg_match("/^[0-9]{10}$/", $phoneNo)) {
    $_SESSION['message'] = "Invalid phone number.";
    header("Location: contact.php");
    exit;
}

$check = $conn->prepare("SELECT id FROM users WHERE email = ?");
$check->bind_param("s", $email);
$check->execute();
$check->store_result();

if ($check->num_rows > 0) {
    $_SESSION['message'] = "Email already registered.";
    header("Location: contact.php");
    exit;
}

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$stmt = $conn->prepare(
    "INSERT INTO users (fullName, email, phoneNo, password)
     VALUES (?, ?, ?, ?)"
);

$stmt->bind_param("ssss", $fullName, $email, $phoneNo, $hashed_password);

if ($stmt->execute()) {
    $_SESSION['message'] = "Account created successfully. Please login.";
} else {
    $_SESSION['message'] = "Something went wrong. Try again.";
}

header("Location: contact.php");
exit;
?>