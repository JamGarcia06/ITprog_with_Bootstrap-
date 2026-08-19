<!DOCTYPE html>
<html>

<head>

    <title>Food Management</title>

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


    <!-- PAGE TITLE -->

    <div class="mb-4">

        <h2 class="text-danger">
            Food Management
        </h2>

        <p class="text-muted">
            Add, edit, and manage the food available in your store.
        </p>

    </div>



    <!-- ADD FOOD -->

    <?php if($food == null){ ?>

        <div class="card shadow-sm border-0 mb-5">

            <div class="card-header bg-danger text-white">

                <h5 class="mb-0">
                    Add Food
                </h5>

            </div>


            <div class="card-body">

                <form action="<?php echo base_url('index.php/FoodController/saveData'); ?>"
                      method="post">


                    <!-- FOOD NAME -->

                    <div class="mb-3">

                        <label class="form-label fw-bold">
                            Food Name
                        </label>

                        <input type="text"
                               name="food_name"
                               class="form-control"
                               placeholder="Enter food name"
                               required>

                    </div>


                    <!-- DESCRIPTION -->

                    <div class="mb-3">

                        <label class="form-label fw-bold">
                            Description
                        </label>

                        <textarea name="description"
                                  class="form-control"
                                  rows="3"
                                  placeholder="Enter food description"
                                  required></textarea>

                    </div>


                    <!-- PRICE + QUANTITY -->

                    <div class="row">

                        <div class="col-md-6 mb-3">

                            <label class="form-label fw-bold">
                                Price
                            </label>

                            <input type="number"
                                   name="price"
                                   step="0.01"
                                   class="form-control"
                                   placeholder="0.00"
                                   required>

                        </div>


                        <div class="col-md-6 mb-3">

                            <label class="form-label fw-bold">
                                Quantity
                            </label>

                            <input type="number"
                                   name="quantity"
                                   class="form-control"
                                   placeholder="Enter quantity"
                                   required>

                        </div>

                    </div>


                    <!-- STATUS -->

                    <div class="mb-3">

                        <label class="form-label fw-bold">
                            Status
                        </label>

                        <select name="status" class="form-select">

                            <option value="Available">
                                Available
                            </option>

                            <option value="Unavailable">
                                Unavailable
                            </option>

                        </select>

                    </div>


                    <!-- BUTTON -->

                    <button type="submit" class="btn btn-danger">
                        Add Food
                    </button>


                </form>

            </div>

        </div>


    <?php }else{ ?>


        <!-- EDIT FOOD -->

        <div class="card shadow-sm border-0 mb-5">

            <div class="card-header bg-danger text-white">

                <h5 class="mb-0">
                    Edit Food
                </h5>

            </div>


            <div class="card-body">

                <form action="<?php echo base_url('index.php/FoodController/updateData/'.$food->id); ?>"
                      method="post">


                    <!-- FOOD NAME -->

                    <div class="mb-3">

                        <label class="form-label fw-bold">
                            Food Name
                        </label>

                        <input type="text"
                               name="food_name"
                               value="<?php echo $food->food_name; ?>"
                               class="form-control"
                               required>

                    </div>


                    <!-- DESCRIPTION -->

                    <div class="mb-3">

                        <label class="form-label fw-bold">
                            Description
                        </label>

                        <textarea name="description"
                                  class="form-control"
                                  rows="3"
                                  required><?php echo $food->description; ?></textarea>

                    </div>


                    <!-- PRICE + QUANTITY -->

                    <div class="row">

                        <div class="col-md-6 mb-3">

                            <label class="form-label fw-bold">
                                Price
                            </label>

                            <input type="number"
                                   name="price"
                                   step="0.01"
                                   value="<?php echo $food->price; ?>"
                                   class="form-control"
                                   required>

                        </div>


                        <div class="col-md-6 mb-3">

                            <label class="form-label fw-bold">
                                Quantity
                            </label>

                            <input type="number"
                                   name="quantity"
                                   value="<?php echo $food->quantity; ?>"
                                   class="form-control"
                                   required>

                        </div>

                    </div>


                    <!-- STATUS -->

                    <div class="mb-3">

                        <label class="form-label fw-bold">
                            Status
                        </label>

                        <select name="status" class="form-select">

                            <option value="Available"
                                <?php if($food->status == 'Available') echo 'selected'; ?>>

                                Available

                            </option>

                            <option value="Unavailable"
                                <?php if($food->status == 'Unavailable') echo 'selected'; ?>>

                                Unavailable

                            </option>

                        </select>

                    </div>


                    <!-- BUTTONS -->

                    <button type="submit" class="btn btn-danger">
                        Update Food
                    </button>

                    <a href="<?php echo base_url('index.php/FoodController/index'); ?>"
                       class="btn btn-secondary">

                        Cancel

                    </a>


                </form>

            </div>

        </div>


    <?php } ?>



    <!-- FOOD LIST -->

    <div class="d-flex justify-content-between align-items-center mb-3">

        <div>

            <h3 class="text-danger mb-1">
                Food List
            </h3>

            <p class="text-muted mb-0">
                Foods currently registered in your store.
            </p>

        </div>

    </div>


    <div class="card shadow-sm border-0">

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover table-striped align-middle mb-0">


                    <!-- TABLE HEADER -->

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


                    <!-- TABLE BODY -->

                    <tbody>

                    <?php foreach($foods as $foodItem){ ?>

                        <tr>

                            <td>
                                <?php echo $foodItem->id; ?>
                            </td>


                            <td class="fw-bold">
                                <?php echo $foodItem->food_name; ?>
                            </td>


                            <td>
                                <?php echo $foodItem->description; ?>
                            </td>


                            <td class="fw-bold">
                                ₱<?php echo number_format($foodItem->price, 2); ?>
                            </td>


                            <td>
                                <?php echo $foodItem->quantity; ?>
                            </td>


                            <!-- STATUS -->

                            <td>

                                <?php if($foodItem->status == "Available"){ ?>

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

                                <a href="<?php echo base_url('index.php/FoodController/edit/'.$foodItem->id); ?>"
                                   class="btn btn-warning btn-sm">

                                    Edit

                                </a>


                                <a href="<?php echo base_url('index.php/FoodController/delete/'.$foodItem->id); ?>"
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('Are you sure you want to delete this food?');">

                                    Delete

                                </a>

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