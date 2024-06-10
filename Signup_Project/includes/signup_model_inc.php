<?php
// Enforce strict type checking
declare(strict_types=1);

/**
 * Function to get the username from the database.
 * 
 * @param object $PDO The PDO database connection object.
 * @param string $username The username to search for.
 * @return array|false The fetched result as an associative array, or false if no match is found.
 */
function get_username(object $PDO, string $username)
{
    // SQL query to select the username from the Users table where the username matches the provided value
    $query = "SELECT username FROM Users WHERE username = :username";

    // Prepare the SQL query
    $stmt = $PDO->prepare($query);

    // Bind the provided username to the query parameter
    $stmt->bindParam(":username", $username);

    // Execute the prepared statement
    $stmt->execute();

    // Fetch the result as an associative array
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Return the fetched result
    return $result;
}

/**
 * Function to get the email from the database.
 * 
 * @param object $PDO The PDO database connection object.
 * @param string $email The email to search for.
 * @return array|false The fetched result as an associative array, or false if no match is found.
 */
function get_email(object $PDO, string $email)
{
    // SQL query to select the email from the Users table where the email matches the provided value
    $query = "SELECT email FROM Users WHERE email = :email";

    // Prepare the SQL query
    $stmt = $PDO->prepare($query);

    // Bind the provided email to the query parameter
    $stmt->bindParam(":email", $email);

    // Execute the prepared statement
    $stmt->execute();

    // Fetch the result as an associative array
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Return the fetched result
    return $result;
}

/**
 * Function to insert a new user into the database.
 * 
 * @param object $PDO The PDO database connection object.
 * @param string $username The username for the new user.
 * @param string $pwd The password for the new user.
 * @param string $email The email for the new user.
 * @return void
 */
function set_user(object $PDO, string $username, string $pwd, string $email): void
{
    // SQL query to insert a new user into the Users table
    $query = "INSERT INTO Users(username, pwd, email) VALUES (:username, :pwd, :email)";

    // Prepare the SQL query
    $stmt = $PDO->prepare($query);

    // Options for password hashing
    $options = ['cost' => 12];
    // Hash the password using bcrypt with the specified options
    $hashedpass = password_hash($pwd, PASSWORD_BCRYPT, $options);

    // Bind the parameters to the query
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":pwd", $hashedpass);
    $stmt->bindParam(":email", $email);

    // Execute the prepared statement
    $stmt->execute();
}
