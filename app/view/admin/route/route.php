<?php
require_once("../../../config/config.php");
$ds = $koneksi->query("SELECT * FROM setting WHERE status_website = '1'");
$setting = mysqli_fetch_array($ds);
# <--- ==== ==== --->
# Files Model Awal
require_once("../../../model/authentication.php");
$model = new model\Authentication($koneksi);
require_once("../../../model/pengurus.php");
$pengurus = new model\pengurus($koneksi);
require_once("../../../model/kegiatan.php");
$activities = new model\kegiatan($koneksi);
require_once("../../../model/rekening.php");
$rek = new model\rekening($koneksi);
require_once("../../../model/keuangan.php");
$laporan = new model\keuangan($koneksi);
# Files Model Akhir
# <--- ==== ==== --->
# Files Controller Awal
require_once("../../../controller/controller.php");
$login = new controller\AuthenLogin($koneksi);
$susunan = new controller\susunan($koneksi);
$kegiatan = new controller\activities($koneksi);
$rekening = new controller\bank($koneksi);
$keuangan = new controller\laporan($koneksi);
# Files Controller Akhir
# <--- ==== ==== --->
# Page
if (!isset($_GET['page'])):
else:
    switch ($_GET['page']) {
        case 'beranda':
            require_once("../dashboard/index.php");
            break;

        case 'donasi':
            require_once("../donasi/donasi.php");
            break;

        case 'laporan-donasi':
            require_once("../donasi/laporan-donasi.php");
            break;

        case 'kegiatan':
            require_once("../kegiatan/kegiatan.php");
            break;

        case 'laporan-kegiatan':
            require_once("../kegiatan/laporan-kegiatan.php");
            break;

        case 'pengurus':
            require_once("../pengurus/pengurus.php");
            break;

        case 'laporan-pengurus':
            require_once("../pengurus/laporan-pdf.php");
            break;

        case 'rekening':
            require_once("../rekening/rekening.php");
            break;

        case 'keuangan':
            require_once("../laporan/laporan.php");
            break;

        case 'laporan-keuangan':
            require_once("../laporan/laporan-keuangan.php");
            break;

        case 'pegawai':
            require_once("../user/pegawai.php");
            break;

        case 'setting':
            require_once("../setting/edit.php");
            break;

        case 'profile':
            require_once("../profile/edit.php");
            break;

        case 'logout':
            if (isset($_SESSION['status'])) {
                unset($_SESSION['status']);
                session_unset();
                session_destroy();
                $_SESSION = array();
            }
            echo "<script>document.location.href = '../index.php';</script>";
            exit(0);
            break;

        default:
            require_once("../dashboard/index.php");
            break;
    }
