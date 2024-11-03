
        function changeLanguage() {
            const language = document.getElementById('language').value;
            if (language === 'ms') {
                document.title = 'Borang Pencalonan Anugerah Cemerlang';
                document.querySelector('h1').textContent = 'Borang Pencalonan Anugerah Cemerlang';
                document.querySelector('label[for="name"]').textContent = 'Nama';
                document.querySelector('label[for="reg_no"]').textContent = 'No Pendaftaran';
                document.querySelector('label[for="poly_name"]').textContent = 'Nama Politeknik';
                document.querySelector('label[for="dept_name"]').textContent = 'Nama Jabatan';
                document.querySelector('label[for="class"]').textContent = 'Kelas';
                document.querySelector('label[for="email"]').textContent = 'Emel';
                document.querySelector('label[for="ic_no"]').textContent = 'No IC';
                document.querySelector('label[for="phone_no"]').textContent = 'No H/P';
                document.querySelector('label[for="session"]').textContent = 'Sesi';
                document.querySelector('label[for="advisor_name"]').textContent = 'Nama Penasihat Akademik';
				
				document.querySelector('.achievement-title').textContent = 'Pencapaian Akademik'; 
				document.querySelector('label[for="hpnm"]').textContent = 'HPNM';
				document.querySelector('label[for="max_mark"]').textContent = 'Markah Maksimum';
				document.querySelector('label[for="calculated_mark"]').textContent = 'Markah Dikira';
				
				// Curriculum 1 Translations
				document.querySelector('.Curriculum-title').textContent = 'Kurikulum 1 Pengurusan Organisasi';
                document.querySelector('label[for="org_program"]').textContent = 'Program Organisasi';
                document.querySelector('label[for="position_held"]').textContent = 'Jawatan Dipegang:';
                document.querySelector('label[for="clubs_org"]').textContent = 'Kelab dan Organisasi Lain:';
                document.querySelector('label[for="total_max_mark"]').textContent = 'Nilai Markah Maksimum:';
                document.querySelector('label[for="calculate1_mark"]').textContent = 'Kira Markah';
                // Radio Button Translations
               document.querySelector('label[for="student_rep_council"]').textContent = 'Majlis Perwakilan Pelajar:';
                document.querySelector('input[value="10"]').nextSibling.textContent = 'Yang Dipertua (10 markah)';
                document.querySelector('input[value="9"]').nextSibling.textContent = 'Timbalan Yang Dipertua (9 markah)';
                document.querySelector('input[value="8"]').nextSibling.textContent = 'Setiausaha/Bendahari (8 markah)';
                document.querySelector('input[value="7"]').nextSibling.textContent = 'Ahli Jawatankuasa Eksekutif (7 markah)';

                document.querySelector('label[for="clubs_org"]').textContent = 'Kelab dan Organisasi Lain:';
                document.querySelector('input[value="6"]').nextSibling.textContent = 'Pengerusi (6 markah)';
                document.querySelector('input[value="5"]').nextSibling.textContent = 'Timbalan Pengerusi (5 markah)';
                document.querySelector('input[value="4"]').nextSibling.textContent = 'Setiausaha/Bendahari (4 markah)';
                document.querySelector('input[value="3"]').nextSibling.textContent = 'Ahli Jawatankuasa (3 markah)';
                document.querySelector('input[value="1"]').nextSibling.textContent = 'Ahli Biasa (1 markah)';
		

                // Curriculum 2 Translations
                document.getElementById('Curriculum2-title').textContent = 'Kurikulum 2 Kedudukan Program';
                document.getElementById('program_name-label').textContent = 'Nama Program';
                document.getElementById('program_org-label').textContent = 'Kedudukan dalam Organisasi Program:';
        
                // Position in Program Organization Radio Buttons
                document.getElementById('position_director').textContent = 'Pengarah/Pengerusi';
                document.getElementById('position_deputy').textContent = 'Timbalan Pengarah';
                document.getElementById('position_secretary').textContent = 'Setiausaha/Bendahari';
                document.getElementById('position_committee').textContent = 'Ahli Jawatankuasa';
                document.getElementById('position_member').textContent = 'Ahli Biasa';

                // Rank Radio Buttons
                document.getElementById('rank-label').textContent = 'Peringkat:';
                document.getElementById('rank_international').textContent = 'Antarabangsa/Kebangsaan';
                document.getElementById('rank_state').textContent = 'Negeri/Daerah/Komuniti';
                document.getElementById('rank_polytechnic').textContent = 'Politeknik';
                document.getElementById('rank_department').textContent = 'Jabatan';

                // Maximum Mark and Calculate Mark Translations
                document.getElementById('rank_max_mark-label').textContent = 'Nilai Markah Maksimum:';
                document.getElementById('calculate2_mark-label').textContent = 'Kira Markah';




                document.getElementById('curriculum3-title').textContent = 'Kurikulum 3 Peserta dalam Program';
                document.getElementById('program_name3-label').textContent = 'Nama Program Organisasi';
                document.getElementById('involvement-label').textContent = 'Penambahbaikan Penglibatan:';
                document.getElementById('involveinternational').textContent = 'Antarabangsa/Kebangsaan';
                document.getElementById('involvestate').textContent = 'Negeri/Daerah/Komuniti';
                document.getElementById('involvepoly').textContent = 'Politeknik';
                document.getElementById('involvedepartment').textContent = 'Jabatan';
                document.getElementById('max_k3_mark-label').textContent = 'Nilai Markah Maksimum:';
                document.getElementById('calculate_k3_mark-label').textContent = 'Markah Dikira:';



                document.getElementById('total-mark-title').textContent = 'Jumlah Markah';
                document.getElementById('total-mark-label').textContent = 'Kira Jumlah Markah:';
                document.getElementById('upload-title').textContent = 'Muat Naik Fail';
                document.getElementById('submit-btn').textContent = 'Hantar';
		

            } else {
                document.title = 'Excellent Award Nomination System Form (EANS)';
                document.querySelector('h1').textContent = 'Excellent Award Nomination System Form (EANS)';
                document.querySelector('label[for="name"]').textContent = 'Name';
                document.querySelector('label[for="reg_no"]').textContent = 'Registration No';
                document.querySelector('label[for="poly_name"]').textContent = 'Polytechnic Name';
                document.querySelector('label[for="dept_name"]').textContent = 'Department Name';
                document.querySelector('label[for="class"]').textContent = 'Class';
                document.querySelector('label[for="email"]').textContent = 'Email';
                document.querySelector('label[for="ic_no"]').textContent = 'No IC';
                document.querySelector('label[for="phone_no"]').textContent = 'No H/P';
                document.querySelector('label[for="session"]').textContent = 'Session';
                document.querySelector('label[for="advisor_name"]').textContent = 'Academic Advisor Name';

                document.querySelector('.achievement-title').textContent = 'Academic Achievement';
                document.querySelector('label[for="hpnm"]').textContent = 'HPNM';
                document.querySelector('label[for="max_mark"]').textContent = 'Maximum Mark';
                document.querySelector('label[for="calculated_mark"]').textContent = 'Calculated Mark';

                // Curriculum 1 Translations
                document.querySelector('.Curriculum-title').textContent = 'Curriculum 1 Organization Management';
                document.querySelector('label[for="org_program"]').textContent = 'Organization Program';
                document.querySelector('label[for="position_held"]').textContent = 'Position Held:';
                document.querySelector('label[for="clubs_org"]').textContent = 'Clubs and Other Organizations:';
                document.querySelector('label[for="total_max_mark"]').textContent = 'Maximum Mark Value:';
                document.querySelector('label[for="calculate1_mark"]').textContent = 'Calculate Mark';
                // Radio Button Translations
                document.querySelector('label[for="student_rep_council"]').textContent = 'Student Representation Council:';
                document.querySelector('input[value="10"]').nextSibling.textContent = 'President (10 marks)';
                document.querySelector('input[value="9"]').nextSibling.textContent = 'Vice President (9 marks)';
                document.querySelector('input[value="8"]').nextSibling.textContent = 'Secretary/Treasurer (8 marks)';
                document.querySelector('input[value="7"]').nextSibling.textContent = 'Executive Body (7 marks)';

               document.querySelector('label[for="clubs_org"]').textContent = 'Clubs and Other Organizations:';
                document.querySelector('input[value="6"]').nextSibling.textContent = 'Chairman (6 marks)';
                document.querySelector('input[value="5"]').nextSibling.textContent = 'Vice Chairman (5 marks)';
                document.querySelector('input[value="4"]').nextSibling.textContent = 'Secretary/Treasurer (4 marks)';
                document.querySelector('input[value="3"]').nextSibling.textContent = 'Committee (3 marks)';
                document.querySelector('input[value="1"]').nextSibling.textContent = 'Ordinary Member (1 mark)';
		


                // Curriculum 2 Translations
                document.getElementById('Curriculum2-title').textContent = 'Curriculum 2 Program Positions';
                document.getElementById('program_name-label').textContent = 'Program Name';
                document.getElementById('program_org-label').textContent = 'Position in Program Organization:';
        
                // Position in Program Organization Radio Buttons
                document.getElementById('position_director').textContent = 'Director/Chairman';
                document.getElementById('position_deputy').textContent = 'Deputy Director';
                document.getElementById('position_secretary').textContent = 'Secretary/Treasurer';
                document.getElementById('position_committee').textContent = 'Committee';
                document.getElementById('position_member').textContent = 'Ordinary Members';

               // Rank Radio Buttons
                document.getElementById('rank-label').textContent = 'Rank:';
                document.getElementById('rank_international').textContent = 'International/National';
                document.getElementById('rank_state').textContent = 'State/District/Community';
                document.getElementById('rank_polytechnic').textContent = 'Polytechnic';
                document.getElementById('rank_department').textContent = 'Department';

                // Maximum Mark and Calculate Mark Translations
                document.getElementById('rank_max_mark-label').textContent = 'Maximum Mark Value:';
                document.getElementById('calculate2_mark-label').textContent = 'Calculate Mark';		



                document.getElementById('curriculum3-title').textContent = 'Curriculum 3 Participants in Program';
                document.getElementById('program_name3-label').textContent = 'Organization Program';
                document.getElementById('involvement-label').textContent = 'Involvement Improvement:';
                document.getElementById('involveinternational').textContent = 'International/National';
                document.getElementById('involvestate').textContent = 'State/District/Community';
                document.getElementById('involvepoly').textContent = 'Polytechnic';
                document.getElementById('involvedepartment').textContent = 'Department';
                document.getElementById('max_k3_mark-label').textContent = 'Maximum Mark Value:';
                document.getElementById('calculate_k3_mark-label').textContent = 'Calculated Mark:';


                document.getElementById('total-mark-title').textContent = 'Total Mark';
                document.getElementById('total-mark-label').textContent = 'Calculate Total Mark:';
                document.getElementById('submit-btn').textContent = 'Submit';
		
            }
        }

