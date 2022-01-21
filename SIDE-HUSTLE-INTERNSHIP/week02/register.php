<?php
    if (isset($_SESSION["auth_user"]))
    {
        header("location: index.php");
    }

    $message = "";

    if ($_SERVER["REQUEST_METHOD"] && $_POST["register"]) {
        require_once "./process.php";
        $message = register();
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
        <form method="POST" action="register.php">
            <span><?php if ($message !== "") { echo $message; } ?></span>
            <input type="text" name="username" value="<?php echo $_POST['username'] ?? ''; ?>" placeholder="Please Enter Username" /><br />
            <input type="text" name="email" value="<?php echo $_POST['email'] ?? ''; ?>" placeholder="Please Enter Email" /><br />
            <input type="password" name="password" value="" placeholder="Please Enter Password" /><br />
            <input type="password" name="confirm_password" value="" placeholder="Please Confirm Password" /><br />

            <input type="submit" name="register" value="Submit" /><br />
        </form>

        <p>You have an account with Us. Click here to <a href="login.php">Log In</a><p>
    </body>
</html>