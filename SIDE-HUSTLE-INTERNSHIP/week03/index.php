<?php
    require_once "process/Process.php";

    if ($_SERVER['REQUEST_METHOD'] == "POST" || isset($_POST['task_submit']))
    {
        $execute->createTask();
    }
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
        <head></head>
        <section>
            <div>
                <h2>List of All Task</h2>
                <?php
                    $results = $execute->getAllTask();
                    if (count($results) < 1) {
                ?>
                    <h4>You have no Task, Live Free Today or Create One if Not Lazy</h4>
                <?php
                    } else {
                        foreach ($results as $task) {
                ?>
                    <ul>
                        <li>
                            <a href="pages/edit.php/<?php echo $task['id']; ?>"><h4><?php echo $task['task_name']; ?></h4></a>
                            <p>
                                <?php echo $task['task_details']; ?>
                                <span><?php echo $task['task_status'] ?></span>
                                <button type="button" onclick="return confirm('Do you really Want to Delete This Task')">Delete</button>
                            </p>
                        </li>
                    </ul>
                <?php
                        }
                    }
                ?>
            </div>
            <div>
                <head>
                    <h1>Create New Task</h1>
                </head>
                <form action="index.php" method="POST" onsubmit="return submitTask">
                    <div>
                        <label>Task Name</label>
                        <input type="text" id="task_name" name="task_name" value="" placeholder="Enter Task Name">
                    </div>
                    <div>
                        <label>Task Details</label>
                        <textarea type="text" name="task_details" id="task_details" value=""  placeholder="Enter Task Details"></textarea>
                    </div>
                    <div>
                        <input type="submit" name="task_submit" value="AddTask">
                    </div>
                </form>
            </div>
        </section>
        <script src="asset/main.js" defer></script>
    </body>
</html>
