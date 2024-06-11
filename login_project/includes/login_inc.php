<?php
// Check if the request method is POST, which indicates form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form input values
    $username = $_POST["username"]; // Get the username from the form input
    $pwd = $_POST["pswd"];          // Get the password from the form input
    // Attempt to include the necessary scripts
    try {
        // Include the database connection script
        require_once ("dbh_inc.php");
    }
    catch (PDOException $e) {
        // Handle potential errors in the inclusion of the database connection
        die("Query failed: " . $e->getMessage()); // Display an error message and terminate the script if an exception occurs
    }
}   
else {
    // If the request method is not POST, redirect to the home page
    header("Location: ../index.php"); // Redirect to the index page
    die(); // Terminate the script to ensure no further code is executed
}
