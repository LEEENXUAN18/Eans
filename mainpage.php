<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penerbitan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="mainpage.css">
    <style>
        /* Style for logo container */
        .logo-container {
            position: relative;
            display: inline-block;
        }
		
/* Style for logo container */
.logo-container {
    position: relative;
    display: inline-block;
}

/* Remove underline from logo */
.logo {
    text-decoration: none; /* Remove underline from the entire logo link */
}

.logo-text {
	font-size: 16px; /* Font size for the dropdown header */
    text-decoration: none; /* Ensure there's no underline on the span */
}


        /* Style for dropdown */
        .dropdown-content {
            display: none;
            position: absolute;
            top: 100%; /* Position below the logo */
            left: 0;
            background-color: white;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
            width: 250px; /* Adjust the width as needed */
            z-index: 1;
            padding: 10px;
            border-radius: 5px;
        }

        /* Show the dropdown when triggered */
        .dropdown-content.show {
            display: block;
        }

        .profile-section {
            padding: 10px;
            text-align: center;
        }

        .profile-pic {
            width: 80px;
            height: 80px;
            border-radius: 50%;
        }

        /* Navigation menu */
        nav.menu ul {
            list-style-type: none;
            padding: 0;
        }

        nav.menu ul li {
            padding: 10px;
            text-align: left;
        }

        nav.menu ul li a {
            text-decoration: none;
            color: #333;
        }
