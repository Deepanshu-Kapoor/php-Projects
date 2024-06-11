<?php
// Enforce strict type checking
declare(strict_types=1);

/**
 * Checks if any of the input fields are empty.
 * 
 * @param string $username The username input.
 * @param string $pwd The password input.
 * @return bool Returns true if any input is empty, otherwise false.
 */
function is_input_empty(string $username, string $pwd): bool
{
    // Check if any of the input fields are empty
    if (empty($username) || empty($pwd)) {
        return true;
    } else {
        return false;
    }
}