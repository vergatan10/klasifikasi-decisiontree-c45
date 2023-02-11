<?php
$role = $this->fungsi->user_login()->role;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title><?= APPNAME ?></title>

    <link rel="icon" type="image/x-icon" href="<?= site_url() ?>assets/fav.png">
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= site_url() ?>assets/modules/datatables/datatables.min.css">
    <link rel="stylesheet" href="<?= site_url() ?>assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= site_url() ?>assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= site_url() ?>assets/modules/select2/dist/css/select2.min.css">
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= site_url() ?>assets/modules/dropzonejs/dropzone.css">
    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?= site_url() ?>assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= site_url() ?>assets/modules/fontawesome/css/all.min.css">
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= site_url() ?>assets/modules/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href="<?= site_url() ?>assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= site_url() ?>assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= site_url() ?>assets/css/style.css">
    <link rel="stylesheet" href="<?= site_url() ?>assets/css/components.css">
    <!-- sweetalert2 -->
    <script src="<?= site_url() ?>assets/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="<?= site_url() ?>assets/sweetalert2.min.css" id="theme-styles">
    <script src="<?= site_url() ?>assets/modules/jquery.min.js"></script>
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <div class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                    </ul>
                </div>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="<?= site_url() ?>assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">Hi,
                                <?= ucwords($this->fungsi->user_login()->username) ?></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="<?= site_url('auth/logout') ?>" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="<?= site_url() ?>">Klasifikasi C45</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="<?= site_url() ?>">C4.5</a>
                    </div>

                    <ul class="sidebar-menu">
                        <li class="menu-header">Dashboard</li>
                        <li <?= ($this->uri->segment(1) == '' ? 'class="active"' : '') ?><?= ($this->uri->segment(1) == 'home' ? 'class="active"' : '') ?>>
                            <a class="nav-link" href="<?= site_url() ?>">
                                <i class="fas fa-fire"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="menu-header">Klasifikasi</li>
                        <li <?= $this->uri->segment(1) == 'dataset' ? 'class="active"' : '' ?>>
                            <a class="nav-link" href="<?= site_url('dataset') ?>">
                                <i class="fas fa-table"></i>
                                <span>Dataset</span>
                            </a>
                        </li>
                        <li <?= $this->uri->segment(1) == 'init' ? 'class="active"' : '' ?>>
                            <a class="nav-link" href="<?= site_url('init') ?>">
                                <i class="fas fa-tasks"></i>
                                <span>Initial Process</span>
                            </a>
                        </li>
                        <li <?= $this->uri->segment(1) == 'prediction' ? 'class="active"' : '' ?>>
                            <a class="nav-link" href="<?= site_url('prediction') ?>">
                                <i class="fas fa-project-diagram"></i>
                                <span>C4.5 / Prediction</span>
                            </a>
                        </li>
                        <li <?= $this->uri->segment(1) == 'performance' ? 'class="active"' : '' ?>>
                            <a class="nav-link" href="<?= site_url('performance') ?>">
                                <i class="fas fa-chart-bar"></i>
                                <span>Performance</span>
                            </a>
                        </li>
                        <?php if ($this->fungsi->user_login()->role == '1') { ?>
                            <li class="menu-header">User</li>
                            <li <?= $this->uri->segment(1) == 'user' ? 'class="active"' : '' ?>>
                                <a class="nav-link" href="<?= site_url('user') ?>">
                                    <i class="fas fa-user"></i>
                                    <span>User</span>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </aside>
            </div>
            <!-- Main Content -->
            <div class="main-content">
                <?= $contents ?>
            </div>
        </div>
    </div>

    <script src="<?= site_url() ?>assets/modules/popper.js"></script>
    <script src="<?= site_url() ?>assets/modules/tooltip.js"></script>
    <script src="<?= site_url() ?>assets/modules/datatables/datatables.min.js"></script>
    <!-- General JS Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>

    <script src="<?= site_url() ?>assets/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= site_url() ?>assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="<?= site_url() ?>assets/modules/moment.min.js"></script>
    <script src="<?= site_url() ?>assets/js/stisla.js"></script>

    <!-- JS Libraies -->
    <script src="<?= site_url() ?>assets/modules/jquery.sparkline.min.js"></script>
    <script src="<?= site_url() ?>assets/modules/chart.min.js"></script>
    <script src="<?= site_url() ?>assets/modules/owlcarousel2/dist/owl.carousel.min.js"></script>
    <script src="<?= site_url() ?>assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

    <script src="<?= site_url() ?>assets/modules/select2/dist/js/select2.full.min.js"></script>
    <script src="<?= site_url() ?>assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js">
    </script>
    <script src="<?= site_url() ?>assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js">
    </script>

    <!-- JS Libraies -->
    <script src="<?= site_url() ?>assets/modules/dropzonejs/min/dropzone.min.js"></script>

    <!-- Page Specific JS File -->
    <script src="<?= site_url() ?>assets/js/page/components-multiple-upload.js"></script>

    <!-- Template JS File -->
    <script src="<?= site_url() ?>assets/js/scripts.js"></script>
    <script src="<?= site_url() ?>assets/js/custom.js"></script>
</body>

</html>