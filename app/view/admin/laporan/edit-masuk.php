<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Uang Masuk</title>
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
                        style="font-weight: 500; font-family: 'Times New Roman', monospace;">Edit Uang Masuk</h4>
                    <div class="breadcrumb d-flex justify-content-end align-items-end flex-wrap">
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=beranda" aria-current="page"
                                class="text-decoration-none text-primary">Beranda</a>
                        </li>
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=keuangan" aria-current="page"
                                class="text-decoration-none text-primary">Laporan Keuangan Masjid</a>
                        </li>
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?aksi=edit-laporan-masuk&tanggal=<?= $_GET['tanggal'] ?>" aria-current="page"
                                class="text-decoration-none active">Edit Uang Masuk</a>
                        </li>
                    </div>
                </div>
                <hr class="text-dark">
                <section class="content">
                    <div class="content-wrapper">
                        <div class="d-flex justify-content-center align-items-center flex-wrap">
                            <div class="card shadow bg-secondary col-sm-7 col-md-7">
                                <div class="card-header py-2">
                                    <h4 class="card-title text-center"
                                        style="font-weight: 500; font-family: 'Times New Roman', monospace;">
                                        Edit Laporan Uang Masuk
                                    </h4>
                                </div>
                                <div class="card-body my-2">
                                    <?php if (isset($_GET['tanggal'])): ?>
                                    <?php $SQL = $koneksi->query("SELECT * FROM laporan_keuangan WHERE tgl_masuk = '$_GET[tanggal]'"); ?>
                                    <?php foreach ($SQL as $isi): ?>
                                    <?php extract($isi); ?>
                                    <form action="?aksi=laporan-ubah-masuk" method="post" class="form-group">
                                        <div class="form-inline my-2">
                                            <div class="row justify-content-center align-items-center flex-wrap">
                                                <div class="form-label col-sm-4 col-md-4 fw-semibold text-light fs-5">
                                                    <label for="tanggal_masuk" class="label label-default">Tanggal
                                                        Masuk</label>
                                                </div>
                                                <div class="col-sm-1 col-md-1 text-light">:</div>
                                                <div class="col-sm-7 col-md-7">
                                                    <input type="date" value="<?= $tgl_masuk ?>" readonly
                                                        class="form-control date-formate" name="tgl_masuk"
                                                        id="tanggal_masuk" aria-required="TRUE">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-inline my-2">
                                            <div class="row justify-content-center align-items-center flex-wrap">
                                                <div class="form-label col-sm-4 col-md-4 fw-semibold text-light fs-5">
                                                    <label for="uang_masuk" class="label label-default">Uang
                                                        Masuk</label>
                                                </div>
                                                <div class="col-sm-1 col-md-1 text-light">:</div>
                                                <div class="col-sm-7 col-md-7">
                                                    <input type="text" inputmode="numeric" value="<?= $uang_masuk ?>"
                                                        class="form-control form-control-range" name="uang_masuk"
                                                        id="uang_masuk" aria-required="TRUE"
                                                        placeholder="masukkan jumlah uang masuk ...">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-inline my-2">
                                            <div class="row justify-content-center align-items-start flex-wrap">
                                                <div class="form-label col-sm-4 col-md-4 fw-semibold text-light fs-5">
                                                    <label for="ket_masuk" class="label label-default">Keterangan
                                                        Masuk</label>
                                                </div>
                                                <div class="col-sm-1 col-md-1 text-light">:</div>
                                                <div class="col-sm-7 col-md-7">
                                                    <textarea name="ket_masuk"
                                                        placeholder="masukkan keterangan masuk, ketika ada note ...."
                                                        id="ket_masuk" class="form-control" aria-required="TRUE"
                                                        rows="4" cols="10"><?php echo $ket_masuk; ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="my-2"></div>
                                        <div class="card-footer">
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fas fa-fw fa-1x fa-save"></i>
                                                    Update Data
                                                </button>
                                                <a href="?page=keuangan" aria-current="page">
                                                    <button type="button" class="btn btn-default">
                                                        <i class="fas fa-fw fa-close fa-1x"></i>
                                                        Kembali Ke Halaman
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                    </form>
                                    <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <?php require_once("../ui/footer.php"); ?>