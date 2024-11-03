<td>
    <?php if ($image): ?>
        <img src="uploads/<?php echo $image; ?>" alt="File" width="50"> <!-- Display uploaded image if exists -->
        <br>
        <a href="uploads/<?php echo $image; ?>" target="_blank">View File</a>
    <?php else: ?>
        <form id="uploadForm_<?php echo $id; ?>" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id; ?>"> <!-- Hidden input for ID -->
            <input type="file" id="fileInput_<?php echo $id; ?>" name="file" accept=".png, .jpg, .jpeg, .pdf" required>
            <button type="button" onclick="uploadFile(<?php echo $id; ?>)">Upload</button> <!-- Call function with student ID -->
        </form>
        <div id="uploadedFiles_<?php echo $id; ?>"></div> <!-- Container for displaying uploaded files -->
    <?php endif; ?>
</td>











function uploadFile(id) {
    const form = document.getElementById(`uploadForm_${id}`);
    const fileInput = document.getElementById(`fileInput_${id}`);
    const file = fileInput.files[0];
    
    if (file) {
        const formData = new FormData(form);
        formData.append('file', file);

        fetch('upload.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Display the uploaded file link
                const uploadedFilesDiv = document.getElementById(`uploadedFiles_${id}`);
                uploadedFilesDiv.innerHTML = `<a href="uploads/${data.fileName}" target="_blank">${data.fileName}</a>`;
                alert("File uploaded successfully!");
            } else {
                alert("File upload failed: " + data.error);
            }
        })
        .catch(error => {
            console.error("Error uploading file:", error);
            alert("Error uploading file.");
        });
    } else {
        alert("Please select a file to upload.");
    }
}







<?php
include 'scoring_conn.php';

header('Content-Type: application/json'); // Specify JSON response format

// Check if a file and ID are received
if (isset($_FILES['file']) && isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $file = $_FILES['file'];
    $targetDir = "uploads/";
    $fileName = basename($file["name"]);
    $targetFilePath = $targetDir . $fileName;
    
    // Allow specific file types
    $allowedTypes = ['jpg', 'jpeg', 'png', 'pdf'];
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
    
    if (in_array($fileType, $allowedTypes)) {
        // Upload file to server
        if (move_uploaded_file($file["tmp_name"], $targetFilePath)) {
            // Update file name in the database for this student entry
            $sql = "UPDATE scoring SET image = '$fileName' WHERE id = $id";
            if (mysqli_query($connection, $sql)) {
                echo json_encode(["success" => true, "fileName" => $fileName]);
            } else {
                echo json_encode(["success" => false, "error" => "Database update failed."]);
            }
        } else {
            echo json_encode(["success" => false, "error" => "File upload failed."]);
        }
    } else {
        echo json_encode(["success" => false, "error" => "Invalid file type."]);
    }
} else {
    echo json_encode(["success" => false, "error" => "Missing file or ID."]);
}
?>