endif;
# Action
if (!isset($_GET['aksi'])):
else:
    switch ($_GET['aksi']) {
            # Halaman Pengurus
        case 'tambah-pengurus':
            require_once("../pengurus/tambah.php");
            break;
        case 'edit-pengurus':
            require_once("../pengurus/edit.php");
            break;
        case 'pengurus-tambah':
            $susunan->tambah_pengurus();
            break;
        case 'pengurus-edit':
            $susunan->ubah_pengurus();
            break;
        case 'pengurus-hapus':
            $susunan->hapus_pengurus();
            break;
            # Halaman Pengurus

            # Halaman Kegiatan
        case 'tambah-kegiatan':
            require_once("../kegiatan/tambah.php");
            break;
        case 'edit-kegiatan':
            require_once("../kegiatan/edit.php");
            break;
        case 'kegiatan-tambah':
            $kegiatan->tambahkegiatan();
            break;
        case 'kegiatan-edit':
            $kegiatan->ubahkegiatan();
            break;
        case 'kegiatan-hapus':
            $kegiatan->hapuskegiatan();
            break;
            # Halaman Kegiatan

            # Halaman rekening
        case 'tambah-rekening':
            require_once("../rekening/tambah.php");
            break;
        case 'edit-rekening':
            require_once("../rekening/edit.php");
            break;
        case 'rekening-tambah':
            $rekening->tambahrekening();
            break;
        case 'rekening-edit':
            $rekening->ubahrekening();
            break;
        case 'rekening-hapus':
            $rekening->hapusrekening();
            break;
            # Halaman rekening

            # Halaman laporan
        case 'tambah-laporan-masuk':
            require_once("../laporan/tambah-masuk.php");
            break;
        case 'tambah-laporan-keluar':
            require_once("../laporan/tambah-keluar.php");
            break;
        case 'edit-laporan-masuk':
            require_once("../laporan/edit-masuk.php");
            break;
        case 'edit-laporan-keluar':
            require_once("../laporan/edit-keluar.php");
            break;
            # < -- === === --- >
        case 'laporan-tambah-masuk':
            $keuangan->tambah_uangmasuk();
            break;
        case 'laporan-tambah-keluar':
            $keuangan->tambah_uangkeluar();
            break;
        case 'laporan-ubah-masuk':
            $keuangan->ubah_uangmasuk();
            break;
        case 'laporan-ubah-keluar':
            $keuangan->ubah_uangkeluar();
            break;
        case 'laporan-hapus':
            $id = htmlspecialchars($_GET['id']);
            $table = "laporan_keuangan";
            $SQL = "DELETE FROM $table WHERE id = '$id'";
            $mysql = $koneksi->query($SQL);
            if ($mysql != "") {
                if ($mysql) {
                    header("location:../ui/header.php?page=keuangan");
                    exit(0);
                }
            } else {
                header("ocation:../ui/header.php?page=keuangan");
                exit(0);
            }
            break;
            # Halaman laporan

            # Halaman Pegawai Account
        case 'tambah-pegawai':
            require_once("../user/tambah.php");
            break;
        case 'tambah-account':
            $login->tambahAccount();
            break;
        case 'hapus-akun':
            $id = htmlspecialchars($_GET['id']);
            $table = "user";
            $SQL = "DELETE FROM $table WHERE id_user = '$id'";
            $mysql = $koneksi->query($SQL);
            if ($mysql != "") {
                if ($mysql) {
                    header("location:../ui/header.php?page=pegawai&dialog=delete");
                    exit(0);
                }
            } else {
                header("ocation:../ui/header.php?page=pegawai");
                exit(0);
            }
            break;
            # Halaman Pegawai Account

            # Halaman Profile Account
        case 'edit-data':
            $id = htmlspecialchars($_POST['id_user']);
            $nama = htmlspecialchars($_POST['nama_user']);
            $username = htmlspecialchars($_POST['username']);
            $akses = htmlspecialchars($_POST['akses']);
            # code user editing profile ...
            $table = "user";
            $updateProfile = "UPDATE $table SET nama_user = '$nama', username = '$username', akses = '$akses' WHERE id_user = '$id'";
            $data = $koneksi->query($updateProfile);
            if ($data != "") {
                if ($data) {
                    header("location:../ui/header.php?page=profile&id_user=$id&data=$id&dialog=change_data");
                    exit(0);
                }
            } else {
                header("location:../ui/header.php?page=profile&id_user=$id&data=$id");
                exit(0);
            }
            break;
        case 'edit-password':
            $new_password = md5(htmlspecialchars($_POST['new_password']), false);
            $old_password = md5(htmlspecialchars($_POST['old_password']), false);
            $new_password_verify = md5(htmlspecialchars($_POST['new_password_verify']), false);
            $id = htmlspecialchars($_POST['id_user']);
            # table cek password
            $table = "user";
            $data = $this->db->query("SELECT * FROM $table WHERE id_user = '$id'");
            $cekpassword = mysqli_fetch_array($data);
            # data update password
            if (password_verify($old_password, PASSWORD_DEFAULT) == md5($cekpassword['password'], false)) {
                header("location:../ui/header.php?page=profile&id_user=$id&change=$id");
                exit(0);
            }

            if ($new_password == $new_password_verify) {
                $SQL = "UPDATE $table SET password = '$new_password' WHERE id_user = '$id'";
                $queryz = $koneksi->query($SQL);
                if ($queryz != "") {
                    if ($queryz) {
                        header("location:../ui/header.php?page=profile&id_user=$id&change=$id&dialog=change_password");
                        exit(0);
                    }
                } else {
                    header("location:../ui/header.php?page=profile&id_user=$id&change=$id");
                    exit(0);
                }
            }
            break;
            # Halaman Profile Account


        default:
            require_once("../../../controller/controller.php");
            break;
    }
endif;