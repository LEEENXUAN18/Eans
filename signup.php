<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if form fields are set
    $name = isset($_POST['name']) ? $_POST['name'] : null;
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $password = isset($_POST['password']) ? $_POST['password'] : null;
    $confirm_password = isset($_POST['cpassword']) ? $_POST['cpassword'] : null;
    
    // Handle the image upload
    $image = isset($_FILES['image']) ? $_FILES['image']['name'] : null;
    $image_size = isset($_FILES['image']) ? $_FILES['image']['size'] : 0;
    $image_tmp_name = isset($_FILES['image']) ? $_FILES['image']['tmp_name'] : null;
    $image_folder = 'uploaded_img/' . $image;

    // Check if all required fields are filled
    if (empty($name) || empty($email) || empty($password) || empty($confirm_password)) {
        echo "Please fill all required fields!";
        exit();
    }

    // Check if passwords match
    if ($password !== $confirm_password) {
        echo "Passwords do not match!";
        exit();
    }

    // Check if email already exists
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user) {
        echo "Email is already registered!";
        exit();
    }

    // Check image size
    if ($image_size > 2000000) {
        echo "Image size is too large!";
        exit();
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert the new user into the database
    $stmt = $pdo->prepare("INSERT INTO users (name, email, password, image) VALUES (?, ?, ?, ?)");
    if ($stmt->execute([$name, $email, $hashed_password, $image])) {
        move_uploaded_file($image_tmp_name, $image_folder);
        echo "Registration successful!";
        // Redirect to login page or display success message
        header("Location: login.html");
        exit();
    } else {
        echo "Registration failed!";
    }
}
?>
