<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">


<!-- NAVBAR -->
<nav class="navbar navbar-dark bg-danger">

    <div class="container">

        <span class="navbar-brand mb-0 h1">
            Food Reservation System
        </span>

        <span class="text-white fw-bold">
            <?php echo $admin->store_name; ?>
        </span>

    </div>

</nav>


<!-- MAIN CONTENT -->
<div class="container py-5">


    <!-- WELCOME -->
    <div class="card shadow-sm border-0 mb-4">

        <div class="card-body">

            <h2 class="text-danger">
                Welcome, <?php echo $admin->store_name; ?>!
            </h2>

            <p class="text-muted mb-0">
                Welcome to the Food Reservation System Admin Dashboard.
            </p>

        </div>

    </div>


    <!-- MENU TITLE -->
    <h4 class="mb-4">
        Admin Menu
    </h4>


    <!-- MENU CARDS -->
    <div class="row g-4">


        <!-- MANAGE FOOD -->
        <div class="col-md-6">

            <div class="card shadow-sm h-100 border-0">

                <div class="card-body">

                    <h5 class="card-title text-danger">
                        Manage Food
                    </h5>

                    <p class="card-text text-muted">
                        Add, edit, and manage the food available in your store.
                    </p>

                    <a href="<?php echo base_url('index.php/FoodController/index'); ?>"
                       class="btn btn-danger">

                        Manage Food

                    </a>

                </div>

            </div>

        </div>


        <!-- MANAGE RESERVATIONS -->
        <div class="col-md-6">

            <div class="card shadow-sm h-100 border-0">

                <div class="card-body">

                    <h5 class="card-title text-danger">
                        Manage Reservations
                    </h5>

                    <p class="card-text text-muted">
                        View and manage customer food reservations.
                    </p>

                    <a href="<?php echo base_url('index.php/AdminController/reservations'); ?>"
                       class="btn btn-danger">

                        Manage Reservations

                    </a>

                </div>

            </div>

        </div>


        <!-- STORE SETTINGS -->
        <div class="col-md-6">

            <div class="card shadow-sm h-100 border-0">

                <div class="card-body">

                    <h5 class="card-title text-danger">
                        Store Settings
                    </h5>

                    <p class="card-text text-muted">
                        Update your store name, picture, and store information.
                    </p>

                    <a href="<?php echo base_url('index.php/AdminController/storeSettings'); ?>"
                       class="btn btn-danger">

                        Store Settings

                    </a>

                </div>

            </div>

        </div>


        <!-- LOGOUT -->
        <div class="col-md-6">

            <div class="card shadow-sm h-100 border-0">

                <div class="card-body">

                    <h5 class="card-title text-danger">
                        Logout
                    </h5>

                    <p class="card-text text-muted">
                        Log out of your administrator account.
                    </p>

                    <a href="<?php echo base_url('index.php/AdminController/logout'); ?>"
                       class="btn btn-outline-danger">

                        Logout

                    </a>

                </div>

            </div>

        </div>


    </div>

</div>


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>