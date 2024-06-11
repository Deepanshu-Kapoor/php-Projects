<?php
require_once ("includes/config_session.php");
require_once ("includes/login_view_inc.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title> Login</title>
</head>

<body>
    <main>
        <h1>Login</h1>
        <form action="includes/login_inc.php" method="POST">
            <?php
            show_login_inputs() ?>
            <button>Login</button>
        </form>
    </main>
</body>
</html>