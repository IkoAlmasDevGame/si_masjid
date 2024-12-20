<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Laporan Donasi Masjid</title>
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
                        style="font-weight: 500; font-family: 'Times New Roman', monospace;">Laporan
                        Donasi Masjid
                    </h4>
                    <div class="breadcrumb d-flex justify-content-end align-items-end flex-wrap">
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=beranda" aria-current="page"
                                class="text-decoration-none text-primary">Beranda</a>
                        </li>
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=donasi" aria-current="page" class="text-decoration-none active">Laporan
                                Donasi</a>
                        </li>
                    </div>
                </div>
                <hr class="text-dark">
                <div class="z-n1 py-3">
                    <section class="content">
                        <div class="content-wrapper">
                            <div class="row justify-content-start align-items-start">
                                <form action="?page=donasi" class="form-inline" method="post">
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
                                                    <a href="?page=laporan-donasi&export=<?= $_POST['export'] ?>"
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
                            <div class="card shadow mb-4">
                                <div class="card-header py-2">
                                    <h4 class="card-title fs-4 display-4 fw-normal">Laporan Donasi</h4>
                                </div>
                                <div class="card-body">
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
                                    <div class="card-footer">
                                        <div class="container-fluid">
                                            <div class="table-responsive">
                                                <div class="card-footer">
                                                    <table class="table table-bordered table-striped-columns"
                                                        id="datatable3">
                                                        <thead>
                                                            <tr>
                                                                <th class="fw-normal text-center fs-6">No.</th>
                                                                <th class="fw-normal text-center fs-6">Nama Donatur</th>
                                                                <th class="fw-normal text-center fs-6">Nomer Handphone
                                                                </th>
                                                                <th class="fw-normal text-center fs-6">Nominal Transfer
                                                                </th>
                                                                <th class="fw-normal text-center fs-6">Bukti Transfer
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $no = 1; ?>
                                                            <?php $SQL = "SELECT * FROM donasi order by id_donasi asc"; ?>
                                                            <?php $mysql = $koneksi->query($SQL); ?>
                                                            <?php foreach ($mysql as $row): ?>
                                                            <?php extract($row); ?>
                                                            <tr>
                                                                <td class="fw-normal text-center fs-6">
                                                                    <?php echo $no; ?>
                                                                </td>
                                                                <td class="fw-normal text-center fs-6">
                                                                    <?php echo $nama_donatur; ?>
                                                                </td>
                                                                <td class="fw-normal text-center fs-6">
                                                                    <?php echo $no_hp; ?>
                                                                </td>
                                                                <td class="fw-normal text-center fs-6">
                                                                    <?php echo "Rp. " . number_format($nominal_transfer, 2); ?>
                                                                </td>
                                                                <td class="fw-normal text-center">
                                                                    <div class="text-center">
                                                                        <img src="../../../../assets/donatur/<?= $bukti_transfer ?>"
                                                                            alt="" class="img-responsive"
                                                                            style="width: 100px; max-width: 100%;">
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <?php $no++; ?>
                                                            <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
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
        </div>
        <?php require_once("../ui/footer.php") ?>