//---------------------------------------------------------------------------------



// Calculate mark based on HPNM value
function calculateMark() {
    const hpnm = parseFloat(document.getElementById('hpnm').value) || 0;

    // Calculate the mark based on the HPNM value multiplied by 10
    const calculatedMark = hpnm * 10;

    // Set the calculated mark value, limiting it to a maximum of 40
    document.getElementById('calculated_mark').value = Math.min(calculatedMark, 40).toFixed(2);
}


//---------------------------------------------------------------------------------


// Function to update the calculated mark based on the selected radio button
function updateCalculatedMark() {
    const selectedPosition = document.querySelector('input[name="position"]:checked');

    const selectedMark = selectedPosition ? parseInt(selectedPosition.value) : 0;

    document.getElementById('calculate1_mark').value = selectedMark;
}


//---------------------------------------------------------------------------------




    function rankCalculatedMark() {
        // Get the selected radio button value
        let selectedValue = document.querySelector('input[name="combined_selection"]:checked').value;
        
        // Set the value in the 'Calculate Mark' field
        document.getElementById("calculate2_mark").value = selectedValue;
    }

//---------------------------------------------------------------------------------



// Function to calculate the mark based on the selected involvement improvement
function calculateK3Mark() {
    const selectedInvolvement = document.querySelector('input[name="involvement"]:checked');

    // Get the value of the selected radio button (mark value)
    const selectedMark = selectedInvolvement ? parseInt(selectedInvolvement.value) : 0;

    // Display the calculated mark in the respective input field
    document.getElementById('calculate_k3_mark').value = selectedMark;
}




