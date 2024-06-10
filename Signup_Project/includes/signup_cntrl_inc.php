<?php
// Enforce strict type checking
declare(strict_types=1);

/**
 * Checks if any of the input fields are empty.
 * 
 * @param string $username The username input.
 * @param string $pwd The password input.
 * @param string $email The email input.
 * @return bool Returns true if any input is empty, otherwise false.
 */
function is_input_empty(string $username, string $pwd, string $email): bool
{
    // Check if any of the input fields are empty
    if (empty($username) || empty($pwd) || empty($email)) {
        return true;
    } else {
        return false;
    }
}

/**
 * Validates the email format.
 * 
 * @param string $email The email input.
 * @return bool Returns true if the email is invalid, otherwise false.
 */
function is_email_invalid(string $email): bool
{
    // Use PHP's filter_var function to validate the email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

/**
 * Checks if the username is already taken.
 * 
 * @param object $PDO The PDO database connection object.
 * @param string $username The username to check.
 * @return bool Returns true if the username is taken, otherwise false.
 */
function is_username_taken(object $PDO, string $username): bool
{
    // Use the get_username function to check if the username exists in the database
    if (get_username($PDO, $username)) {
        return true;
    } else {
        return false;
    }
}

/**
 * Checks if the email is already registered.
 * 
 * @param object $PDO The PDO database connection object.
 * @param string $email The email to check.
 * @return bool Returns true if the email is registered, otherwise false.
 */
function is_email_registered(object $PDO, string $email): bool
{
    // Use the get_email function to check if the email exists in the database
    if (get_email($PDO, $email)) {
        return true;
    } else {
        return false;
    }
}

/**
 * Creates a new user in the database.
 * 
 * @param object $PDO The PDO database connection object.
 * @param string $username The username for the new user.
 * @param string $pwd The password for the new user.
 * @param string $email The email for the new user.
 * @return void
 */
function create_user(object $PDO, string $username, string $pwd, string $email): void
{
    // Use the set_user function to create a new user in the database
    set_user($PDO, $username, $pwd, $email);
}
?>
