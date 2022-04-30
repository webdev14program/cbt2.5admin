<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ADMINISTRATOR CBT</title>
    <link rel="icon" href="https://smkth-jakbar.com/assets/images/logo.png">

    <!-- Custom fonts for this template-->
    <link href="<?= base_url() ?>assets/dashboard/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url() ?>assets/dashboard/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/dashboard/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-text mx-3 text-uppercase">ADMIN CBT <br> AKL</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url() ?>Dashboard_akl">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Data Akademik
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Data Master</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">List Data Master</h6>
                        <a class="collapse-item" href="<?= base_url() ?>Dashboard_akl/kelas">Master Kelas</a>
                        <a class="collapse-item" href="<?= base_url() ?>Dashboard_akl/guru">Master Guru</a>
                        <a class="collapse-item" href="<?= base_url() ?>Dashboard_akl/mata_pelajaran">Master Mapel</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url() ?>Dashboard_akl/peserta_ujian">
                    <i class="fas fa-graduation-cap"></i>
                    <span>Peserta Ujian </span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url() ?>Dashboard_akl/bank_soal">
                    <i class="fas fa-graduation-cap"></i>
                    <span>Bank Soal</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url() ?>Dashboard_akl/jadwal_ujian">
                    <i class="fas fa-calendar-alt"></i>
                    <span>Jadwal Ujian</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Ujian
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Ujian Berbasis Komputer</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?= base_url() ?>Dashboard_akl/akun_peserta">Akun Peserta</a>
                        <a class="collapse-item" href="#">Status Ujian</a>
                        <a class="collapse-item" href="#">Status Peserta</a>
                        <a class="collapse-item" href="#">Cetak Daftar Nilai</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Logout
            </div>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url() ?>Dashboard/logout">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Logout</span></a>
            </li>

            <!-- Nav Item - Tables -->

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
        </ul>
        <!-- End of Sidebar -->