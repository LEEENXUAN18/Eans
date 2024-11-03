<?php
include 'scoring_conn.php'; // Database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
        $fileTmpPath = $_FILES['file']['tmp_name'];
        $fileName = $_FILES['file']['name'];
        $fileSize = $_FILES['file']['size'];
        $fileType = $_FILES['file']['type'];

        // Specify the directory where you want to save the file
        $uploadFileDir = './uploads/';
        $dest_path = $uploadFileDir . $fileName;

        // Move the file to the upload directory
        if(move_uploaded_file($fileTmpPath, $dest_path)) {
            echo $fileName; // Return the file name for front-end display
        } else {
            echo 'Error uploading the file.';
        }
    } else {
        echo 'No file uploaded or there was an upload error.';
    }
} else {
    echo 'Invalid request method.';
}
?>
