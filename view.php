<?php
include 'scoring_conn.php'; // Database connection

// Get the ID of the entry to view from the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Fetch data for the specified ID
    $sql = "SELECT * FROM scoring WHERE id = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    // Check if the record exists
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
    } else {
        echo "Record not found.";
        exit;
    }
} else {
    echo "Invalid ID.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Nomination - Excellent Award Nomination System (EANS)</title>
    <style>
        /* General Styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .container {
            width: 90%;
            max-width: 800px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        h2 {
            text-align: center;
            color: Black;
        }

        /* Table Styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #fecf3e;
            color: black;
            font-weight: bold;
        }
        tr:hover {
            background-color: #f1f1f1;
        }

        /* Button Styling */
        .button-container {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 20px;
        }
        .btn {
            padding: 10px 15px;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .btn-back {
            background-color: #495057;
        }
        .btn-print {
            background-color: #4f772d;
        }
        .btn:hover {
            opacity: 0.9;
        }

        /* Responsive Design */
        @media (max-width: 600px) {
            .container {
                padding: 15px;
            }
            table {
                font-size: 14px;
            }
            th, td {
                padding: 8px;
            }
            .btn {
                padding: 8px 12px;
                font-size: 14px;
            }
        }
		
    @media print {
		
		    @page {
        margin: 0; /* Removes page margins in some browsers */
    }
    body {
        margin: 0;
        padding: 0;
    }
        body {
            font-size: 12px;
            color: #333;
            background-color: white; /* Ensures background is white for printing */
        }
        .container {
            width: 100%;
            padding: 10px;
            background-color: #f4f4f9; /* Light background for container */
            color: #333; /* Dark text color */
        }
        table {
            font-size: 10px;
            border-collapse: collapse;
            width: 100%;
        }
        th {
            background-color: #fecf3e; /* Gold background for headers */
            color: black; /* Black text color for headers */
        }
        td {
            background-color: #fff; /* White background for cells */
            color: #333; /* Dark text color for cells */
        }
        tr:hover {
            background-color: #f1f1f1; /* Light grey for row hover effect (if printer supports) */
        }
        .button-container {
            display: none; /* Hide buttons on print */
        }
    }
		
    </style>
</head>
<body>
    <div class="container">
        <h2>Excellent Award Nomination System Form (EANS)</h2>

        <!-- Display Data in Table -->
        <table>
            <tr><th colspan="2">Personal Information</th></tr>
            <tr><td><strong>Name:</strong></td><td><?php echo htmlspecialchars($row['name']); ?></td></tr>
            <tr><td><strong>Registration No:</strong></td><td><?php echo htmlspecialchars($row['reg_no']); ?></td></tr>
            <tr><td><strong>Polytechnic Name:</strong></td><td><?php echo htmlspecialchars($row['poly_name']); ?></td></tr>
            <tr><td><strong>Department Name:</strong></td><td><?php echo htmlspecialchars($row['dept_name']); ?></td></tr>
            <tr><td><strong>Class:</strong></td><td><?php echo htmlspecialchars($row['class']); ?></td></tr>
            <tr><td><strong>Email:</strong></td><td><?php echo htmlspecialchars($row['email']); ?></td></tr>
            <tr><td><strong>No IC:</strong></td><td><?php echo htmlspecialchars($row['ic_no']); ?></td></tr>
            <tr><td><strong>No H/P:</strong></td><td><?php echo htmlspecialchars($row['phone_no']); ?></td></tr>
            <tr><td><strong>Session:</strong></td><td><?php echo htmlspecialchars($row['session']); ?></td></tr>
            <tr><td><strong>Academic Advisor Name:</strong></td><td><?php echo htmlspecialchars($row['advisor_name']); ?></td></tr>

            <tr><th colspan="2">Academic Achievement</th></tr>
            <tr><td><strong>HPNM:</strong></td><td><?php echo htmlspecialchars($row['hpnm']); ?></td></tr>
            <tr><td><strong>Calculated Mark:</strong></td><td><?php echo htmlspecialchars($row['calculated_mark']); ?></td></tr>

            <!-- Curriculum Marks -->
            <tr><th colspan="2">Curriculum 1: Organization Management</th></tr>
            <tr><td><strong>Organization Program:</strong></td><td><?php echo htmlspecialchars($row['org_program']); ?></td></tr>
            <tr><td><strong>Calculated Mark:</strong></td><td><?php echo isset($row['calculate1_mark']) ? htmlspecialchars($row['calculate1_mark']) : 'N/A'; ?></td></tr>

            <tr><th colspan="2">Curriculum 2: Program Positions</th></tr>
            <tr><td><strong>Program Name:</strong></td><td><?php echo htmlspecialchars($row['program_name']); ?></td></tr>
            <tr><td><strong>Calculated Mark:</strong></td><td><?php echo isset($row['calculate2_mark']) ? htmlspecialchars($row['calculate2_mark']) : 'N/A'; ?></td></tr>

            <tr><th colspan="2">Curriculum 3: Participants in Program</th></tr>
            <tr><td><strong>Organization Program:</strong></td><td><?php echo htmlspecialchars($row['program_name3']); ?></td></tr>
            <tr><td><strong>Calculated Mark:</strong></td><td><?php echo isset($row['calculate_k3_mark']) ? htmlspecialchars($row['calculate_k3_mark']) : 'N/A'; ?></td></tr>

            <!-- Total Mark -->
            <tr><th colspan="2">Total Mark</th></tr>
            <tr><td><strong>Total Mark:</strong></td><td><?php echo htmlspecialchars($row['total_mark']); ?></td></tr>
        </table>

        <!-- Button Container -->
        <div class="button-container">
            <a href="tableindex.php" class="btn btn-back">Dashboard</a>
            <button class="btn btn-print" onclick="window.print()">PRINT</button>
        </div>
    </div>
</body>
</html>
