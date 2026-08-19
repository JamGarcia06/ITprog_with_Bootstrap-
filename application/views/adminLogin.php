<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container">

        <div class="row justify-content-center align-items-center min-vh-100">

            <div class="col-md-5 col-lg-4">

                <div class="card shadow border-0">

                    <!-- RED HEADER -->
                    <div class="card-header bg-danger text-white text-center py-3">
                        <h3 class="mb-0">Admin Login</h3>
                    </div>

                    <div class="card-body p-4">

                        <?php if(isset($error)){ ?>

                            <div class="alert alert-danger text-center">
                                <?php echo $error; ?>
                            </div>

                        <?php } ?>

                        <form action="<?php echo base_url('index.php/AdminController/login'); ?>" method="post">

                            <!-- EMAIL -->
                            <div class="mb-3">

                                <label class="form-label fw-bold">
                                    Email
                                </label>

                                <input 
                                    type="email" 
                                    name="email" 
                                    class="form-control"
                                    placeholder="Enter your email"
                                    required
                                >

                            </div>


                            <!-- PASSWORD -->
                            <div class="mb-3">

                                <label class="form-label fw-bold">
                                    Password
                                </label>

                                <input 
                                    type="password" 
                                    name="password" 
                                    class="form-control"
                                    placeholder="Enter your password"
                                    required
                                >

                            </div>


                            <!-- LOGIN BUTTON -->
                            <div class="d-grid">

                                <button type="submit" class="btn btn-danger btn-lg">
                                    Login
                                </button>

                            </div>

                        </form>

                    </div>

                    <div class="card-footer text-center text-muted">
                        Food Reservation System
                    </div>

                </div>

            </div>

        </div>

    </div>

</body>
</html>