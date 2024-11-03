<?php
include 'scoring_conn.php'; // Database connection file

// Get the total number of students from the scoring table
$totalStudentsSql = "SELECT COUNT(*) as total FROM scoring";
$totalStudentsResult = mysqli_query($connection, $totalStudentsSql);
$totalStudentsRow = mysqli_fetch_assoc($totalStudentsResult);
$totalStudents = $totalStudentsRow['total'];

// Get the total number of pending students from the scoring table
$totalPendingSql = "SELECT COUNT(*) as total FROM scoring WHERE status = 'pending'";
$totalPendingResult = mysqli_query($connection, $totalPendingSql);
$totalPendingRow = mysqli_fetch_assoc($totalPendingResult);
$totalPending = $totalPendingRow['total'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tableindex.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Font Awesome CDN -->
    <div class="home-button" style="margin: 20px;">
        <a href="mainpage.php" class="btn btn-home">Home</a> <!-- Adjust the href to your home page -->
    </div>

    <title>Scoring Management System</title>

</head>
<body>

    <!-- Skills Section -->
    <section class="skills-section">
        <div class="main-skills">
            <div class="card">
                <i class="fas fa-users"></i>
                <h4>Students: <br><span id="studentCount"><?php echo $totalStudents; ?></span></h4> <!-- Display student count -->
            </div>
            <div class="card">
                <i class="fas fa-thumbs-up"></i> <!-- Changed icon to thumbs-up -->
                <h4>Approve: <br><span id="approveCount"></span></h4> <!-- Added span for approve count -->
            </div>
            <div class="card">
                <i class="fas fa-clock"></i> <!-- Optional icon for pending -->
                <h4>Pending: <br><span id="pendingCount"></span></h4> <!-- Added span for pending count -->
            </div>
        </div>
    </section>

    <div class="intro"> 
        <h1>Award Nomination Dashboard</h1> 

        <div class="btn-group" role="group"> 
            <a href="scoring.php" class="btn btn-add">Add New</a>
            <a href="search.php" class="btn btn-search">Search</a>
        </div>
        <hr>
        <div class="table-responsive"> 
            <table class="table table-bordered table-striped"> 
                <thead>
                    <tr>
                        <th>No</th> 
                        <th>Name</th> 
                        <th>Registration No</th>
                        <th>Polytechnic Name</th> 
                        <th>Department Name</th> 
                        <th>Email</th>
                        <th>Session</th>
                        <th>Advisor Name</th>
                        <th>Total Marks</th>
                        <th>File</th> 
                        <th>Action</th>
                        <th>Status</th> 
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // SQL query to select all entries from the scoring database
                    $sql = "SELECT * FROM scoring";   
                    $get_scoringlist = mysqli_query($connection, $sql); // Execute the query using MySQLi

                    $rowcount = mysqli_num_rows($get_scoringlist); // Get the number of rows returned

                    $no = 1; // Initialize entry number
                    if ($rowcount > 0) { // Check if there are entries
                        while ($row = mysqli_fetch_assoc($get_scoringlist)) { // Loop through each entry
                            $name = htmlspecialchars($row['name']); // Store name
                            $reg_no = htmlspecialchars($row['reg_no']); // Store registration number
                            $poly_name = htmlspecialchars($row['poly_name']); // Store polytechnic name
                            $dept_name = htmlspecialchars($row['dept_name']); // Store department name
                            $email = htmlspecialchars($row['email']); // Store email
                            $session = htmlspecialchars($row['session']); // Store session
                            $advisor_name = htmlspecialchars($row['advisor_name']); // Store advisor name
                            $total_mark = htmlspecialchars($row['total_mark']); // Store total marks
                            $image = isset($row['image']) ? htmlspecialchars($row['image']) : null; // Set to null if not set
                            $id = $row['id']; // Store entry ID
                    ?>
                        <tr>
                            <td><?php echo $no; ?></td> 
                            <td><?php echo strtoupper($name); ?></td> 
                            <td><?php echo strtoupper($reg_no); ?></td> 
                            <td><?php echo strtoupper($poly_name); ?></td> 
                            <td><?php echo strtoupper($dept_name); ?></td> 
                            <td><?php echo $email; ?></td> 
                            <td><?php echo strtoupper($session); ?></td> 
                            <td><?php echo strtoupper($advisor_name); ?></td> 
                            <td><?php echo strtoupper($total_mark); ?></td> 
							
							
							
							
<td>
    <?php if ($image): ?>
        <img src="uploads/<?php echo $image; ?>" alt="File" width="50"> <!-- Display image if it exists -->
        <br>
        <a href="uploads/<?php echo $image; ?>" target="_blank">View File</a> <!-- Link to view the file -->
    <?php else: ?>
        <form id="uploadForm_<?php echo $id; ?>" enctype="multipart/form-data">
            <input type="file" id="fileInput_<?php echo $id; ?>" name="file" accept=".png, .jpg, .jpeg, .pdf" required>
            <button type="submit" onclick="uploadFile(event, <?php echo $id; ?>)">Upload</button>
        </form>
        <div id="uploadedFiles_<?php echo $id; ?>"></div> <!-- Div to display uploaded files -->
    <?php endif; ?>
</td>

                            <td>
                                <form action="https://api.web3forms.com/submit" method="POST" style="display: inline;">
                                    <input type="hidden" name="access_key" value="fc7a3f2a-451d-4752-8872-2a517f228313">
                                    <input type="hidden" name="name" value="<?php echo $name; ?>">
                                    <input type="hidden" name="email" value="<?php echo $email; ?>">
                                    <input type="hidden" name="message" value="You can check your status here: http://localhost/finaldemo2/tableindex.php">
                                    <button type="submit" class="btn-confirm">Click to remind</button>
                                </form>

                                <div class="icon-container">
                                    <a href="view.php?id=<?php echo $id; ?>" class="btn btn-second">
                                        <i class="fas fa-eye"></i> <!-- Eye icon for view -->
                                    </a>
                                    <a href="edit.php?id=<?php echo $id; ?>" class="btn btn-primary">
                                        <i class="fas fa-edit"></i> <!-- Edit icon -->
                                    </a>
                                    <a href="delete.php?id=<?php echo $id; ?>" class="btn btn-danger">
                                        <i class="fas fa-trash"></i> <!-- Delete icon -->
                                    </a>
                                </div>
                            </td>
                            <td>
                                <button class="status-button btn-approve" onclick="setStatus(this, 'approve')">Approve</button>
                                <button class="status-button btn-pending" onclick="setStatus(this, 'pending')">Pending</button>
                                <button class="status-button btn-reject" onclick="setStatus(this, 'reject')">Reject</button>
                            </td>
                        </tr>
                    <?php
                            $no++;   // Increment entry number for the next row
                        }
                    } else {
                        echo "<tr><td colspan='12'>No entries found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

<script>


window.onload = function() {
    // Reset approve count to 0 in localStorage
    localStorage.setItem("approveCount", 0);
    approveCount = 0; // Reset to 0
    pendingCount = <?php echo $totalPending; ?>; // Use PHP to set the initial pending count

    // Set the counts to the display
    document.getElementById('approveCount').innerText = approveCount; // Set to 0
    document.getElementById('pendingCount').innerText = pendingCount;
    
    // Load statuses for each row from localStorage
    const rows = document.querySelectorAll("tbody tr");
    rows.forEach(row => {
        const rowId = row.cells[0].innerText; // Assuming "No" column holds a unique ID for each row
        const status = localStorage.getItem(`status_${rowId}`);

        if (status) {
            // Set status button color and visibility
            const statusButton = row.querySelector(`.btn-${status}`);
            if (statusButton) {
                setStatus(statusButton, status, false); // false to skip count increment
            }
        } else {
            // If no status is found in localStorage, set to default pending
            const pendingButton = row.querySelector('.btn-pending');
            if (pendingButton) {
                setStatus(pendingButton, 'pending', false); // Set to pending status
            }
        }
    });
}

function setStatus(button, status, incrementCount = true) {
    const parentTd = button.parentElement;
    const allStatusButtons = parentTd.querySelectorAll('.status-button');
    allStatusButtons.forEach(btn => {
        btn.classList.remove('active'); 
    });

    button.classList.add('active'); 

    const rowId = parentTd.parentElement.cells[0].innerText; 
    const previousStatus = localStorage.getItem(`status_${rowId}`);

    // Update counts based on the new status and previous status
    if (incrementCount) {
        if (status === 'approve') {
            approveCount++; // Increment approve count
            if (previousStatus === 'pending') {
                pendingCount--; // Decrement pending count if previously pending
            }
        } else if (status === 'pending') {
            if (previousStatus === 'approve') {
                approveCount--; // Decrement approve count if previously approved
            }
            pendingCount++; // Increment pending count
        } else if (status === 'reject') {
            if (previousStatus === 'approve') {
                approveCount--; // Decrement approve count if previously approved
            }
        }
    }

    // Save the counts to localStorage
    localStorage.setItem("approveCount", approveCount);
    localStorage.setItem("pendingCount", pendingCount);
    
    // Update display counts
    document.getElementById('approveCount').innerText = approveCount; // Ensure correct count display
    document.getElementById('pendingCount').innerText = pendingCount;
}






function uploadFile(event, id) {
    event.preventDefault(); // Prevent the default form submission

    const fileInput = document.getElementById(`fileInput_${id}`);
    const file = fileInput.files[0];

    if (file) {
        const formData = new FormData();
        formData.append('file', file);

        fetch('upload.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(fileName => {
            // After successful upload, update the table
            const uploadedFilesDiv = document.getElementById(`uploadedFiles_${id}`);
            uploadedFilesDiv.innerHTML += `<div><a href="uploads/${fileName}" target="_blank">${fileName}</a></div>`; // Update with the uploaded image link
            fetchFiles(); // Refresh the file list
        })
        .catch(console.error);
    }
}

</script>

<style>
.status-button {
    background-color: transparent; /* Default background */
    color: #000; /* Default text color */
    border: 1px solid #ccc; /* Default border */
    cursor: pointer; /* Pointer cursor for hover effect */
}

.status-button.active {
    background-color: green; /* Active color for approve */
    color: #fff; /* Text color when active */
}

.status-button.btn-pending.active {
    background-color: yellow; /* Optional color for pending */
    color: #000; /* Text color for pending */
}

.status-button.btn-reject.active {
    background-color: red; /* Optional color for reject */
    color: #fff; /* Text color for reject */
}
</style>
</body>
</html>
