<!DOCTYPE html>
<html>

<head>

    <title>User Page</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Alertify CSS -->
    <link rel="stylesheet"
          href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css">

    <link rel="stylesheet"
          href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/bootstrap.min.css">

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
<!-- MAIN CONTAINER -->
<!-- ============================= -->

<div class="container py-5">


    <!-- ============================= -->
    <!-- STORE NAME -->
    <!-- ============================= -->

    <?php if(isset($admin) && $admin != null){ ?>

        <div class="text-center mb-4">

            <h1 class="text-danger fw-bold">
                <?php echo $admin->store_name; ?>
            </h1>

            <p class="text-muted">
                Choose from our available food.
            </p>

        </div>

    <?php } ?>



    <!-- ============================= -->
    <!-- SELECTED FOOD / RESERVATION -->
    <!-- ============================= -->

    <?php if(isset($food) && $food != null){ ?>

        <div class="card shadow-sm border-0 mb-5">


            <div class="card-header bg-danger text-white">

                <h4 class="mb-0">
                    Reserve Food
                </h4>

            </div>


            <div class="card-body p-4">


                <h3 class="text-danger">
                    <?php echo $food->food_name; ?>
                </h3>


                <p class="text-muted">
                    <?php echo $food->description; ?>
                </p>


                <p class="fs-5">

                    <strong>Price:</strong>

                    ₱<?php echo number_format($food->price, 2); ?>

                </p>


                <!-- RESERVATION FORM -->

                <form id="reservationForm"
                      action="<?php echo base_url('index.php/UserController/saveReservation'); ?>"
                      method="post">


                    <input type="hidden"
                           name="food_id"
                           value="<?php echo $food->id; ?>">


                    <div class="mb-3">

                        <label class="form-label fw-bold">
                            Quantity
                        </label>

                        <input type="number"
                               name="quantity"
                               class="form-control"
                               min="1"
                               max="<?php echo $food->quantity; ?>"
                               required>

                    </div>


                    <!-- ALERTIFY BUTTON -->

                    <button type="button"
                            class="btn btn-danger"
                            onclick="confirmOrder()">

                        Submit Reservation

                    </button>


                    <a href="<?php echo base_url('index.php/UserController/index'); ?>"
                       class="btn btn-secondary">

                        Back to Food List

                    </a>


                </form>


            </div>

        </div>

    <?php } ?>



    <!-- ============================= -->
    <!-- AVAILABLE FOODS -->
    <!-- ============================= -->

    <div class="d-flex justify-content-between align-items-center mb-3">

        <div>

            <h2 class="text-danger mb-1">
                Available Foods
            </h2>

            <p class="text-muted mb-0">
                Select a food to make a reservation.
            </p>

        </div>

    </div>



    <!-- FOOD TABLE -->

    <div class="card shadow-sm border-0">

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover table-striped align-middle mb-0">


                    <thead class="table-danger">

                        <tr>

                            <th>ID</th>
                            <th>Food Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>

                    </thead>


                    <tbody>


                    <?php foreach($foods as $foodItem){ ?>

                        <tr>


                            <!-- ID -->

                            <td>
                                <?php echo $foodItem->id; ?>
                            </td>


                            <!-- FOOD NAME -->

                            <td class="fw-bold">

                                <?php echo $foodItem->food_name; ?>

                            </td>


                            <!-- DESCRIPTION -->

                            <td>

                                <?php echo $foodItem->description; ?>

                            </td>


                            <!-- PRICE -->

                            <td class="fw-bold">

                                ₱<?php echo number_format($foodItem->price, 2); ?>

                            </td>


                            <!-- QUANTITY -->

                            <td>

                                <?php echo $foodItem->quantity; ?>

                            </td>


                            <!-- STATUS -->

                            <td>

                                <?php if(strtolower($foodItem->status) == 'available'){ ?>

                                    <span class="badge bg-success">
                                        Available
                                    </span>

                                <?php }else{ ?>

                                    <span class="badge bg-secondary">
                                        Unavailable
                                    </span>

                                <?php } ?>

                            </td>


                            <!-- ACTION -->

                            <td>

                                <?php if(strtolower($foodItem->status) == 'available' && $foodItem->quantity > 0){ ?>

                                    <a href="<?php echo base_url('index.php/UserController/reserve/'.$foodItem->id); ?>"
                                       class="btn btn-danger btn-sm">

                                        Reserve

                                    </a>

                                <?php }else{ ?>

                                    <span class="text-muted">
                                        Unavailable
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



    <!-- ============================= -->
    <!-- MY RESERVATIONS -->
    <!-- ============================= -->

    <div class="text-center mt-4">

        <a href="<?php echo base_url('index.php/UserController/myReservations'); ?>"
           class="btn btn-outline-danger">

            My Reservations

        </a>

    </div>


</div>



<!-- ============================= -->
<!-- BOOTSTRAP JS -->
<!-- ============================= -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>



<!-- ============================= -->
<!-- ALERTIFY JS -->
<!-- ============================= -->

<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>


<script>

function confirmOrder() {

    var foodName = "<?php echo htmlspecialchars($food->food_name, ENT_QUOTES); ?>";


    alertify.confirm(

        "Confirm Order",

        "Do you want to order <b>" + foodName + "</b>?",


        function() {

            // User clicked OK

            document.getElementById("reservationForm").submit();

        },


        function() {

            // User clicked Cancel

            alertify.error("Order cancelled");

        }

    );

}

</script>


</body>

</html>