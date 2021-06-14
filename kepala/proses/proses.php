<?php
    session_start();
    include "../../koneksi.php";
    if(isset($_POST["edit_profil"])){
        $id_profil = mysqli_real_escape_string($koneksi, $_POST["id_user"]);
        $nama_user_profil = mysqli_real_escape_string($koneksi, $_POST["nama_user"]);

        $temp_user = $_FILES['foto_user']['tmp_name'];
        $name_foto_user = rand(0,9999).$_FILES['foto_user']['name'];
        $size_user = $_FILES['foto_user']['size'];
        $type_user = $_FILES['foto_user']['type'];
        $folder_user = "../../gambar/";

        if($temp_user != null){
            $sql_berkas_profil = mysqli_query($koneksi, "SELECT `id_user`, `foto_user` FROM `tb_user` WHERE `id_user` = '$id_profil'");

            $row_berkas_profil = mysqli_fetch_array($sql_berkas_profil);

            $foto_user_profil = $row_berkas_profil["foto_user"];
            
            unlink("../../gambar/$foto_user_profil");
        }else{
            $name_foto_user = rand(0,9999).$_FILES['foto_user']['name'];
        }
        
        // die();
        $sql_user = mysqli_query($koneksi, "SELECT foto_user FROM tb_user WHERE `id_user` = '$id_profil'");
        $row_profil = mysqli_fetch_array($sql_user);
        $foto_profil = $row_profil["foto_user"];
        if($temp_user == null){
            $sql_edit_profil = mysqli_query($koneksi, "UPDATE `tb_user` SET `nama_user`='$nama_user_profil',`foto_user`='$foto_profil' WHERE `id_user` = '$id_profil'");
            $_SESSION["alert_edit"] = "";
            header("Location: ../index.php?profil");
        }

        if ($size_user < 2048000 and ($type_user =='image/jpeg' or $type_user == 'image/png')) {
            move_uploaded_file($temp_user, $folder_user . $name_foto_user);
            
            $sql_edit_profil = mysqli_query($koneksi, "UPDATE `tb_user` SET `nama_user`='$nama_user_profil',`foto_user`='$name_foto_user' WHERE `id_user` = '$id_profil'");
            if($sql_edit_profil){
                echo "berhasil";
            }else{
                echo "gagal";
            }

            $_SESSION["alert_edit"] = "";
            header("Location: ../index.php?profil");
        }else{
            echo "<b>Gagal Upload File</b>";
        }
    }
?>