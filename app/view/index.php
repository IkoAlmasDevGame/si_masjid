<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php require_once("../config/config.php"); ?>
        <?php $title = $koneksi->query("SELECT * FROM setting WHERE status_website = '1'")->fetch_array(); ?>
        <title><?php echo $title['nama_website']; ?></title>
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
                    <a href="index.php" class="navbar-brand fs-6 text-start text-dark">
                        <?php echo ucwords(ucfirst($title['nama_website'])) ?> </a>
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
        <div class="container-fluid my-5 py-5">
            <div class="d-flex justify-content-center align-items-center flex-wrap">
                <h3 class="display-4 fs-3">SILAHKAN BUAT SECTION BUATAN ANDA SENDIRI ....</h3>
            </div>
        </div>
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