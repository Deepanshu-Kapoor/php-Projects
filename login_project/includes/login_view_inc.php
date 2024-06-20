<?php
// Enforce strict type checking
declare(strict_types=1);

/**
 * Function to display the sign-up form inputs with pre-filled values in case of validation errors.
 */
function show_login_inputs()
{
        if (isset($_SESSION["login_data"]["username"]) && !isset($_SESSION["login_errors"]["username_taken"])) {
                // Display the username input field with the pre-filled value from session data
                echo '<label for="username">Username</label>
              <input type="text" name="username" placeholder="Username" required value="' . htmlspecialchars($_SESSION["login_data"]["username"]) . '">';
        } else {
                // Display the username input field without a pre-filled value
                echo '<label for="username">Username</label>
              <input type="text" name="username" placeholder="Username" required>';
        }

    // Display the password input field (always empty for security reasons)
    echo '<label for="pswd">Password</label>
          <input type="password" name="pswd" placeholder="Password" required>';
    
}
// Check if there are login errors stored in the session
if (isset($_SESSION["login_errors"])) {
        $error = $_SESSION["login_errors"]; // Retrieve the errors from the session

        // Loop through each error and display it
        foreach ($error as $err) {
                echo "<p>Error is " . htmlspecialchars($err) . "</p>";
        }

        // Clear the login errors from the session after displaying them
        unset($_SESSION["login_errors"]);
}
// Check if the URL contains a 'login' parameter with the value 'success'
else if (isset($_GET["login"]) && $_GET["login"] === "success") {
        echo "<p>Login Successful</p>"; // Display the success message
}

