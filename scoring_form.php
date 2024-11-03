<?php
// Initialize variables for form data
$name = $reg_no = $poly_name = $dept_name = $class = $email = $ic_no = $phone_no = $session = $advisor_name = '';
$hpnm = $calculated_mark = '';
$org_program = $calculate1_mark = '';
$program_name = $calculate2_mark = '';
$program_name3 = $calculate_k3_mark = '';
$total_mark = 0;

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Function to sanitize input
    function sanitizeInput($data) {
        return htmlspecialchars(trim($data));
    }

    // Retrieve and sanitize form data
    $name = sanitizeInput($_POST['name'] ?? '');
    $reg_no = sanitizeInput($_POST['reg_no'] ?? '');
    $poly_name = sanitizeInput($_POST['poly_name'] ?? '');
    $dept_name = sanitizeInput($_POST['dept_name'] ?? '');
    $class = sanitizeInput($_POST['class'] ?? '');
    $email = sanitizeInput($_POST['email'] ?? '');
    $ic_no = sanitizeInput($_POST['ic_no'] ?? '');
    $phone_no = sanitizeInput($_POST['phone_no'] ?? '');
    $session = sanitizeInput($_POST['session'] ?? '');
    $advisor_name = sanitizeInput($_POST['advisor_name'] ?? '');

    $hpnm = sanitizeInput($_POST['hpnm'] ?? '');
    $calculated_mark = floatval($_POST['calculated_mark'] ?? 0);

    $org_program = sanitizeInput($_POST['org_program'] ?? '');
    $calculate1_mark = floatval($_POST['calculate1_mark'] ?? 0);

    $program_name = sanitizeInput($_POST['program_name'] ?? '');
    $calculate2_mark = floatval($_POST['calculate2_mark'] ?? 0);

    $program_name3 = sanitizeInput($_POST['program_name3'] ?? '');
    $calculate_k3_mark = floatval($_POST['calculate_k3_mark'] ?? '');

    // Total marks calculation
    $total_mark = $calculated_mark + $calculate1_mark + $calculate2_mark + $calculate_k3_mark;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Information Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            text-align: center;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            max-width: 800px;
            margin: 20px auto;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #fdc43f;
            color: black;
            text-align: center;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #0056b3;
        }

        @media (max-width: 600px) {
            body {
                margin: 10px;
            }
            button {
                width: 100%;
                padding: 12px;
            }
            table {
                font-size: 14px;
            }
        }
        
        @media print {
            body {
                font-size: 12px;
            }
            table {
                width: 100%;
            }
            @page {
                margin: 0;
            }
            button {
                display: none; 
            }
        }
    </style>
</head>
<body>

<form method="POST" action="scoring1111.php"> 
    <h2>Submitted Student Information</h2>

    <table>
        <tr>
            <th colspan="4">Student Information</th>
        </tr>
        <tr>
            <td>Name</td>
            <td><?= $name; ?></td>
            <td>IC No</td>
            <td><?= $ic_no; ?></td>
        </tr>
        <tr>
            <td>Registration No</td>
            <td><?= $reg_no; ?></td>
            <td>Polytechnic Name</td>
            <td><?= $poly_name; ?></td>
        </tr>
        <tr>
            <td>Department Name</td>
            <td><?= $dept_name; ?></td>
            <td>Class</td>
            <td><?= $class; ?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><?= $email; ?></td>
            <td>No H/P</td>
            <td><?= $phone_no; ?></td>
        </tr>
        <tr>
            <td>Session</td>
            <td><?= $session; ?></td>
            <td>Academic Advisor Name</td>
            <td><?= $advisor_name; ?></td>
        </tr>
    </table>

    <table>
        <tr>
            <th colspan="4">Academic Achievement</th>
        </tr>
        <tr>
            <td>HPNM</td>
            <td><?= $hpnm; ?></td>
            <td>Calculated Mark</td>
            <td><?= $calculated_mark; ?></td>
        </tr>
        <tr>
            <th colspan="4">Curriculum 1 Organization Management</th>
        </tr>
        <tr>
            <td>Organization Program</td>
            <td><?= $org_program; ?></td>
            <td>Calculated Mark</td>
            <td><?= $calculate1_mark; ?></td>
        </tr>
        <tr>
            <th colspan="4">Curriculum 2 Program Positions</th>
        </tr>
        <tr>
            <td>Program Name</td>
            <td><?= $program_name; ?></td>
            <td>Calculated Mark</td>
            <td><?= $calculate2_mark; ?></td>
        </tr>
        <tr>
            <th colspan="4">Curriculum 3 Participants in Program</th>
        </tr>
        <tr>
            <td>Program Name</td>
            <td><?= $program_name3; ?></td>
            <td>Calculated Mark</td>
            <td><?= $calculate_k3_mark; ?></td>
        </tr>
        <tr>
            <th colspan="4">Total Marks</th>
        </tr>
        <tr>
            <td>Total Mark</td>
            <td colspan="3"><?= $total_mark; ?></td>
        </tr>
    </table>

    <button type="submit">Submit</button>
</form>

</body>
</html>





