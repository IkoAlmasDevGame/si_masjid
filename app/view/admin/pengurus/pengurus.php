<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Susunan Pengurus</title>
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
                        style="font-weight: 500; font-family: 'Times New Roman', monospace;">Susunan
                        Pengurus</h4>
                    <div class="breadcrumb d-flex justify-content-end align-items-end flex-wrap">
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=beranda" aria-current="page"
                                class="text-decoration-none text-primary">Beranda</a>
                        </li>
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=pengurus" aria-current="page" class="text-decoration-none active">Susunan
                                Pengurus</a>
                        </li>
                    </div>
                </div>
                <hr class="text-dark">
                <div class="z-n1 py-3">
                    <section class="content">
                        <div class="content-wrapper">
                            <div class="row justify-content-start align-items-start">
                                <form action="?page=pengurus" class="form-inline" method="post">
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
                                                    <a href="?page=laporan-pengurus&export=<?= $_POST['export'] ?>"
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
                                <div class="card-header py-3 rounded-2">
                                    <h4 class="card-title display-4 fs-2"
                                        style="font-weight: 500; font-family: 'Times New Roman', monospace;">
                                        Data Susunan Pengurus
                                    </h4>
                                    <div class="card-tools">
                                        <div class="text-start">
                                            <a href="?aksi=tambah-pengurus" aria-current="page">
                                                <button class="btn btn-danger" role="button">
                                                    <i class="fas fa-plus fa-fw fa-1x"></i>
                                                    Tambah Pengurus Masjid
                                                </button>
                                            </a>
                                            <a href="?page=pengurus" aria-current="page">
                                                <button class="btn btn-info" role="button">
                                                    <i class="fas fa-refresh fa-fw fa-1x"></i>
                                                    Refresh Halaman
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                    <?php require_once("../pengurus/function.php"); ?>
                                </div>
                                <div class="my-3 card-body">
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
                                                <table class="table table-striped-columns table-bordered"
                                                    id="datatable2">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center fw-normal">No.</th>
                                                            <th class="text-center fw-normal">Nama Pengurus</th>
                                                            <th class="text-center fw-normal">No Handphone</th>
                                                            <th class="text-center fw-normal">Jabatan</th>
                                                            <th class="text-center fw-normal">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $no = 1; ?>
                                                        <?php $n = 0; ?>
                                                        <?php $susunan = $pengurus->pengurus(); ?>
                                                        <?php foreach ($susunan as $data): ?>
                                                        <tr>
                                                            <td class="text-center fw-normal"><?php echo $no; ?></td>
                                                            <td class="text-center fw-normal">
                                                                <?php echo $data['nama_pengurus']; ?>
                                                            </td>
                                                            <td class="text-center fw-normal">
                                                                <?php echo $data['no_hp']; ?>
                                                            </td>
                                                            <td class="text-center fw-normal">
                                                                <?php echo $data['jabatan']; ?>
                                                            </td>
                                                            <td class="text-center fw-normal">
                                                                <a href="?aksi=edit-pengurus&id_pengurus=<?= $data['id_pengurus'] ?>"
                                                                    aria-current="page">
                                                                    <button type="button"
                                                                        class="btn btn-warning btn-sm">
                                                                        <i class="fas fa-fw fa-1x fa-edit"></i>
                                                                    </button>
                                                                </a>
                                                                <a href="?aksi=pengurus-hapus&id_pengurus=<?= $data['id_pengurus'] ?>"
                                                                    aria-current="page"
                                                                    onclick="return confirm('apakah data ini anda ingin hapus ?')">
                                                                    <button type="button" class="btn btn-danger btn-sm">
                                                                        <i class="fas fa-fw fa-1x fa-trash"></i>
                                                                    </button>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <?php $no++; ?>
                                                        <?php $base = $koneksi->query("SELECT count(id_pengurus) as jumlah FROM pengurus order by id_pengurus asc"); ?>
                                                        <?php $memo = $base->fetch_array(); ?>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                    <tfoot>
                                                        <th class="bg-success text-light" colspan="4">
                                                            Jumlah Pengurus Masjid
                                                        </th>
                                                        <th class="text-center">
                                                            <?php if ($memo['jumlah']) { ?>
                                                            <?php echo $memo['jumlah']; ?>
                                                            <?php } else { ?>
                                                            <?php echo $n; ?>
                                                            <?php } ?>
                                                        </th>
                                                    </tfoot>
                                                </table>
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