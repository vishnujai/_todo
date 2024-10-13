<?php
require("backend/showdata.php");
if (!isset($_SESSION["authuser"])) {
    $_SESSION['login_error'] = "Login Again To Acess DaskBoard .";
    header("location: ../Auth/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashbord </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <h4 class="text-primary">TODO APP</h4>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- <div class ="p-3" > -->
            <form class="d-flex">
                <input class=" form-control me-2 m-3 ms-2 mb-lg-0" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success m-3 ms-2 mb-lg-0" type="submit">Search</button>
            </form>
            <!-- </div> -->

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto ms-2 mb-lg-0">

                    <li class="nav-item">
                        <button type="button" class="nav-link active" aria-current="page" data-bs-toggle="modal" data-bs-target="#user_profile">
                            <b>Profile</b>
                        </button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link active" aria-current="page" data-bs-toggle="modal" data-bs-target="#todo_add">

                            <b>Add</b>
                        </button>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../Auth/logout.php"><b> Logout</b></a>
                    </li>
                </ul>


            </div>
        </div>
    </nav>



    <!-- Nav End  -->
    <!------Profile Modal Box ----------------------->
    <div class="modal fade" id="user_profile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-primary" id="exampleModalLabel">Profile</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><b>Name :- </b> <i> <?php echo  $_SESSION["authuser"]['username'] ?></li>
                            <li class="list-group-item"><b>Email :- </b> <?php echo $_SESSION["authuser"]['email'] ?></li>
                            <li class="list-group-item"><b>M NO. :- </b> <?php echo  $_SESSION["authuser"]['phone'] ?></li>

                            <li class="list-group-item"><b>Registrated At :- </b> <?php echo $_SESSION["authuser"]['created_at'] ?></li>
                        </ul>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Modal Box  -->
    <div class="modal fade" id="todo_add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add ToDo Here</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">



                    <!-- <h2>Create a Todo Item</h2> -->
                    <form action="backend/add_list.php" method="POST">
                        <label for="heading"><b>Heading</b></label>
                        <input type="text" id="heading" name="heading" class="form-control p-3" required maxlength="255">

                        <label for="description"><b>Description</b></label>
                        <textarea id="description" name="description" class="form-control p-3" rows="4"></textarea>

                        <label for="priority"><b>Priority</b></label>
                        <select id="priority" name="priority" class="form-control p-3 ">
                            <option value="low">Low</option>
                            <option value="medium" selected>Medium</option>
                            <option value="high">High</option>
                        </select>

                        <label for="due_date"> <b>Due Date</b></label>
                        <input type="date" id="due_date" name="due_date" class="form-control p-3">

                        <div class="button-container  justify-content: center;">
                            <button type="submit" class="btn-primary text-center m-4"><b>Submit</b> </button>
                            <button type="reset" class="btn-primary text-center m-4"><b>Reset</b></button>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn priority" data-bs-dismiss="modal"><b>Close</b></button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <!-- end Add Modal Box  -->

    <!-- Card Start Here  -->
<div style ="display:flex;">
    <?php
    foreach ($showData as $data) {
    ?>

        <div class="box display d-flex ">
            <div class=" false card box border border-dark p-3 m-5 " style="width: 18rem;">
                <div class="card-body ">
                    <h5 class="card-title"><b><?php echo $data['heading']; ?></b></h5>
                    <p class="card-text"> <?php echo $data['description'] ?></p>
                    <p class="card-text"> <b><?php echo $data['priority'] ?></b> </p>
                    <p class="card-text"> <b><?php echo $data['due_date'] ?></b></p>
                    <?php
                    if ($data['list_status'] == 1) {
                        echo "<p class='text-success'>Complete</p>";
                    } else {
                        // Ensure the 'due_date' is in a valid date format
                        if (strtotime(date("Y-m-d")) > strtotime($data['due_date'])) {
                            echo "<p class='text-danger'>Pending</p>";
                        } else {
                            echo "<p class='text-warning'>In Progress</p>";
                        }   
                    }
                    ?>


                    <a href="backend/list_delete.php?id=<?php echo $data['id'] ?>" class="card-link" type=""><b>Delete</b></a>


                    <a href="backend/show_list.php?id=<?php echo $data['id']?>" class="card-link"><b>Edit</b></a>
                   
                      <a href="#" class="card-link"><b>Check Status</b></a> 
                </div>
            </div>
        </div>

    <?php
    }
    ?>
</div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>
<!-- ---------------------------save data succesful-------------------- -->
<?php
if (isset($_SESSION['user']['mes'])) {
?>
    <script>
        alert('<?php echo  $_SESSION['user']['mes']; ?>')
    </script>
<?php
}
unset($_SESSION['user']['mes']);
?>

<!-- ----------------------------delete data Succesful----------------------- -->
<?php
if (isset($_SESSION['list']['mes'])) {
?>
    <script>
        alert('<?php echo  $_SESSION['list']['mes']; ?>')
    </script>
<?php
}
unset($_SESSION['list']['mes']);
?>