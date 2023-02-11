<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>BM &mdash; Login</title>
    <link rel="icon" type="image/x-icon" href="<?= site_url() ?>assets/stisla/assets/fav.png">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?= site_url() ?>assets/stisla/assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= site_url() ?>assets/stisla/assets/modules/fontawesome/css/all.min.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= site_url() ?>assets/stisla/assets/css/style.css">
    <link rel="stylesheet" href="<?= site_url() ?>assets/stisla/assets/css/components.css">

</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Login</h4>
                            </div>

                            <div class="card-body">
                                <?php echo validation_errors(); ?>
                                <?php echo form_open('auth/process'); ?>
                                <div class="form-group mb-3">
                                    <label for="emailaddress">Username</label>
                                    <input class="form-control" type="text" name="username" autocomplete="off" required="">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="password">Password</label>
                                    <input class="form-control" type="password" required="" autocomplete="off" name="password">
                                </div>
                                <div class="form-group mb-0 text-center">
                                    <button class="btn btn-primary btn-block" type="submit" name="login"> Log In </button>
                                </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>
    </div>

    <!-- General JS Scripts -->
    <script src="<?= site_url() ?>assets/stisla/assets/modules/jquery.min.js"></script>
    <script src="<?= site_url() ?>assets/stisla/assets/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= site_url() ?>assets/stisla/assets/modules/moment.min.js"></script>
    <script src="<?= site_url() ?>assets/stisla/assets/js/stisla.js"></script>

    <!-- JS Libraies -->

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="<?= site_url() ?>assets/stisla/assets/js/scripts.js"></script>
    <script src="<?= site_url() ?>assets/stisla/assets/js/custom.js"></script>
</body>

</html>