<?php

namespace model;

class Authentication
{
    protected $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function Account()
    {
        $table = "user";
        $SQL = "SELECT * FROM $table order by id_user asc";
        return $this->db->query($SQL);
    }

    public function tambahAccount($nama_user, $username, $password, $akses)
    {
        if (empty($_POST['nama_user']) || empty($_POST['username']) || empty($_POST['password'])):
            header("location:../ui/header.php?aksi=tambah-pegawai");
            exit(0);
        else:
            $nama_user = htmlspecialchars($_POST['nama_user']);
            $username = htmlspecialchars($_POST['username']);
            $password = md5(htmlspecialchars($_POST['password']), false);
            $akses = htmlspecialchars($_POST['akses']);
            # code database pegawai
            $table = "user";
            $SQL = "INSERT INTO $table SET nama_user = '$nama_user', username='$username', password='$password', akses='$akses'";
            $mysql = $this->db->query($SQL);
            if ($mysql != "") {
                if ($mysql) {
                    header("location:../ui/header.php?page=pegawai&dialog=success");
                    exit(0);
                }
            } else {
                header("location:../ui/header.php?aksi=tambah-pegawai");
                exit(0);
            }
        endif;
    }

    public function userAuth($userInput, $passInput)
    {
        session_start();
        if (empty($_POST['username']) || empty($_POST['password'])) {
            echo "<script>document.location.href = 'error/error-msg.php?HttpStatus=401';</script>";
            die;
        } else {
            $userInput = htmlspecialchars($_POST['username']);
            $passInput = htmlspecialchars($_POST['password']);
            $password = md5($passInput, false);
            password_verify($password, PASSWORD_DEFAULT);
            # code login authentication
            $table = "user";
            $SQL = "SELECT * FROM $table WHERE username = '$userInput' and password = '$password'";
            $mysql = $this->db->query($SQL);
            $data = mysqli_num_rows($mysql);
            # Capthca authentication
            $hasil = $_POST['angka1'] + $_POST['angka2'];
            # cek authentication
            if ($data > 0) {
                $response = array($userInput, $passInput);
                $response[$table] = array($userInput, $passInput);
                if ($row = $mysql->fetch_assoc()) {
                    if ($row['akses'] == 'admin') {
                        $_SESSION['id'] = $row['id_user'];
                        $_SESSION['nama'] = $row['nama_user'];
                        $_SESSION['username'] = $row['username'];
                        $_SESSION['akses'] = 'admin';
                        if ($hasil == $_POST['hasil']) {
                            $_SESSION['status'] = true;
                            echo "<script>document.location.href = 'error/error-msg.php?HttpStatus=200';</script>";
                            die;
                        } else {
                            unset($_POST['hasil']);
                            $_SESSION['status'] = false;
                            echo "<script>document.location.href = 'index.php';</script>";
                            die;
                        }
                    }
                }
                $_COOKIE['cookies'] = $userInput;
                $_SERVER['HTTPS'] = "on";
                $HttpStatus = $_SERVER["REDIRECT_STATUS"];
                if ($HttpStatus == 400) {
                    echo "<script>document.location.href = 'error/error-msg.php?HttpStatus=400';</script>";
                    die;
                }
                if ($HttpStatus == 403) {
                    echo "<script>document.location.href = 'error/error-msg.php?HttpStatus=403';</script>";
                    die;
                }
                if ($HttpStatus == 500) {
                    echo "<script>document.location.href = 'error/error-msg.php?HttpStatus=500';</script>";
                    die;
                }
                setcookie($response[$table], $row, time() + (86400 * 30), "/");
                array_push($response[$table], $row);
                die;
                exit;
            } else {
                unset($_POST['hasil']);
                $_SESSION['status'] = false;
                $_SERVER['HTTPS'] = "off";
                echo "<script>document.location.href = 'index.php';</script>";
                die;
            }
        }
    }
}