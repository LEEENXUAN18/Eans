// Opens the modal and populates it with data
function openForm(studentId) {
    // Fetch data based on the student ID, here is an example hardcoded data
    const exampleData = {
        studentName: "John Doe",
        program: "Computer Science",
        marks: 0, // Initially empty for entry
    };
    
    // Populate form fields
    document.getElementById("studentName").value = exampleData.studentName;
    document.getElementById("program").value = exampleData.program;

    // Show the modal
    document.getElementById("scoringModal").style.display = "block";
}

// Closes the modal
function closeForm() {
    document.getElementById("scoringModal").style.display = "none";
}

// Event listener to close the modal when clicking outside the content
window.onclick = function(event) {
    if (event.target === document.getElementById("scoringModal")) {
        closeForm();
    }
}
