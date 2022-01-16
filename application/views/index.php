<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="<?php echo base_url();?>assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/libs/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/fonts/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/fonts/themify-icons/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/Search/search.css">


        <!-- jquery 3.3.1 -->
    <script src="<?php echo base_url();?>assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url();?>assets/Search/script.js"></script>
    <title>Inventaris Barang | Dashboard</title>
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url() ?>assets/images/inventaris.png ?>">
</head>

<body>
    <?php 
        if ($this->session->userdata('user')=="") {
            echo'
            <script>location.href='.site_url("Control/login").'</script>
            ';
        }
     ?>

     <?php 
        if ($this->session->userdata('id_level')=="Admin") {
            $a=""; //inventaris
            $c=""; //pengembalian
            $d=""; //laporan
            $e=""; //petugas
            $f="";
            $b="admin.jpg";   
        }elseif ($this->session->userdata('id_level')=="Peminjam") {
            $a="hidden";
            $c="hidden";
            $d="hidden";
            $e="hidden";
            $f="hidden";
            $b="peminjam.jpg";
        }else{
            $a="hidden";
            $c="";
            $d="hidden";
            $e="hidden";
            $f="hidden";
            $b="manajer.png";
        }
      ?>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="#">Inventaris</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item">
                            <div id="custom-search" class="top-search-bar">
                                 <input type="search" class="light-table-filter form-control" data-table="order-table" placeholder="Untuk Search Tabel" />
                            </div>
                        </li>
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo base_url();?>assets/images/<?php echo$b; ?>" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name"><?php echo$this->session->userdata('nama') ?></h5>
                                    <span class="status"></span><span class="ml-2"><?php echo$this->session->userdata('id_level') ?></span>
                                </div>
                                <a class="dropdown-item" href="<?php echo site_url('Control/logout') ?>"><i class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo site_url("Control/page/home");?>"><i class="fas fa-home"></i>Dashboard</a>
                            </li>
                            <li class="nav-item" <?php echo $e ?>>
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-wow" aria-controls="submenu-wow"><i class="fas fa-box"></i>Data</a>
                                <div id="submenu-wow" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-5" aria-controls="submenu-5"><i class="icon-list"></i>Jenis</a>
                                            <div id="submenu-5" class="collapse submenu" style="">
                                                <ul class="nav flex-column">
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="<?php echo site_url('control/page/f_jenis');?>">Entri Baru</a>
                                                    </li>
                                                     <li class="nav-item">
                                                        <a class="nav-link" href="<?php echo site_url('control/page/jenis_barang');?>">Data Jenis</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                         <li class="nav-item">
                                            <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-6" aria-controls="submenu-6"><i class="far fa-window-restore"></i>Ruang</a>
                                            <div id="submenu-6" class="collapse submenu" style="">
                                                <ul class="nav flex-column">
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="<?php echo site_url('control/page/f_ruang');?>">Entri Baru</a>
                                                    </li>
                                                     <li class="nav-item">
                                                        <a class="nav-link" href="<?php echo site_url('control/page/ruang');?>">Data Ruang</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="nav-item" >
                                            <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-8" aria-controls="submenu-8"><i class="fas fa-user-plus"> </i>Pegawai</a>
                                            <div id="submenu-8" class="collapse submenu" style="">
                                                <ul class="nav flex-column">
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="<?php echo site_url('control/page/f_pegawai');?>">Entri Baru</a>
                                                    </li>
                                                     <li class="nav-item">
                                                        <a class="nav-link" href="<?php echo site_url('control/page/pegawai');?>">Data Pegawai</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-7" aria-controls="submenu-7"><i class="fas fa-users"></i>Petugas</a>
                                            <div id="submenu-7" class="collapse submenu" style="">
                                                <ul class="nav flex-column">
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="<?php echo site_url('control/page/level');?>">Level</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="<?php echo site_url('control/page/f_petugas');?>">Entri Baru</a>
                                                    </li>
                                                     <li class="nav-item">
                                                        <a class="nav-link" href="<?php echo site_url('control/page/petugas');?>">Data Petugas</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item" <?php echo $a ?>>
                                            <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-9" aria-controls="submenu-9"><i class="fas fa-archive"></i>Inventaris</a>
                                            <div id="submenu-9" class="collapse submenu" style="">
                                                <ul class="nav flex-column">
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="<?php echo site_url('control/page/f_inventaris');?>">Entri Baru</a>
                                                    </li>
                                                     <li class="nav-item">
                                                        <a class="nav-link" href="<?php echo site_url('control/page/inventaris');?>">Data Inventaris</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-10" aria-controls="submenu-10"><i class="fas fa-table"></i>Transaksi</a>
                                <div id="submenu-10" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo site_url('control/page/pinjam');?>">Peminjaman</a>
                                        </li>
                                         <li class="nav-item" <?php echo $c ?>>
                                            <a class="nav-link" href="<?php echo site_url("Control/page/pengembalian");?>">Pengembalian</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item" hidden=""> <?php echo $d ?>>
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-12" aria-controls="submenu-12"><i class="fas fa-chart-line"></i>Laporan</a>
                                <div id="submenu-12" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo site_url("Control/page/laporan_pinjam");?>">Laporan Peminjaman</a>
                                        </li>
                                         <li class="nav-item" >
                                            <a class="nav-link" href="<?php echo site_url("Control/page/laporan_kembali");?>">Laporan Pengembalian</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" hidden=""> href="<?php echo site_url("Control/page/laporan_pinjamhari");?>">Laporan Peminjaman Hari</a>
                                        </li>
                                         <li class="nav-item" >
                                            <a class="nav-link" hidden=""> href="<?php echo site_url("Control/page/laporan_kembalihari");?>">Laporan Pengembalian Hari</a>
                                        </li>
                                    </ul>
                                </dixv>
                            </li>
                            
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                     <?php include "content/".$home.".php";?>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->

    <!-- bootstap bundle js -->
    <script src="<?php echo base_url();?>assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="<?php echo base_url();?>assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js -->
    <script src="<?php echo base_url();?>assets/libs/js/main-js.js"></script>
    
    <script src="<?php echo base_url();?>assets/vendor/charts/charts-bundle/Chart.bundle.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/charts/charts-bundle/chartjs.js"></script>
    <script type="text/javascript">
        $(function () {
        // body...
   
    })
    </script>
</body>
 
</html>