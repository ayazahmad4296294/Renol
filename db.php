<?php
$servername = "localhost";
$username_db = "root";
$password_db = "";
$dbname = "renol_db";

$conn = new mysqli($servername, $username_db, $password_db, $dbname);

if ($conn->connect_error) {
    die("Database connection failed");
}
?>
