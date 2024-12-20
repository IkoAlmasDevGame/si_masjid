<?php
if ($_SESSION['akses'] == '') {
    echo "<script>
    document.location.href = '../index.php';
    alert('mohon maaf jabatan anda tidak ada di database kami.');
    </script>";
    die;
}
?>

<?php
if ($_SESSION['akses'] == 'admin') {
    error_reporting(0);
    $data = $koneksi->query("SELECT * FROM user WHERE id_user = '$_SESSION[id]'");
    $baseFile = mysqli_fetch_array($data);
    $ds = $koneksi->query("SELECT * FROM setting WHERE status_website = '1'");
    $setting = mysqli_fetch_array($ds);
?>
    <?php if ($setting['status_website'] == '1'): ?>
        <!-- ======= Header ======= -->
        <header id="header" class="header fixed-top d-flex align-items-center" style="position:fixed">
            <div class="d-flex align-items-center justify-content-between">
                <a href="" role="button" class="logo d-flex align-items-center fs-5 fst-normal fw-semibold">
                    <?php echo "$setting[nama_website]"; ?>
                </a>
                <i class="bi bi-list toggle-sidebar-btn"></i>
                <?php require_once("../../../library/library.php"); ?>
                &nbsp;<?php echo $hari_ini . ", " . $tanggal . " " . $bulan_ini . " " . $tahun ?>
            </div><!-- End Logo -->

            <nav class="header-nav ms-auto mx-3">
                <ul>
                    <li class="nav-item dropdown pe-3">

                        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" role="button"
                            data-bs-toggle="dropdown" aria-controls="dropdown">
                            <i class="fa fa-2x fa-user-circle"></i>
                            <span class="d-none d-md-block dropdown-toggle ps-2"></span>
                        </a><!-- End Profile Iamge Icon -->

                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                            <li class="dropdown-header">
                                <h4 class="fs-6 fw-normal text-start text-dark">
                                    <div class="form-inline row justify-content-start align-items-start flex-wrap">
                                        <div class="col-sm-4 col-md-4">
                                            <label for="">nama profile</label>
                                        </div>
                                        <div class="col-sm-1 col-md-1">:</div>
                                        <div class="col-sm-6 col-md-6">
                                            <?php echo $baseFile['nama_user'] ?>
                                        </div>
                                    </div>
                                </h4>
                                <hr class="dropdown-divider">
                                <h4 class="fs-6 fw-normal text-start text-dark">
                                    <div class="form-inline row justify-content-start align-items-start flex-wrap">
                                        <div class="col-sm-4 col-md-4">
                                            <label for="">username</label>
                                        </div>
                                        <div class="col-sm-1 col-md-1">:</div>
                                        <div class="col-sm-6 col-md-6">
                                            <?php echo $baseFile['username'] ?>
                                        </div>
                                    </div>
                                </h4>
                                <hr class="dropdown-divider">
                                <h4 class="fs-6 fw-normal text-start text-dark">
                                    <div class="form-inline row justify-content-start align-items-start flex-wrap">
                                        <div class="col-sm-4 col-md-4">
                                            <label for="">Jabatan</label>
                                        </div>
                                        <div class="col-sm-1 col-md-1">:</div>
                                        <div class="col-sm-6 col-md-6">
                                            <?php echo $baseFile['akses'] ?>
                                        </div>
                                    </div>
                                </h4>
                                <hr class="dropdown-divider my-2">
                                <div class="text-end">
                                    <a href="?page=logout"
                                        onclick="return confirm('Apakah anda ingin keluar dari website ini ?')"
                                        aria-current="page" class="btn btn-danger">
                                        <i class="fas fa-fw fa-sign-out-alt fa-1x"></i>
                                        Log Out
                                    </a>
                                </div>
                            </li>
                        </ul><!-- End Profile Dropdown Items -->
                    </li><!-- End Profile Nav -->
                </ul>
            </nav><!-- End Icons Navigation -->
        </header>
        <!-- ======= Header ======= -->
    <?php endif; ?>
    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" style="background: rgb(50, 100, 50);" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item">
                <a href="?page=beranda" aria-current="page" class="nav-link collapsed">
                    <i class="fas fa-tachometer-alt fa-1x"></i>
                    <div class="fs-6 display-4 text-dark fw-normal">Dashboard</div>
                </a>
            </li>
            <?php if ($baseFile['username'] == 'superadmin') { ?>
                <hr class="text-light">
                <li class="nav-item">
                    <a href="?page=pegawai" aria-current="page" class="nav-link collapsed">
                        <i class="fas fa-fw fa-user fa-1x"></i>
                        <div class="fs-6 display-4 text-dark fw-normal">Pegawai</div>
                    </a>
                </li>
            <?php } ?>
            <hr class="text-light">
            <li class="nav-item">
                <a href="?page=kegiatan" aria-current="page" class="nav-link collapsed">
                    <i class="fas fa-fw fa-1x fa-bookmark"></i>
                    <div class="fs-6 display-4 text-dark fw-normal">Kegiatan</div>
                </a>
            </li>
            <hr class="text-light">
            <li class="nav-item">
                <a href="?page=pengurus" aria-current="page" class="nav-link collapsed">
                    <i class="fas fa-fw fa-1x fa-users"></i>
                    <div class="fs-6 display-4 text-dark fw-normal">Susunan Pengurus</div>
                </a>
            </li>
            <hr class="text-light">
            <li class="nav-item">
                <a href="?page=donasi" aria-current="page" class="nav-link collapsed">
                    <i class="fas fa-fw fa-1x fa-donate"></i>
                    <div class="fs-6 display-4 text-dark fw-normal">Donasi</div>
                </a>
            </li>
            <hr class="text-light">
            <li class="nav-item">
                <a href="?page=keuangan" aria-current="page" class="nav-link collapsed">
                    <i class="fas fa-fw fa-1x fa-donate"></i>
                    <div class="fs-6 display-4 text-dark fw-normal">Laporan Keuangan</div>
                </a>
            </li>
            <hr class="text-light">
            <li class="nav-item">
                <a href="?page=rekening" aria-current="page" class="nav-link collapsed">
                    <i class="fas fa-fw fa-1x fa-donate"></i>
                    <div class="fs-6 display-4 text-dark fw-normal">Rekening Masjid</div>
                </a>
            </li>
            <?php if ($baseFile['username'] == 'superadmin'): ?>
                <hr class="text-light">
                <li class="nav-item">
                    <a href="?page=setting&id_setting=1" aria-current="page" class="nav-link collapsed">
                        <i class="fas fa-fw fa-building fa-1x"></i>
                        <div class="fs-6 display-4 text-dark fw-normal">Profile Website</div>
                    </a>
                </li>
            <?php endif; ?>
            <hr class="text-light">
            <li class="nav-item">
                <a href="?page=profile&id_user=<?= $_SESSION['id'] ?>" aria-current="page" class="nav-link collapsed">
                    <i class="fas fa-fw fa-user-edit fa-1x has-icon"></i>
                    <div class="fs-6 display-4 text-dark fw-normal">Edit Profile</div>
                </a>
            </li>
        </ul>
        <footer class="main-footer">
            <div class="footer col-sm-10 col-md-10 bottom-0 position-absolute">
                <div class="fs-6 text-light text-center">
                    <?php echo $setting['nama_pemilik'] ?>
                    <br>
                    <?php echo "&copy; " . date("Y"); ?>
                </div>
            </div>
        </footer>
    </aside>
    <!-- ======= Sidebar ======= -->
    <main id="main" class="main">
        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-8">
                    <div class="row">

                    </div>

                </div><!-- End Right side columns -->

            </div>
        </section>
    <?php
} else {
    echo "<script>
    document.location.href = '../index.php';
    </script>";
    die;
    exit(0);
}
    ?>