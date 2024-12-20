<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Kegiatan Mesjid</title>
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
                        style="font-weight: 500; font-family: 'Times New Roman', monospace;">Kegiatan Mesjid</h4>
                    <div class="breadcrumb d-flex justify-content-end align-items-end flex-wrap">
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=beranda" aria-current="page"
                                class="text-decoration-none text-primary">Beranda</a>
                        </li>
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=kegiatan" aria-current="page" class="text-decoration-none active">Kegiatan
                                Mesjid</a>
                        </li>
                    </div>
                </div>
                <hr class="text-dark">
                <div class="z-n1 py-3">
                    <section class="content">
                        <div class="content-wrapper">
                            <div class="row justify-content-start align-items-start">
                                <form action="?page=kegiatan" class="form-inline" method="post">
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
                                                    <a href="?page=laporan-kegiatan&export=<?= $_POST['export'] ?>"
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
                                <div class="card-header py-3">
                                    <h4 class="card-title display-4 fs-2"
                                        style="font-weight: 500; font-family: 'Times New Roman', monospace;">
                                        Data Kegiatan Mesjid
                                    </h4>
                                    <div class="card-tools">
                                        <div class="text-start">
                                            <a href="?aksi=tambah-kegiatan" aria-current="page">
                                                <button class="btn btn-danger" role="button">
                                                    <i class="fas fa-plus fa-fw fa-1x"></i>
                                                    Tambah Kegiatan Masjid
                                                </button>
                                            </a>
                                            <a href="?page=kegiatan" aria-current="page">
                                                <button class="btn btn-info" role="button">
                                                    <i class="fas fa-refresh fa-fw fa-1x"></i>
                                                    Refresh Halaman
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                    <?php require_once("../kegiatan/function.php"); ?>
                                </div>
                                <div class="card-body my-3">
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
                                        <div class="table-responsive">
                                            <div class="container-fluid">
                                                <table class="table table-striped-columns table-bordered"
                                                    id="datatable2">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center fw-normal">No.</th>
                                                            <th class="text-center fw-normal">Tanggal Diterbitkan</th>
                                                            <th class="text-center fw-normal">Judul Kegiatan</th>
                                                            <th class="text-center fw-normal">Keterangan Kegiatan</th>
                                                            <th class="text-center fw-normal">Foto</th>
                                                            <th class="text-center fw-normal">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $no = 1; ?>
                                                        <?php $data = $activities->kegiatan(); ?>
                                                        <?php foreach ($data as $row): ?>
                                                        <tr>
                                                            <td class="text-center fw-normal"><?php echo $no; ?></td>
                                                            <td class="text-center fw-normal">
                                                                <?php echo $row['tanggal_artikel']; ?>
                                                            </td>
                                                            <td class="text-center fw-normal">
                                                                <?php echo $row['judul_kegiatan']; ?>
                                                            </td>
                                                            <td class="text-center fw-normal">
                                                                <textarea class="form-control" readonly rows="6"
                                                                    style="width: 250px; min-width: 100%;"><?php echo $row['keterangan']; ?></textarea>
                                                            </td>
                                                            <td class="text-center">
                                                                <div class="text-center">
                                                                    <img src="../../../../assets/image/<?= $row['foto'] ?>"
                                                                        alt="" class="img-responsive"
                                                                        style="width: 100px; max-width: 100%;">
                                                                </div>
                                                            </td>
                                                            <td class="text-center">
                                                                <a href="?aksi=kegiatan-hapus&id_kegiatan=<?= $row['id_kegiatan'] ?>"
                                                                    aria-current="page"
                                                                    onclick="return confirm('Apakah anda ingin menghapus data kegiatan ini ?')">
                                                                    <button type="button" class="btn btn-danger">
                                                                        <i class="fas fa-trash fa-fw fa-1x"></i>
                                                                    </button>
                                                                </a>
                                                                <a href="?aksi=edit-kegiatan&id_kegiatan=<?= $row['id_kegiatan'] ?>"
                                                                    aria-current="page">
                                                                    <button type="button" class="btn btn-warning">
                                                                        <i class="fas fa-edit fa-fw fa-1x"></i>
                                                                    </button>
                                                                </a>
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
                    </section>
                </div>
            </div>
        </div>
        <?php require_once("../ui/footer.php"); ?>