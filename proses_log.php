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

        

        $sql_select_user = mysqli_query($koneksi, "SELECT `id_user`, `level`, `email_user` FROM `tb_user` WHERE `email_user` = '$email_user'");

        $row = mysqli_fetch_array($sql_select_user);
        
        if($row["email_user"] == $email_user){
            $_SESSION["sudah_ada"] = "";
            header("Location: register.php");
            die();
        }

        $sql_insert_users = mysqli_query($koneksi, "INSERT INTO `tb_user`(`nik`, `nama_user`, `email_user`, `password_user`, `tgl_registrasi`) VALUES ('$nik_user','$nama_user','$email_user','$password_hash','$timestamp_user')");
        //sql user
        $sql_user = mysqli_query($koneksi, "SELECT id_user FROM tb_user WHERE email_user = '$email_user'");
        $row_user = mysqli_fetch_array($sql_user);
        $id_user = $row_user["id_user"]; 
        // sql wali
        $insert_wali = mysqli_query($koneksi, "INSERT INTO `tb_wali`(`id_user_wali`) VALUES ('$id_user')");
        $sql_wali = mysqli_query($koneksi, "SELECT id_wali FROM tb_wali WHERE id_user_wali = '$id_user'");
        $row_wali = mysqli_fetch_array($sql_wali);
        $id_wali = $row_wali["id_wali"];

        $insert_ibu = mysqli_query($koneksi, "INSERT INTO `tb_ibu`(`id_wali_ibu`) VALUES ('$id_wali')");
        $insert_anak = mysqli_query($koneksi, "INSERT INTO `tb_anak`(`id_wali_anak`) VALUES ('$id_wali')");
        if($insert_anak && $insert_ibu && $insert_wali){
            $_SESSION["id"] = $id_user; 
            $_SESSION["email"] = $email_user; 
            $_SESSION["nik"] = $nik_user; 
            $_SESSION["password"] = $password_hash;
            $_SESSION["nama"] = $nama_user;
            header("Location: user");
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
                    $_SESSION["foto"] = $row_login["foto_user"];
                    $_SESSION["id"] = $row_login["id_user"];
                    $_SESSION["nik"] = $row_login["nik"]; 
                    // echo "admin"; 
                    header("Location: admin");
                    die();
                }
            }
            if($row_login["level"] == 1 &&  $email_login == $row_login["email_user"]) {
                if(password_verify($password_login, $row_login["password_user"])) {
                    $_SESSION["email"] = $row_login["email_user"];
                    $_SESSION["password"] = $row_login["password_user"];
                    $_SESSION["nama"] = $row_login["nama_user"];
                    $_SESSION["foto"] = $row_login["foto_user"];
                    $_SESSION["id"] = $row_login["id_user"];
                    $_SESSION["nik"] = $row_login["nik"]; 
                    // echo "user"; 
                    header("Location: user");
                    die();
                }
            }
            if($row_login["level"] == 2 &&  $email_login == $row_login["email_user"]) {
                if(password_verify($password_login, $row_login["password_user"])) {
                    $_SESSION["email"] = $row_login["email_user"];
                    $_SESSION["password"] = $row_login["password_user"];
                    $_SESSION["nama"] = $row_login["nama_user"];
                    $_SESSION["foto"] = $row_login["foto_user"];
                    $_SESSION["id"] = $row_login["id_user"];
                    $_SESSION["nik"] = $row_login["nik"]; 

                    header("Location: kepala");
                    die();
                }
            }
            if($email_login != $row_login["email_user"] && $password_login != password_verify($password_login, $row_login["password_user"]) ){
                $_SESSION["null_user"] = "umar";
                header("Location: login.php");
                die();
            }
        }


    }