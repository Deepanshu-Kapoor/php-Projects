<?php
// Enforce strict type checking
declare(strict_types=1);

/**
 * Function to display the sign-up form inputs with pre-filled values in case of validation errors.
 */
function show_signup_inputs()
{
    // Check if there is a username in session data and if there is no username_taken error
    if (isset($_SESSION["signup_data"]["username"]) && !isset($_SESSION["signup_erros"]["username_taken"])) {
        // Display the username input field with the pre-filled value from session data
        echo '<label for="username">Username</label>
              <input type="text" name="username" placeholder="Username" required value="' . htmlspecialchars($_SESSION["signup_data"]["username"]) . '">';
    } else {
        // Display the username input field without a pre-filled value
        echo '<label for="username">Username</label>
              <input type="text" name="username" placeholder="Username" required>';
    }

    // Display the password input field (always empty for security reasons)
    echo '<label for="pswd">Password</label>
          <input type="password" name="pswd" placeholder="Password" required>';

    // Check if there is an email in session data and if there is no email_invalid error
    if (isset($_SESSION["signup_data"]["email"]) && !isset($_SESSION["signup_erros"]["email_invalid"])) {
        // Display the email input field with the pre-filled value from session data
        echo '<label for="email">Email</label>
              <input type="text" name="email" placeholder="Email" required value="' . htmlspecialchars($_SESSION["signup_data"]["email"]) . '">';
    } else {
        // Display the email input field without a pre-filled value
        echo '<label for="email">Email</label>
              <input type="text" name="email" placeholder="Email" required>';
    }
}


/**
 * Function to check and display signup errors or success messages.
 * 
 * This function checks if there are any signup errors stored in the session,
 * and displays them. If there are no errors but a signup success message is
 * present in the URL parameters, it displays a success message.
 */
function check_signup_errors()
{
    // Check if there are signup errors stored in the session
    if (isset($_SESSION["signup_erros"])) {
        $errors = $_SESSION["signup_erros"]; // Retrieve the errors from the session

        // Loop through each error and display it
        foreach ($errors as $error) {
            echo "<p>Error is " . htmlspecialchars($error) . "</p>";
        }

        // Clear the signup errors from the session after displaying them
        unset($_SESSION["signup_erros"]);
    }
    // Check if the URL contains a 'signup' parameter with the value 'success'
    else if (isset($_GET["signup"]) && $_GET["signup"] === "success") {
        echo "<p>Signup Successful</p>"; // Display the success message
    }
}
