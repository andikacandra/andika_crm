<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PT. Smart | CRM Smart</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="<?php echo base_url('resources/AdminLTE/plugins/fonts/fonts-google.css'); ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('resources/AdminLTE/plugins/fontawesome-free/css/all.min.css'); ?>">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url('resources/AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css'); ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('resources/AdminLTE/dist/css/adminlte.min.css'); ?>">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card card-outline card-cyan">
            <div class="card-header text-center">
                <a href="#" class="h1"><b>CRM</b>Smart</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form action="<?php echo site_url('auth'); ?>" method="post">
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" value="<?php echo $this->session->flashdata('email_old'); ?>" placeholder="Email" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="pass" class="form-control" placeholder="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <center style="color:red">
                        <p><?php echo $this->session->flashdata('login_err'); ?></p>
                    </center>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo base_url('resources/AdminLTE/plugins/jquery/jquery.min.js'); ?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url('resources/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url('resources/AdminLTE/dist/js/adminlte.min.js'); ?>"></script>
</body>

</html>

<?php session_destroy(); ?>