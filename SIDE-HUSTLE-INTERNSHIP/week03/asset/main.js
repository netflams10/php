let task_name = document.getElementById('task_name').value;
let task_detail = document.getElementById('task_details').value;

function submitTask ()
{
    if (task_name.length <= 1 || task_detail.length <= 1)
    {
        return false;
    }
    return true;
}

function onDelete ()
{
    console.log("I reached here");
    ;
}

function onChange ()
{
    document.getElementById('update').value;
    return "Hello World";
}