<?php

namespace model;

class rekening
{
    protected $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function rekening()
    {
        $SQL = "SELECT * FROM bank order by id asc";
        return $this->db->query($SQL);
    }

    public function tambah_rekening($no_rek, $nama_bank)
    {
        $url = "../ui/header.php?aksi=tambah-rekening";
        if (empty($_POST['no_rek']) || empty($_POST['nama_bank'])):
            header("location" . $url);
            exit(0);
        else:
            $no_rek = htmlspecialchars($_POST['no_rek']);
            $nama_bank = htmlspecialchars($_POST['nama_bank']);
            # code database table insert
            $table = "bank";
            $insert = "INSERT INTO $table SET no_rek = '$no_rek', nama_bank = '$nama_bank'";
            $mysql = $this->db->query($insert);
            if ($mysql != "") {
                if ($mysql) {
                    $url1 = "../ui/header.php?aksi=tambah-rekening&dialog=success";
                    header("location:" . $url1);
                    exit(0);
                }
            } else {
                header("location:" . $url);
                exit(0);
            }
        endif;
    }

    public function ubah_rekening($no_rek, $nama_bank, $id)
    {
        $url = "../ui/header.php?aksi=edit-rekening&id=$id&dialog=change";
        $url1 = "../ui/header.php?aksi=edit-rekening&id=$id";
        # update code
        $no_rek = htmlspecialchars($_POST['no_rek']);
        $nama_bank = htmlspecialchars($_POST['nama_bank']);
        $id = htmlspecialchars($_POST['id']);
        # code database table update
        $table = "bank";
        $update = "UPDATE $table SET no_rek = '$no_rek', nama_bank='$nama_bank' WHERE id = '$id'";
        $mysql = $this->db->query($update);
        if ($mysql != "") {
            if ($mysql) {
                header("location:" . $url);
                exit(0);
            }
        } else {
            header("location:" . $url1);
            exit(0);
        }
    }

    public function hapus_rekening($id)
    {
        $url = "../ui/header.php?page=rekening&dialog=delete";
        # code delete
        $id = htmlspecialchars($_GET['id']);
        # code database table delete
        $table = "bank";
        $delete = "DELETE FROM $table WHERE id = '$id'";
        $mysql = $this->db->query($delete);
        if ($mysql != "") {
            if ($mysql) {
                header("location:" . $url);
                exit(0);
            }
        } else {
            header("location:../ui/header.php?page=rekening");
            exit(0);
        }
    }
}