<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nomination Form</title>
    <style>
        /* Overall page styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        /* Container for form */
        .form-container {
            background-color: #ffffff;
            width: 100%;
            max-width: 600px;
            padding: 20px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 8px;
            margin: 10px;
        }

        /* Form title styling */
        .form-container h1 {
            font-size: 24px;
            color: #333333;
            text-align: center;
            margin-bottom: 20px;
        }

        /* Label styling */
        label {
            font-weight: bold;
            color: #555555;
            margin-top: 10px;
            display: block;
        }

        /* Input and select field styling */
        input[type="text"], input[type="email"], input[type="number"], input[type="tel"], select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #cccccc;
            border-radius: 5px;
            font-size: 16px;
            color: #333333;
        }

        /* Button styling */
        button, .form-container a {
            background-color: #faa307;
            color: black;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            display: inline-block;
            margin-top: 15px;
            transition: background-color 0.3s ease;
        }

        /* Button hover effect */
        button:hover, .form-container a:hover {
            background-color: #ffbf69;
        }
/* Centering container for button */
.button-center {
    display: flex;
    justify-content: center; /* Centers the button horizontally */
    margin-top: 20px;
}

        /* Success message styling */
        .success-message {
            font-size: 18px;
            color: #4CAF50;
            text-align: center;
        }

        /* Error message styling */
        .error-message {
            font-size: 18px;
            color: red;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Nomination Form</h1>

        <?php
        $host = "localhost";
        $username = "root";
        $password = "";
        $db_name = "nominations";

        // Create a new PDO instance
        try {
            $pdo = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("<p class='error-message'>Could not connect to the database: " . $e->getMessage() . "</p>");
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Sanitize and retrieve the form inputs
            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
            $reg_no = filter_input(INPUT_POST, 'reg_no', FILTER_SANITIZE_STRING);
            $poly_name = filter_input(INPUT_POST, 'poly_name', FILTER_SANITIZE_STRING);
            $dept_name = filter_input(INPUT_POST, 'dept_name', FILTER_SANITIZE_STRING);
            $class = filter_input(INPUT_POST, 'class', FILTER_SANITIZE_STRING);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $ic_no = filter_input(INPUT_POST, 'ic_no', FILTER_SANITIZE_STRING);
            $phone_no = filter_input(INPUT_POST, 'phone_no', FILTER_SANITIZE_STRING);
            $session = filter_input(INPUT_POST, 'session', FILTER_SANITIZE_STRING);
            $advisor_name = filter_input(INPUT_POST, 'advisor_name', FILTER_SANITIZE_STRING);
            
            $hpnm = filter_input(INPUT_POST, 'hpnm', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $calculated_mark = filter_input(INPUT_POST, 'calculated_mark', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $org_program = filter_input(INPUT_POST, 'org_program', FILTER_SANITIZE_STRING);
            $calculate1_mark = filter_input(INPUT_POST, 'calculate1_mark', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $program_name = filter_input(INPUT_POST, 'program_name', FILTER_SANITIZE_STRING);
            $calculate2_mark = filter_input(INPUT_POST, 'calculate2_mark', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $program_name3 = filter_input(INPUT_POST, 'program_name3', FILTER_SANITIZE_STRING);
            $calculate_k3_mark = filter_input(INPUT_POST, 'calculate_k3_mark', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

            // Cast string inputs to float for numeric calculations
            $hpnm = (float) $hpnm;
            $calculated_mark = (float) $calculated_mark;
            $calculate1_mark = (float) $calculate1_mark;
            $calculate2_mark = (float) $calculate2_mark;
            $calculate_k3_mark = (float) $calculate_k3_mark;

            // Calculate total marks
            $total_mark = $calculated_mark + $calculate1_mark + $calculate2_mark + $calculate_k3_mark;

            // Prepare SQL statement to insert form data into the database
            $sql = "INSERT INTO scoring (name, reg_no, poly_name, dept_name, class, email, ic_no, phone_no, session, advisor_name, hpnm, calculated_mark, org_program, calculate1_mark, program_name, calculate2_mark, program_name3, calculate_k3_mark, total_mark)
                    VALUES (:name, :reg_no, :poly_name, :dept_name, :class, :email, :ic_no, :phone_no, :session, :advisor_name, :hpnm, :calculated_mark, :org_program, :calculate1_mark, :program_name, :calculate2_mark, :program_name3, :calculate_k3_mark, :total_mark)";

            $stmt = $pdo->prepare($sql);

            // Bind parameters
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':reg_no', $reg_no);
            $stmt->bindParam(':poly_name', $poly_name);
            $stmt->bindParam(':dept_name', $dept_name);
            $stmt->bindParam(':class', $class);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':ic_no', $ic_no);
            $stmt->bindParam(':phone_no', $phone_no);
            $stmt->bindParam(':session', $session);
            $stmt->bindParam(':advisor_name', $advisor_name);
            $stmt->bindParam(':hpnm', $hpnm);
            $stmt->bindParam(':calculated_mark', $calculated_mark);
            $stmt->bindParam(':org_program', $org_program);
            $stmt->bindParam(':calculate1_mark', $calculate1_mark);
            $stmt->bindParam(':program_name', $program_name);
            $stmt->bindParam(':calculate2_mark', $calculate2_mark);
            $stmt->bindParam(':program_name3', $program_name3);
            $stmt->bindParam(':calculate_k3_mark', $calculate_k3_mark);
            $stmt->bindParam(':total_mark', $total_mark);

            // Execute the statement
        if ($stmt->execute()) {
            echo "<p class='success-message'>Form submitted successfully!</p>";
            echo "<div class='button-center'>"; // Center the back button
            echo "<a href='tableindex.php' class='btn-back'>Back to Dashboard</a>";
            echo "</div>";
        } else {
            echo "<p class='error-message'>Error submitting form.</p>";
        }
    }
    ?>
</div>
</body>
</html>
