<?php

    $title = $_POST['title'] ?? '';
    $description = $_POST['description'] ?? '';
    $price = $_POST['price'] ?? '';

    $message = "";
    include "layout/header.php";

    if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['submit']))
    {
        $message = $shop->createProduct();
    }


?>

<form method="post" action="create.php" enctype="multipart/form-data">
    <span><?php echo $message ?? ''; ?></span>
    <input type="text" name="title" placeholder="Product Title" value="<?php echo $title ?>" required /> <br /><br />
    <textarea name="description"></textarea> <br /><br />
    <input type="number" name="price" step=".01" placeholder="Product Price" required value="<?php echo $price ?>" /> <br /><br />
    <input type="file" name="image" value="" placeholder="Product Image" value="" required /> <br /><br />
    <input type="submit" name="submit" value="Create Product" />
</form>

<?php
    include_once "layout/footer.php";
?>