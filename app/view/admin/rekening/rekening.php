<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Rekening Bank Masjid</title>
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
                        style="font-weight: 500; font-family: 'Times New Roman', monospace;">Rekening Bank</h4>
                    <div class="breadcrumb d-flex justify-content-end align-items-end flex-wrap">
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=beranda" aria-current="page"
                                class="text-decoration-none text-primary">Beranda</a>
                        </li>
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=rekening" aria-current="page" class="text-decoration-none active">Rekening
                                Bank</a>
                        </li>
                    </div>
                </div>
                <hr class="text-dark">
                <div class="z-n1 py-3">
                    <section class="content">
                        <div class="content-wrapper">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h4 class="card-title display-4 fs-2"
                                        style="font-weight: 500; font-family: 'Times New Roman', monospace;">
                                        Rekening Bank Masjid
                                    </h4>
                                    <div class="card-tools">
                                        <div class="text-start">
                                            <a href="?aksi=tambah-rekening" aria-current="page">
                                                <button class="btn btn-danger" role="button">
                                                    <i class="fas fa-plus fa-fw fa-1x"></i>
                                                    Tambah rekening Masjid
                                                </button>
                                            </a>
                                            <a href="?page=rekening" aria-current="page">
                                                <button class="btn btn-info" role="button">
                                                    <i class="fas fa-refresh fa-fw fa-1x"></i>
                                                    Refresh Halaman
                                                </button>
                                            </a>
                                        </div>
                                    </div>
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
                                                <table class="table table-bordered table-striped-columns"
                                                    id="datatable1">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center fw-normal">No.</th>
                                                            <th class="text-center fw-normal">Nomor Rekening</th>
                                                            <th class="text-center fw-normal">Nama Bank</th>
                                                            <th class="text-center fw-normal">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $no = 1; ?>
                                                        <?php $data = $rek->rekening(); ?>
                                                        <?php foreach ($data as $row): ?>
                                                        <tr>
                                                            <td class="text-center fw-normal"><?php echo $no; ?></td>
                                                            <td class="text-center fw-normal">
                                                                <?php echo $row['no_rek']; ?>
                                                            </td>
                                                            <td class="text-center fw-normal">
                                                                <?php echo $row['nama_bank']; ?>
                                                            </td>
                                                            <td class="text-center">
                                                                <a href="?aksi=rekening-hapus&id=<?= $row['id'] ?>"
                                                                    aria-current="page"
                                                                    onclick="return confirm('Apakah anda ingin menghapus data rekening ini ?')">
                                                                    <button type="button" class="btn btn-danger">
                                                                        <i class="fas fa-trash fa-fw fa-1x"></i>
                                                                    </button>
                                                                </a>
                                                                <a href="?aksi=edit-rekening&id=<?= $row['id'] ?>"
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
        <?php require_once("../ui/footer.php") ?>