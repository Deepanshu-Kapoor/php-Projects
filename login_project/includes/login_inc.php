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
        // Include the login model script
        require_once ("login_model_inc.php");
        // Include the login controller script
        require_once ("login_cntrl_inc.php");
        // Initialize an array to store potential error messages
        $errors = [];
        
        // Check for empty input fields
        if (is_input_empty($username, $pwd)) {
            $errors["empty_input"] = "Input is Empty";
        }
        // Even match password could be enough I wanted to check for the user too
        // Check if the user exist 
        if (find_username($pdo, $username) == null) {
            $errors["incorrect_user"] = "No such user";
        }
        //Check if the password entered is correct for the same user
        if(match_password($pdo,$username,$pwd)==null){
            $errors["wrong_password"] = "Password is Incorrect";
        }
        // Include the session configuration script
        require_once ("config_session.php");

        // If there are any errors, store them in the session and redirect back to the index page
        if ($errors) {
            // Store the errors in the session under the key "login_erros"
            $_SESSION["login_errors"] = $errors;

            // Store the user's input data (username) in the session to pre-fill the form fields
            $input_data = ["username" => $username];
            $_SESSION["login_data"] = $input_data;

            // Redirect the user back to the index page to display the form again with error messages
            header("Location: ../index.php");

            // Terminate the script to ensure no further code is executed
            die();
        }
        // Redirect to the index page with a success message
        header("Location: ../index.php?login=success");

        // Close the database connection and statement
        $pdo = null;
        $stmt = null;
        die();
    } catch (PDOException $e) {
        // Handle potential errors in the inclusion of the database connection
        die("Query failed: " . $e->getMessage()); // Display an error message and terminate the script if an exception occurs
    }
} else {
    // If the request method is not POST, redirect to the home page
    header("Location: ../index.php"); // Redirect to the index page
    die(); // Terminate the script to ensure no further code is executed
}
