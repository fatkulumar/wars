<?php
    session_start();
    include "koneksi.php";
    if(isset($_POST["daftar"])) {
        $nik_user = mysqli_real_escape_string($koneksi, $_POST["nik"]);
        $nama_user = mysqli_real_escape_string($koneksi, $_POST["nama"]);
        $email_user = mysqli_real_escape_string($koneksi, $_POST["email"]);
        $password_user = mysqli_real_escape_string($koneksi, $_POST["password"]);
        $timestamp_user = date('d-m-Y H:i:s');

        $password_hash = password_hash($password_user, PASSWORD_DEFAULT);

        $sql_insert_users = mysqli_query($koneksi, "INSERT INTO `tb_user`(`nik`, `nama_user`, `email_user`, `password_user`, `tgl_registrasi`) VALUES ('$nik_user','$nama_user', '$email_user', '$password_hash', '$timestamp_user')");

        $sql_select_user = mysqli_query($koneksi, "SELECT level FROM `tb_user`");
        $row = mysqli_fetch_array($sql_select_user);

        if($row["level"] == 0){
            $_SESSION["email"] = $email_user; 
            $_SESSION["password"] = $password_hash;
            $_SESSION["nama"] = $nama_user;
            header("Location: admin");
            echo $_SESSION["email"];
        }else{
            echo "gagal daftar";
        }
    }elseif(isset($_POST["login"])){
        $email_login = mysqli_real_escape_string($koneksi, $_POST["email"]);
        $password_login = mysqli_real_escape_string($koneksi, $_POST["password"]);

        $sql_login = mysqli_query($koneksi, "SELECT * FROM `tb_user`");
        while($row_login = mysqli_fetch_array($sql_login)) {
            if($row_login["level"] == 0 &&  $email_login == $row_login["email_user"]) {
                if(password_verify($password_login, $row_login["password_user"])) {
                    $_SESSION["email"] = $row_login["email_user"];
                    $_SESSION["password"] = $row_login["password_user"];
                    $_SESSION["nama"] = $row_login["nama_user"];
                    header("Location: admin");
                }
            }elseif($row_login["level"] == 1 &&  $email_login == $row_login["email_user"]) {
                if(password_verify($password_login, $row_login["password_user"])) {
                    $_SESSION["email"] = $row_login["email_user"];
                    $_SESSION["password"] = $row_login["password_user"];
                    $_SESSION["nama"] = $row_login["nama_user"];
                    header("Location: user");
                }
            }elseif($row_login["level"] == 2 &&  $email_login == $row_login["email_user"]) {
                if(password_verify($password_login, $row_login["password_user"])) {
                    $_SESSION["email"] = $row_login["email_user"];
                    $_SESSION["password"] = $row_login["password_user"];
                    $_SESSION["nama"] = $row_login["nama_user"];
                    header("Location: kepala");
                }
            }
        }


    }