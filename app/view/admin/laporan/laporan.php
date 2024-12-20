<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Laporan Keuangan Masjid</title>
        <?php if ($_SESSION['akses'] == 'admin') { ?>
        <?php require_once("../ui/header.php"); ?>
        <?php require_once("../../../config/config.php"); ?>
        <?php if (isset($_POST['saldo'])) { ?>
        <?php
            $id = htmlspecialchars($_POST['id']);
            $saldo = htmlspecialchars($_POST['saldo']);
            $koneksi->query("UPDATE laporan_keuangan SET saldo = '$saldo' WHERE id = '$id'");
            header("location:../ui/header.php?page=keuangan");
            exit(0);
            ?>
        <?php } ?>
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
                        style="font-weight: 500; font-family: 'Times New Roman', monospace;">Laporan Keuangan Masjid
                    </h4>
                    <div class="breadcrumb d-flex justify-content-end align-items-end flex-wrap">
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=beranda" aria-current="page"
                                class="text-decoration-none text-primary">Beranda</a>
                        </li>
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=keuangan" aria-current="page" class="text-decoration-none active">Laporan
                                Keuangan Masjid</a>
                        </li>
                    </div>
                </div>
                <hr class="text-dark">
                <div class="z-n1 py-3">
                    <section class="content">
                        <div class="content-wrapper">
                            <div class="row justify-content-start align-items-start">
                                <form action="?page=keuangan" class="form-inline" method="post">
                                    <div class="form-group col-sm-5 col-md-5">
                                        <div class="form-group">
                                            <div class="row justify-content-center align-items-center flex-wrap">
                                                <div class="form-inline col-sm-4 col-md-4 fw-normal fs-5">
                                                    <label for="" class="label label-default">cari berdasarkan</label>
                                                </div>
                                                <div class="col-sm-1 col-md-1">:</div>
                                                <div class="col-sm-6 col-md-6">
                                                    <select name="export" onchange="this.form.submit();" type="submit"
                                                        class="form-select" id="">
                                                        <option value="" class="text-secondary text-center">
                                                            Pilih Export PDF
                                                        </option>
                                                        <option value="export_all">Export All</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="my-1"></div>
                                            <div class="col-sm-3 col-md-3">
                                                <div class="d-flex justify-content-end align-items-end flex-wrap">
                                                    <?php if (isset($_POST['export'])) { ?>
                                                    <a href="?page=laporan-keuangan&export=<?= $_POST['export'] ?>"
                                                        aria-current="page" class="btn btn-danger">
                                                        <i class="fas fa-fw fa-file-pdf fa-1x"></i>
                                                        Export PDF
                                                    </a>
                                                    <?php } ?>
                                                </div>
                                                <div class="my-3"></div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="card shadow">
                                <div class="card-header py-3">
                                    <h4 class="card-title fs-4 display-4 fw-normal">
                                        Data Laporan Keuangan Masjid
                                    </h4>
                                    <div class="card-tools">
                                        <a href="?page=keuangan" aria-current="page">
                                            <button type="button" class="btn btn-info">
                                                <i class="fas fa-fw fa-refresh fa-1x"></i>
                                                Refresh Halaman
                                            </button>
                                        </a>
                                        <a href="?aksi=tambah-laporan-masuk" aria-current="page">
                                            <button type="button" class="btn btn-danger">
                                                <i class="fas fa-fw fa-money-bill fa-1x"></i>
                                                Tambah Uang Masuk
                                            </button>
                                        </a>
                                        <a href="?aksi=tambah-laporan-keluar" aria-current="page">
                                            <button type="button" class="btn btn-warning">
                                                <i class="fas fa-fw fa-money-bill fa-1x"></i>
                                                Tambah Uang Keluar
                                            </button>
                                        </a>
                                        <div class="d-flex justify-content-end align-items-end">
                                            <div class="col-sm-3 col-md-3 py-2 my-2 rounded-2 bg-info">
                                                <marquee class="fst-normal fw-normal" scrollamount="10" loop="infinite"
                                                    direction="left">
                                                    <div class="text-light display-4 fw-semibold fs-5">
                                                        <?php echo ucwords(ucfirst(salam() . ", " . $_SESSION['nama'])) ?>
                                                    </div>
                                                </marquee>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body my-2">
                                    <div class="table-responsive">
                                        <div class="d-table" style="width: 980px; min-width: 100%;">
                                            <table class="table table-bordered table-striped-columns" id="datatable2">
                                                <thead>
                                                    <tr>
                                                        <th class="fs-6 fw-normal text-center">No.</th>
                                                        <th class="fs-6 fw-normal text-center">Tanggal Masuk</th>
                                                        <th class="fs-6 fw-normal text-center">Uang Masuk</th>
                                                        <th class="fs-6 fw-normal text-center">Keterangan Masuk</th>
                                                        <th class="fs-6 fw-normal text-center">Tanggal Keluar</th>
                                                        <th class="fs-6 fw-normal text-center">Uang Keluar</th>
                                                        <th class="fs-6 fw-normal text-center">Ketarangan Keluar</th>
                                                        <th class="fs-6 fw-normal text-center">Saldo</th>
                                                        <th class="fs-6 fw-normal text-center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $no = 1; ?>
                                                    <?php $saldo = 0; ?>
                                                    <?php $SQL = $laporan->laporan(); ?>
                                                    <?php foreach ($SQL as $data): ?>
                                                    <?php
                                                    $saldo += $data['uang_masuk'];
                                                    $saldo -= $data['uang_keluar'];
                                                    ?>
                                                    <tr>
                                                        <td class="fw-normal fs-6 text-center"><?php echo $no++; ?></td>
                                                        <td class="fw-normal fs-6 text-center">
                                                            <?php if ($data['tgl_masuk']): ?>
                                                            <?php echo $data['tgl_masuk'] ?>
                                                            <?php else: ?>
                                                            <?php echo "-"; ?>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td class="fw-normal fs-6 text-center">
                                                            <?php if ($data['uang_masuk']): ?>
                                                            <?php echo "Rp. " . number_format($data['uang_masuk'], 0, ',', '.') ?>
                                                            <?php else: ?>
                                                            <?php echo "-"; ?>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td class="fw-normal fs-6 text-start">
                                                            <?php if ($data['ket_masuk']): ?>
                                                            <?php echo $data['ket_masuk'] ?>
                                                            <?php else: ?>
                                                            <?php echo "-"; ?>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td class="fw-normal fs-6 text-center">
                                                            <?php if ($data['tgl_keluar']): ?>
                                                            <?php echo $data['tgl_keluar'] ?>
                                                            <?php else: ?>
                                                            <?php echo "-"; ?>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td class="fw-normal fs-6 text-center">
                                                            <?php if ($data['uang_keluar']): ?>
                                                            <?php echo "Rp. " . number_format($data['uang_keluar'], 0, ',', '.') ?>
                                                            <?php else: ?>
                                                            <?php echo "-"; ?>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td class="fw-normal fs-6 text-start">
                                                            <?php if ($data['ket_keluar']): ?>
                                                            <?php echo $data['ket_keluar'] ?>
                                                            <?php else: ?>
                                                            <?php echo "-"; ?>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td class="fw-normal fs-6 text-center">
                                                            <?php if ($data['saldo'] != $saldo): ?>
                                                            <form action="?page=keuangan" method="post">
                                                                <input type="hidden" name="id"
                                                                    value="<?= $data['id'] ?>">
                                                                <input type="hidden" name="saldo" value="<?= $saldo ?>"
                                                                    class="text-center" readonly>
                                                                <button type="submit"
                                                                    class="btn btn-primary btn-sm">klick here</button>
                                                            </form>
                                                            <?php else: ?>
                                                            <?php echo "Rp. " . number_format($saldo, 0, ',', '.') ?>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td class="text-center fs-6">
                                                            <?php if ($data['tgl_masuk']): ?>
                                                            <a href="?aksi=edit-laporan-masuk&tanggal=<?= $data['tgl_masuk'] ?>"
                                                                title="edit laporan masuk" aria-current="page">
                                                                <button type="button" class="btn btn-sm btn-info">
                                                                    <i class="fas fa-fw fa-edit fa-1x"></i>
                                                                </button>
                                                            </a>
                                                            <?php endif; ?>
                                                            <?php if ($data['tgl_keluar']): ?>
                                                            <a href="?aksi=edit-laporan-keluar&tanggal=<?= $data['tgl_keluar'] ?>"
                                                                title="edit laporan keluar"
                                                                class="btn btn-sm btn-primary" aria-current="page">
                                                                <i class="fas fa-fw fa-edit fa-1x"></i>
                                                            </a>
                                                            <?php endif; ?>
                                                            <a href="?aksi=laporan-hapus&id=<?= $data['id'] ?>"
                                                                aria-current="page" class="btn btn-sm btn-danger"
                                                                onclick="return confirm('Apakah data laporan keuangan ini ingin anda hapus ?');">
                                                                <i class="fas fa-fw fa-trash fa-1x"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
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