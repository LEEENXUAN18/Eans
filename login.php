<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Fetch user from the database
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    // Verify password
    if ($user && password_verify($password, $user['password'])) {
        // Start the session
        session_start();
        
        // Set session variables (optional, can be used to store user information)
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_email'] = $user['email'];

        // Redirect to mainpage.html
        header("Location: mainpage.php");
        exit(); // Always exit after a redirect
    } else {
        echo "Invalid email or password!";
    }
}
?>


 