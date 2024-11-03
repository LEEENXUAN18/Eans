
// JavaScript for toggling dropdown
document.querySelectorAll('.dropdown > a').forEach(item => {
    item.addEventListener('click', event => {
        const dropdownContent = item.nextElementSibling;
        if (dropdownContent) {
            dropdownContent.classList.toggle('show'); // Toggle the 'show' class
        }
        event.preventDefault(); // Prevent default anchor behavior
    });
});

// Close the dropdown if clicked outside
document.addEventListener('click', event => {
    const dropdowns = document.querySelectorAll('.dropdown-content');
    dropdowns.forEach(dropdown => {
        // Check if the click was outside of the dropdown
        if (!dropdown.parentElement.contains(event.target)) {
            dropdown.classList.remove('show'); // Close the dropdown
        }
    });
});

// JavaScript to toggle the menu
document.querySelector('.menu-icon').addEventListener('click', function() {
    const nav = document.querySelector('.main-nav ul');
    nav.classList.toggle('show');
});




