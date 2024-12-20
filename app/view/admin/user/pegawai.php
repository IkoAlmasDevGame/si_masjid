<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pegawai Masjid</title>
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
                        style="font-weight: 500; font-family: 'Times New Roman', monospace;">Data Account Pegawai Masjid
                    </h4>
                    <div class="breadcrumb d-flex justify-content-end align-items-end flex-wrap">
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=beranda" aria-current="page"
                                class="text-decoration-none text-primary">Beranda</a>
                        </li>
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=pegawai" aria-current="page" class="text-decoration-none active">Data Account
                                Pegawai Masjid</a>
                        </li>
                    </div>
                </div>
                <hr class="text-dark">
                <div class="z-n1 py-3">
                    <section class="content">
                        <div class="content-wrapper">
                            <div class="card shadow">
                                <div class="card-header py-2">
                                    <h4 class="card-title fs-4 display-4 fw-normal">Data Account Pegawai Masjid</h4>
                                    <hr>
                                    <?php require_once("../user/function.php"); ?>
                                </div>
                                <div class="card-body my-1">
                                    <div class="card-tools">
                                        <div class="text-start">
                                            <a href="?page=pegawai" aria-current="page">
                                                <button type="button" class="btn btn-info">
                                                    <i class="fas fa-fw fa-refresh fa-1x"></i>
                                                    Muat Ulang Halaman
                                                </button>
                                            </a>
                                            <a href="?aksi=tambah-pegawai" aria-current="page">
                                                <button type="button" class="btn btn-danger">
                                                    <i class="fas fa-fw fa-plus fa-1x"></i>
                                                    Tambah Account Pegawai
                                                </button>
                                            </a>
                                        </div>
                                        <div class="d-flex justify-content-end align-items-end">
                                            <div class="col-sm-3 col-md-3 py-2 my-0 rounded-2 bg-info">
                                                <marquee class="fst-normal fw-normal" scrollamount="10" loop="infinite"
                                                    direction="left">
                                                    <div class="text-light display-4 fw-semibold fs-5">
                                                        <?php echo ucwords(ucfirst(salam() . ", " . $_SESSION['nama'])) ?>
                                                    </div>
                                                </marquee>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer my-2">
                                        <div class="table-responsive">
                                            <div class="container-fluid">
                                                <table class="table table-bordered table-striped" id="datatable3">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center fw-normal">No.</th>
                                                            <th class="text-center fw-normal">Nama Account</th>
                                                            <th class="text-center fw-normal">Username</th>
                                                            <th class="text-center fw-normal">Jabatan</th>
                                                            <th class="text-center fw-normal">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $no = 1; ?>
                                                        <?php $SQL = $model->Account(); ?>
                                                        <?php foreach ($SQL as $row): ?>
                                                        <tr>
                                                            <td class="text-center fw-normal">
                                                                <?php echo $no; ?>
                                                            </td>
                                                            <td class="text-center fw-normal">
                                                                <?php echo ucfirst($row['nama_user']); ?>
                                                            </td>
                                                            <td class="text-center fw-normal">
                                                                <?php echo ucfirst($row['username']); ?>
                                                            </td>
                                                            <td class="text-center fw-normal">
                                                                <?php echo ucfirst($row['akses']); ?>
                                                            </td>
                                                            <td class="text-center fw-normal">
                                                                <?php if ($row['nama_user'] == $_SESSION['nama']): ?>
                                                                <div class="fw-normal">Tidak Bisa dihapus ...</div>
                                                                <?php elseif ($row['akses']): ?>
                                                                <a href="?aksi=hapus-akun&id=<?= $row['id_user'] ?>"
                                                                    onclick="return confirm('Apakah anda ingin menghapus akun ini ?')"
                                                                    aria-current="page" class="btn btn-sm btn-danger">
                                                                    <i class="fas fa-fw fa-1x fa-trash"></i>
                                                                </a>
                                                                <?php endif; ?>
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