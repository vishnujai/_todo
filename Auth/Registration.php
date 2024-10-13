<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo App Sign</title>

    <!-- Favicon -->
    <!-- <link rel="shortcut icon" href="https://cakeadmin.com/pf/favicon.png"/> -->

    <!-- Bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- Main style file -->
    <link rel="stylesheet" href="https://cakeadmin.com/pf/bootstrap/css/app.css" type="text/css" />
</head>

<body class="auth">

    <!-- begin::preloader-->
    <div class="preloader">
        <div class="preloader-icon"></div>
    </div>
    <!-- end::preloader -->


    <div class="form-wrapper">
        <div class="container">
            <div class="card">
                <div class="row g-0">
                    <div class="col">
                        <div class="row">
                            <div class="col-md-10 offset-md-1">
                                <div class="ltf-block-logo d-block d-lg-none text-center text-lg-start">
                                    <img width="60" src="https://cakeadmin.com/pf/logo.svg" alt="logo">
                                </div>
                                <div class="my-5 text-center text-lg-start">
                                    <h1 class="display-8">Create Account</h1>
                                    <p class="text-muted">You can create a free account now</p>
                                    <?php
                                    if (count($_SESSION)) {
                                        if (isset($_SESSION["error"])) {

                                            foreach ($_SESSION['error'] as $value) {
                                    ?>
                                                <h6 class="text-danger text-center"><?php echo $value ?></h6>
                                    <?php
                                            }
                                        }
                                    }
                                    ?>
                                </div>
                                <form class="mb-5" action="Registration_data.php" method="post">
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="name" placeholder="Enter fullname" autofocus
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <input type="email" class="form-control" name="email" placeholder="Enter email"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <input type="number" class="form-control" name="phone" placeholder="Enter number"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="password" placeholder="Enter password"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <input type="password" class="form-control" name="cpassword" placeholder="Re-enter password"
                                            required>
                                    </div>
                                    <div class="text-center text-lg-start">
                                        <button class="btn btn-primary">Sign Up</button>
                                    </div>
                                </form>
                                 <?php
                                 if (isset($_SESSION['reg']['mes'])) {
                                 ?>
                                   <h6 class="text-success text-center"><?php echo $_SESSION['reg']['mes'] ?></h6>
                                 <?php
                                 }
                                 ?> 
                                <p class="text-center d-block d-lg-none mt-5 mt-lg-0">
                                    Don't have an account? <a href="login.php">Sign In</a>.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col d-none d-lg-flex border-start align-items-center justify-content-between flex-column text-center">
                        <div class="logo">
                        <img width="60" src="https://cakeadmin.com/pf/logo.svg" alt="logo">
                        </div>
                        <div>
                            <h3 class="fw-bold">Welcome to ToDo App!</h3>
                            <p class="lead my-5">Do you already have an account?</p>
                            <a href="login.php" class="btn btn-primary">Sign In</a>
                        </div>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                            </li>
                            <li class="list-inline-item">
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- JQuery -->
    <script src="https://cakeadmin.com/pf/bootstrap/libs/jquery-3.7.1.min.js"></script>

    <!-- Main Javascript file -->
    <script src="https://cakeadmin.com/pf/bootstrap/js/app.js"></script>
</body>

</html>
<?php
session_unset();
?>