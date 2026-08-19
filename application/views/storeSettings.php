<!DOCTYPE html>
<html>

<head>

    <title>Store Settings</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">


<!-- NAVBAR -->

<nav class="navbar navbar-dark bg-danger">

    <div class="container">

        <span class="navbar-brand fw-bold">
            Food Reservation System
        </span>

        <a href="<?php echo base_url('index.php/AdminController/adminPage'); ?>"
           class="btn btn-light btn-sm">

            Dashboard

        </a>

    </div>

</nav>



<!-- MAIN CONTENT -->

<div class="container py-5">


    <div class="row justify-content-center">

        <div class="col-md-7 col-lg-6">


            <!-- STORE SETTINGS CARD -->

            <div class="card shadow-sm border-0">


                <!-- HEADER -->

                <div class="card-header bg-danger text-white">

                    <h4 class="mb-0">
                        Store Settings
                    </h4>

                </div>


                <!-- BODY -->

                <div class="card-body p-4">

                    <p class="text-muted">
                        Update your store information below.
                    </p>


                    <form action="<?php echo base_url('index.php/AdminController/updateStoreName'); ?>"
                          method="post">


                        <!-- STORE NAME -->

                        <div class="mb-4">

                            <label class="form-label fw-bold">
                                Store Name
                            </label>

                            <input
                                type="text"
                                name="store_name"
                                value="<?php echo $admin->store_name; ?>"
                                class="form-control form-control-lg"
                                placeholder="Enter your store name"
                                required
                            >

                        </div>


                        <!-- BUTTONS -->

                        <div class="d-flex gap-2">

                            <button type="submit"
                                    class="btn btn-danger">

                                Save Store Name

                            </button>


                            <a href="<?php echo base_url('index.php/AdminController/adminPage'); ?>"
                               class="btn btn-secondary">

                                Cancel

                            </a>

                        </div>


                    </form>

                </div>

            </div>


        </div>

    </div>


</div>


<!-- Bootstrap JS -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>