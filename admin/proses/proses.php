<?php
    session_start();
    include "../../koneksi.php";
    //proses tambah user melalui halaman admin
    if(isset($_POST["tambah_user"])) {
        $nik_tambah_admin = mysqli_escape_string($koneksi, $_POST["nik"]);
        $nama_tambah_admin = mysqli_escape_string($koneksi, $_POST["nama_user"]);
        $email_tambah_admin = mysqli_escape_string($koneksi, $_POST["email_user"]);
        $password_tambah_admin = mysqli_escape_string($koneksi, $_POST["password_user"]);
        $level_tambah_admin = mysqli_escape_string($koneksi, $_POST["level"]);
        $timestamp_tambah_admin = date('d-m-Y H:i:s');

        $password_hash_tambah_admin = password_hash($password_tambah_admin, PASSWORD_DEFAULT);

        $sql_select_user = mysqli_query($koneksi, "SELECT * FROM `tb_user`");
        while($row_email = mysqli_fetch_array($sql_select_user)) {
            if($row_email["email_user"] == $email_tambah_admin){
                $_SESSION["alert"] = "Email Sudah Terdaftar";
                header("Location: ../index.php?users");
            }
        }

        $sql_insert_tambah = mysqli_query($koneksi, "INSERT INTO `tb_user`(`nik`, `nama_user`, `email_user`, `password_user`, `tgl_registrasi`, `level`) VALUES ('$nik_tambah_admin', '$nama_tambah_admin', '$email_tambah_admin', '$password_tambah_admin','$timestamp_tambah_admin', '$level_tambah_admin')");
        
        if($sql_insert_tambah){
            $_SESSION["alert_tambah"] = "";
            header("Location: ../index.php?users");
        }else{
            echo "gagal tambah user admin";
        }
    }elseif(isset($_POST["edit_user"])){
        $id_user_edit_admin = mysqli_escape_string($koneksi, $_POST["id_user"]);
        $nik_edit_admin = mysqli_escape_string($koneksi, $_POST["nik"]);
        $nama_edit_admin = mysqli_escape_string($koneksi, $_POST["nama_user"]);
        $email_edit_admin = mysqli_escape_string($koneksi, $_POST["email_user"]);
        $password_edit_admin = mysqli_escape_string($koneksi, $_POST["password_user"]);
        $level_edit_admin = mysqli_escape_string($koneksi, $_POST["level"]);
        $timestamp_edit_admin = date('d-m-Y H:i:s');

        $password_hash_edit = password_hash($password_edit_admin, PASSWORD_DEFAULT);

        $sql_update_admin_user = mysqli_query($koneksi, "UPDATE `tb_user` SET `nik`= '$nik_edit_admin',`nama_user`= '$nama_edit_admin',`email_user`= '$email_edit_admin',`password_user`= '$password_edit_admin' ,`update_set`= '$timestamp_edit_admin',`level`= '$level_edit_admin' WHERE id_user =  '$id_user_edit_admin'");

        if($sql_update_admin_user){
            $_SESSION["alert_edit"] = "";
            header("Location: ../index.php?users");
        }else{
            echo "Gagal Edit User";
        }
    }elseif(isset($_GET["hapus_user"])){
        $id_user_hapus_admin = mysqli_real_escape_string($koneksi, $_GET["hapus_user"]);
        $sql_hapus_user_admin = mysqli_query($koneksi, "DELETE FROM tb_user WHERE id_user = '$id_user_hapus_admin'");
        if($id_user_hapus_admin){
            $_SESSION["alert_hapus"] = "";
            header("Location: ../index.php?users");
        }
    }elseif(isset($_POST["tambah_pembayaran"])){
        $id_user_pembayaran = mysqli_real_escape_string($koneksi, $_POST["id_user"]);
        $nama_user_pembayaran = mysqli_real_escape_string($koneksi, $_POST["nama_user"]);
        $email_user_pembayaran = mysqli_real_escape_string($koneksi, $_POST["email_user"]);
        $nama_user_pembayaran = mysqli_real_escape_string($koneksi, $_POST["nama_pembayaran"]);

        $sql_insert_pembayaran = mysqli_query($koneksi, "INSERT INTO `tb_pembayaran`(`id_user_pembayaran`, `nama_pembayaran`) VALUES ('$id_user_pembayaran', '$nama_user_pembayaran')");

        if($sql_insert_pembayaran){
            $_SESSION["alert_tambah"] = "";
            header("Location: ../index.php?table_pembayaran");
        }else{
            echo "gagal tambah pembayaran";
        }

    }
