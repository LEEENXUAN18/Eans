<?php
include 'scoring_conn.php'; // Include database connection

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the posted form data
    $id = $_POST['id']; // Record ID
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $reg_no = mysqli_real_escape_string($connection, $_POST['reg_no']);
    $poly_name = mysqli_real_escape_string($connection, $_POST['poly_name']);
    $dept_name = mysqli_real_escape_string($connection, $_POST['dept_name']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $ic_no = mysqli_real_escape_string($connection, $_POST['ic_no']);
    $phone_no = mysqli_real_escape_string($connection, $_POST['phone_no']);
    $session = mysqli_real_escape_string($connection, $_POST['session']);
    $advisor_name = mysqli_real_escape_string($connection, $_POST['advisor_name']);
    
    // Get calculated marks from the form (ensure they are posted)
    $hpnm = isset($_POST['hpnm']) ? floatval($_POST['hpnm']) : 0;
    $position = isset($_POST['position']) ? floatval($_POST['position']) : 0;
    $combined_selection = isset($_POST['combined_selection']) ? floatval($_POST['combined_selection']) : 0;
    $involvement = isset($_POST['involvement']) ? floatval($_POST['involvement']) : 0;

    // Calculate total marks
    $total_mark = $hpnm + $position + $combined_selection + $involvement;

    // Update query to modify the record in the database
    $update_sql = "UPDATE scoring 
                   SET name='$name', reg_no='$reg_no', poly_name='$poly_name', dept_name='$dept_name', 
                       email='$email', ic_no='$ic_no', phone_no='$phone_no', session='$session', 
                       advisor_name='$advisor_name', total_mark='$total_mark' 
                   WHERE id='$id'";

    // Execute the update query
    if (mysqli_query($connection, $update_sql)) {
        // Success message (JavaScript alert and redirect)
        echo "<script>
                alert('Record updated successfully!');
                window.location.href = 'tableindex.php'; // Redirect back to the main page
              </script>";
    } else {
        // Error message (JavaScript alert)
        echo "<script>
                alert('Error updating record: " . mysqli_error($connection) . "');
                window.location.href = 'scoring.php'; // Redirect back to the main page even on error
              </script>";
    }
}
?>
