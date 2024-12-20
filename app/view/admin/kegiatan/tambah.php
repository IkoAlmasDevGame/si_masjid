<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tambah Kegiatan Mesjid</title>
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
                        style="font-weight: 500; font-family: 'Times New Roman', monospace;">Tambah Kegiatan Masjid</h4>
                    <div class="breadcrumb d-flex justify-content-end align-items-end flex-wrap">
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=beranda" aria-current="page"
                                class="text-decoration-none text-primary">Beranda</a>
                        </li>
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=kegiatan" aria-current="page"
                                class="text-decoration-none text-primary">Kegiatan Masjid</a>
                        </li>
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?aksi=tambah-kegiatan" aria-current="page"
                                class="text-decoration-none active">Tambah Kegiatan Masjid</a>
                        </li>
                    </div>
                </div>
                <hr class="text-dark">
                <div class="z-n1 py-3">
                    <section class="content">
                        <div class="content-wrapper">
                            <div class="col-sm-auto col-md-auto">
                                <div class="d-flex justify-content-center align-items-center flex-wrap">
                                    <div class="card col-sm-7 col-md-7 bg-secondary">
                                        <div class="card-header py-3">
                                            <h4 class="card-title text-center display-4 fs-2"
                                                style="font-weight: 500; font-family: 'Times New Roman', monospace;">
                                                Tambah Kegiatan Masjid
                                            </h4>
                                            <hr>
                                            <?php require_once("../kegiatan/function.php"); ?>
                                        </div>
                                        <div class="card-body my-3">
                                            <form action="?aksi=kegiatan-tambah" class="form-group"
                                                enctype="multipart/form-data" method="post">
                                                <div class="form-inline my-2">
                                                    <div class="row justify-content-start align-items-center flex-wrap">
                                                        <div class="form-label col-sm-4 col-md-4 fs-5 fw-semibold">
                                                            <label for="tanggal_artikel"
                                                                class="label label-default text-light">Tanggal
                                                                Diterbitkan</label>
                                                        </div>
                                                        <div class="col-sm-1 col-md-1">:</div>
                                                        <div class="col-sm-6 col-md-6">
                                                            <input type="date" readonly required
                                                                value="<?= date('Y-m-d') ?>" name="tanggal_artikel"
                                                                id="tanggal_artikel" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-inline my-2">
                                                    <div class="row justify-content-start align-items-center flex-wrap">
                                                        <div class="form-label col-sm-4 col-md-4 fs-5 fw-semibold">
                                                            <label for="judul_kegiatan"
                                                                class="label label-default text-light">Judul
                                                                Kegiatan</label>
                                                        </div>
                                                        <div class="col-sm-1 col-md-1">:</div>
                                                        <div class="col-sm-6 col-md-6">
                                                            <input type="text" name="judul_kegiatan" id="judul_kegiatan"
                                                                class="form-control"
                                                                placeholder="masukkan judul kegiatan masjid ...">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-inline my-2">
                                                    <div class="row justify-content-start align-items-start flex-wrap">
                                                        <div class="form-label col-sm-4 col-md-4 fs-5 fw-semibold">
                                                            <label for="keterangan"
                                                                class="label label-default text-light">Keterangan
                                                                Kegiatan</label>
                                                        </div>
                                                        <div class="col-sm-1 col-md-1">:</div>
                                                        <div class="col-sm-6 col-md-6">
                                                            <textarea name="keterangan"
                                                                placeholder="masukkan keterangan masjid ..." rows="6"
                                                                class="form-control" id="keterangan"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-inline my-2">
                                                    <div class="row justify-content-start align-items-start flex-wrap">
                                                        <div class="form-label col-sm-4 col-md-4 fs-5 fw-semibold">
                                                            <label for="foto"
                                                                class="label label-default text-light">Foto
                                                                Kegiatan</label>
                                                        </div>
                                                        <div class="col-sm-1 col-md-1">:</div>
                                                        <div class="col-sm-6 col-md-6">
                                                            <div class="form-icon img-thumbnail w-25">
                                                                <img src="https://th.bing.com/th/id/OIP.jxhJvX2q8gLQmiFuOWa1bAHaHa?w=161&h=180&c=7&r=0&o=5&pid=1.7"
                                                                    id="preview" alt="" width="64"
                                                                    class="img-rounded img-fluid">
                                                            </div>
                                                            <div class="form-control my-3">
                                                                <input type="file" name="foto" accept="image/*"
                                                                    class="form-control-file"
                                                                    onchange="previewImage(this)" aria-required="true">
                                                            </div>
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
                                                        <a href="?page=kegiatan" aria-current="page">
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