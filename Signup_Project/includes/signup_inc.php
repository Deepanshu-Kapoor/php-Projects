<?php
// Check if the request method is POST, which indicates form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form input values
    $username = $_POST["username"]; // Get the username from the form input
    $pwd = $_POST["pswd"];          // Get the password from the form input
    $email = $_POST["email"];       // Get the email from the form input

    // Attempt to include the necessary scripts
    try {
        // Include the database connection script
        require_once ("dbh_inc.php");
        // Include the signup model script
        require_once ("signup_model_inc.php");
        // Include the signup controller script
        require_once ("signup_cntrl_inc.php");

        // Initialize an array to store potential error messages
        $errors = [];

        // Check for empty input fields
        if (is_input_empty($username, $pwd, $email)) {
            $errors["empty_input"] = "Input is Empty";
        }
        // Validate the email format
        if (is_email_invalid($email)) {
            $errors["email_invalid"] = "Email is Invalid";
        }
        // Check if the username is already taken
        if (is_username_taken($pdo, $username)) {
            $errors["username_taken"] = "Username is already taken";
        }
        // Check if the email is already registered
        if (is_email_registered($pdo, $email)) {
            $errors["email_registered"] = "Email is already registered";
        }

        // Include the session configuration script
        require_once ("config_session.php");

        // If there are any errors, store them in the session and redirect back to the index page
        if ($errors) {
            // Store the errors in the session under the key "signup_erros"
            $_SESSION["signup_erros"] = $errors;

            // Store the user's input data (username and email) in the session to pre-fill the form fields
            $input_data = ["username" => $username, "email" => $email];
            $_SESSION["signup_data"] = $input_data;

            // Redirect the user back to the index page to display the form again with error messages
            header("Location: ../index.php");

            // Terminate the script to ensure no further code is executed
            die();
        }


        // If no errors, create the user in the database
        create_user($pdo, $username, $pwd, $email);

        // Redirect to the index page with a success message
        header("Location: ../index.php?signup=success");

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
?>