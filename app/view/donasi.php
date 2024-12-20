<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php require_once("../config/config.php"); ?>
        <?php $title = $koneksi->query("SELECT * FROM setting WHERE status_website = '1'")->fetch_array(); ?>
        <title>Donasi <?php echo $title['nama_website']; ?></title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
            media="all">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
            media="all">
        <style type="text/css">
        * {
            margin: 0;
            padding: 0;
            font-family: 'Times New Roman';
            font-weight: 300;
            font-size: 16px;
            font-style: normal;
        }

        body {
            background: rgba(100, 100, 100, 0.600);
        }

        .card {
            width: 550px;
        }

        @media (max-width:720px) {
            .card {
                max-width: 100%;
            }
        }
        </style>
    </head>

    <body onload="startTime()">
        <!-- Start Header Section -->
        <header class="header">
            <div class="navbar navbar-expand-lg bg-body-secondary position-sticky sticky-sm-bottom">
                <div class="container-fluid">
                    <a href="donasi.php" class="navbar-brand fs-6 text-start text-dark">
                        Donasi <?php echo ucwords(ucfirst($title['nama_website'])) ?> </a>
                    <button class='navbar-toggler' data-bs-toggle='collapse' data-bs-target='#navbarSupportNavigation'>
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="navbar-collapse collapsed" id="navbarSupportNavigation">
                        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="index.php">Beranda</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="donasi.php">Donasi
                                    <?php echo ucwords(ucfirst($title['nama_website'])) ?></a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-auto col-md-auto">
                        <div id="days" style="font-size: 12px;"></div>
                        <div style="font-size: 12px;" id="clock"></div>
                    </div>
                </div>
            </div>
        </header>
        <!-- End Header Section -->
        <!-- === Body Awal Layout -->
        <div class="container-fluid mt-4 pt-5">
            <div class="d-flex justify-content-center align-items-center flex-wrap mt-1 pt-1">
                <div class="card shadow mb-4">
                    <div class="card-header py-2">
                        <h4 class="card-title text-center">
                            Donasi Masjid
                        </h4>
                    </div>
                    <?php if (isset($_POST['btnSendTransfer'])): ?>
                    <?php
                    $donatur = htmlspecialchars($_POST['nama_donatur']);
                    $handphone = htmlspecialchars($_POST['no_hp']);
                    $nominal = htmlspecialchars($_POST['nominal_transfer']);
                    /*/ Input File Foto /*/
                    # Input File Foto
                    $ekstensi_diperbolehkan_file = array('jpg', 'jpeg', 'jfif', 'png');
                    $file = htmlentities($_FILES['bukti_transfer']['name']) ? htmlspecialchars($_FILES['bukti_transfer']['name']) : $_FILES['bukti_transfer']['name'];
                    $x_file = explode('.', $file);
                    $ekstensi_file = strtolower(end($x_file));
                    $ukuran_file = $_FILES['bukti_transfer']['size'];
                    $file_tmp_file = $_FILES['bukti_transfer']['tmp_name'];

                    if (in_array($ekstensi_file, $ekstensi_diperbolehkan_file) === true) {
                        if ($ukuran_file < 10440070) {
                            move_uploaded_file($file_tmp_file, "../../assets/donatur/" . $file);
                        } else {
                            echo "Tidak Dapat Ter - Upload Size Gambar";
                            exit;
                        }
                    } else {
                        echo "Tidak dapat Ter - Kirim File Foto";
                        exit;
                    }
                    /*/ Input File Foto /*/
                    $table = "donasi";
                    $SQL = "INSERT INTO $table SET nama_donatur='$donatur', no_hp='$handphone', bukti_transfer='$file', nominal_transfer='$nominal'";
                    $queryz = $koneksi->query($SQL);
                    if ($queryz) {
                        echo "<script>document.location.href = 'index.php';</script>";
                        exit;
                    } else {
                        echo "<script>document.location.href = 'donasi.php';</script>";
                        exit;
                    }
                    ?>
                    <?php endif; ?>
                    <div class="card-body">
                        <div class="col-sm-12 col-md-12">
                            <p style="font-size: 13px;" class="fst-normal fw-normal">
                                Serta melakukan Konfirmasi transfer dengan mengupload bukti transfer
                                melalui form dibawah ini:
                            </p>
                        </div>
                        <form action="donasi.php" role="form" enctype="multipart/form-data" method="post">
                            <div class="form-group">
                                <div class="form-inline row justify-content-start align-items-center flex-wrap">
                                    <div class="form-label col-sm-4 col-md-4">
                                        <label for="nama_donatur" class="label label-default">Nama Donatur</label>
                                    </div>
                                    <div class="col-sm-1 col-md-1">:</div>
                                    <div class="col-sm-6 col-md-6">
                                        <input type="text" maxlength="50" name="nama_donatur" class="form-control"
                                            placeholder="Nama Lengkap" required id="nama_donatur"
                                            style="font-size: 12px;">
                                    </div>
                                </div>
                                <div class="my-2"></div>
                                <div class="form-inline row justify-content-start align-items-center flex-wrap">
                                    <div class="form-label col-sm-4 col-md-4">
                                        <label for="no_hp" class="label label-default">No. Handphone</label>
                                    </div>
                                    <div class="col-sm-1 col-md-1">:</div>
                                    <div class="col-sm-6 col-md-6">
                                        <input type="text" maxlength="13" inputmode="numeric" required name="no_hp"
                                            class="form-control" placeholder="No. Handphone" id="no_hp"
                                            style="font-size: 12px;">
                                    </div>
                                </div>
                                <div class="my-2"></div>
                                <div class="form-inline row justify-content-start align-items-center flex-wrap">
                                    <div class="form-label col-sm-4 col-md-4">
                                        <label for="no_nominal_transferhp" class="label label-default">Nominal
                                            Transfer</label>
                                    </div>
                                    <div class="col-sm-1 col-md-1">:</div>
                                    <div class="col-sm-6 col-md-6">
                                        <input type="text" maxlength="13" inputmode="numeric" required
                                            name="nominal_transfer" class="form-control"
                                            placeholder="Nominal Trasnfer dari bukti transfer ..." id="nominal_transfer"
                                            style="font-size: 12px;">
                                    </div>
                                </div>
                                <div class="my-2"></div>
                                <div class="form-inline row justify-content-start align-items-center flex-wrap">
                                    <div class="form-label col-sm-4 col-md-4">
                                        <label for="bukti_transfer" class="label label-default">Bukti Transfer</label>
                                    </div>
                                    <div class="col-sm-1 col-md-1">:</div>
                                    <div class="col-sm-6 col-md-6">
                                        <input type="file" required name="bukti_transfer"
                                            class="form-control form-control-file" id="bukti_transfer"
                                            style="font-size: 12px;">
                                    </div>
                                </div>
                                <hr>
                                <div class="bg-body-secondary">
                                    <marquee class="fst-normal fw-normal" scrollamount="3" loop="infinite"
                                        direction="left">
                                        <div style="font-size: 12px;">Untuk melakukan donasi atau memberikan infak
                                            maupun sodaqoh melalui <b>Masjid Donasi</b> dapat tranfer ke rekening
                                            berikut :
                                            <?php $rekening = $koneksi->query("SELECT * FROM bank order by nama_bank asc"); ?>
                                            <?php foreach ($rekening as $rek): ?>
                                            <div style="font-size: 12px;">
                                                <?php echo $rek['nama_bank'] . " : " . $rek['no_rek']; ?></div>
                                            <?php endforeach; ?>
                                        </div>
                                    </marquee>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="text-end">
                                    <button type="submit" name="btnSendTransfer" class="btn btn-primary">
                                        Kirim Bukti
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- === Body Akhir Layout -->
    </body>
    <!-- === Layout Awal Script -->
    <script crossorigin="anonymous" lang="javascript"
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>
    <script crossorigin="anonymous" lang="javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js">
    </script>
    <script crossorigin="anonymous" lang="javascript"
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js">
    </script>
    <script type="text/javascript">
    function startTime() {
        var day = ["minggu", "senin", "selasa", "rabu", "kamis", "jumat", "sabtu"];
        var month = ["januari", "februari", "maret", "april", "mei", "juni", "juli", "agustus", "september", "oktober",
            "november", "desember"
        ];
        var today = new Date();
        var h = today.getHours();
        var tahun = today.getFullYear();
        var m = today.getMinutes();
        var s = today.getSeconds();
        m = checkTime(m);
        s = checkTime(s);
        document.getElementById('days').innerHTML =
            " " + day[today.getDay()] + ", " + today.getDate() + " " + month[today.getMonth()] + " " + tahun;
        document.getElementById('clock').innerHTML =
            "Waktu Sekarang : " +
            h + " : " + m + " : " + s + "";
        var t = setTimeout(startTime, 500);
    }

    function checkTime(i) {
        if (i < 10) {
            i = "0" + i
        }; // add zero in front of numbers < 10
        return i;
    }
    </script>
    <!-- === Layout Akhir Script -->

</html>