<?php
// Enforce the use of cookies for sessions and enable strict mode for sessions
ini_set("session.use_only_cookies", 1); // Ensures sessions can only be established with cookies, not with URL parameters
ini_set("session.use_strict_mode", 1);  // Prevents uninitialized session IDs from being accepted

// Set session cookie parameters
session_set_cookie_params([
    'lifetime' => 1800,    // Set cookie lifetime to 1800 seconds (30 minutes)
    'domain' => 'localhost', // Set the domain for the cookie, usually the domain of our site
    'path' => '/',         // Set the path for the cookie to be valid within the entire domain
    'secure' => true,      // Ensures the cookie is sent over HTTPS only
    'httponly' => true     // Prevents JavaScript from accessing the session cookie
]);

// Start the session
session_start();

// Check if the session variable 'last_regeneration' is not set
if (!isset($_SESSION['last_regeneration'])) {
    regenerate_id(); // If not set, regenerate the session ID and set 'last_regeneration' timestamp
} else {
    $interval = 60 * 30; // Set the interval for session ID regeneration (30 minutes)
    // Check if the time since last regeneration exceeds the interval
    if (time() - $_SESSION['last_regeneration'] >= $interval) {
        regenerate_id(); // Regenerate the session ID if the interval has passed
    }
}

// Function to regenerate the session ID and update the 'last_regeneration' timestamp
function regenerate_id()
{
    session_regenerate_id(); // Regenerate the session ID
    $_SESSION['last_regeneration'] = time(); // Update the 'last_regeneration' timestamp to the current time
}
?>