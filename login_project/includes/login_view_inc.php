<?php
// Enforce strict type checking
declare(strict_types=1);

/**
 * Function to display the sign-up form inputs with pre-filled values in case of validation errors.
 */
function show_login_inputs()
{
    echo '<label for="username">Username</label>
            <input type="text" name="username" placeholder="Username" required>';

    // Display the password input field (always empty for security reasons)
    echo '<label for="pswd">Password</label>
          <input type="password" name="pswd" placeholder="Password" required>';
    
}

