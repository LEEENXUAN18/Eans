<?php
include 'scoring_conn.php'; // Database connection

// Get the ID of the entry to edit from the URL
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

// Update the record when the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $reg_no = $_POST['reg_no'];
    $poly_name = $_POST['poly_name'];
    $dept_name = $_POST['dept_name'];
    $email = $_POST['email'];
    $session = $_POST['session'];
    $advisor_name = $_POST['advisor_name'];
    $total_mark = $_POST['total_mark'];

    $updateSql = "UPDATE scoring SET name=?, reg_no=?, poly_name=?, dept_name=?, email=?, session=?, advisor_name=?, total_mark=? WHERE id=?";
    $stmt = $connection->prepare($updateSql);
    $stmt->bind_param("ssssssssi", $name, $reg_no, $poly_name, $dept_name, $email, $session, $advisor_name, $total_mark, $id);
    
    if ($stmt->execute()) {
        echo "Record updated successfully.";
        header("Location: tableindex.php");
        exit;
    } else {
        echo "Error updating record.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Nomination - Excellent Award Nomination System (EANS)</title>
    <link rel="stylesheet" href="scoring.css">
	
	
</head>
<body>
    <div class="container">
        <h2>Excellent Award Nomination System Form (EANS)</h2>

        <!-- Scoring Form -->
        <form action="update.php" method="POST" id="eans-form">
            <!-- Hidden ID Field -->
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">

            <div class="form-row">
                <div class="form-column-left">
                    <!-- Personal Details Section -->
                    <label>Name:</label>
                    <input type="text" name="name" value="<?php echo htmlspecialchars($row['name']); ?>" required><br>

                    <label>Registration No:</label>
                    <input type="text" name="reg_no" value="<?php echo htmlspecialchars($row['reg_no']); ?>" required><br>

                    <label>Polytechnic Name:</label>
                    <input type="text" name="poly_name" value="<?php echo htmlspecialchars($row['poly_name']); ?>" required><br>

                    <label>Department Name:</label>
                    <input type="text" name="dept_name" value="<?php echo htmlspecialchars($row['dept_name']); ?>" required><br>

                    <label>Class:</label>
                    <input type="text" name="class" value="<?php echo htmlspecialchars($row['class']); ?>" required><br>
                </div>

                <div class="form-column-right">
                    <label>Email:</label>
                    <input type="email" name="email" value="<?php echo htmlspecialchars($row['email']); ?>" required><br>

                    <label>No IC:</label>
                    <input type="text" name="ic_no" value="<?php echo htmlspecialchars($row['ic_no']); ?>" required><br>

                    <label>No H/P:</label>
                    <input type="text" name="phone_no" value="<?php echo htmlspecialchars($row['phone_no']); ?>" required><br>

                    <label>Session:</label>
                    <input type="text" name="session" value="<?php echo htmlspecialchars($row['session']); ?>" required><br>

                    <label>Academic Advisor Name:</label>
                    <input type="text" name="advisor_name" value="<?php echo htmlspecialchars($row['advisor_name']); ?>" required><br>
                </div>
            </div>

            <!-- Academic Achievement Section -->
<h2>Academic Achievement</h2>
<label for="hpnm">HPNM</label>
<input type="number" id="hpnm" name="hpnm" min="0" max="4" step="0.01" oninput="calculateMark()" value="<?php echo htmlspecialchars($row['hpnm']); ?>" required><br>

<label>Maximum Mark:</label>
<input type="number" id="max_mark" name="max_mark" value="40" disabled><br>

<label>Calculated Mark:</label>
<input type="number" id="calculated_mark" name="calculated_mark" readonly value="<?php echo htmlspecialchars($row['calculated_mark']); ?>"><br>

<!-- Curriculum 1: Organization Management -->
<!-- Curriculum 1 Section -->
<h2 class="Curriculum-title">Curriculum 1 Organization Management</h2>

<div class="form-row-center">
    <label for="org_program">Organization Program</label>
    <input type="text" id="org_program" name="org_program" value="<?php echo htmlspecialchars($row['org_program']); ?>" required>
</div>

<!-- Combined Radio Button Group -->
<label for="position_held">Position Held :</label>
<div>
    <label for="student_rep_council">Student Representation Council :</label>
    <div>
        <label style="font-weight: normal; margin-right: 10px;">
            <input type="radio" name="position" value="10" <?php if (isset($row['position']) && $row['position'] == 10) echo 'checked'; ?> required onchange="updateCalculatedMark()"> President (10 marks)
        </label>
        <label style="font-weight: normal; margin-right: 10px;">
            <input type="radio" name="position" value="9" <?php if (isset($row['position']) && $row['position'] == 9) echo 'checked'; ?> onchange="updateCalculatedMark()"> Vice President (9 marks)
        </label>
        <label style="font-weight: normal; margin-right: 10px;">
            <input type="radio" name="position" value="8" <?php if (isset($row['position']) && $row['position'] == 8) echo 'checked'; ?> onchange="updateCalculatedMark()"> Secretary/Treasurer (8 marks)
        </label>
        <label style="font-weight: normal; margin-right: 10px;">
            <input type="radio" name="position" value="7" <?php if (isset($row['position']) && $row['position'] == 7) echo 'checked'; ?> onchange="updateCalculatedMark()"> Executive Body (7 marks)
        </label>
        <br>
    </div>

    <label for="clubs_org">Clubs and Other Organizations :</label>
    <div>
        <label style="font-weight: normal; margin-right: 10px;">
            <input type="radio" name="position" value="6" <?php if (isset($row['position']) && $row['position'] == 6) echo 'checked'; ?> required onchange="updateCalculatedMark()"> Chairman (6 marks)
        </label>
        <label style="font-weight: normal; margin-right: 10px;">
            <input type="radio" name="position" value="5" <?php if (isset($row['position']) && $row['position'] == 5) echo 'checked'; ?> onchange="updateCalculatedMark()"> Vice Chairman (5 marks)
        </label>
        <label style="font-weight: normal; margin-right: 10px;">
            <input type="radio" name="position" value="4" <?php if (isset($row['position']) && $row['position'] == 4) echo 'checked'; ?> onchange="updateCalculatedMark()"> Secretary/Treasurer (4 marks)
        </label>
        <label style="font-weight: normal; margin-right: 10px;">
            <input type="radio" name="position" value="3" <?php if (isset($row['position']) && $row['position'] == 3) echo 'checked'; ?> onchange="updateCalculatedMark()"> Committee (3 marks)
        </label>
        <label style="font-weight: normal; margin-right: 10px;">
            <input type="radio" name="position" value="1" <?php if (isset($row['position']) && $row['position'] == 1) echo 'checked'; ?> onchange="updateCalculatedMark()"> Ordinary Member (1 mark)
        </label>
        <br>
    </div>
</div>

<div class="form-row-center">
    <label for="total_max_mark">Maximum Mark Value:</label>
    <input type="number" id="total_max_mark" name="total_max_mark" value="10" disabled>
</div>

<div class="form-row-center">
    <label for="calculate1_mark">Calculate Mark</label>
    <input type="number" id="calculate1_mark" name="calculate1_mark" readonly value="<?php echo htmlspecialchars($row['calculate1_mark']); ?>">
</div>


<!-- Curriculum 2: Program Positions -->
<h2>Curriculum 2: Program Positions</h2>
<label>Program Name:</label>
<input type="text" name="program_name" value="<?php echo htmlspecialchars($row['program_name']); ?>" required><br>

<!-- Program Position Radio Buttons -->
<label for="program_org" id="program_org-label">Position in Program Organization :</label>
<div>
    <label style="font-weight: normal; margin-right: 10px;">
        <input type="radio" name="combined_selection" value="20" <?php if (isset($row['combined_selection']) && $row['combined_selection'] == 20) echo 'checked'; ?> required onchange="rankCalculatedMark()"> 
        <span id="position_director">Director/Chairman</span> (20 marks)
    </label>
    <label style="font-weight: normal; margin-right: 10px;">
        <input type="radio" name="combined_selection" value="18" <?php if (isset($row['combined_selection']) && $row['combined_selection'] == 18) echo 'checked'; ?> onchange="rankCalculatedMark()"> 
        <span id="position_deputy">Deputy Director</span> (18 marks)
    </label>
    <label style="font-weight: normal; margin-right: 10px;">
        <input type="radio" name="combined_selection" value="16" <?php if (isset($row['combined_selection']) && $row['combined_selection'] == 16) echo 'checked'; ?> onchange="rankCalculatedMark()"> 
        <span id="position_secretary">Secretary/Treasurer</span> (16 marks)
    </label>
    <label style="font-weight: normal; margin-right: 10px;">
        <input type="radio" name="combined_selection" value="15" <?php if (isset($row['combined_selection']) && $row['combined_selection'] == 15) echo 'checked'; ?> onchange="rankCalculatedMark()"> 
        <span id="position_committee"> Committee </span> (15 marks)
    </label>
    <label style="font-weight: normal; margin-right: 10px;">
        <input type="radio" name="combined_selection" value="12" <?php if (isset($row['combined_selection']) && $row['combined_selection'] == 12) echo 'checked'; ?> onchange="rankCalculatedMark()"> 
        <span id="position_member"> Ordinary Members</span> (12 marks)
    </label>
</div>
<br>

<!-- Rank Radio Buttons -->
<div class="form-row-center">
    <label id="rank-label">Rank:</label>
    <div>
        <label style="font-weight: normal; margin-right: 10px;">
            <input type="radio" name="combined_selection" value="8" <?php if (isset($row['combined_selection']) && $row['combined_selection'] == 8) echo 'checked'; ?> required onchange="rankCalculatedMark()"> 
            <span id="rank_international">International/National</span> (8 marks)
        </label>
        <label style="font-weight: normal; margin-right: 10px;">
            <input type="radio" name="combined_selection" value="6" <?php if (isset($row['combined_selection']) && $row['combined_selection'] == 6) echo 'checked'; ?> onchange="rankCalculatedMark()"> 
            <span id="rank_state">State/District/Community</span> (6 marks)
        </label>
        <label style="font-weight: normal; margin-right: 10px;">
            <input type="radio" name="combined_selection" value="4" <?php if (isset($row['combined_selection']) && $row['combined_selection'] == 4) echo 'checked'; ?> onchange="rankCalculatedMark()"> 
            <span id="rank_polytechnic">Polytechnic</span> (4 marks)
        </label>
        <label style="font-weight: normal; margin-right: 10px;">
            <input type="radio" name="combined_selection" value="2" <?php if (isset($row['combined_selection']) && $row['combined_selection'] == 2) echo 'checked'; ?> onchange="rankCalculatedMark()"> 
            <span id="rank_department">Department</span> (2 marks)
        </label>
    </div>
</div>
<br>

<!-- Maximum Mark Value -->
<div class="form-row-center">
    <label for="rank_max_mark" id="rank_max_mark-label">Maximum Mark Value :</label>
    <input type="number" id="rank_max_mark" name="rank_max_mark" value="20" disabled>
</div>

<!-- Calculate Mark Input -->
<div class="form-row-center">
    <label for="calculate2_mark" id="calculate2_mark-label">Calculate Mark</label>
    <input type="number" id="calculate2_mark" name="calculate2_mark" readonly value="<?php echo htmlspecialchars($row['calculate2_mark']); ?>">
</div>

<!-- Curriculum 3 Section -->
<h2 class="Curriculum3-title" id="curriculum3-title">Curriculum 3 Participants in Program</h2>

<div class="form-row-center">
    <label for="program_name3" id="program_name3-label">Organization Program</label>
    <input type="text" id="program_name3" name="program_name3" value="<?php echo htmlspecialchars($row['program_name3']); ?>" required>
</div>
<br>
<div class="form-row-center">
    <label id="involvement-label">Involvement Improvement:</label>
    <div>
        <label style="font-weight: normal; margin-right: 10px;">
            <input type="radio" name="involvement" value="30" <?php if (isset($row['involvement']) && $row['involvement'] == 30) echo 'checked'; ?> onchange="involveCalculatedMark()"> 
            <span id="involveinternational"> International/National</span> (30 marks)
        </label>  
        <label style="font-weight: normal; margin-right: 10px;">
            <input type="radio" name="involvement" value="20" <?php if (isset($row['involvement']) && $row['involvement'] == 20) echo 'checked'; ?> onchange="involveCalculatedMark()"> 
            <span id="involvestate"> State/District/Community</span> (20 marks)
        </label>  
        <label style="font-weight: normal; margin-right: 10px;">
            <input type="radio" name="involvement" value="15" <?php if (isset($row['involvement']) && $row['involvement'] == 15) echo 'checked'; ?> onchange="involveCalculatedMark()"> 
            <span id="involvepoly"> Polytechnic</span> (15 marks)
        </label>    
        <label style="font-weight: normal; margin-right: 10px;">
            <input type="radio" name="involvement" value="10" <?php if (isset($row['involvement']) && $row['involvement'] == 10) echo 'checked'; ?> onchange="involveCalculatedMark()"> 
            <span id="involvedepartment"> Department</span> (10 marks)
        </label>
    </div>
</div>
<br>

<!-- Total Mark Calculation -->
<h2>Total Mark</h2>
<label>Total Mark:</label>
<input type="number" id="total_mark" name="total_mark" readonly value="<?php echo htmlspecialchars($row['total_mark']); ?>"><br>

            

<p style="color: red;"> **Go to the dashboard to upload the certificate**</p>

<div class="form-row-center" style="display: flex; justify-content: center; gap: 10px; margin-top: 20px;">
    <button type="submit" name="update" style="padding: 10px 20px; font-size: 16px; cursor: pointer; border: none; color: white; border-radius: 5px; background-color: green;">
        Update
    </button>
    <button type="button" onclick="window.location.href='tableindex.php';" style="padding: 10px 20px; font-size: 16px; cursor: pointer; border: none; color: white; border-radius: 5px; background-color: red;">
        Cancel
    </button>
</div>
</form>

    <script src="scoring.js"></script>

</body>
</html>
