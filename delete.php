<?php

include 'scoring_conn.php'; // Ensure correct file path

// Verify if the connection is established
if (!$connection) { // Use $connection instead of $conn
    die("Database connection failed.");
}

$id = $_GET['id']; // Get the ID from the URL

// Deleting code
$sql_delete = "DELETE FROM scoring WHERE id='$id'";

// Check if the user confirmed the deletion
if (isset($_GET['confirm']) && $_GET['confirm'] == 'yes') {
    // Execute the query if confirmed
    $query = mysqli_query($connection, $sql_delete);

    if ($query) {
        echo "<script>
            alert('successfully deleted!');
            window.location.href = 'tableindex.php';
        </script>";
    } else {
        echo "Error deleting record: " . mysqli_error($connection);
    }
} else {
    // Show confirmation prompt
    echo "<script>
        if (confirm('Are you sure you want to delete this?')) {
            window.location.href = 'delete.php?id=$id&confirm=yes';
        } else {
            window.location.href = 'tableindex.php';
        }
    </script>";
}
?>
