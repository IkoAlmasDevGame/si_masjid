<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Rekening Bank Masjid</title>
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
                    style="font-weight: 500; font-family: 'Times New Roman', monospace;">Tambah Rekening Bank Masjid
                </h4>
                <div class="breadcrumb d-flex justify-content-end align-items-end flex-wrap">
                    <li class="breadcrumb breadcrumb-item">
                        <a href="?page=beranda" aria-current="page"
                            class="text-decoration-none text-primary">Beranda</a>
                    </li>
                    <li class="breadcrumb breadcrumb-item">
                        <a href="?page=rekening" aria-current="page"
                            class="text-decoration-none text-primary">Rekening Bank Masjid</a>
                    </li>
                    <li class="breadcrumb breadcrumb-item">
                        <a href="?aksi=tambah-rekening" aria-current="page"
                            class="text-decoration-none active">Tambah Rekening Bank Masjid</a>
                    </li>
                </div>
            </div>
            <hr class="text-dark">
            <div class="z-n1 py-3">
                <section class="content">
                    <div class="content-wrapper">
                        <div class="col-sm-auto col-md-auto">
                            <div class="d-flex justify-content-center align-items-center flex-wrap">
                                <div class="card shadow bg-secondary col-sm-7 col-md-7">
                                    <div class="card-header py-1">
                                        <h4 class="card-title text-center display-4 fs-2"
                                            style="font-weight: 500; font-family: 'Times New Roman', monospace;">
                                            Tambah Rekening Bank Masjid
                                        </h4>
                                        <hr>
                                        <?php require_once("../rekening/function.php"); ?>
                                    </div>
                                    <div class="card-body my-3">
                                        <form action="?aksi=rekening-tambah" class="form-group" method="post">
                                            <div class="form-inline my-3">
                                                <div
                                                    class="row justify-content-center align-items-center flex-wrap">
                                                    <div class="form-label col-sm-4 col-md-4 fs-5 fw-semibold">
                                                        <label for="no_rek" class="label label-default text-light">
                                                            Nomor Rekening
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-1 col-md-1">:</div>
                                                    <div class="col-sm-5 col-md-5">
                                                        <input type="text" maxlength="50"
                                                            placeholder="0000-0000-0000" name="no_rek"
                                                            class="form-control" id="no_rek">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-inline my-3">
                                                <div
                                                    class="row justify-content-center align-items-center flex-wrap">
                                                    <div class="form-label col-sm-4 col-md-4 fs-5 fw-semibold">
                                                        <label for="nama_bank"
                                                            class="label label-default text-light">
                                                            Nama Bank
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-1 col-md-1">:</div>
                                                    <div class="col-sm-5 col-md-5">
                                                        <input type="text" maxlength="50"
                                                            placeholder="masukkan nama bank ..." name="nama_bank"
                                                            class="form-control" id="nama_bank">
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
                                                    <a href="?page=rekening" aria-current="page">
                                                        <button type="button"
                                                            class="btn btn-default btn-outline-dark">
                                                            <i class="fas fa-close fa-1x fa-fw"></i>
                                                            Kembali Halaman
                                                        </button>
                                                    </a>
                                                    <button type="reset" class="btn btn-danger" aria-current="page">
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
                </section>
            </div>
        </div>
    </div>
    <?php require_once("../ui/footer.php") ?>