/* Hover effect for links */
nav.menu ul li a:hover {
    background-color: #ffda3d; /* Darker shade for hover effect */
    color: black;
}


        /* Additional styling for user profile */
        .email p, .user-details h3, .user-details p {
            margin: 0;
            padding: 5px 0;
        }

        /* Hide dropdown when clicking outside */
        body {
            font-family: Arial, sans-serif;
        }


        /* Style the navigation bar and other elements */
        .main-nav ul {
            display: flex;
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .main-nav ul li {
            margin-right: 20px;
            position: relative; /* Added for dropdown */
        }
/* Optional: Hover effect on navigation links */
.main-nav ul li a:hover {
    background-color: #ffd53e; /* Darker shade for hover effect */
    color: black;
}
        .main-nav ul li a {
            text-decoration: none;
            color: #333;
        }

        /* Dropdown menu for Guide */
        .guide-dropdown {
            display: none;
            position: absolute;
            top: 100%; /* Position below the menu item */
            left: 0;
            background-color: white;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1;
            width: 200px; /* Adjust the width as needed */
        }

        /* Show the guide dropdown when triggered */
        .guide-dropdown.show {
            display: block;
        }

        /* Responsive dropdown for smaller screens */
        @media (max-width: 600px) {
.dropdown-content {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    background-color: white;
    box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
    z-index: 1;
    width: 200px; /* Adjust this value for the desired width */
    padding: 5px;
    border-radius: 5px;
    }
}
    </style>
</head>
<body>

<?php 
session_start(); // Start the session
$name = isset($_SESSION['name']) ? $_SESSION['name'] : 'User'; // Assuming username is stored in session
?>
<header>
    <div class="logo-container" id="logo-container">
        <a href="#" class="logo" id="logo-link">
            <img src="image/logo.jpg" alt="Excellence Award Nomination System" class="logo-img">
            <span class="logo-text">Excellence Award Nomination System</span>
        </a>

        <!-- Profile Dropdown Triggered by Logo -->
        <div class="dropdown-content profile-sidebar" id="profile-dropdown">
            <div class="profile-section">
			
			
                <div class="email">
                    Welcome, <?php echo htmlspecialchars($name); ?> <!-- Display the username -->
                </div>
            </div>
			
            <nav class="menu">
                <ul>
                    <li><a href="tableindex.php">Dashboard</a></li>
                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="firstpage.html">LogOut</a></li>
                </ul>
            </nav>
        </div>
    </div>
    
    <nav class="main-nav">
        <ul>
            <li><a href="mainpage.php" class="nav-link">Home</a></li>
          <li class="dropdown">
    <a href="#" class="nav-link" id="guide-link"><span>Guide</span> 
	<div class=""></i></a>
    <div class="dropdown-content" >
        <ul>
            <li><a href="guide.html">Requirements</a></li>
        </ul>
		<ul>
		<li><a href="mark.html">Criteria</a></li>
		        </ul>
				<ul>
		<li><a href="notepad.usermanual.html">User Manual</a></li>
		        </ul>
    </div>
</li>


	
            <li><a href="scoring.php" class="nav-link">Form</a></li>			
            <li><a href="#awards-section" class="nav-link">About Us</a></li>
            <li><a href="#contact" class="nav-link">Contact Us</a></li>
        </ul>
    </nav>
</header>




<!-- Other sections remain unchanged -->
<script>
    // JavaScript for the Guide dropdown toggle
    document.getElementById('guide-link').addEventListener('click', function(event) {
        event.preventDefault(); // Prevent default link behavior
        var dropdown = document.getElementById('guide-dropdown');
        dropdown.classList.toggle('show');
    });

    // Close the dropdown if the user clicks outside of it
    window.onclick = function(event) {
        // Close profile dropdown
        if (!event.target.matches('#logo-link') && !event.target.closest('.logo-container')) {
            var dropdowns = document.getElementsByClassName('dropdown-content');
            for (var i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }

        // Close guide dropdown
        if (!event.target.matches('#guide-link') && !event.target.closest('.dropdown')) {
            var guideDropdown = document.getElementById('guide-dropdown');
            if (guideDropdown.classList.contains('show')) {
                guideDropdown.classList.remove('show');
            }
        }
    };
</script>

<script>
    // JavaScript for the dropdown toggle
    document.getElementById('logo-link').addEventListener('click', function(event) {
        event.preventDefault(); // Prevent default link behavior
        var dropdown = document.getElementById('profile-dropdown');
        dropdown.classList.toggle('show');
    });

    // Close the dropdown if the user clicks outside of it
    window.onclick = function(event) {
        if (!event.target.matches('#logo-link') && !event.target.closest('.logo-container')) {
            var dropdowns = document.getElementsByClassName('dropdown-content');
            for (var i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }

    // JavaScript for the Guide dropdown toggle
    document.getElementById('guide-link').addEventListener('click', function(event) {
        event.preventDefault(); // Prevent default link behavior
        var guideDropdown = document.getElementById('guide-dropdown');
        guideDropdown.classList.toggle('show');
    });

    // Close the guide dropdown if the user clicks outside of it
    window.onclick = function(event) {
        if (!event.target.matches('#guide-link') && !event.target.closest('.dropdown')) {
            var guideDropdown = document.getElementById('guide-dropdown');
            if (guideDropdown.classList.contains('show')) {
                guideDropdown.classList.remove('show');
            }
        }
    }
</script>


</style>

<!-- JavaScript -->
<script>
    let slideIndex = 0;

    // Function to change slide
    function changeSlide(n) {
        showSlide(slideIndex += n);
    }

    // Function to show the current slide
    function showSlide(n) {
        const slides = document.querySelectorAll('.slide');
        if (n >= slides.length) { slideIndex = 0; } // Wrap around to the first slide
        if (n < 0) { slideIndex = slides.length - 1; } // Wrap around to the last slide

        slides.forEach(slide => slide.classList.remove('active')); // Hide all slides
        slides[slideIndex].classList.add('active'); // Show the current slide
    }

    // Automatic slideshow
    setInterval(() => {
        changeSlide(1); // Change slide every 5 seconds
    }, 2000);

    // Initial display
    showSlide(slideIndex);
</script>


<body>
	
<!-- Banner Section -->
<section class="banner">
    <div class="slideshow-container">
        <div class="slide active" style="background-image: url('image/pic1.jpeg');">
            <h2 class="psp">Seberang Perai Polytechnic (PSP)</h2>
            <p class="psp">Welcome to the Award Nomination Website</p>
        </div>
        <div class="slide" style="background-image: url('image/pic2.jpeg');">		
            <h2 class="psp">Seberang Perai Polytechnic (PSP)</h2>
            <p class="psp">Welcome to the Award Nomination Website</p>
        </div>
        <div class="slide" style="background-image: url('image/pic3.jpeg');">
            <h2 class="psp">Seberang Perai Polytechnic (PSP)</h2>
            <p class="psp">Welcome to the Award Nomination Website</p>
        </div>
        <div class="slide" style="background-image: url('image/pic4.jpeg');">
            <h2 class="psp">Seberang Perai Polytechnic (PSP)</h2>
            <p class="psp">Welcome to the Award Nomination Website</p>
        </div>
    </div>
</section>
	
<!-- Awards Section -->
<section id="awards-section" class="awards-section">
    <div class="awards-container">
        <!-- Image Section -->
        <div class="award-image">
            <img src="image/award.png" alt="Award Icon">
        </div>
        
        <!-- Awards List -->
        <div class="awards-list">
            <div class="award-item blue">
                <h3>About Excellence Award Nomination System (EANS)</h3>
                <p>The Excellence Award Nomination System (EANS) is a streamlined platform designed to simplify the nomination process for excellence awards at Seberang Perai Polytechnic. By making it easier for academic advisors to recognize outstanding contributions and achievements, EANS promotes a culture of appreciation and motivation among students.</p>
				<br>
                <p>
                    At EANS, we believe that recognizing excellence not only rewards individuals but also inspires others to strive for greatness. Our goal is to foster fair competition and acknowledge exceptional talent, ultimately celebrating the remarkable accomplishments that shape our academic community.
                </p>
            </div>
        </div>
    </div>
</section>
	
<!-- Latest News Section -->
<section class="latest-news">
    <section id="contact" class="contact-us">
        <h2>Latest News</h2>
        <div class="news-container">
            <div class="news-card">
                <img src="image/nomination.jpg" alt="News Image 2">
                <div class="news-info">
                    <h3>Candidates Awards</h3>
                    <a href="scoring.php">Read More</a>
                </div>
            </div>
            <div class="news-card">
                <img src="image/update.jpg" alt="News Image 3">
                <div class="news-info">
                    <h3>Updates in Polytechnic</h3>
                    <a href="https://www.hmetro.com.my/mutakhir/2020/06/590794/10-politeknik-dapat-pengiktirafan-apacc">Read More</a>
                </div>
            </div>
            <div class="news-card">
                <img src="image/insta.jpg" alt="News Image 4">
                <div class="news-info">
                    <h3>Latest Post on Instagram</h3>
                    <a href="https://www.instagram.com/politeknikseberangperai/">Read More</a>
                </div>
            </div>
        </div>
    </section>
</section>


<!-- Contact Us Section --> 
<section id="contact" class="contact-us">
    <h2>Contact Us</h2>
    <div class="contact-info">
        <div class="contact-item">
            <h3>Location</h3>
            <p>Politeknik Seberang Perai Jalan Permatang Pauh 13500 Permatang Pauh Pulau Pinang.</p>
        </div>
        <div class="contact-item">
            <h3>Phone</h3>
            <p>04-5383322</p>
        </div>
        <div class="contact-item">
            <h3>Email</h3>
            <p>ukk@psp.edu.my</p>
        </div>
    </div>
</section>

<!-- Social Media Icons -->
<div class="social-icons">
    <a href="https://www.instagram.com/politeknikseberangperai/">
        <img src="image/instagram.png" alt="Instagram" class="social-icon instagram-icon">
    </a>
    <a href="https://www.facebook.com/Poliseberangperai/">
        <img src="image/facebook.png" alt="Facebook" class="social-icon facebook-icon">
    </a>

</div>

<footer class="footer">
    <p>© PSP EANS, AIEWANILEE. All Right Reserved.</p>
</footer>	

<script src="mainpage.js"></script> 	
</body>
</html>
