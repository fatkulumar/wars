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

        $temp = $_FILES['nama_pembayaran']['tmp_name'];
        $name = rand(0,9999).$_FILES['nama_pembayaran']['name'];
        $size = $_FILES['nama_pembayaran']['size'];
        $type = $_FILES['nama_pembayaran']['type'];
        $folder = "../../gambar/";
        if ($size < 2048000 and ($type =='image/jpeg' or $type == 'image/png')) {
            move_uploaded_file($temp, $folder . $name);
            $sql_insert_pembayaran = mysqli_query($koneksi, "INSERT INTO `tb_pembayaran`(`id_user_pembayaran`, `nama_pembayaran`) VALUES ('$id_user_pembayaran', '$name')");
            $_SESSION["alert_tambah"] = "";
            header("Location: ../index.php?table_pembayaran");
        }else{
            echo "<b>Gagal Upload File</b>";
        }

    }elseif(isset($_POST["tambah_anak"])){
        $id_wali_anak = mysqli_real_escape_string($koneksi, $_POST["id_wali"]);
        $id_ibu_anak = mysqli_real_escape_string($koneksi, $_POST["id_ibu"]);
        $nama_anak = mysqli_real_escape_string($koneksi, $_POST["nama_anak"]);
        $jenis_kelamin_anak = mysqli_real_escape_string($koneksi, $_POST["jenis_kelamin_anak"]);
        $tempat_lahir_anak = mysqli_real_escape_string($koneksi, $_POST["tempat_lahir_anak"]);
        $tgl_lahir_anak = mysqli_real_escape_string($koneksi, $_POST["tgl_lahir_anak"]);
        $agama_anak = mysqli_real_escape_string($koneksi, $_POST["agama_anak"]);
        $anak_ke = mysqli_real_escape_string($koneksi, $_POST["anak_ke"]);
        $jml_saudara_anak = mysqli_real_escape_string($koneksi, $_POST["jml_saudara_anak"]);
        $warga_negara_anak = mysqli_real_escape_string($koneksi, $_POST["warga_negara_anak"]);
        $suku_bangsa_anak = mysqli_real_escape_string($koneksi, $_POST["suku_bangsa_anak"]);
        $bahasa_anak = mysqli_real_escape_string($koneksi, $_POST["bahasa_anak"]);
        $golongan_darah_anak = mysqli_real_escape_string($koneksi, $_POST["golongan_darah_anak"]);
        $riwayat_penyakit_anak = mysqli_real_escape_string($koneksi, $_POST["riwayat_penyakit_anak"]);
        $alamat_rumah_anak = mysqli_real_escape_string($koneksi, $_POST["alamat_rumah_anak"]);
        
        $temp = $_FILES['foto_anak']['tmp_name'];
        $name_foto_anak = rand(0,9999).$_FILES['foto_anak']['name'];
        $size = $_FILES['foto_anak']['size'];
        $type = $_FILES['foto_anak']['type'];
        $folder = "../../gambar/";
        if ($size < 2048000 and ($type =='image/jpeg' or $type == 'image/png')) {
            move_uploaded_file($temp, $folder . $name_foto_anak);
            
            $sql_insert_anak = mysqli_query($koneksi, "INSERT INTO `tb_anak`(`id_wali_anak`, `id_ibu_anak`, `nama_anak`, `jenis_kelamin_anak`, `tempat_lahir_anak`, `tgl_lahir_anak`, `agama_anak`, `anak_ke`, `jml_saudara_anak`, `warga_negara_anak`, `suku_bangsa_anak`, `bahasa_anak`, `golongan_darah_anak`, `riwayat_penyakit_anak`, `alamat_rumah_anak`, `foto_anak`) VALUES ('$id_wali_anak','$id_ibu_anak','$nama_anak','$jenis_kelamin_anak','$tempat_lahir_anak','$tgl_lahir_anak','$agama_anak','$anak_ke','$jml_saudara_anak','$warga_negara_anak','$suku_bangsa_anak','$bahasa_anak','$golongan_darah_anak','$riwayat_penyakit_anak','$alamat_rumah_anak','$name_foto_anak')");
            if($sql_insert_anak){
                echo "berhasil";
            }else{
                echo "gagal";
            }

            $_SESSION["alert_tambah"] = "";
            header("Location: ../index.php?table_anak");
        }else{
            echo "<b>Gagal Upload File</b>";
        }
    }elseif(isset($_POST["edit_anak"])){
        $id_anak_edit = mysqli_real_escape_string($koneksi, $_POST["id_anak"]);
        $id_wali_anak_edit = mysqli_real_escape_string($koneksi, $_POST["id_wali"]);
        $id_ibu_anak_edit = mysqli_real_escape_string($koneksi, $_POST["id_ibu"]);
        $nama_anak_edit = mysqli_real_escape_string($koneksi, $_POST["nama_anak"]);
        $jenis_kelamin_anak_edit = mysqli_real_escape_string($koneksi, $_POST["jenis_kelamin_anak"]);
        $tempat_lahir_anak_edit = mysqli_real_escape_string($koneksi, $_POST["tempat_lahir_anak"]);
        $tgl_lahir_anak_edit = mysqli_real_escape_string($koneksi, $_POST["tgl_lahir_anak"]);
        $agama_anak_edit = mysqli_real_escape_string($koneksi, $_POST["agama_anak"]);
        $anak_ke_edit = mysqli_real_escape_string($koneksi, $_POST["anak_ke"]);
        $jml_saudara_anak_edit = mysqli_real_escape_string($koneksi, $_POST["jml_saudara_anak"]);
        $warga_negara_anak_edit = mysqli_real_escape_string($koneksi, $_POST["warga_negara_anak"]);
        $suku_bangsa_anak_edit = mysqli_real_escape_string($koneksi, $_POST["suku_bangsa_anak"]);
        $bahasa_anak_edit = mysqli_real_escape_string($koneksi, $_POST["bahasa_anak"]);
        $golongan_darah_anak_edit = mysqli_real_escape_string($koneksi, $_POST["golongan_darah_anak"]);
        $riwayat_penyakit_anak_edit = mysqli_real_escape_string($koneksi, $_POST["riwayat_penyakit_anak"]);
        $alamat_rumah_anak_edit = mysqli_real_escape_string($koneksi, $_POST["alamat_rumah_anak"]);
        
        $temp_edit_anak = $_FILES['foto_anak']['tmp_name'];
        $name_foto_edit_anak = rand(0,9999).$_FILES['foto_anak']['name'];
        $size_edit_anak = $_FILES['foto_anak']['size'];
        $type_edit_anak = $_FILES['foto_anak']['type'];
        $folder_edit_anak = "../../gambar/";

        $sql_anak = mysqli_query($koneksi, "SELECT foto_anak FROM tb_anak WHERE id_anak = '$id_anak_edit'");
        $row_anak = mysqli_fetch_array($sql_anak);
        if($temp_edit_anak == null){
            $name_foto_anak_edit = $row_anak["foto_anak"];
            $sql_update_anak = mysqli_query($koneksi, "UPDATE `tb_anak` SET `id_wali_anak`='$id_wali_anak_edit',`id_ibu_anak`='$id_ibu_anak_edit',`nama_anak`='$nama_anak_edit',`jenis_kelamin_anak`='$jenis_kelamin_anak_edit',`tempat_lahir_anak`='$tempat_lahir_anak_edit',`tgl_lahir_anak`='$tgl_lahir_anak_edit',`agama_anak`='$agama_anak_edit',`anak_ke`='$anak_ke_edit',`jml_saudara_anak`='$jml_saudara_anak_edit',`warga_negara_anak`='$warga_negara_anak_edit',`suku_bangsa_anak`='$suku_bangsa_anak_edit',`bahasa_anak`='$bahasa_anak_edit',`golongan_darah_anak`='$golongan_darah_anak_edit',`riwayat_penyakit_anak`='$riwayat_penyakit_anak_edit',`alamat_rumah_anak`='$alamat_rumah_anak_edit',`foto_anak`='$name_foto_anak_edit' WHERE `id_anak` = '$id_anak_edit'");

            if($sql_update_anak){
                $_SESSION["alert_edit"] = "";
                header("Location: ../index.php?table_anak");
            }else{
                echo "gagal edit anak";
            }
        }else{
            
            if ($size_edit_anak < 2048000 and ($type_edit_anak =='image/jpeg' or $type_edit_anak == 'image/png')) {
                $sql_update_anak = mysqli_query($koneksi, "UPDATE `tb_anak` SET `id_wali_anak`='$id_wali_anak_edit',`id_ibu_anak`='$id_ibu_anak_edit',`nama_anak`='$nama_anak_edit',`jenis_kelamin_anak`='$jenis_kelamin_anak_edit',`tempat_lahir_anak`='$tempat_lahir_anak_edit',`tgl_lahir_anak`='$tgl_lahir_anak_edit',`agama_anak`='$agama_anak_edit',`anak_ke`='$anak_ke_edit',`jml_saudara_anak`='$jml_saudara_anak_edit',`warga_negara_anak`='$warga_negara_anak_edit',`suku_bangsa_anak`='$suku_bangsa_anak_edit',`bahasa_anak`='$bahasa_anak_edit',`golongan_darah_anak`='$golongan_darah_anak_edit',`riwayat_penyakit_anak`='$riwayat_penyakit_anak_edit',`alamat_rumah_anak`='$alamat_rumah_anak_edit',`foto_anak`='$name_foto_edit_anak' WHERE `id_anak` = '$id_anak_edit'");

                if($sql_update_anak){
                    $_SESSION["alert_edit"] = "";
                    header("Location: ../index.php?table_anak");
                }else{
                    echo "gagal";
                }

                move_uploaded_file($temp_edit_anak, $folder_edit_anak . $name_foto_edit_anak);
                
            }else{
                echo "<b>Gagal Upload File</b>";
            }
        } 
 
    }elseif(isset($_GET["hapus_anak"])){
        $id_hapus_anak = mysqli_real_escape_string($koneksi, $_GET["hapus_anak"]);
        $sql_hapus_anak = mysqli_query($koneksi, "DELETE FROM tb_anak WHERE id_anak = '$id_hapus_anak'");
        if($sql_hapus_anak){
            $_SESSION["alert_hapus"] = "";
            header("Location: ../index.php?table_anak");
        }else{
            echo "Gagal Hapus Anak";
        }
    }elseif(isset($_POST["tambah_wali"])){
        $nama_wali_tambah = mysqli_real_escape_string($koneksi, $_POST["nama_wali"]);
        $tempat_lahir_wali_tambah = mysqli_real_escape_string($koneksi, $_POST["tempat_lahir_wali"]);
        $tgl_lahir_wali_tambah = mysqli_real_escape_string($koneksi, $_POST["tempat_lahir_wali"]);
        $pendidikan_wali_tambah = mysqli_real_escape_string($koneksi, $_POST["pendidikan_wali"]);
        $agama_wali_tambah = mysqli_real_escape_string($koneksi, $_POST["agama_wali"]);
        $negara_wali_tambah = mysqli_real_escape_string($koneksi, $_POST["negara_wali"]);
        $bangsa_wali_tambah = mysqli_real_escape_string($koneksi, $_POST["bangsa_wali"]);
        $pekerjaan_wali_tambah = mysqli_real_escape_string($koneksi, $_POST["pekerjaan_wali"]);
        $penghasilan_wali_tambah = mysqli_real_escape_string($koneksi, $_POST["penghasilan_wali"]);
        $alamat_kantor_wali_tambah = mysqli_real_escape_string($koneksi, $_POST["alamat_kantor_wali"]);
        $hp_kantor_wali_tambah = mysqli_real_escape_string($koneksi, $_POST["hp_kantor_wali"]);
        $golongan_darah_wali_tambah = mysqli_real_escape_string($koneksi, $_POST["golongan_darah_wali"]);
        $alamat_rumah_wali_tambah = mysqli_real_escape_string($koneksi, $_POST["alamat_rumah_wali"]);

        $sql_insert_wali = mysqli_query($koneksi, "INSERT INTO `tb_wali`(`nama_wali`, `tempat_lahir_wali`, `tgl_lahir_wali`, `pendidikan_wali`, `agama_wali`, `negara_wali`, `bangsa_wali`, `pekerjaan_wali`, `penghasilan_wali`, `alamat_kantor_wali`, `hp_kantor_wali`, `golongan_darah_wali`, `alamat_rumah_wali`) VALUES ('$nama_wali_tambah', '$tempat_lahir_wali_tambah', '$tgl_lahir_wali_tambah', '$pendidikan_wali_tambah', '$agama_wali_tambah', '$negara_wali_tambah', '$bangsa_wali_tambah', '$pekerjaan_wali_tambah', '$pendidikan_wali_tambah', '$alamat_kantor_wali_tambah', '$hp_kantor_wali_tambah', '$golongan_darah_wali_tambah', '$alamat_kantor_wali_tambah')");

        if($sql_insert_wali){
            $_SESSION["alert_tambah"] = "";
            header("Location: ../index.php?table_wali");
        }else{
            echo "Gagal Tambah Wali";
        }
    }elseif(isset($_POST["edit_wali"])){
        $id_wali_edit = mysqli_real_escape_string($koneksi, $_POST["id_wali"]);
        $nama_wali_edit = mysqli_real_escape_string($koneksi, $_POST["nama_wali"]);
        $tempat_lahir_wali_edit = mysqli_real_escape_string($koneksi, $_POST["tempat_lahir_wali"]);
        $tgl_lahir_wali_edit = mysqli_real_escape_string($koneksi, $_POST["tempat_lahir_wali"]);
        $pendidikan_wali_edit = mysqli_real_escape_string($koneksi, $_POST["pendidikan_wali"]);
        $agama_wali_edit = mysqli_real_escape_string($koneksi, $_POST["agama_wali"]);
        $negara_wali_edit = mysqli_real_escape_string($koneksi, $_POST["negara_wali"]);
        $bangsa_wali_edit = mysqli_real_escape_string($koneksi, $_POST["bangsa_wali"]);
        $pekerjaan_wali_edit = mysqli_real_escape_string($koneksi, $_POST["pekerjaan_wali"]);
        $penghasilan_wali_edit = mysqli_real_escape_string($koneksi, $_POST["penghasilan_wali"]);
        $alamat_kantor_wali_edit = mysqli_real_escape_string($koneksi, $_POST["alamat_kantor_wali"]);
        $hp_kantor_wali_edit = mysqli_real_escape_string($koneksi, $_POST["hp_kantor_wali"]);
        $golongan_darah_wali_edit = mysqli_real_escape_string($koneksi, $_POST["golongan_darah_wali"]);
        $alamat_rumah_wali_edit = mysqli_real_escape_string($koneksi, $_POST["alamat_rumah_wali"]);

        $sql_edit_wali = mysqli_query($koneksi, "UPDATE `tb_wali` SET `nama_wali`='$nama_wali_edit',`tempat_lahir_wali`='$tempat_lahir_wali_edit',`tgl_lahir_wali`='$tgl_lahir_wali_edit',`pendidikan_wali`='$penghasilan_wali_edit',`agama_wali`='$agama_wali_edit',`negara_wali`='$negara_wali_edit',`bangsa_wali`='$bangsa_wali_edit',`pekerjaan_wali`='$pekerjaan_wali_edit',`penghasilan_wali`='$penghasilan_wali_edit',`alamat_kantor_wali`='$alamat_kantor_wali_edit',`hp_kantor_wali`='$hp_kantor_wali_edit',`golongan_darah_wali`='$golongan_darah_wali_edit',`alamat_rumah_wali`='$alamat_rumah_wali_edit' WHERE `id_wali` = '$id_wali_edit'");

        if($sql_edit_wali){
            $_SESSION["alert_edit"] = "";
            header("Location: ../index.php?table_wali");
        }else{
            echo "Gagal Edit Wali";
        }
    }elseif(isset($_GET["hapus_wali"])){
        $id_wali_hapus = mysqli_real_escape_string($koneksi, $_GET["hapus_wali"]);
        $sql_hapus_wali = mysqli_query($koneksi, "DELETE FROM `tb_wali` WHERE `id_wali` = '$id_wali_hapus'");

        if($id_wali_hapus){
            $_SESSION["alert_hapus"] = "";
            header("Location: ../index.php?table_wali");
        }else{
            echo "Gagal Hapus Wali";
        }
    }elseif(isset($_POST["tambah_ibu"])){
        $id_wali_ibu_tambah = mysqli_real_escape_string($koneksi, $_POST["id_wali_ibu"]);
        $nama_ibu_tambah = mysqli_real_escape_string($koneksi, $_POST["nama_ibu"]);
        $tempat_lahir_ibu_tambah = mysqli_real_escape_string($koneksi, $_POST["tempat_lahir_ibu"]);
        $tgl_lahir_ibu_tambah = mysqli_real_escape_string($koneksi, $_POST["tempat_lahir_ibu"]);
        $pendidikan_ibu_tambah = mysqli_real_escape_string($koneksi, $_POST["pendidikan_ibu"]);
        $agama_ibu_tambah = mysqli_real_escape_string($koneksi, $_POST["agama_ibu"]);
        $negara_ibu_tambah = mysqli_real_escape_string($koneksi, $_POST["negara_ibu"]);
        $bangsa_ibu_tambah = mysqli_real_escape_string($koneksi, $_POST["bangsa_ibu"]);
        $pekerjaan_ibu_tambah = mysqli_real_escape_string($koneksi, $_POST["pekerjaan_ibu"]);
        $penghasilan_ibu_tambah = mysqli_real_escape_string($koneksi, $_POST["penghasilan_ibu"]);
        $alamat_kantor_ibu_tambah = mysqli_real_escape_string($koneksi, $_POST["alamat_kantor_ibu"]);
        $hp_kantor_ibu_tambah = mysqli_real_escape_string($koneksi, $_POST["hp_kantor_ibu"]);
        $golongan_darah_ibu_tambah = mysqli_real_escape_string($koneksi, $_POST["golongan_darah_ibu"]);
        $alamat_rumah_ibu_tambah = mysqli_real_escape_string($koneksi, $_POST["alamat_rumah_ibu"]);

        $sql_insert_ibu = mysqli_query($koneksi, "INSERT INTO `tb_ibu`(`id_wali_ibu` ,`nama_ibu`, `tempat_lahir_ibu`, `tgl_lahir_ibu`, `pendidikan_ibu`, `agama_ibu`, `negara_ibu`, `bangsa_ibu`, `pekerjaan_ibu`, `penghasilan_ibu`, `alamat_kantor_ibu`, `hp_kantor_ibu`, `golongan_darah_ibu`, `alamat_rumah_ibu`) VALUES ('$id_wali_ibu_tambah','$nama_ibu_tambah', '$tempat_lahir_ibu_tambah', '$tgl_lahir_ibu_tambah', '$pendidikan_ibu_tambah', '$agama_ibu_tambah', '$negara_ibu_tambah', '$bangsa_ibu_tambah', '$pekerjaan_ibu_tambah', '$pendidikan_ibu_tambah', '$alamat_kantor_ibu_tambah', '$hp_kantor_ibu_tambah', '$golongan_darah_ibu_tambah', '$alamat_kantor_ibu_tambah')");

        if($sql_insert_ibu){
            $_SESSION["alert_tambah"] = "";
            header("Location: ../index.php?table_ibu");
        }else{
            echo "Gagal Tambah Wali";
        }
    }elseif(isset($_POST["edit_ibu"])){
        echo $id_ibu_edit = mysqli_real_escape_string($koneksi, $_POST["id_ibu"]);
        $id_wali_ibu_edit = mysqli_real_escape_string($koneksi, $_POST["id_wali_ibu"]);
        $nama_ibu_edit = mysqli_real_escape_string($koneksi, $_POST["nama_ibu"]);
        $tempat_lahir_ibu_edit = mysqli_real_escape_string($koneksi, $_POST["tempat_lahir_ibu"]);
        $tgl_lahir_ibu_edit = mysqli_real_escape_string($koneksi, $_POST["tgl_lahir_ibu"]);
        $pendidikan_ibu_edit = mysqli_real_escape_string($koneksi, $_POST["pendidikan_ibu"]);
        $agama_ibu_edit = mysqli_real_escape_string($koneksi, $_POST["agama_ibu"]);
        $negara_ibu_edit = mysqli_real_escape_string($koneksi, $_POST["negara_ibu"]);
        $bangsa_ibu_edit = mysqli_real_escape_string($koneksi, $_POST["bangsa_ibu"]);
        $pekerjaan_ibu_edit = mysqli_real_escape_string($koneksi, $_POST["pekerjaan_ibu"]);
        $penghasilan_ibu_edit = mysqli_real_escape_string($koneksi, $_POST["penghasilan_ibu"]);
        $alamat_kantor_ibu_edit = mysqli_real_escape_string($koneksi, $_POST["alamat_kantor_ibu"]);
        $hp_kantor_ibu_edit = mysqli_real_escape_string($koneksi, $_POST["hp_kantor_ibu"]);
        $golongan_darah_ibu_edit = mysqli_real_escape_string($koneksi, $_POST["golongan_darah_ibu"]);
        $alamat_rumah_ibu_edit = mysqli_real_escape_string($koneksi, $_POST["alamat_rumah_ibu"]);

        $sql_edit_ibu = mysqli_query($koneksi, "UPDATE `tb_ibu` SET `id_wali_ibu`='$id_wali_ibu_edit',`id_anak_ibu`=1,`nama_ibu`='$nama_ibu_edit',`tempat_lahir_ibu`='$tempat_lahir_ibu_edit',`tgl_lahir_ibu`='$tgl_lahir_ibu_edit',`pendidikan_ibu`='$pendidikan_ibu_edit',`agama_ibu`='$agama_ibu_edit',`negara_ibu`='$negara_ibu_edit',`bangsa_ibu`='$bangsa_ibu_edit',`pekerjaan_ibu`='$pekerjaan_ibu_edit',`penghasilan_ibu`='$penghasilan_ibu_edit',`alamat_kantor_ibu`='$alamat_kantor_ibu_edit',`hp_kantor_ibu`='$hp_kantor_ibu_edit',`golongan_darah_ibu`='$golongan_darah_ibu_edit',`alamat_rumah_ibu`='$alamat_rumah_ibu_edit' WHERE `id_ibu` = '$id_ibu_edit'");

        if($sql_edit_ibu){
            $_SESSION["alert_edit"] = "";
            header("Location: ../index.php?table_ibu");
        }else{
            echo "Gagal Edit Ibu";
        }
    }   
