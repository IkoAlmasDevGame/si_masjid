<?php

namespace controller;

use model\Authentication;
use model\kegiatan;
use model\keuangan;
use model\pengurus;
use model\rekening;

class AuthenLogin
{
    protected $konfig;
    public function __construct($konfig)
    {
        $this->konfig = new Authentication($konfig);
    }

    public function SignIn()
    {
        $userInput = htmlspecialchars($_POST['username']);
        $passInput = htmlspecialchars($_POST['password']);
        $password = md5($passInput, false);
        password_verify($password, PASSWORD_DEFAULT);
        $data = $this->konfig->userAuth($userInput, $password);
        if ($data === true) {
            return true;
        } else {
            return false;
        }
    }

    public function tambahAccount()
    {
        $nama_user = htmlspecialchars($_POST['nama_user']);
        $username = htmlspecialchars($_POST['username']);
        $password = md5(htmlspecialchars($_POST['password']), false);
        $akses = htmlspecialchars($_POST['akses']);
        $data = $this->konfig->tambahAccount($nama_user, $username, $password, $akses);
        if ($data === true) {
            return true;
        } else {
            return false;
        }
    }
}

class susunan
{
    protected $konfig;
    public function __construct($konfig)
    {
        $this->konfig = new pengurus($konfig);
    }

    public function tambah_pengurus()
    {
        $nama_pengurus = htmlspecialchars($_POST['nama_pengurus']) ? htmlentities($_POST['nama_pengurus']) : strip_tags($_POST['nama_pengurus']);
        $no_hp = htmlspecialchars($_POST['no_hp']) ? htmlentities($_POST['no_hp']) : strip_tags($_POST['no_hp']);
        $jabatan = htmlspecialchars($_POST['jabatan']) ? htmlentities($_POST['jabatan']) : strip_tags($_POST['jabatan']);
        $data = $this->konfig->tambahpengurus($nama_pengurus, $no_hp, $jabatan);
        if ($data === true) {
            return true;
        } else {
            return false;
        }
    }

    public function ubah_pengurus()
    {
        $nama_pengurus = htmlspecialchars($_POST['nama_pengurus']) ? htmlentities($_POST['nama_pengurus']) : strip_tags($_POST['nama_pengurus']);
        $no_hp = htmlspecialchars($_POST['no_hp']) ? htmlentities($_POST['no_hp']) : strip_tags($_POST['no_hp']);
        $jabatan = htmlspecialchars($_POST['jabatan']) ? htmlentities($_POST['jabatan']) : strip_tags($_POST['jabatan']);
        $id_pengurus = htmlspecialchars($_POST['id_pengurus']) ? htmlentities($_POST['id_pengurus']) : strip_tags($_POST['id_pengurus']);
        $data = $this->konfig->ubahpengurus($nama_pengurus, $no_hp, $jabatan, $id_pengurus);
        if ($data === true) {
            return true;
        } else {
            return false;
        }
    }

    public function hapus_pengurus()
    {
        $id_pengurus = htmlspecialchars($_GET['id_pengurus']) ? htmlentities($_GET['id_pengurus']) : strip_tags($_GET['id_pengurus']);
        $data = $this->konfig->hapuspengurus($id_pengurus);
        if ($data === true) {
            return true;
        } else {
            return false;
        }
    }
}

class activities
{
    protected $konfig;
    public function __construct($konfig)
    {
        $this->konfig = new kegiatan($konfig);
    }

    public function tambahkegiatan()
    {
        $judul_kegiatan = htmlspecialchars($_POST['judul_kegiatan']);
        $keterangan = htmlspecialchars($_POST['keterangan']);
        $data = $this->konfig->tambah_kegiatan($judul_kegiatan, $keterangan);
        if ($data === true) {
            return true;
        } else {
            return false;
        }
    }

    public function ubahkegiatan()
    {
        $judul_kegiatan = htmlspecialchars($_POST['judul_kegiatan']);
        $keterangan = htmlspecialchars($_POST['keterangan']);
        $id_kegiatan = htmlspecialchars($_POST['id_kegiatan']);
        $data = $this->konfig->ubah_kegiatan($judul_kegiatan, $keterangan, $id_kegiatan);
        if ($data === true) {
            return true;
        } else {
            return false;
        }
    }

    public function hapuskegiatan()
    {
        $id_kegiatan = htmlspecialchars($_GET['id_kegiatan']);
        $data = $this->konfig->hapus_kegiatan($id_kegiatan);
        if ($data === true) {
            return true;
        } else {
            return false;
        }
    }
}


class bank
{
    protected $konfig;
    public function __construct($konfig)
    {
        $this->konfig = new rekening($konfig);
    }

    public function tambahrekening()
    {
        $no_rek = htmlspecialchars($_POST['no_rek']);
        $nama_bank = htmlspecialchars($_POST['nama_bank']);
        $data = $this->konfig->tambah_rekening($no_rek, $nama_bank);
        if ($data === true) {
            return true;
        } else {
            return false;
        }
    }

    public function ubahrekening()
    {
        $no_rek = htmlspecialchars($_POST['no_rek']);
        $nama_bank = htmlspecialchars($_POST['nama_bank']);
        $id = htmlspecialchars($_POST['id']);
        $data = $this->konfig->ubah_rekening($no_rek, $nama_bank, $id);
        if ($data === true) {
            return true;
        } else {
            return false;
        }
    }

    public function hapusrekening()
    {
        $id = htmlspecialchars($_GET['id']);
        $data = $this->konfig->hapus_rekening($id);
        if ($data === true) {
            return true;
        } else {
            return false;
        }
    }
}


class laporan
{
    protected $konfig;
    public function __construct($konfig)
    {
        $this->konfig = new keuangan($konfig);
    }

    public function tambah_uangmasuk()
    {
        $tgl_masuk = htmlspecialchars($_POST['tgl_masuk']);
        $uang_masuk = htmlspecialchars($_POST['uang_masuk']);
        $ket_masuk = htmlspecialchars($_POST['ket_masuk']);
        $data = $this->konfig->tambahuangmasuk($tgl_masuk, $uang_masuk, $ket_masuk);
        if ($data === true) {
            return true;
        } else {
            return false;
        }
    }

    public function tambah_uangkeluar()
    {
        $tgl_keluar = htmlspecialchars($_POST['tgl_keluar']);
        $uang_keluar = htmlspecialchars($_POST['uang_keluar']);
        $ket_keluar = htmlspecialchars($_POST['ket_keluar']);
        $data = $this->konfig->tambahuangkeluar($tgl_keluar, $uang_keluar, $ket_keluar);
        if ($data === true) {
            return true;
        } else {
            return false;
        }
    }

    public function ubah_uangmasuk()
    {
        $tgl_masuk = htmlspecialchars($_POST['tgl_masuk']);
        $uang_masuk = htmlspecialchars($_POST['uang_masuk']);
        $ket_masuk = htmlspecialchars($_POST['ket_masuk']);
        $data = $this->konfig->ubahuangmasuk($uang_masuk, $ket_masuk, $tgl_masuk);
        if ($data === true) {
            return true;
        } else {
            return false;
        }
    }

    public function ubah_uangkeluar()
    {
        $tgl_keluar = htmlspecialchars($_POST['tgl_keluar']);
        $uang_keluar = htmlspecialchars($_POST['uang_keluar']);
        $ket_keluar = htmlspecialchars($_POST['ket_keluar']);
        $data = $this->konfig->ubahuangkeluar($uang_keluar, $ket_keluar, $tgl_keluar);
        if ($data === true) {
            return true;
        } else {
            return false;
        }
    }
}