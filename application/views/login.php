<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FingerLog ~ Login</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/styles.css">
</head>
<body>
<!-- Loader -->
<div id="preloader"><div class="loader"></div></div>
<?php echo $this->session->flashdata('notifikasi'); ?>
<div class="page-wrapper flex-row align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card p-4">
                    <div class="card-header text-center text-uppercase h4 font-weight-light">
                        <br>Login SIMAB <b> IAIN KEDIRI</b>
                    </div>
                    <form action="<?php echo base_url('auth/admin') ?>" method="POST">

                        <div class="card-body py-2">
                            <div class="form-group">
                                <label class="form-control-label">Username</label>
                                <input type="text" name="username" class="form-control" required="" autofocus="">
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">Password</label>
                                <input type="password" name="password" class="form-control" required="">
                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-block btn-primary btn-lg px-5">Login</button>
                                </div>
                            </div>
                        </div>

                    </form>
                        <span style="text-align: center;"><label>&copy 2018 - <?php echo date('Y') ?> SIMAB | IAIN KEDIRI</label></span>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url(); ?>dist/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>dist/vendor/popper.js/popper.min.js"></script>
<script src="<?php echo base_url(); ?>dist/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>dist/js/carbon.js"></script>
</body>
</html>
<?php $this->session->sess_destroy(); ?>
