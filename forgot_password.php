<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <style>
        * {
            font-family: 'Poppins', sans-serif; /* Font style for the entire page */
            box-sizing: border-box; /* Include padding and border in element's total width and height */
            margin: 0; /* Remove default margin */
            padding: 0; /* Remove default padding */
        }

        body {
            background-color: #f4f4f4; /* Background color */
            display: flex; /* Use flexbox for centering */
            justify-content: center; /* Center content horizontally */
            align-items: center; /* Center content vertically */
            height: 100vh; /* Full viewport height */
        }

        .container {
            background-color: #ffffff; /* White background for form */
            padding: 20px; /* Space inside the container */
            border-radius: 8px; /* Rounded corners */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Subtle shadow */
            width: 90%; /* Full width on mobile */
            max-width: 400px; /* Max width on larger screens */
            text-align: center; /* Centered text */
        }

        h2 {
            color: #333; /* Header color */
            margin-bottom: 20px; /* Space below the header */
            font-size: 1.5em; /* Adjust size for better visibility */
        }

        label {
            display: block; /* Block display for labels */
            margin: 10px 0 5px; /* Space around labels */
            font-weight: bold; /* Bold font */
            font-size: 0.9em; /* Slightly smaller label size */
        }

        input[type="email"] {
            width: 100%; /* Full width */
            padding: 10px; /* Padding for input */
            border: 1px solid #ccc; /* Border color */
            border-radius: 4px; /* Rounded corners */
            margin-bottom: 15px; /* Space between inputs */
        }

        button {
            background-color: #fcd32a; /* Button color */
            color: #333; /* Button text color */
            border: none; /* Remove border */
            padding: 10px; /* Padding for button */
            border-radius: 4px; /* Rounded corners */
            cursor: pointer; /* Pointer on hover */
            width: 100%; /* Full width */
            transition: background-color 0.3s; /* Smooth transition */
        }

        button:hover {
            background: rgba(37, 95, 156, 0.937); /* Change color on hover */
            color: #fff; /* Change text color on hover */
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .container {
                padding: 15px; /* Reduced padding for smaller screens */
            }

            h2 {
                font-size: 1.3em; /* Adjust heading size for better visibility */
            }
        }

        @media (max-width: 480px) {
            .container {
                width: 95%; /* Slightly wider for very small screens */
            }

            h2 {
                font-size: 1.2em; /* Adjust heading size for very small screens */
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Forgot Password</h2>
        <form action="send_reset_link.php" method="post">
            <label for="email">Enter your email:</label>
            <input type="email" name="email" required>
            <button type="submit">Send Reset Link</button>
        </form>
    </div>
</body>
</html>
