<?php
require_once ("includes/config_session.php");
require_once ("includes/signup_view_inc.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signup.css">
    <title> Signup</title>
</head>

<body>
    <main>
        <h1>Sign Up</h1>
        <form action="includes/signup_inc.php" method="POST">
            <?php
            show_signup_inputs() ?>
            <button>Sign Up</button>
        </form>
        <?php
        check_signup_errors();
        ?>
    </main>
</body>

</html>