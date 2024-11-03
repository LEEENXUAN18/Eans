<?php
include 'config.php';
session_start();
$user_id = $_SESSION['user_id']; // Get the logged-in user's ID
$message = []; // Initialize the message array to store messages

if (isset($_POST['update_profile'])) {
    // Sanitize user input
    $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
    $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);

    // Update user's name and email
    if (mysqli_query($conn, "UPDATE `users` SET name = '$update_name', email = '$update_email' WHERE id = '$user_id'")) {
        $message[] = 'Username and email updated successfully!';
    } else {
        $message[] = 'Failed to update username and email.';
    }

    // Handle password update
    $old_pass = $_POST['update_pass']; // Get the plain text old password
    $new_pass = mysqli_real_escape_string($conn, $_POST['new_pass']);
    $confirm_pass = mysqli_real_escape_string($conn, $_POST['confirm_pass']);

    // Check if the new password fields are not empty
    if (!empty($old_pass) || !empty($new_pass) || !empty($confirm_pass)) {
        // Fetch the current hashed password from the database
        $current_user_query = mysqli_query($conn, "SELECT password FROM `users` WHERE id = '$user_id'") or die('query failed');
        $current_user = mysqli_fetch_assoc($current_user_query);

        // Verify the old password
        if (!password_verify($old_pass, $current_user['password'])) {
            $message[] = 'Old password not matched!';
        } elseif ($new_pass !== $confirm_pass) {
            $message[] = 'Confirm password not matched!';
        } else {
            // Hash the new password and update it
            $hashed_new_pass = password_hash($new_pass, PASSWORD_DEFAULT);
            if (mysqli_query($conn, "UPDATE `users` SET password = '$hashed_new_pass' WHERE id = '$user_id'")) {
                $message[] = 'Password updated successfully!';
            } else {
                $message[] = 'Failed to update password.';
            }
        }
    } 

    // Handle image upload
    $update_image = $_FILES['update_image']['name'];
    $update_image_size = $_FILES['update_image']['size'];
    $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
    $update_image_folder = 'uploaded_img/' . basename($update_image); // Use basename to avoid path traversal

    if (!empty($update_image)) {
        if ($update_image_size > 2000000) {
            $message[] = 'Image is too large. Maximum size allowed is 2MB.';
        } else {
            // Check if the directory exists
            if (!is_dir('uploaded_img')) {
                mkdir('uploaded_img', 0777, true); // Create directory if it doesn't exist
            }

            // Check for valid image file types
            $allowed_types = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif', 'image/webp'];
            $file_type = mime_content_type($update_image_tmp_name);

            if (in_array($file_type, $allowed_types)) {
                // Update user's image
                if (move_uploaded_file($update_image_tmp_name, $update_image_folder)) {
                    if (mysqli_query($conn, "UPDATE `users` SET image = '$update_image' WHERE id = '$user_id'")) {
                        $message[] = 'Image updated successfully!';
                    } else {
                        $message[] = 'Failed to update image in database.';
                    }
                } else {
                    $message[] = 'Image upload failed! Check permissions or directory existence.';
                }
            } else {
                $message[] = 'Invalid file type. Please upload an image (JPG, JPEG, PNG, GIF, WEBP).';
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
    <!-- Custom CSS file link -->
    <link rel="stylesheet" href="profile.css">
</head>
<body>
<div class="update-profile">
    <?php
    // Fetch user details for the logged-in user
    $select = mysqli_query($conn, "SELECT * FROM `users` WHERE id = '$user_id'") or die('query failed');
    if (mysqli_num_rows($select) > 0) {
        $fetch = mysqli_fetch_assoc($select);
    }
    ?>

    <form action="" method="post" enctype="multipart/form-data">
        <?php
        // Display user's current profile picture or a default one
        if (!empty($fetch['image'])) {
            echo '<img src="uploaded_img/' . $fetch['image'] . '" alt="Profile Image">';
        } else {
            echo '<img src="images/default-avatar.png" alt="Default Avatar">';
        }
        
        // Display messages if any
        if (isset($message)) {
            foreach ($message as $msg) {
                echo '<div class="message">' . $msg . '</div>';
            }
        }
        ?>
        <div class="flex">
            <div class="inputBox">
                <span>Username:</span>
                <input type="text" name="update_name" value="<?php echo $fetch['name']; ?>" class="box" required>
                <span>Your Email:</span>
                <input type="email" name="update_email" value="<?php echo $fetch['email']; ?>" class="box" required>
                <span>Update Your Pic:</span>
                <input type="file" name="update_image" accept="image/*" class="box"> <!-- Allow any image type -->
            </div>
            <div class="inputBox">
                <input type="hidden" name="old_pass" value="<?php echo $fetch['password']; ?>">
                <span>Old Password:</span>
                <input type="password" name="update_pass" placeholder="Enter previous password" class="box">
                <span>New Password:</span>
                <input type="password" name="new_pass" placeholder="Enter new password" class="box">
                <span>Confirm Password:</span>
                <input type="password" name="confirm_pass" placeholder="Confirm new password" class="box">
            </div>
        </div>
        <input type="submit" value="Update Profile" name="update_profile" class="btn">
        <a href="mainpage.php" class="delete-btn">Home Page</a>
    </form>
</div>
</body>
</html>
