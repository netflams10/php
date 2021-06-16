<!DOCTYPE html>
<html>
    <head>
        <title>PHP</title>
    </head>
    <body>
        <?php 
            // header('Content-Type: text/plain');
            $data = ["response" => "Hello World!"];
            echo json_encode($data);
            // echo json_encode($data); // will not display
            // echo "Hello World \n"; 
        ?>
        <?= "Hello World!" ?>
    </body>
</html>