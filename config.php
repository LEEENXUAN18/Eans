<?php
// PDO connection
$host = "localhost"; // Database host (usually localhost)
$dbname = "eans_system"; // Name of your database
$username = "root"; // Database username (default is 'root' for local)
$password = ""; // Database password (leave blank for default in XAMPP)

try {
    // Create a new PDO instance
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Handle connection errors
    die("Database connection failed: " . $e->getMessage());
}

// MySQLi connection
$conn = mysqli_connect('localhost', 'root', '', 'eans_system') or die('Connection failed: ' . mysqli_connect_error());

// You can now use both $pdo and $conn as needed in your script
?>
