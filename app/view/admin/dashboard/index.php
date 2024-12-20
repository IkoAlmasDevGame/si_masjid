<?php require_once("../ui/header.php"); ?>
<?php require_once("../ui/sidebar.php"); ?>
<?php
require_once("../../../config/config.php");
$pengurus = $koneksi->query("SELECT count(id_pengurus) as pengurus FROM pengurus order by id_pengurus asc");
$i = mysqli_fetch_array($pengurus);
# Kegiatan
$kegiatan = $koneksi->query("SELECT count(id_kegiatan) as kegiatan FROM kegiatan order by id_kegiatan asc");
$k = mysqli_fetch_array($kegiatan);
# donatur
$donatur = $koneksi->query("SELECT count(nama_donatur) as donatur FROM donasi order by id_donasi asc");
$d = mysqli_fetch_array($donatur);
# Laporan
$laporan = $koneksi->query("SELECT * FROM laporan_keuangan order by id desc limit 1");
$l = mysqli_fetch_array($laporan);
?>
<!-- === Body Layout === -->
<?php if ($_SESSION['akses'] == 'admin'): ?>
<section class="content">
    <div class="content-wrapper">
        <div class="content-header">
            <div class="d-flex justify-content-center align-items-center">
                <div class="col-sm-10 col-md-10 py-3 my-2 rounded-2 bg-info">
                    <marquee class="fst-normal fw-normal" scrollamount="15" loop="infinite" direction="left">
                        <div class="text-light display-4 fw-semibold fs-5">
                            <?php echo ucwords(ucfirst("Selamat Datang" . ", " . $_SESSION['nama'])) ?>
                        </div>
                    </marquee>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-evenly align-items-center flex-wrap">
            <!-- Pengurus Masjid -->
            <div class="card col-sm-2 col-md-2 mb-2">
                <div class="card-header py-1">
                    <h4 class="card-title fs-5 display-4 fw-normal text-center">Pengurus Masjid</h4>
                </div>
                <div class="card-footer fs-3 text-center text-dark">
                    <?php echo $i['pengurus'] . " Orang"; ?>
                </div>
            </div>
            <!-- Keuangan Laporan -->
            <div class="card col-sm-2 col-md-2 mb-2">
                <div class="card-header py-1">
                    <h4 class="card-title fs-5 display-4 fw-normal text-center">Laporan Keuangan</h4>
                </div>
                <div class="card-footer fs-3 text-dark text-center">
                    <?php echo "Rp. " . number_format($l['saldo'], 2); ?>
                </div>
            </div>
            <!-- Kegiatan -->
            <div class="card col-sm-2 col-md-2 mb-2">
                <div class="card-header py-1">
                    <h4 class="card-title fs-5 display-4 fw-normal text-center">Kegiatan Masjid</h4>
                </div>
                <div class="card-footer fs-3 text-center text-dark">
                    <?php echo $k['kegiatan'] . " Kegiatan"; ?>
                </div>
            </div>
            <!-- Donatur -->
            <div class="card col-sm-2 col-md-2 mb-2">
                <div class="card-header py-1">
                    <h4 class="card-title fs-5 display-4 fw-normal text-center">Jumlah Donatur</h4>
                </div>
                <div class="card-footer fs-3 text-center text-dark">
                    <?php echo $d['donatur'] . " Donatur"; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<!-- === Body Layout === -->
<?php require_once("../ui/footer.php"); ?>