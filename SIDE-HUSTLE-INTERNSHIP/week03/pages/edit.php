<?php
    require_once "../process/Process.php";

    $id = str_replace('/', '', $_SERVER['PATH_INFO']);
    $task = $execute->getOneUpdate($id);

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        echo "POST";
    }
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
        <h3><?php echo $task['task_name'] ?></h3>

        <p><?php echo $task['task_details'] ?></p>

        <p>
            <?php echo $task['task_status'] ?>
            <form action="edit.php/<?php echo $task['id'] ?>" method="POST">
             
                <div>
                    <select name="task_status">
                        <option disabled><?php echo $task['task_status'] ?></option>
                        <option value="completed"><?php echo ucfirst('completed') ?></option>
                        <option value="uncompleted"><?php echo ucfirst('uncompleted') ?></option>
                    </select>
                </div>
                <div>
                    <button type="submit" name="update" value="update">Update</button>
                </div>
            </form>
        </p>

        <button onclick="">
            Delete task
        </button>

        <p><?php echo $task['created_at'] ?></p>
        <p><?php echo $task['updated_at'] ?></p>
    </body>
</html>