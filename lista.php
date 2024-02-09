<?php include "db.php" ?>
<?php include "functions.php" ?>
<?php

if (isset($_POST['submit'])) {
    createTodo();
}

if (isset($_POST['edit'])) {
    updateTodo();
}

if ($_GET['edit'] === 'true' && $_GET['todo'] && $_GET['id']) {
    $showModal = true;
}

if ($_GET['delete'] === 'true' && $_GET['todo'] && $_GET['id']) {
    deleteTodo($_GET['id']);
    header('Location: /todolist/lista.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To do list</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card" id="list1" style="border-radius: .75rem; background-color: #eff1f2;">
                        <div class="card-body py-4 px-4 px-md-5">

                            <p class="h1 text-center mt-3 mb-4 pb-3 text-primary">
                                <i class="fas fa-check-square me-1"></i>
                                <u>My Todo-s</u>
                            </p>

                            <div class="pb-2">
                                <div class="card">
                                    <div class="card-body">
                                        <form class="d-flex flex-row align-items-center" action="lista.php" method="post">
                                            <input type="text" class="form-control form-control-lg" id="todo" name="todo" placeholder="Add new...">
                                            <div>
                                                <input type="submit" name="submit" value="Submit" class="btn btn-primary" />
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <hr class="my-4">
                            <?php showAllTodos() ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
    if ($showModal) {
        showModal($_GET['todo'], $_GET['id']);
    }
    ?>
</body>

</html>