<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Inventaris Barang | Log in</title>
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url() ?>assets/images/inventaris.png ?>">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="<?php echo base_url() ?>/assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/libs/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
             <div class="card-header">
                <h3 class="mb-1" style="color: #0d00c7">Aplikasi Inventaris<br> SMK Wikrama Jepara</h3><br>
                <p>Sign in to start your session</p>
                <?php if (!empty($this->session->flashdata('Gagal'))) { ?>
                  <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <?php echo$this->session->flashdata('Gagal') ?>
                        <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span></a>
                   </div>
                <?php }elseif (!empty($this->session->flashdata('Keluar'))) { ?>
                  <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <?php echo$this->session->flashdata('Keluar') ?>
                        <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span></a>
                   </div>
                <?php } ?>
            </div>
            <div class="card-body">
                <form action="<?php echo site_url('Control/aksi_lol') ?>" method="POST">
                    <div class="form-group">
                        <input class="form-control form-control-lg" name="username" type="text" placeholder="Username" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" name="password" type="password" placeholder="Password">
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
                </form>
            </div>
            
        </div>
    </div>
  
    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="<?php echo base_url() ?>/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>
 
</html>