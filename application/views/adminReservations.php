<!DOCTYPE html>
<html>

<head>

    <title>Manage Reservations</title>

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

        <span class="text-white">
            Admin
        </span>

    </div>

</nav>



<!-- MAIN CONTENT -->

<div class="container py-5">


    <!-- TITLE -->

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="text-danger mb-1">
                Manage Reservations
            </h2>

            <p class="text-muted mb-0">
                View and manage customer reservations.
            </p>

        </div>

        <a href="<?php echo base_url('index.php/AdminController/adminPage'); ?>"
           class="btn btn-outline-danger">

            Back to Dashboard

        </a>

    </div>



    <!-- RESERVATION TABLE -->

    <div class="card shadow-sm border-0">

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover table-striped align-middle mb-0">

                    <thead class="table-danger">

                        <tr>

                            <th>ID</th>

                            <th>User Email</th>

                            <th>Food</th>

                            <th>Quantity</th>

                            <th>Time</th>

                            <th>Status</th>

                            <th>Action</th>

                        </tr>

                    </thead>


                    <tbody>


                    <?php foreach($reservations as $row){ ?>

                        <tr>

                            <!-- ID -->

                            <td>
                                <?php echo $row->id; ?>
                            </td>


                            <!-- USER EMAIL -->

                            <td>
                                <?php echo $row->email; ?>
                            </td>


                            <!-- FOOD -->

                            <td class="fw-bold">
                                <?php echo $row->food_name; ?>
                            </td>


                            <!-- QUANTITY -->

                            <td>
                                <?php echo $row->quantity; ?>
                            </td>


                            <!-- TIME -->

                            <td>
                                <?php echo $row->reservation_time; ?>
                            </td>


                            <!-- STATUS -->

                            <td>

                                <?php if($row->status == "Pending"){ ?>

                                    <span class="badge bg-warning text-dark">
                                        Pending
                                    </span>

                                <?php } elseif($row->status == "Approved"){ ?>

                                    <span class="badge bg-primary">
                                        Approved
                                    </span>

                                <?php } elseif($row->status == "Rejected"){ ?>

                                    <span class="badge bg-danger">
                                        Rejected
                                    </span>

                                <?php } elseif($row->status == "Completed"){ ?>

                                    <span class="badge bg-success">
                                        Completed
                                    </span>

                                <?php } else { ?>

                                    <span class="badge bg-secondary">
                                        Unknown
                                    </span>

                                <?php } ?>

                            </td>


                            <!-- ACTION -->

                            <td>

                                <?php if($row->status == "Pending"){ ?>


                                    <a href="<?php echo base_url('index.php/AdminController/updateStatus/'.$row->id.'/Approved'); ?>"
                                       class="btn btn-success btn-sm">

                                        Approve

                                    </a>


                                    <a href="<?php echo base_url('index.php/AdminController/updateStatus/'.$row->id.'/Rejected'); ?>"
                                       class="btn btn-danger btn-sm">

                                        Reject

                                    </a>


                                <?php } elseif($row->status == "Approved"){ ?>


                                    <a href="<?php echo base_url('index.php/AdminController/updateStatus/'.$row->id.'/Completed'); ?>"
                                       class="btn btn-primary btn-sm">

                                        Complete

                                    </a>


                                <?php } elseif($row->status == "Rejected"){ ?>

                                    <span class="text-danger fw-bold">
                                        Rejected
                                    </span>


                                <?php } elseif($row->status == "Completed"){ ?>

                                    <span class="text-success fw-bold">
                                        Completed
                                    </span>


                                <?php } else { ?>

                                    <span class="text-muted">
                                        No Action
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


</div>


<!-- Bootstrap JS -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>