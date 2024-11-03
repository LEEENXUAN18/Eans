<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Excellent Award Nomination System Form (EANS)</title>
    <link rel="stylesheet" href="scoring.css">
</head>
<body>

<div class="button-container">
    <a href="mainpage.php" class="btn-home">Home Page</a>
    <a href="tableindex.php" class="btn-back">Dashboard</a>

</div>
<br>
</br>

    <div class="container">
        <h1>Excellent Award Nomination System Form (EANS)</h1>
        
        <!-- Language Selection Dropdown -->
        <div class="language-selection">
            <label for="language"></label>
            <select id="language" name="language" onchange="changeLanguage()">
                <option value="en">English</option>
                <option value="ms">Malay</option>
            </select>
        </div>
		<br>
	
		
        <!-- Form Section -->
        <form action="scoring1.php" method="POST" id="eans-form">
            <div class="form-row">
                <div class="form-column-left">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" required>

                    <label for="reg_no">Registration No</label>
                    <input type="text" id="reg_no" name="reg_no" required>

                    <label for="poly_name">Polytechnic Name</label>
                    <input type="text" id="poly_name" name="poly_name" required>

                    <label for="dept_name">Department Name</label>
                    <input type="text" id="dept_name" name="dept_name" required>

                    <label for="class">Class</label>
                    <input type="text" id="class" name="class" required>
                </div>

                <div class="form-column-right">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>

                    <label for="ic_no">No IC</label>
                    <input type="text" id="ic_no" name="ic_no" required>

                    <label for="phone_no">No H/P</label>
                    <input type="text" id="phone_no" name="phone_no" required>

                    <label for="session">Session</label>
                    <input type="text" id="session" name="session" required>

                    <label for="advisor_name">Academic Advisor Name</label>
                    <input type="text" id="advisor_name" name="advisor_name" required>
                </div>
            </div>
			
			
			
			

            <!-- Academic Achievement Section -->
            <h2 class="achievement-title" >Academic Achievement</h2>

            <div class="form-center-container">
                <div class="form-row-center">
                    <label for="hpnm">HPNM</label>
                    <input type="number" id="hpnm" name="hpnm" min="0" max="4" step="0.01" oninput="calculateMark()" required>
                </div>

                <div class="form-row-center">
                    <label for="max_mark">Maximum Mark</label>
                    <input type="number" id="max_mark" name="max_mark" value="40" disabled>
                </div>

                <div class="form-row-center">
                    <label for="calculated_mark">Calculated Mark</label>
                    <input type="number" id="calculated_mark" name="calculated_mark" readonly>
                </div>
            </div>






            <!-- Curriculum 1 Section -->
            <h2 class="Curriculum-title">Curriculum 1 Organization Management</h2>

            <div class="form-row-center">
                <label for="org_program">Organization Program</label>
                <input type="text" id="org_program" name="org_program" required>
            </div>

            <!-- Combined Radio Button Group -->
            <label for="position_held">Position Held :</label>
            <div>
                <label for="student_rep_council">Student Representation Council :</label>
                <div>
                <label style="font-weight: normal; margin-right: 10px;">
                <input type="radio" name="position" value="10" required onchange="updateCalculatedMark()"> President (10 marks)
				</label>
				<label style="font-weight: normal; margin-right: 10px;">
				<input type="radio" name="position" value="9" onchange="updateCalculatedMark()"> Vice President (9 marks)
				</label>
				<label style="font-weight: normal; margin-right: 10px;">
				<input type="radio" name="position" value="8" onchange="updateCalculatedMark()"> Secretary/Treasurer (8 marks)
				</label>
				<label style="font-weight: normal; margin-right: 10px;">
				<input type="radio" name="position" value="7" onchange="updateCalculatedMark()"> Executive Body (7 marks)
				</label>
                <br>
                </div>

                <label for="clubs_org">Clubs and Other Organizations :</label>
                <div>
                    <label style="font-weight: normal; margin-right: 10px;">
					<input type="radio" name="position" value="6" required onchange="updateCalculatedMark()"> Chairman (6 marks)</label>
                    <label style="font-weight: normal; margin-right: 10px;">
					<input type="radio" name="position" value="5" onchange="updateCalculatedMark()"> Vice Chairman (5 marks)</label>
                    <label style="font-weight: normal; margin-right: 10px;">
					<input type="radio" name="position" value="4" onchange="updateCalculatedMark()"> Secretary/Treasurer (4 marks)</label>
                    <label style="font-weight: normal; margin-right: 10px;">
					<input type="radio" name="position" value="3" onchange="updateCalculatedMark()"> Committee (3 marks)</label>
                    <label style="font-weight: normal; margin-right: 10px;">
					<input type="radio" name="position" value="1" onchange="updateCalculatedMark()"> Ordinary Member (1 mark)</label>
					<br>
                </div>
            </div>

            <div class="form-row-center">
                <label for="total_max_mark">Maximum Mark Value:</label>
                <input type="number" id="total_max_mark" name="total_max_mark" value="10" disabled>
            </div>

            <div class="form-row-center">
                <label for="calculate1_mark">Calculate Mark</label>
                <input type="number" id="calculate1_mark" name="calculate1_mark" readonly>
            </div>

 
 
 
 
 
