<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/styles.css">
    <link rel="stylesheet" href="search.css">
    <title>Search Student Information</title>
</head>
<body>
<div class="btn-container">
    <a href="tableindex.php" class="btn-back">Dashboard</a>
</div>
    <?php 
    include 'scoring_conn.php'; // Database connection file 

    // Initialize variables
    $results = [];
    $keyword = ''; // Initialize keyword

    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $keyword = $_POST['keyword']; // Get the keyword from input if submitted

        // SQL query to search students in the database
        $sql = "SELECT * FROM scoring WHERE name LIKE '%$keyword%' OR reg_no LIKE '%$keyword%'"; // Wildcard char that matches any sequence of characters
        $get_studentlist = mysqli_query($connection, $sql); // Execute the query using $connection
        
        // Check for query errors
        if (!$get_studentlist) {
            echo "Error executing query: " . mysqli_error($connection);
        } else {
            // Fetch results
            while ($row = mysqli_fetch_array($get_studentlist)) {
                $results[] = $row; // Add each result row to the results array
            }
        }
    }
    ?>

    <div class="intro"> 
        <h1>Search Student Information</h1>
        
        <div class="search-container">
            <form method="POST">
                <input type="text" name="keyword" class="search-box" placeholder="Student Name or Registration No " required value="<?php echo htmlspecialchars($keyword); ?>">
<br>
</br>
                <button type="submit" class="submit-btn">Search</button>
            </form>
        </div>

        <?php if (!empty($results)): ?>  <!-- Check if there are results -->
            <div class="results">
                <h2>Search Results:</h2>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Registration No</th>
                            <th>Polytechnic Name</th>
                            <th>Department Name	</th>
                            <th>Email</th>
                            <th>IC No</th>
                            <th>Phone No</th>
                            <th>Session</th>	
                            <th>Advisor Name</th>	
                            <th>Total Marks</th>								
                        </tr>
                    </thead>


							<tbody>
                        <?php
                        $no = 1;  // Initialize counter
                        foreach ($results as $row): ?>  <!-- Loop through results array -->
                            <tr>
    <td><?php echo $no++; ?></td>
    <td><?php echo strtoupper(htmlspecialchars($row['name'])); ?></td>
    <td><?php echo strtoupper(htmlspecialchars($row['reg_no'])); ?></td>
    <td><?php echo strtoupper(htmlspecialchars($row['poly_name'])); ?></td>
    <td><?php echo strtoupper(htmlspecialchars($row['dept_name'])); ?></td>								
                                <td><?php echo htmlspecialchars($row['email']); ?></td>	
    <td><?php echo strtoupper(htmlspecialchars($row['ic_no'])); ?></td>									 
    <td><?php echo strtoupper(htmlspecialchars($row['phone_no'])); ?></td>	
    <td><?php echo strtoupper(htmlspecialchars($row['session'])); ?></td>	
    <td><?php echo strtoupper(htmlspecialchars($row['advisor_name'])); ?></td>	
    <td><?php echo strtoupper(htmlspecialchars($row['total_mark'])); ?></td>	
</tr>
                        <?php endforeach; ?>   <!-- End of results loop -->
                    </tbody>
                </table>
            </div>
        <?php elseif (!empty($keyword)): ?>   <!-- Check if there was a keyword but no results found -->
            <p>No students found for "<?php echo htmlspecialchars($keyword); ?>"</p> <!-- Display message if no students were found -->
        <?php endif; ?>

    </div>

    <?php mysqli_close($connection); ?> <!-- Close the connection using $connection -->
</body>
</html>


