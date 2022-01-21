<?php
    session_start();
    
    /**
     * $_SESSION['auth_user'] ==>> is an array...
     */
    if (!isset($_SESSION['auth_user']))
    {
        header("location: login.php");
    }

    if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['logout'])) {
        unset($_SESSION['auth_user']);
        header('location: login.php');
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
</head>
<body>
    <h1>Welcome to you Dashboard</h1>
    <form action="index.php" method="POST">
        <button type="submit" name="logout">logout</button>
    </form>
</body>
</html>