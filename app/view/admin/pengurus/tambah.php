<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pengurus Masjid</title>
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
                    style="font-weight: 500; font-family: 'Times New Roman', monospace;">Tambah Pengurus Masjid</h4>
                <div class="breadcrumb d-flex justify-content-end align-items-end flex-wrap">
                    <li class="breadcrumb breadcrumb-item">
                        <a href="?page=beranda" aria-current="page"
                            class="text-decoration-none text-primary">Beranda</a>
                    </li>
                    <li class="breadcrumb breadcrumb-item">
                        <a href="?page=pengurus" aria-current="page"
                            class="text-decoration-none text-primary">Susunan
                            Pengurus</a>
                    </li>
                    <li class="breadcrumb breadcrumb-item">
                        <a href="?aksi=tambah-pengurus" aria-current="page"
                            class="text-decoration-none active">Tambah Pengurus Masjid</a>
                    </li>
                </div>
            </div>
            <hr class="text-dark">
            <section class="content">
                <div class="content-wrapper">
                    <div class="table-responsive">
                        <div class="card shadow mb-4">
                            <div class="card-header py-2">
                                <h4 class="card-title display-4 fs-2"
                                    style="font-weight: 500; font-family: 'Times New Roman', monospace;">
                                    Tambah Pengurus Masjid
                                </h4>
                            </div>
                            <div class="card-body my-3">
                                <div class="container-fluid">
                                    <div class="d-flex justify-content-center align-items-center flex-wrap">
                                        <div class="card col-sm-8 col-md-8">
                                            <div class="card-header py-2">
                                                <?php require_once("../pengurus/function.php"); ?>
                                            </div>
                                            <div class="card-body my-3">
                                                <form action="?aksi=pengurus-tambah" class="form-group"
                                                    method="post">
                                                    <div class="my-2"></div>
                                                    <div class="form-inline">
                                                        <div class="row justify-content-center 
                                                                align-items-center flex-wrap">
                                                            <div class="form-label col-sm-4 col-md-4 fst-normal
                                                                     fs-5 fw-normal">
                                                                <label for="nama_pengurus"
                                                                    class="label label-default">Nama
                                                                    Pengurus</label>
                                                            </div>
                                                            <div class="col-sm-1 col-md-1">:</div>
                                                            <div class="col-sm-6 col-md-6">
                                                                <input type="text" name="nama_pengurus"
                                                                    maxlength="50" class="form-control"
                                                                    id="nama_pengurus"
                                                                    placeholder="masukkan nama pengurus masjid ...">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="my-2"></div>
                                                    <div class="form-inline">
                                                        <div class="row justify-content-center 
                                                                align-items-center flex-wrap">
                                                            <div class="form-label col-sm-4 col-md-4 fst-normal
                                                                     fs-5 fw-normal">
                                                                <label for="no_hp" class="label label-default">No
                                                                    Handphone</label>
                                                            </div>
                                                            <div class="col-sm-1 col-md-1">:</div>
                                                            <div class="col-sm-6 col-md-6">
                                                                <input type="text" name="no_hp" maxlength="13"
                                                                    class="form-control" id="no_hp"
                                                                    placeholder="masukkan nomer handphone pengurus masjid ...">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="my-2"></div>
                                                    <div class="form-inline">
                                                        <div class="row justify-content-center 
                                                                align-items-center flex-wrap">
                                                            <div class="form-label col-sm-4 col-md-4 fst-normal
                                                                     fs-5 fw-normal">
                                                                <label for="jabatan"
                                                                    class="label label-default">Jabatan
                                                                    Pengurus</label>
                                                            </div>
                                                            <div class="col-sm-1 col-md-1">:</div>
                                                            <div class="col-sm-6 col-md-6">
                                                                <input type="text" name="jabatan" maxlength="30"
                                                                    class="form-control" id="jabatan"
                                                                    placeholder="masukkan jabatan pengurus masjid ...">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="my-2"></div>
                                                    <div class="card-footer">
                                                        <div class="text-center">
                                                            <button type="submit" class="btn btn-primary">
                                                                <i class="fas fa-fw fa-1x fa-save"></i>
                                                                Simpan Data
                                                            </button>
                                                            <a href="?page=pengurus" aria-current="page">
                                                                <button type="button" class="btn btn-default">
                                                                    <i class="fas fa-fw fa-close fa-1x"></i>
                                                                    Kembali Ke Halaman
                                                                </button>
                                                            </a>
                                                            <button type="reset" class="btn btn-danger">
                                                                <i class="fas fa-fw fa-eraser fa-1x"></i>
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
                    </div>
                </div>
            </section>
        </div>
    </div>
    <?php require_once("../ui/footer.php"); ?>