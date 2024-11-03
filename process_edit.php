<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $reg_no = $_POST['reg_no'];
    $poly_name = $_POST['poly_name'];
    $dept_name = $_POST['dept_name'];
    $class = $_POST['class'];
    $email = $_POST['email'];
    $ic_no = $_POST['ic_no'];
    $phone_no = $_POST['phone_no'];
    $session = $_POST['session'];
    $advisor_name = $_POST['advisor_name'];
    $hpnm = $_POST['hpnm'];
    $calculated_mark = $_POST['calculated_mark'];
    $org_program = $_POST['org_program'];
    $calculate1_mark = $_POST['calculate1_mark'];
    $program_name = $_POST['program_name'];
    $calculate2_mark = $_POST['calculate2_mark'];
    $program_name3 = $_POST['program_name3'];
    $calculate_k3_mark = $_POST['calculate_k3_mark'];
    $total_mark = $_POST['total_mark'];
    $total_marks = $calculated_mark + $calculate1_mark + $calculate2_mark + $calculate_k3_mark; 
	
	
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = ""; // Your database password
    $dbname = "nominations"; // Your database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert data into database
    $sql = "INSERT INTO scoring (name, reg_no, poly_name, dept_name, class, email, ic_no, phone_no, session, advisor_name, hpnm, calculated_mark, org_program, calculate1_mark, program_name, calculate2_mark, program_name3, calculate_k3_mark, total_mark) VALUES ('$name', '$reg_no', '$poly_name', '$dept_name', '$class', '$email', '$ic_no', '$phone_no', '$session', '$advisor_name', '$hpnm','$calculated_mark','$org_program', '$calculate1_mark', '$program_name', '$calculate2_mark', '$program_name3', '$calculate_k3_mark', '$total_mark')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
