<?php
    print_r($_SESSION['users']);
    if (isset($_SESSION["auth-user"]))
    {
        header("location: index.php");
    }
    $message = "";
        
    if ($_SERVER['REQUEST_METHOD'] = "POST" && isset($_POST['login']))
    {
        require_once "./process.php";
        $message = login();
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
        <form method="POST" action="login.php">
        <span><?php if ($message !== "") echo $message; ?></span> <br />
            <input type="text" name="email" value="" placeholder="Please Enter Email or Username" /> <br />
            <input type="password" name="password" value="" placeholder="Please Enter Password" /><br />

            <input type="submit" name="login" value="LogIn" />
        </form>
        <p>Click here to <a href="register.php">REGISTER</a> with Us<p>
    </body>
</html>