//---------------------------------------------------------------------------------
// Function to calculate the total mark
function calculateTotalMark() {
    const calculatedMark = parseFloat(document.getElementById('calculated_mark').value) || 0;
    const updateCalculatedMark = parseFloat(document.getElementById('calculate1_mark').value) || 0;
    const rankCalculatedMark = parseFloat(document.getElementById('calculate2_mark').value) || 0;
    const calculateK3Mark = parseFloat(document.getElementById('calculate_k3_mark').value) || 0;

    // Calculate total mark and set it to the total mark input field
    const totalMark = calculatedMark + updateCalculatedMark + rankCalculatedMark + calculateK3Mark;
    document.getElementById('total_mark').value = totalMark.toFixed(2); // Limit to two decimal places
}

// Function to calculate and set Curriculum 2 mark based on selection
function rankCalculatedMark() {
    const selectedElement = document.querySelector('input[name="combined_selection"]:checked');
    const rankMark = selectedElement ? parseInt(selectedElement.value) : 0;
    document.getElementById('calculate2_mark').value = rankMark;
    calculateTotalMark();  // Update total mark
}

// Call calculateTotalMark() when any relevant input changes
function setupEventListeners() {
    // Example event listeners for when inputs change
    document.getElementById('hpnm').addEventListener('input', function() {
        calculateMark();
        calculateTotalMark();
    });

    // For Curriculum 1 Organization Management radio buttons
    const positionElements = document.getElementsByName('position');
    positionElements.forEach((element) => {
        element.addEventListener('change', function() {
            updateCalculatedMark();
            calculateTotalMark();
        });
    });

    // For Curriculum 2 Program Positions and Rank (combined selection)
    const combinedSelectionElements = document.getElementsByName("combined_selection");
    combinedSelectionElements.forEach((element) => {
        element.addEventListener('change', function() {
            rankCalculatedMark();
        });
    });

    // For K3 involvement radio buttons
    const k3InvolvementElements = document.getElementsByName('involvement');
    k3InvolvementElements.forEach((element) => {
        element.addEventListener('change', function() {
            calculateK3Mark();
            calculateTotalMark();
        });
    });
}

// Call the setup function to initialize event listeners
setupEventListeners();






//---------------------------------------------------------------------------------
