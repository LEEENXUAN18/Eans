<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'mail/Exception.php';
require 'mail/PHPMailer.php';
require 'mail/SMTP.php';

// Include database configuration
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '
        <h2>Invalid email format</h2>
        <p>Please enter a valid email address.</p>
        <a href="forgot_password.php"><button>Go Back</button></a>';
        exit;
    }

    // Check if the email exists in the database
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user) {
        // Generate a unique reset token
        $token = bin2hex(random_bytes(50));
        $expiry = date('Y-m-d H:i:s', strtotime('+1 hour')); // 1-hour expiry

        // Update the user record with the reset token
        $stmt = $pdo->prepare("UPDATE users SET reset_token = ?, reset_token_expiry = ? WHERE email = ?");
        $stmt->execute([$token, $expiry, $email]);

        // Send the email with the reset link
$resetLink = "http://localhost/finaldemo/reset_password.php?token=" . $token;

        // Setup PHPMailer
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->SMTPDebug = 0; // Disable debug output
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com'; // SMTP server
            $mail->SMTPAuth   = true;
            $mail->Username   = 'enxuan18@gmail.com'; // Your Gmail address
            $mail->Password   = 'tnzvwbagrvxmgcuk'; // App password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Use TLS encryption
            $mail->Port       = 587;

            // Recipients
            $mail->setFrom('enxuan18@gmail.com', 'EANS Support'); // Your email and name
            $mail->addAddress($email); // Recipient email

            // Content
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = 'Password Reset Request';
            $mail->Body    = "Click the link to reset your password: <a href='$resetLink'>$resetLink</a>";

            // Send the email
            $mail->send();

            // Success message with a button
            echo '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Password Reset Email Sent</title>
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        background-color: #f4f4f4;
                        margin: 0;
                        padding: 0;
                    }
                    .container {
                        max-width: 400px;
                        margin: 100px auto;
                        padding: 20px;
                        background-color: #fff;
                        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                        border-radius: 8px;
                        text-align: center;
                    }
                    h2 {
                        color: #333;
                    }
                    p {
                        color: #555;
                    }
                    button {
                        padding: 10px 20px;
                        background-color: #5cb85c;
                        border: none;
                        border-radius: 4px;
                        color: white;
                        cursor: pointer;
                        font-size: 16px;
                        margin-top: 20px;
                    }
                    button:hover {
                        background-color: #4cae4c;
                    }
                </style>
            </head>
            <body>
                <div class="container">
                    <h2>Password Reset Email Sent</h2>
                    <p>A password reset link has been sent to your email.</p>
                    <a href="login.html"><button type="button">Go to Login</button></a>
                </div>
            </body>
            </html>
            ';

        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

    } else {
        echo '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Email Not Found</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f4f4f4;
                    margin: 0;
                    padding: 0;
                }
                .container {
                    max-width: 400px;
                    margin: 100px auto;
                    padding: 20px;
                    background-color: #fff;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                    border-radius: 8px;
                    text-align: center;
                }
                h2 {
                    color: #d9534f; /* Red color for error messages */
                }
                p {
                    color: #555;
                }
                button {
                    padding: 10px 20px;
                    background-color: #d9534f;
                    border: none;
                    border-radius: 4px;
                    color: black;
                    cursor: pointer;
                    font-size: 16px;
                    margin-top: 20px;
                }
                button:hover {
                    background-color: #c9302c;
                }
            </style>
        </head>
        <body>
            <div class="container">
                <h2>No User Found</h2>
                <p>No user found with that email address.</p>
                <a href="login.html"><button type="button">Go Back</button></a>
            </div>
        </body>
        </html>
        ';
    }
}
?>
