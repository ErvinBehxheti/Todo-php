<?php
function showAllTodos()
{
    global $connected;
    $query = "SELECT * FROM TODOLIST";
    $result = mysqli_query($connected, $query);

    if (!$result) {
        die("DATABASE NOT CONNECTED");
    }

    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $todo = $row['todo'];

        echo "<ul class='list-group list-group-horizontal rounded-0 bg-transparent' key='$id'>
        <li class='list-group-item px-3 py-1 d-flex align-items-center flex-grow-1 border-0 bg-transparent'>
            <p class='lead fw-normal mb-0 border-bottom border-info'>$todo</p>
        </li>
        <li class='list-group-item ps-3 pe-0 py-1 rounded-0 border-0 bg-transparent'>
            <div class='d-flex flex-row justify-content-end mb-1 gap-2'>
                <a href='lista.php?edit=true&todo=$todo&id=$id' class='text-info' data-mdb-toggle='tooltip' title='Edit todo'>Edit</a>
                <a href='lista.php?delete=true&todo=$todo&id=$id' class='text-danger' data-mdb-toggle='tooltip' title='Delete todo'>Delete</a>
            </div>
        </li>
    </ul>";
    }
};

function createTodo()
{
    global $connected;
    $todo = $_POST['todo'];

    $todo = mysqli_real_escape_string($connected, $todo);

    $query = "INSERT INTO TODOLIST (todo) VALUES ('$todo')";

    $result = mysqli_query($connected, $query);
    if (!$result) {
        die("DESHTOJ");
    }
};

function updateTodo()
{
    global $connected;
    $todo = $_POST['todo'];
    $id = $_POST['id'];

    $query = "UPDATE TODOLIST SET ";
    $query .= "todo = '$todo' ";
    $query .= "WHERE id = $id";

    $result = mysqli_query($connected, $query);

    if (!$result) {
        die("DESHTOJ");
    }
}

function deleteTodo($id)
{
    global $connected;

    $query = "DELETE FROM TODOLIST WHERE ";
    $query .= "id = $id";

    $result = mysqli_query($connected, $query);

    if (!$result) {
        die("DESHTOJ");
    }
}

function showModal($todo, $id)
{
    echo "<div class='position-absolute top-0 end-0 bottom-0 start-0 bg-dark bg-opacity-50' style='display: grid;justify-content:center;align-items:center'>
    <form class='d-flex flex-row align-items-center container' action='lista.php' method='post'>
    <a href='lista.php' class='text-danger'>Close Modal</a>
    <input type='text' class='form-control form-control-lg' id='todo' name='todo' placeholder='Edit $todo'>
    <input class='d-none' name='id' value='$id' type='number'>
        <div>
            <input type='submit' name='edit' value='Edit' class='btn btn-primary' />
        </div>
    </form>
</div>";
}
