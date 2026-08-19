<!DOCTYPE html>
<html>

<head>

    <title>My Reservations</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>


<body class="bg-light">


<!-- ============================= -->
<!-- NAVBAR -->
<!-- ============================= -->

<nav class="navbar navbar-dark bg-danger">

    <div class="container">

        <span class="navbar-brand fw-bold">
            Food Reservation System
        </span>


        <a href="<?php echo base_url('index.php/UserController/logout'); ?>"
           class="btn btn-light btn-sm">

            Logout

        </a>

    </div>

</nav>



<!-- ============================= -->
<!-- MAIN CONTENT -->
<!-- ============================= -->

<div class="container py-5">


    <!-- TITLE -->

    <div class="mb-4">

        <h2 class="text-danger">
            My Reservations
        </h2>

        <p class="text-muted">
            View your food reservations and their current status.
        </p>

    </div>



    <!-- RESERVATIONS TABLE -->

    <div class="card shadow-sm border-0">

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover table-striped align-middle mb-0">


                    <!-- TABLE HEADER -->

                    <thead class="table-danger">

                        <tr>

                            <th>Food</th>
                            <th>Quantity</th>
                            <th>Time</th>
                            <th>Status</th>

                        </tr>

                    </thead>


                    <!-- TABLE BODY -->

                    <tbody>


                    <?php foreach($reservations as $reservation){ ?>

                        <tr>


                            <!-- FOOD -->

                            <td class="fw-bold">

                                <?php echo $reservation->food_name; ?>

                            </td>


                            <!-- QUANTITY -->

                            <td>

                                <?php echo $reservation->quantity; ?>

                            </td>


                            <!-- TIME -->

                            <td>

                                <?php echo $reservation->reservation_time; ?>

                            </td>


                            <!-- STATUS -->

                            <td>

                                <?php if($reservation->status == "Pending"){ ?>

                                    <span class="badge bg-warning text-dark">
                                        Pending
                                    </span>

                                <?php } elseif($reservation->status == "Approved"){ ?>

                                    <span class="badge bg-primary">
                                        Approved
                                    </span>

                                <?php } elseif($reservation->status == "Rejected"){ ?>

                                    <span class="badge bg-danger">
                                        Rejected
                                    </span>

                                <?php } elseif($reservation->status == "Completed"){ ?>

                                    <span class="badge bg-success">
                                        Completed
                                    </span>

                                <?php } else { ?>

                                    <span class="badge bg-secondary">
                                        <?php echo $reservation->status; ?>
                                    </span>

                                <?php } ?>

                            </td>


                        </tr>


                    <?php } ?>


                    </tbody>

                </table>

            </div>

        </div>

    </div>



    <!-- BUTTONS -->

    <div class="mt-4 d-flex gap-2">

        <a href="<?php echo base_url('index.php/UserController/index'); ?>"
           class="btn btn-danger">

            Reserve More Food

        </a>


        <a href="<?php echo base_url('index.php/UserController/index'); ?>"
           class="btn btn-outline-secondary">

            Back to Food List

        </a>

    </div>


</div>



<!-- Bootstrap JS -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>