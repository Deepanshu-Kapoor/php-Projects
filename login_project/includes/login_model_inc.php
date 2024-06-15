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

function get_Password(object $PDO, string $username, string $pwd)
{
    // SQL query to select the Username and Password from the Users table where the Username and Password matches the provided value
    $query = "SELECT pwd FROM Users WHERE username=:username and pwd = :pwd";

    // Prepare the SQL query
    $stmt = $PDO->prepare($query);

    // Bind the provided Username and Password to the query parameter
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":pwd", $pwd);

    // Execute the prepared statement
    $stmt->execute();

    // Fetch the result as an associative array
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Return the fetched result
    return $result;
}