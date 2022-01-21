<?php
    require_once "session.php";

    $email = $_POST['email'] ?? '';
    $message = "";

    if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['submit']))
    {
        require_once "app/Auth.php";
        $message = $auth->login();
        if (isset($_SESSION['authUser']) and $message === true) $_SESSION['auth'] = true;
    }
    if (isset($_SESSION['authUser'])) header('Location: index.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHOP</title>
</head>
    <body>
        <form method="post" action="login.php">
            <?php echo $message . "<br />" ?? "" ; ?>
            <input type="text" name="email" placeholder="Please Input Email" value="<?php echo $email ?>" /> <br /><br />
            <input type="password" name="password" placeholder="Password" value="">
            <input type="submit" name="submit" value="Log In" />
        </form>
        <p>Click Here to <a href="register.php">Sign up</a> with Us</p>
    </body>
</html>