<h2 class="kurikulum-title2" id="Curriculum2-title">Curriculum 2 Program Positions</h2>

<!-- Program Name Input -->
<div class="form-row-center">
    <label for="program_name" id="program_name-label">Program Name</label>
    <input type="text" id="program_name" name="program_name" required>
</div>

<!-- Program Position Radio Buttons -->
<div class="form-row-center">
    <label for="program_org" id="program_org-label">Position in Program Organization :</label>
    <div>
        <label style="font-weight: normal; margin-right: 10px;">
            <input type="radio" name="combined_selection" value="20" required onchange="rankCalculatedMark()"> 
            <span id="position_director">Director/Chairman</span> (20 marks)
        </label>
        <label style="font-weight: normal; margin-right: 10px;">
            <input type="radio" name="combined_selection" value="18" onchange="rankCalculatedMark()"> 
            <span id="position_deputy">Deputy Director</span> (18 marks)
        </label>
        <label style="font-weight: normal; margin-right: 10px;">
            <input type="radio" name="combined_selection" value="16" onchange="rankCalculatedMark()"> 
            <span id="position_secretary">Secretary/Treasurer</span> (16 marks)
        </label>
        <label style="font-weight: normal; margin-right: 10px;">
            <input type="radio" name="combined_selection" value="15" onchange="rankCalculatedMark()"> 
            <span id="position_committee"> Committee </span> (15 marks)
        </label>
        <label style="font-weight: normal; margin-right: 10px;">
            <input type="radio" name="combined_selection" value="12" onchange="rankCalculatedMark()"> 
            <span id="position_member"> Ordinary Members</span> (12 marks)
        </label>
    </div>
</div>
<br>

<!-- Rank Radio Buttons -->
<div class="form-row-center">
    <label id="rank-label">Rank:</label>
    <div>
        <label style="font-weight: normal; margin-right: 10px;">
            <input type="radio" name="combined_selection" value="8" required onchange="rankCalculatedMark()"> 
            <span id="rank_international">International/National</span> (8 marks)
        </label>
        <label style="font-weight: normal; margin-right: 10px;">
            <input type="radio" name="combined_selection" value="6" onchange="rankCalculatedMark()"> 
            <span id="rank_state">State/District/Community</span> (6 marks)
        </label>
        <label style="font-weight: normal; margin-right: 10px;">
            <input type="radio" name="combined_selection" value="4" onchange="rankCalculatedMark()"> 
            <span id="rank_polytechnic">Polytechnic</span> (4 marks)
        </label>
        <label style="font-weight: normal; margin-right: 10px;">
            <input type="radio" name="combined_selection" value="2" onchange="rankCalculatedMark()"> 
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
    <input type="number" id="calculate2_mark" name="calculate2_mark" readonly>
</div>







<!-- Kurikulum 3 Section -->
<h2 class="Curriculum3-title" id="curriculum3-title">Curriculum 3 Participants in Program</h2>

<div class="form-row-center">
    <label for="program_name3" id="program_name3-label">Organization Program</label>
    <input type="text" id="program_name3" name="program_name3" required>
</div>
<br>
<div class="form-row-center">
    <label id="involvement-label">Involvement Improvement:</label>
    <div>
        <label style="font-weight: normal; margin-right: 10px;">
            <input type="radio" name="involvement" value="30" onchange="involveCalculatedMark()"> 
            <span id="involveinternational"> International/National</span> (30 marks)
        </label>  
        <label style="font-weight: normal; margin-right: 10px;">
            <input type="radio" name="involvement" value="20" onchange="involveCalculatedMark()"> 
            <span id="involvestate"> State/District/Community</span> (20 marks)
        </label>  
        <label style="font-weight: normal; margin-right: 10px;">
            <input type="radio" name="involvement" value="15" onchange="involveCalculatedMark()"> 
            <span id="involvepoly"> Polytechnic</span> (15 marks)
        </label>    
        <label style="font-weight: normal; margin-right: 10px;">
            <input type="radio" name="involvement" value="10" onchange="involveCalculatedMark()"> 
            <span id="involvedepartment"> Department</span> (10 marks)
        </label>
    </div>
</div>
<br>
<div class="form-row-center">
    <label for="max_k3_mark" id="max_k3_mark-label">Maximum Mark Value :</label>
    <input type="number" id="max_k3_mark" name="max_k3_mark" value="30" disabled>
</div>
<br>
<div class="form-row-center">
    <label for="calculate_k3_mark" id="calculate_k3_mark-label">Calculated Mark :</label>
    <input type="number" id="calculate_k3_mark" name="calculate_k3_mark" readonly>
</div>




<!-- Total Mark Section -->
<h2 class="total-mark-title" id="total-mark-title">Total Mark</h2>
<div class="form-row-center">
    <label for="total_mark" id="total-mark-label">Calculate Total Mark:</label>
    <input type="number" id="total_mark" name="total_mark" value="0" readonly>
</div>

    <h2 id="upload-title">Upload Files</h2>
<p class="red-text">**Please go to the dashboard to upload the certificate**</p>

    <!-- Submit Button -->
    <div class="button-container">
        <button type="submit" id="submit-btn">SUBMIT</button>
    </div>
</form>


    </div>

    <script src="scoring.js"></script>
</body>
</html>