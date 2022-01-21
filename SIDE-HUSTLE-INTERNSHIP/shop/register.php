<?php
    if (isset($_SESSION['authUser'])) {
        header("location: index.php");
    }

    $shop_name = $_POST['shop_name'] ?? '';
    $full_name = $_POST['full_name'] ?? '';
    $email = $_POST['email'] ?? '';
    $secret_question = $_POST['secret_question'] ?? '';
    $secret_answer = $_POST['secret_answer'] ?? '';

    if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['submit'])) {
        require_once "app/Auth.php";
        print_r($auth->create());
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHOP</title>
</head>
    <body>
        <form method="post" action="register.php">
            <input type="text" name="shop_name" placeholder="Please Input Shop Name" value="<?php echo $shop_name ?>" /> <br /><br />
            <input type="text" name="full_name" placeholder="Please Input Full Name" value="<?php echo $full_name ?>" /> <br /><br />
            <input type="email" name="email" placeholder="Please Input Email" value="<?php echo $email ?>" /> <br /><br />
            <input type="text" name="secret_question" placeholder="Please Secret Question" value="<?php echo $secret_question ?>" /> <br /><br />
            <input type="text" name="secret_answer" placeholder="Please Secret Answer" value="<?php echo $secret_answer ?>" /> <br /><br />
            <input type="password" name="password" placeholder="Password" value="">
            <input type="password" name="confirm_password" placeholder="Confirm Password" value="">
            <input type="submit" name="submit" value="Submit" />
        </form>
        <p>Have an account with us, Click to<a href="login.php"> Sign In</a></p>
    </body>
</html>