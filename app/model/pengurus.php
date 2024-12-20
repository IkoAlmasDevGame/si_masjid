<?php

namespace model;

class pengurus
{
    protected $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function pengurus()
    {
        $SQL = "SELECT * FROM pengurus order by id_pengurus asc";
        return $this->db->query($SQL);
    }

    public function tambahpengurus($nama_pengurus, $no_hp, $jabatan)
    {
        if (empty($_POST['nama_pengurus']) || empty($_POST['no_hp']) || empty($_POST['jabatan'])):
            header("location:../ui/header.php?aksi=tambah-pengurus");
            exit(0);
        else:
            $nama_pengurus = htmlspecialchars($_POST['nama_pengurus']) ? htmlentities($_POST['nama_pengurus']) : strip_tags($_POST['nama_pengurus']);
            $no_hp = htmlspecialchars($_POST['no_hp']) ? htmlentities($_POST['no_hp']) : strip_tags($_POST['no_hp']);
            $jabatan = htmlspecialchars($_POST['jabatan']) ? htmlentities($_POST['jabatan']) : strip_tags($_POST['jabatan']);
            # database
            $table = "pengurus";
            $SQL = "INSERT INTO $table SET nama_pengurus='$nama_pengurus', no_hp='$no_hp', jabatan='$jabatan'";
            $data = $this->db->query($SQL);
            if ($data != "") {
                if ($data) {
                    header("location:../ui/header.php?aksi=tambah-pengurus&dialog=success");
                    exit(0);
                }
            } else {
                header("location:../ui/header.php?aksi=tambah-pengurus");
                exit(0);
            }
        endif;
    }

    public function ubahpengurus($nama_pengurus, $no_hp, $jabatan, $id_pengurus)
    {
        $nama_pengurus = htmlspecialchars($_POST['nama_pengurus']) ? htmlentities($_POST['nama_pengurus']) : strip_tags($_POST['nama_pengurus']);
        $no_hp = htmlspecialchars($_POST['no_hp']) ? htmlentities($_POST['no_hp']) : strip_tags($_POST['no_hp']);
        $jabatan = htmlspecialchars($_POST['jabatan']) ? htmlentities($_POST['jabatan']) : strip_tags($_POST['jabatan']);
        $id_pengurus = htmlspecialchars($_POST['id_pengurus']) ? htmlentities($_POST['id_pengurus']) : strip_tags($_POST['id_pengurus']);
        # database
        $table = "pengurus";
        $SQL = "UPDATE $table SET nama_pengurus='$nama_pengurus', no_hp='$no_hp', jabatan='$jabatan' WHERE id_pengurus = '$id_pengurus'";
        $data = $this->db->query($SQL);
        if ($data != "") {
            if ($data) {
                header("location:../ui/header.php?aksi=edit-pengurus&id_pengurus=$id_pengurus&dialog=change");
                exit(0);
            }
        } else {
            header("location:../ui/header.php?aksi=tambah-pengurus");
            exit(0);
        }
    }

    public function hapuspengurus($id_pengurus)
    {
        $id_pengurus = htmlspecialchars($_GET['id_pengurus']) ? htmlentities($_GET['id_pengurus']) : strip_tags($_GET['id_pengurus']);
        # database
        $table = "pengurus";
        $SQL = "DELETE FROM $table WHERE id_pengurus = '$id_pengurus'";
        $data = $this->db->query($SQL);
        if ($data != "") {
            if ($data) {
                header("location:../ui/header.php?page=pengurus&dialog=delete");
                exit(0);
            }
        } else {
            header("location:../ui/header.php?page=pengurus");
            exit(0);
        }
    }
}