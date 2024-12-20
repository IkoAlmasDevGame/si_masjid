<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tambah Account Pegawai</title>
        <?php if ($_SESSION['akses'] == 'admin') { ?>
        <?php require_once("../ui/header.php"); ?>
        <?php require_once("../../../config/config.php"); ?>
        <?php } else { ?>
        <?php header("location:../ui/header.php?page=beranda"); ?>
        <?php exit(0); ?>
        <?php } ?>
    </head>

    <body>
        <?php require_once("../ui/sidebar.php") ?>
        <div class="panel panel-default container-fluid rounded-2 bg-body-secondary">
            <div class="panel-body container-fluid py-5">
                <div class="panel-heading">
                    <h4 class="panel-title display-4 fs-2"
                        style="font-weight: 500; font-family: 'Times New Roman', monospace;">Tambah Account Pegawai
                    </h4>
                    <div class="breadcrumb d-flex justify-content-end align-items-end flex-wrap">
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=beranda" aria-current="page"
                                class="text-decoration-none text-primary">Beranda</a>
                        </li>
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=pegawai" aria-current="page" class="text-decoration-none text-primary">Data
                                Account Pegawai Masjid</a>
                        </li>
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?aksi=tambah-pegawai" aria-current="page"
                                class="text-decoration-none active">Tambah Account Pegawai</a>
                        </li>
                    </div>
                </div>
                <hr class="text-dark">
                <div class="z-n1 py-3">
                    <section class="content">
                        <div class="content-wrapper">
                            <div class="d-flex justify-content-center align-items-center flex-wrap">
                                <div class="col-sm-6 col-md-6">
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-2">
                                            <h4 class="card-title fw-normal display-4">Tambah Account Pegawai</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <form action="?aksi=tambah-account" method="post" class="form-group">
                                                    <input type="hidden" name="akses" value="admin">
                                                    <div class="form-inline my-2">
                                                        <div
                                                            class="row justify-content-center align-items-center flex-wrap">
                                                            <div
                                                                class="form-label col-sm-4 col-md-4 fs-5 text-dark fw-semibold">
                                                                <label for="nama" class="label label-default">Nama
                                                                    Lengkap</label>
                                                            </div>
                                                            <div class="col-sm-1 col-md-1">:</div>
                                                            <div class="col-sm-6 col-md-6">
                                                                <input type="text" name="nama_user"
                                                                    placeholder="masukkan nama pegawai anda ..."
                                                                    id="nama" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-inline my-2">
                                                        <div
                                                            class="row justify-content-center align-items-center flex-wrap">
                                                            <div
                                                                class="form-label col-sm-4 col-md-4 fs-5 text-dark fw-semibold">
                                                                <label for="username"
                                                                    class="label label-default">Username</label>
                                                            </div>
                                                            <div class="col-sm-1 col-md-1">:</div>
                                                            <div class="col-sm-6 col-md-6">
                                                                <input type="text" name="username"
                                                                    placeholder="masukkan new username ..."
                                                                    id="username" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-inline my-2">
                                                        <div
                                                            class="row justify-content-center align-items-center flex-wrap">
                                                            <div
                                                                class="form-label col-sm-4 col-md-4 fs-5 text-dark fw-semibold">
                                                                <label for="katasandi"
                                                                    class="label label-default">Password</label>
                                                            </div>
                                                            <div class="col-sm-1 col-md-1">:</div>
                                                            <div class="col-sm-6 col-md-6">
                                                                <input type="password" name="password"
                                                                    placeholder="masukkan password baru ..."
                                                                    id="katasandi" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer my-2">
                                                        <div class="text-center">
                                                            <button type="submit" class="btn btn-primary"
                                                                aria-current="page">
                                                                <i class="fas fa-fw fa-1x fa-save"></i>
                                                                Simpan Data
                                                            </button>
                                                            <a href="?page=pegawai" aria-current="page">
                                                                <button type="button"
                                                                    class="btn btn-default btn-outline-dark">
                                                                    <i class="fas fa-close fa-1x fa-fw"></i>
                                                                    Kembali Halaman
                                                                </button>
                                                            </a>
                                                            <button type="reset" class="btn btn-danger"
                                                                aria-current="page">
                                                                <i class="fas fa-fw fa-1x fa-eraser"></i>
                                                                Hapus Data
                                                            </button>
                                                        </div>
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
            </div>
        </div>
        <?php require_once("../ui/footer.php") ?>