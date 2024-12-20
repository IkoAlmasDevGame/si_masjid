<?php

namespace model;

class keuangan
{
    protected $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function laporan()
    {
        $SQL = "SELECT * FROM laporan_keuangan order by id asc";
        return $this->db->query($SQL);
    }

    public function tambahuangmasuk($tgl_masuk, $uang_masuk, $ket_masuk)
    {
        $tgl_masuk = htmlspecialchars($_POST['tgl_masuk']);
        $uang_masuk = htmlspecialchars($_POST['uang_masuk']);
        $ket_masuk = htmlspecialchars($_POST['ket_masuk']);
        $table = "laporan_keuangan";
        $masuk = "INSERT INTO $table SET tgl_masuk = '$tgl_masuk', uang_masuk = '$uang_masuk', ket_masuk = '$ket_masuk'";
        $mysql = $this->db->query($masuk);
        if ($mysql != "") {
            if ($mysql) {
                header("location:../ui/header.php?page=keuangan");
                exit(0);
            }
        } else {
            header("location:../ui/header.php?aksi=tambah-laporan-masuk");
            exit(0);
        }
    }

    public function tambahuangkeluar($tgl_keluar, $uang_keluar, $ket_keluar)
    {
        $tgl_keluar = htmlspecialchars($_POST['tgl_keluar']);
        $uang_keluar = htmlspecialchars($_POST['uang_keluar']);
        $ket_keluar = htmlspecialchars($_POST['ket_keluar']);
        $table = "laporan_keuangan";
        $keluar = "INSERT INTO $table SET tgl_keluar = '$tgl_keluar', uang_keluar = '$uang_keluar', ket_keluar = '$ket_keluar'";
        $mysql = $this->db->query($keluar);
        if ($mysql != "") {
            if ($mysql) {
                header("location:../ui/header.php?page=keuangan");
                exit(0);
            }
        } else {
            header("location:../ui/header.php?aksi=tambah-laporan-keluar");
            exit(0);
        }
    }

    public function ubahuangmasuk($uang_masuk, $ket_masuk, $tgl_masuk)
    {
        $tgl_masuk = htmlspecialchars($_POST['tgl_masuk']);
        $uang_masuk = htmlspecialchars($_POST['uang_masuk']);
        $ket_masuk = htmlspecialchars($_POST['ket_masuk']);
        $table = "laporan_keuangan";
        $masuk = "UPDATE $table SET uang_masuk = '$uang_masuk', ket_masuk = '$ket_masuk' WHERE tgl_masuk = '$tgl_masuk'";
        $mysql = $this->db->query($masuk);
        if ($mysql != "") {
            if ($mysql) {
                header("location:../ui/header.php?page=keuangan");
                exit(0);
            }
        } else {
            header("location:../ui/header.php?aksi=edit-laporan-masuk&tanggal=$tgl_masuk");
            exit(0);
        }
    }

    public function ubahuangkeluar($uang_keluar, $ket_keluar, $tgl_keluar)
    {
        $tgl_keluar = htmlspecialchars($_POST['tgl_keluar']);
        $uang_keluar = htmlspecialchars($_POST['uang_keluar']);
        $ket_keluar = htmlspecialchars($_POST['ket_keluar']);
        $table = "laporan_keuangan";
        $keluar = "UPDATE $table SET uang_keluar = '$uang_keluar', ket_keluar = '$ket_keluar' WHERE tgl_keluar = '$tgl_keluar'";
        $mysql = $this->db->query($keluar);
        if ($mysql != "") {
            if ($mysql) {
                header("location:../ui/header.php?page=keuangan");
                exit(0);
            }
        } else {
            header("location:../ui/header.php?aksi=edit-laporan-keluar&tanggal=$tgl_keluar");
            exit(0);
        }
    }
}