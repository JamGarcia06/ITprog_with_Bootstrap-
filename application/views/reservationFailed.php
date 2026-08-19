<!DOCTYPE html>
<html>

<head>

    <title>Reservation Failed</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body class="bg-light">

<div class="container">

    <div class="row justify-content-center align-items-center min-vh-100">

        <div class="col-md-6">

            <div class="card shadow border-0">

                <div class="card-header bg-danger text-white text-center">

                    <h3 class="mb-0">
                        Reservation Failed
                    </h3>

                </div>

                <div class="card-body text-center p-5">

                    <h4 class="text-danger">
                        Not Enough Food Available
                    </h4>

                    <p class="fs-5">

                        Only

                        <strong>
                            <?php echo $available; ?>
                        </strong>

                        <strong>
                            <?php echo $food_name; ?>
                        </strong>

                        available.

                    </p>

                    <a href="<?php echo base_url('index.php/UserController/reserve/'.$food_id); ?>"
                       class="btn btn-danger">

                        Go Back

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

</body>

</html>