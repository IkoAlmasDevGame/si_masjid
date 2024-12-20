<?php

namespace model;

class kegiatan
{
    protected $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function kegiatan()
    {
        $SQL = "SELECT * FROM kegiatan order by id_kegiatan asc";
        return $this->db->query($SQL);
    }

    public function tambah_kegiatan($judul_kegiatan, $keterangan)
    {
        if (empty($_POST['judul_kegiatan']) || empty($_POST['keterangan'])):
            header("location:../ui/header.php?aksi=tambah-kegiatan");
            exit(0);
        else:
            $tanggal_artikel = htmlspecialchars($_POST['tanggal_artikel']);
            $judul_kegiatan = htmlspecialchars($_POST['judul_kegiatan']);
            $keterangan = htmlspecialchars($_POST['keterangan']);
            # Foto Insert
            $ekstensi_diperbolehkan_foto = array('png', 'jpg', 'jpeg', 'jfif', 'gif');
            $photo_src = htmlentities($_FILES["foto"]["name"]) ? htmlspecialchars($_FILES["foto"]["name"]) : $_FILES["foto"]["name"];
            $x_foto = explode('.', $photo_src);
            $ekstensi_photo_src = strtolower(end($x_foto));
            $ukuran_photo_src = $_FILES['foto']['size'];
            $file_tmp_photo_src = $_FILES['foto']['tmp_name'];

            if (in_array($ekstensi_photo_src, $ekstensi_diperbolehkan_foto) === true) {
                if ($ukuran_photo_src < 10440070) {
                    move_uploaded_file($file_tmp_photo_src, "../../../../assets/image/" . $photo_src);
                } else {
                    echo "Tidak Dapat Ter - Upload Size Gambar";
                    exit;
                }
            } else {
                $this->db->query("INSERT INTO kegiatan SET tanggal_artikel = '$tanggal_artikel', judul_kegiatan = '$judul_kegiatan', keterangan = '$keterangan'");
                exit(0);
            }

            $table = "kegiatan";
            $SQL = "INSERT INTO $table SET tanggal_artikel = '$tanggal_artikel', judul_kegiatan = '$judul_kegiatan', keterangan = '$keterangan', foto = '$photo_src'";
            $data = $this->db->query($SQL);
            if ($data != "") {
                if ($data) {
                    header("location:../ui/header.php?aksi=tambah-kegiatan&dialog=success");
                    exit(0);
                }
            } else {
                header("location:../ui/header.php?aksi=tambah-kegiatan");
                exit(0);
            }
        endif;
    }

    public function ubah_kegiatan($judul_kegiatan, $keterangan, $id_kegiatan)
    {
        $tanggal_artikel = htmlspecialchars($_POST['tanggal_artikel']);
        $judul_kegiatan = htmlspecialchars($_POST['judul_kegiatan']);
        $keterangan = htmlspecialchars($_POST['keterangan']);
        # Foto Insert
        $ekstensi_diperbolehkan_foto = array('png', 'jpg', 'jpeg', 'jfif', 'gif');
        $photo_src = htmlentities($_FILES["foto"]["name"]) ? htmlspecialchars($_FILES["foto"]["name"]) : $_FILES["foto"]["name"];
        $x_foto = explode('.', $photo_src);
        $ekstensi_photo_src = strtolower(end($x_foto));
        $ukuran_photo_src = $_FILES['foto']['size'];
        $file_tmp_photo_src = $_FILES['foto']['tmp_name'];
        # code input
        $id_kegiatan = htmlspecialchars($_POST['id_kegiatan']);
        # code database update
        $table = "kegiatan";
        $mysql = $this->db->query("SELECT * FROM $table WHERE id_kegiatan = '$id_kegiatan'");
        $select = mysqli_fetch_array($mysql);

        if (in_array($ekstensi_photo_src, $ekstensi_diperbolehkan_foto) === true) {
            if ($ukuran_photo_src < 10440070) {
                move_uploaded_file($file_tmp_photo_src, "../../../../assets/image/" . $photo_src);
            } else {
                echo "Tidak Dapat Ter - Upload Size Gambar";
                exit;
            }
        } else {
            echo "Tidak Dapat Ter - Upload Gambar";
            exit;
        }

        if ($select['id_kegiatan'] > 0) {
            if (isset($_POST['ubahfoto'])) {
                if ($select['foto'] == "") {
                    $update = "UPDATE $table SET tanggal_artikel = '$tanggal_artikel', judul_kegiatan = '$judul_kegiatan', keterangan = '$keterangan', foto = '$photo_src' WHERE id_kegiatan = '$id_kegiatan'";
                    $data = $this->db->query($update);
                    if ($data != "") {
                        if ($data) {
                            header("location:../ui/header.php?aksi=edit-kegiatan&id_kegiatan=$id_kegiatan&dialog=change");
                            exit(0);
                        }
                    } else {
                        header("location:../ui/header.php?aksi=edit-kegiatan&id_kegiatan=$id_kegiatan");
                        exit(0);
                    }
                } else if ($select['foto'] != "") {
                    if ($photo_src != "") {
                        $SQL = "UPDATE $table SET tanggal_artikel = '$tanggal_artikel', judul_kegiatan = '$judul_kegiatan', keterangan = '$keterangan', foto = '$photo_src' WHERE id_kegiatan = '$id_kegiatan'";
                        $data = $this->db->query($SQL);
                        unlink("../../../../assets/image/$select[foto]");
                        if ($data != "") {
                            if ($data) {
                                header("location:../ui/header.php?aksi=edit-kegiatan&id_kegiatan=$id_kegiatan&dialog=change");
                                exit(0);
                            }
                        } else {
                            header("location:../ui/header.php?aksi=edit-kegiatan&id_kegiatan=$id_kegiatan");
                            exit(0);
                        }
                    }
                }
            }
        }
    }

    public function hapus_kegiatan($id_kegiatan)
    {
        $id_kegiatan = htmlspecialchars($_GET['id_kegiatan']);
        $table = "kegiatan";
        $select = $this->db->query("SELECT * FROM $table WHERE id_kegiatan = '$id_kegiatan'");
        $array = mysqli_fetch_array($select);
        $foto = $array["foto"];

        if ($array["foto"] == "") {
            $delete = "DELETE FROM $table WHERE id_kegiatan = '$id_kegiatan'";
            $data = $this->db->query($delete);
            if ($data != null) {
                if ($data) {
                    header("location:../ui/header.php?page=kegiatan&dialog=delete");
                    exit(0);
                }
            } else {
                header("location:../ui/header.php?page=kegiatan");
                exit(0);
            }
        } else {
            unlink("../../../../assets/image/$foto");
            $data = $this->db->query("DELETE FROM $table WHERE id_kegiatan = '$id_kegiatan'");
            if ($data != null) {
                if ($data) {
                    header("location:../ui/header.php?page=kegiatan&dialog=delete");
                    exit(0);
                }
            } else {
                header("location:../ui/header.php?page=kegiatan");
                exit(0);
            }
        }
    }
}
