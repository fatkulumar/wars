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
            header("Location: ../index.php?table_users");
        }
    }elseif(isset($_POST["tambah_pembayaran"])){
        $id_user_pembayaran = mysqli_real_escape_string($koneksi, $_POST["nik"]);
        $jenis_pendidikan_pembayaran = mysqli_real_escape_string($koneksi, $_POST["jenis_pendidikan"]);
        $gel_ke_pembayaran = mysqli_real_escape_string($koneksi, $_POST["gelombang_ke"]);
        $tahun_pembayaran = date('Y');

        $temp = $_FILES['nama_pembayaran']['tmp_name'];
        $name = rand(0,9999).$_FILES['nama_pembayaran']['name'];
        $size = $_FILES['nama_pembayaran']['size'];
        $type = $_FILES['nama_pembayaran']['type'];
        $folder = "../../gambar/";
        // die();
        if ($size < 2048000 and ($type =='image/jpeg' or $type == 'image/png')) {
            move_uploaded_file($temp, $folder . $name);
            $sql_insert_pembayaran = mysqli_query($koneksi, "INSERT INTO `tb_pembayaran`(`id_user_pembayaran`, `nama_pembayaran`, `gelombang_ke`, `jenis_pendidikan`, `tahun_pembayaran`) VALUES ('$id_user_pembayaran','$name','$gel_ke_pembayaran', '$jenis_pendidikan_pembayaran', '$tahun_pembayaran)");
            $_SESSION["alert_tambah"] = "";
            header("Location: ../index.php?table_pembayaran");
        }else{
            echo "<b>Gagal Upload File</b>";
        }

    }elseif(isset($_POST["edit_pembayaran"])){
         $id_pembayaran_edit = mysqli_real_escape_string($koneksi, $_POST["id_pembayaran"]);
         $id_user_pembayaran_edit = mysqli_real_escape_string($koneksi, $_POST["nik"]);
        //  $nama_user_pembayaran_edit = mysqli_real_escape_string($koneksi, $_POST["nama_user"]);
         $gel_ke_pembayaran_edit = mysqli_real_escape_string($koneksi, $_POST["gelombang_ke"]); 
         $biaya_gelombang_pembayaran_edit = mysqli_real_escape_string($koneksi, $_POST["biaya_gelombang"]); 
         echo $jenis_pendidikan_pembayaran_edit = mysqli_real_escape_string($koneksi, $_POST["jenis_pendidikan"]);
         $tahun_pembayaran_edit = date('Y');

        // die();
        $temp_pembayaran_edit = $_FILES['nama_pembayaran']['tmp_name'];
        $name_pembayaran_edit = rand(0,9999).$_FILES['nama_pembayaran']['name'];
        $size_pembayaran_edit = $_FILES['nama_pembayaran']['size'];
        $type_pembayaran_edit = $_FILES['nama_pembayaran']['type'];
        $folder_pembayaran_edit = "../../gambar/";

        $sql_select_pembayaran = mysqli_query($koneksi, "SELECT nama_pembayaran FROM `tb_pembayaran` WHERE `id_pembayaran` = '$id_pembayaran_edit'");
        $bukti = mysqli_fetch_array($sql_select_pembayaran);
        
        if($temp_pembayaran_edit == null){
            $name_pembayaran_edit = $bukti["nama_pembayaran"];
            mysqli_query($koneksi, "UPDATE `tb_pembayaran` SET `id_user_pembayaran`='$id_user_pembayaran_edit',`jenis_pendidikan`='$jenis_pendidikan_pembayaran_edit', `nama_pembayaran`='$name_pembayaran_edit',`gelombang_ke`='$gel_ke_pembayaran_edit',`biaya_gelombang`='$biaya_gelombang_pembayaran_edit', `tahun_pembayaran` = '$tahun_pembayaran_edit' WHERE `id_pembayaran` = '$id_pembayaran_edit'");
            $_SESSION["alert_edit"] = "";
            header("Location: ../index.php?table_pembayaran");
        }
        if ($size_pembayaran_edit < 2048000 and ($type_pembayaran_edit =='image/jpeg' or $type_pembayaran_edit == 'image/png')) {
            move_uploaded_file($temp_pembayaran_edit, $folder_pembayaran_edit . $name_pembayaran_edit);
            $sql_edit_pembayaran = mysqli_query($koneksi, "UPDATE `tb_pembayaran` SET `id_user_pembayaran`='$id_user_pembayaran_edit',`nama_pembayaran`='$name_pembayaran_edit',`gelombang_ke`='$gel_ke_pembayaran_edit',`gelombang_ke`='$gel_ke_pembayaran_edit', `biaya_gelombang`='$biaya_gelombang_pembayaran_edit' WHERE `id_pembayaran` = '$id_pembayaran_edit'");
            $_SESSION["alert_edit"] = "";
            header("Location: ../index.php?table_pembayaran");
        }else{
            echo "<b>Gagal Upload File</b>";
        }
    }elseif(isset($_GET["hapus_pembayaran"])) {
        $id_pembayaran_hapus = mysqli_real_escape_string($koneksi, $_GET["hapus_pembayaran"]);
        $sql_pembayaran_hapus = mysqli_query($koneksi, "DELETE FROM `tb_pembayaran` WHERE `id_pembayaran` = '$id_pembayaran_hapus'");
        if($sql_pembayaran_hapus){
            $_SESSION["alert_hapus"] = "";
            header("Location: ../index.php?table_pembayaran");
        }else{
            echo "gagal hapus pembayaran";
        }
    }elseif(isset($_POST["tambah_pembayaran_tpa"])){
        $nik_tpa_tambah = mysqli_real_escape_string($koneksi, $_POST["nik"]);
        $nama_paket_tpa_tambah = mysqli_real_escape_string($koneksi, $_POST["nama_paket"]);

        $temp_bukti_pendaftaran_tpa = $_FILES['bukti_pendaftaran_tpa']['tmp_name'];
        $name_foto_bukti_pendaftaran_tpa_tambah = rand(0,9999).$_FILES['bukti_pendaftaran_tpa']['name'];
        $size_bukti_pendaftaran_tpa = $_FILES['bukti_pendaftaran_tpa']['size'];
        $type_bukti_pendaftaran_tpa = $_FILES['bukti_pendaftaran_tpa']['type'];
        $folder_unggah = "../../gambar/";
        // die();

        if ($size_bukti_pendaftaran_tpa < 2048000 and ($type_bukti_pendaftaran_tpa =='image/jpeg' or $type_bukti_pendaftaran_tpa == 'image/png')) {
            move_uploaded_file($temp_bukti_pendaftaran_tpa, $folder_unggah . $name_foto_bukti_pendaftaran_tpa_tambah);
            $sql_pembayaran_tpa_tambah = mysqli_query($koneksi, "INSERT INTO `tb_pembayaran_tpa`(`id_daftar_biaya_tpa`, `id_user_pembayaran_tpa`, `bukti_pembayaran_tpa`) VALUES ('$nama_paket_tpa_tambah','$nik_tpa_tambah','$name_foto_bukti_pendaftaran_tpa_tambah')");
            if($sql_pembayaran_tpa_tambah){
                $_SESSION["alert_tambah"] = "";
                header("Location: ../index.php?table_pembayaran_tpa");
            }else{
                echo "gagal unggah pendaftaran tpa tambah";
            }
        }else{
            echo "<b>Gagal Upload File edit</b>";
        }
    }elseif(isset($_POST["edit_pembayaran_tpa"])){
        // echo "bener"; die();
        $id_pembayaran_tpa_edit = mysqli_real_escape_string($koneksi, $_POST["id_pembayaran_tpa"]);
        $nik_tpa_edit = mysqli_real_escape_string($koneksi, $_POST["nik"]);
        $nama_paket_tpa_edit = mysqli_real_escape_string($koneksi, $_POST["nama_paket"]);

        $temp_bukti_pendaftaran_tpa = $_FILES['bukti_pendaftaran_tpa']['tmp_name'];
        $name_foto_bukti_pendaftaran_tpa_edit = rand(0,9999).$_FILES['bukti_pendaftaran_tpa']['name'];
        $size_bukti_pendaftaran_tpa = $_FILES['bukti_pendaftaran_tpa']['size'];
        $type_bukti_pendaftaran_tpa = $_FILES['bukti_pendaftaran_tpa']['type'];
        $folder_unggah = "../../gambar/";
        // die();

        if ($size_bukti_pendaftaran_tpa < 2048000 and ($type_bukti_pendaftaran_tpa =='image/jpeg' or $type_bukti_pendaftaran_tpa == 'image/png')) {
            move_uploaded_file($temp_bukti_pendaftaran_tpa, $folder_unggah . $name_foto_bukti_pendaftaran_tpa_edit);
            $sql_pembayaran_tpa_edit = mysqli_query($koneksi, "UPDATE `tb_pembayaran_tpa` SET `id_daftar_biaya_tpa`='$nama_paket_tpa_edit',`id_user_pembayaran_tpa`='$nik_tpa_edit',`bukti_pembayaran_tpa`='$name_foto_bukti_pendaftaran_tpa_edit' WHERE `id_pembayaran_tpa` = '$id_pembayaran_tpa_edit'");
            if($sql_pembayaran_tpa_edit){
                $_SESSION["alert_edit"] = "";
                header("Location: ../index.php?table_pembayaran_tpa");
            }else{
                echo "gagal unggah pendaftaran tpa edit";
            }
        }else{
            echo "<b>Gagal Upload File edit</b>";
        }
    }elseif(isset($_GET["hapus_pembayaran_tpa"])){
        $id_hapus_pembayaran_tpa = mysqli_real_escape_string($koneksi, $_GET["hapus_pembayaran_tpa"]);
        $sql_hapus_pembayaran_tpa = mysqli_query($koneksi, "DELETE FROM `tb_pembayaran_tpa` WHERE `id_pembayaran_tpa`='$id_hapus_pembayaran_tpa'");
        
        if($sql_hapus_pembayaran_tpa){
            $_SESSION["alert_hapus"] = "";
            header("Location: ../index.php?table_pembayaran_tpa");
        }else{
            echo "gagal hapus pembayaran tpa";
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
        $id_user_wali_tambah = mysqli_real_escape_string($koneksi, $_POST["id_user"]);
        $nama_wali_tambah = mysqli_real_escape_string($koneksi, $_POST["nama_wali"]);
        $tempat_lahir_wali_tambah = mysqli_real_escape_string($koneksi, $_POST["tempat_lahir_wali"]);
        $tgl_lahir_wali_tambah = mysqli_real_escape_string($koneksi, $_POST["tgl_lahir_wali"]);
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

        $sql_insert_wali = mysqli_query($koneksi, "INSERT INTO `tb_wali`(`id_user_wali`,`nama_wali`, `tempat_lahir_wali`, `tgl_lahir_wali`, `pendidikan_wali`, `agama_wali`, `negara_wali`, `bangsa_wali`, `pekerjaan_wali`, `penghasilan_wali`, `alamat_kantor_wali`, `hp_kantor_wali`, `golongan_darah_wali`, `alamat_rumah_wali`) VALUES ('$id_user_wali_tambah','$nama_wali_tambah', '$tempat_lahir_wali_tambah', '$tgl_lahir_wali_tambah', '$pendidikan_wali_tambah', '$agama_wali_tambah', '$negara_wali_tambah', '$bangsa_wali_tambah', '$pekerjaan_wali_tambah', '$pendidikan_wali_tambah', '$alamat_kantor_wali_tambah', '$hp_kantor_wali_tambah', '$golongan_darah_wali_tambah', '$alamat_kantor_wali_tambah')");

        if($sql_insert_wali){
            $_SESSION["alert_tambah"] = "";
            header("Location: ../index.php?table_wali");
        }else{
            echo "Gagal Tambah Wali";
        }
    }elseif(isset($_POST["edit_wali"])){
        $id_user_wali_edit = mysqli_real_escape_string($koneksi, $_POST["id_user"]);
        $id_wali_edit = mysqli_real_escape_string($koneksi, $_POST["id_wali"]);
        $nama_wali_edit = mysqli_real_escape_string($koneksi, $_POST["nama_wali"]);
        $tempat_lahir_wali_edit = mysqli_real_escape_string($koneksi, $_POST["tempat_lahir_wali"]);
        $tgl_lahir_wali_edit = mysqli_real_escape_string($koneksi, $_POST["tgl_lahir_wali"]);
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

        $sql_edit_wali = mysqli_query($koneksi, "UPDATE `tb_wali` SET `id_user_wali` = '$id_user_wali_edit',`nama_wali`='$nama_wali_edit',`tempat_lahir_wali`='$tempat_lahir_wali_edit',`tgl_lahir_wali`='$tgl_lahir_wali_edit',`pendidikan_wali`='$penghasilan_wali_edit',`agama_wali`='$agama_wali_edit',`negara_wali`='$negara_wali_edit',`bangsa_wali`='$bangsa_wali_edit',`pekerjaan_wali`='$pekerjaan_wali_edit',`penghasilan_wali`='$penghasilan_wali_edit',`alamat_kantor_wali`='$alamat_kantor_wali_edit',`hp_kantor_wali`='$hp_kantor_wali_edit',`golongan_darah_wali`='$golongan_darah_wali_edit',`alamat_rumah_wali`='$alamat_rumah_wali_edit' WHERE `id_wali` = '$id_wali_edit'");

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
        $tgl_lahir_ibu_tambah = mysqli_real_escape_string($koneksi, $_POST["tgl_lahir_ibu"]);
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
        $id_ibu_edit = mysqli_real_escape_string($koneksi, $_POST["id_ibu"]);
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
    }elseif(isset($_GET["hapus_ibu"])){
        $id_ibu_hapus = mysqli_real_escape_string($koneksi, $_GET["hapus_ibu"]);
        $sql_hapus_ibu = mysqli_query($koneksi, "DELETE FROM `tb_ibu` WHERE `id_ibu` = '$id_ibu_hapus'");
        if($sql_hapus_ibu){
            $_SESSION["alert_hapus"] = "";
            header("Location: ../index.php?table_ibu");
        }else{
            echo "Gagal Hapus Ibu";
        }
    }elseif(isset($_POST["tambah_pendaftaran_tpa"])){
        $nama_paket_pendaftaran_tpa_tambah = mysqli_real_escape_string($koneksi, $_POST["nama_paket"]);
        $biaya_tpa_pendaftaran_tpa_tambah = mysqli_real_escape_string($koneksi, $_POST["biaya_tpa"]);
        $biaya_formulir_tpa_tambah = mysqli_real_escape_string($koneksi, $_POST["biaya_formulir"]);
        $isidental_tpa_tambah = mysqli_real_escape_string($koneksi, $_POST["isidental"]);
        $biaya_pendaftaran_tpa_tambah = mysqli_real_escape_string($koneksi, $_POST["biaya_pendaftaran"]);

        $sql_insert_biaya_tpa = mysqli_query($koneksi, "INSERT INTO `tb_daftar_biaya_tpa`(`biaya_tpa`, `nama_paket`, `biaya_formulir_tpa`, `insidental`, `biaya_pendaftaran_tpa`) VALUES ('$biaya_tpa_pendaftaran_tpa_tambah','$nama_paket_pendaftaran_tpa_tambah','$biaya_formulir_tpa_tambah','$isidental_tpa_tambah','$biaya_pendaftaran_tpa_tambah')");

        if($sql_insert_biaya_tpa){
            $_SESSION["alert_tambah"] = "";
            header("Location: ../index.php?table_pendaftaran_tpa");
        }else{
            echo "gagal tambah biaya tpa";
        }
    }elseif(isset($_POST["edit_pendaftaran_tpa"])){
        $id_biaya_tpa_edit = mysqli_real_escape_string($koneksi, $_POST["id_biaya_tpa"]);
        $nama_paket_pendaftaran_tpa_edit = mysqli_real_escape_string($koneksi, $_POST["nama_paket"]);
        $biaya_tpa_pendaftaran_tpa_edit = mysqli_real_escape_string($koneksi, $_POST["biaya_tpa"]);
        $biaya_formulir_tpa_edit = mysqli_real_escape_string($koneksi, $_POST["biaya_formulir"]);
        $isidental_tpa_edit = mysqli_real_escape_string($koneksi, $_POST["isidental"]);
        $biaya_pendaftaran_tpa_edit = mysqli_real_escape_string($koneksi, $_POST["biaya_pendaftaran"]);

        $sql_update_biaya_tpa = mysqli_query($koneksi, "UPDATE `tb_daftar_biaya_tpa` SET `biaya_tpa`='$biaya_tpa_pendaftaran_tpa_edit',`nama_paket`='$nama_paket_pendaftaran_tpa_edit',`biaya_formulir_tpa`='$biaya_formulir_tpa_edit',`insidental`='$isidental_tpa_edit',`biaya_pendaftaran_tpa`='$biaya_pendaftaran_tpa_edit' WHERE `id_biaya_tpa` = '$id_biaya_tpa_edit'");

        if($sql_update_biaya_tpa){
            $_SESSION["alert_edit"] = "";
            header("Location: ../index.php?table_pendaftaran_tpa");
        }else{
            echo "gagal tambah biaya tpa";
        }
    }elseif(isset($_GET["hapus_pendaftaran_tpa"])){
        $id_biaya_tpa_hapus = mysqli_real_escape_string($koneksi, $_GET["hapus_pendaftaran_tpa"]);

        $sql_hapus_biaya_tpa = mysqli_query($koneksi, "DELETE FROM `tb_daftar_biaya_tpa` WHERE `id_biaya_tpa` = '$id_biaya_tpa_hapus'");

        if($sql_hapus_biaya_tpa){
            $_SESSION["alert_hapus"] = "";
            header("Location: ../index.php?table_pendaftaran_tpa");
        }else{
            echo "gagal tambah biaya tpa";
        }
    }elseif(isset($_POST["tambah_pendaftaran_tk_kb"])){
        $gel_ke_pendaftaran_tambah = mysqli_real_escape_string($koneksi, $_POST["gel_ke"]);
        $pendidikan_pendaftaran_tambah = mysqli_real_escape_string($koneksi, $_POST["pendidikan"]);
        $tgl_gel1_pendaftaran_tambah = mysqli_real_escape_string($koneksi, $_POST["tgl_gel1"]);
        $tgl_gel2_pendaftaran_tambah = mysqli_real_escape_string($koneksi, $_POST["tgl_gel2"]);
        $biaya_formulir_pendaftaran_tambah = mysqli_real_escape_string($koneksi, $_POST["biaya_formulir"]);
        $dpp_pendaftaran_tambah = mysqli_real_escape_string($koneksi, $_POST["dpp"]);
        $uang_kegiatan_pendaftaran_tambah = mysqli_real_escape_string($koneksi, $_POST["uang_kegiatan"]);
        $uang_buku_pertahun_pendaftaran_tambah = mysqli_real_escape_string($koneksi, $_POST["uang_buku_pertahun"]);
        $uang_seragam_pendaftaran_tambah = mysqli_real_escape_string($koneksi, $_POST["uang_seragam"]);
        $spp_pendaftaran_tambah = mysqli_real_escape_string($koneksi, $_POST["spp"]);
        $tahun_ajaran_pendaftaran_tambah = mysqli_real_escape_string($koneksi, $_POST["tahun_ajaran"]);

        $sql_insert_pendaftaran =  mysqli_query($koneksi, "INSERT INTO `tb_daftar_biaya_tk_kb`(`gel_ke`, `pendidikan`, `tgl_gel1`, `tgl_gel2`, `biaya_formulir`, `dpp`, `uang_kegiatan`, `uang_buku_pertahun`, `uang_seragam`, `spp`, `tahun_ajaran_biaya`) VALUES ('$gel_ke_pendaftaran_tambah','$pendidikan_pendaftaran_tambah','$tgl_gel1_pendaftaran_tambah','$tgl_gel2_pendaftaran_tambah','$sql_edit_biaya_pendaftaran','$dpp_pendaftaran_tambah','$uang_kegiatan_pendaftaran_tambah','$uang_buku_pertahun_pendaftaran_tambah','$uang_seragam_pendaftaran_tambah','$spp_pendaftaran_tambah','$tahun_ajaran_pendaftaran_tambah')");

        if($sql_insert_pendaftaran) {
            $_SESSION["alert_tambah"] = "";
            header("Location: ../index.php?table_pendaftaran_tk_kb");
        }else{
            echo "Gagal Tambah Pendaftaran _tk_kb ";
        }
    }elseif(isset($_POST["edit_pendaftaran_tk_kb"])){
        $id_daftar_biaya_pendaftaran_edit = mysqli_real_escape_string($koneksi, $_POST["id_daftar_biaya"]);
        $gel_ke_pendaftaran_edit = mysqli_real_escape_string($koneksi, $_POST["gel_ke"]);
        $pendidikan_pendaftaran_edit = mysqli_real_escape_string($koneksi, $_POST["pendidikan"]);
        $tgl_gel1_pendaftaran_edit = mysqli_real_escape_string($koneksi, $_POST["tgl_gel1"]);
        $tgl_gel2_pendaftaran_edit = mysqli_real_escape_string($koneksi, $_POST["tgl_gel2"]);
        $biaya_formulir_pendaftaran_edit = mysqli_real_escape_string($koneksi, $_POST["biaya_formulir"]);
        $dpp_pendaftaran_edit = mysqli_real_escape_string($koneksi, $_POST["dpp"]);
        $uang_kegiatan_pendaftaran_edit = mysqli_real_escape_string($koneksi, $_POST["uang_kegiatan"]);
        $uang_buku_pertahun_pendaftaran_edit = mysqli_real_escape_string($koneksi, $_POST["uang_buku_pertahun"]);
        $uang_seragam_pendaftaran_edit = mysqli_real_escape_string($koneksi, $_POST["uang_seragam"]);
        $spp_pendaftaran_edit = mysqli_real_escape_string($koneksi, $_POST["spp"]);

        $sql_edit_biaya_pendaftaran = mysqli_query($koneksi, "UPDATE `tb_daftar_biaya_tk_kb` SET `gel_ke`= '$gel_ke_pendaftaran_edit',`pendidikan`='$pendidikan_pendaftaran_edit',`tgl_gel1`='$tgl_gel1_pendaftaran_edit',`tgl_gel2`='$tgl_gel2_pendaftaran_edit',`biaya_formulir`='$biaya_formulir_pendaftaran_edit',`dpp`='$dpp_pendaftaran_edit',`uang_kegiatan`='$uang_kegiatan_pendaftaran_edit',`uang_buku_pertahun`='$uang_buku_pertahun_pendaftaran_edit',`uang_seragam`='$uang_seragam_pendaftaran_edit',`spp`='$spp_pendaftaran_edit' WHERE `id_daftar_biaya` = '$id_daftar_biaya_pendaftaran_edit'");

        if($sql_edit_biaya_pendaftaran) {
            $_SESSION["alert_edit"] = "";
            header("Location: ../index.php?table_pendaftaran_tk_kb");
        }else{
            echo "gagal edit pendaftaran";
        }
    }elseif(isset($_GET["hapus_pendaftaran_tk_kb"])){
        $id_daftar_biaya_pendaftaran_hapus = mysqli_real_escape_string($koneksi, $_GET["hapus_pendaftaran_tk_kb"]);
        $sql_hapus_pendaftaran = mysqli_query($koneksi, "DELETE FROM `tb_daftar_biaya_tk_kb` WHERE `id_daftar_biaya` = '$id_daftar_biaya_pendaftaran_hapus'");

        if($sql_hapus_pendaftaran){
            $_SESSION["alert_hapus"] = "";
            header("Location: ../index.php?table_pendaftaran_tk_kb");
        }else{
            echo "Gagal Hapus pendaftaran";
        }
    }elseif(isset($_POST["tambah_jadwal_wawancara"])){
        $jadwal_wawancara_tambah = mysqli_real_escape_string($koneksi, $_POST["jadwal_wawancara"]);
        $jam_wawancara_tambah = mysqli_real_escape_string($koneksi, $_POST["jam_wawancara"]);
        $sql_insert_jadwal_wawancara = mysqli_query($koneksi, "INSERT INTO `tb_jadwal_wawancara`(`jadwal_wawancara`, `jam_wawancara`) VALUES ('$jadwal_wawancara_tambah','$jam_wawancara_tambah')");
        
        if($sql_insert_jadwal_wawancara){
            $_SESSION["alert_tambah"] = "";
            header("Location: ../index.php?table_jadwal_wawancara");
        }else{
            echo "Gagal Tambah Jadwal Wawancara";
        }
    }elseif(isset($_POST["edit_jadwal_wawancara"])){
        $id_jadwal_wawancara_edit = mysqli_real_escape_string($koneksi, $_POST["id_jadwal_wawancara"]);
        $jadwal_wawancara_edit = mysqli_real_escape_string($koneksi, $_POST["jadwal_wawancara"]);
        $jam_wawancara_edit = mysqli_real_escape_string($koneksi, $_POST["jam_wawancara"]);

        $sql_jadwal_wawancara_edit = mysqli_query($koneksi, "UPDATE `tb_jadwal_wawancara` SET `jadwal_wawancara`='$jadwal_wawancara_edit',`jam_wawancara`='$jam_wawancara_edit' WHERE `id_jadwal_wawancara`='$id_jadwal_wawancara_edit'");

        if($sql_jadwal_wawancara_edit){
            $_SESSION["alert_edit"] = "";
            header("Location: ../index.php?table_jadwal_wawancara");
        }else{
            echo "gagal edit jadwal wawancara";
        }
    }elseif(isset($_GET["hapus_jadwal_wawancara"])){
        $id_jadwal_wawancara_hapus = mysqli_real_escape_string($koneksi, $_GET["hapus_jadwal_wawancara"]);
        $sql_hapus_jadwal_wawancara = mysqli_query($koneksi, "DELETE FROM `tb_jadwal_wawancara` WHERE `id_jadwal_wawancara` = $id_jadwal_wawancara_hapus");

        if($sql_hapus_jadwal_wawancara) {
            $_SESSION["alert_hapus"] = "";
            header("Location: ../index.php?table_jadwal_wawancara");
        }else{
            echo "gagal hapus jadwal wawancara";
        }
    }elseif(isset($_POST["edit_profil"])){
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
    }elseif(isset($_POST["edit_berkas"])){
        $id_user_unggah_edit_berkas = mysqli_real_escape_string($koneksi, $_POST["id_berkas"]);
        $temp_kartu_keluarga_edit_berkas = $_FILES['kartu_keluarga']['tmp_name'];
        $name_foto_kartu_keluarga_edit_berkas = rand(0,9999).$_FILES['kartu_keluarga']['name'];
        $size_kartu_keluarga_edit_berkas = $_FILES['kartu_keluarga']['size'];
        $type_kartu_keluarga_edit_berkas = $_FILES['kartu_keluarga']['type'];

        $temp_kartu_tanda_penduduk_edit_berkas = $_FILES['kartu_tanda_penduduk']['tmp_name'];
        $name_foto_kartu_tanda_penduduk_edit_berkas = rand(0,9999).$_FILES['kartu_tanda_penduduk']['name'];
        $size_kartu_tanda_penduduk_edit_berkas = $_FILES['kartu_tanda_penduduk']['size'];
        $type_kartu_tanda_penduduk_edit_berkas = $_FILES['kartu_tanda_penduduk']['type'];

        $temp_akte_edit_berkas = $_FILES['akte']['tmp_name'];
        $name_foto_akte_edit_berkas = rand(0,9999).$_FILES['akte']['name'];
        $size_akte_edit_berkas = $_FILES['akte']['size'];
        $type_akte_edit_berkas = $_FILES['akte']['type'];
        $folder_unggah_edit_berkas = "../../gambar/";

        $sql_edit_berkas = mysqli_query($koneksi, "SELECT `id_unggah_berkas`, `id_user_unggah_berkas`, `nama_kartu_keluarga`, `nama_kartu_tanda_penduduk`, `nama_akte` FROM `tb_unggah_berkas` WHERE `id_unggah_berkas` = '$id_user_unggah_edit_berkas'");

        $row_edit_berkas = mysqli_fetch_array($sql_edit_berkas);
        $kk_edit = $row_edit_berkas["nama_kartu_keluarga"];
        $ktp_edit = $row_edit_berkas["nama_kartu_tanda_penduduk"];
        $akte_edit = $row_edit_berkas["nama_akte"]; 

        if ($size_kartu_keluarga_edit_berkas < 2048000 and $size_kartu_tanda_penduduk_edit_berkas < 2048000 and $size_akte_edit_berkas < 2048000 and ($type_kartu_keluarga_edit_berkas =='image/jpeg' or $type_kartu_keluarga_edit_berkas == 'image/png') and ($type_kartu_tanda_penduduk_edit_berkas =='image/jpeg' or $type_kartu_tanda_penduduk_edit_berkas == 'image/png') and ($type_akte_edit_berkas =='image/jpeg' or $type_akte_edit_berkas == 'image/png')  ) {
            // echo "yes"; die();
            move_uploaded_file($temp_kartu_keluarga_edit_berkas, $folder_unggah_edit_berkas . $name_foto_kartu_keluarga_edit_berkas);

            move_uploaded_file($temp_kartu_tanda_penduduk_edit_berkas, $folder_unggah_edit_berkas . $name_foto_kartu_tanda_penduduk_edit_berkas);

            move_uploaded_file($temp_akte_edit_berkas, $folder_unggah_edit_berkas . $name_foto_akte_edit_berkas);

            $sql_edit_berkas = mysqli_query($koneksi, "UPDATE `tb_unggah_berkas` SET `nama_kartu_keluarga`='$name_foto_kartu_keluarga_edit_berkas',`nama_kartu_tanda_penduduk`='$name_foto_kartu_tanda_penduduk_edit_berkas',`nama_akte`='$name_foto_akte_edit_berkas' WHERE `id_unggah_berkas` = '$id_user_unggah_edit_berkas'");

            unlink("../../gambar/$kk_edit");
            unlink("../../gambar/$ktp_edit");
            unlink("../../gambar/$akte_edit");
            
            if($sql_edit_berkas){
                $_SESSION["alert_edit"] = "";
                header("Location: ../index.php?table_berkas");
            }else{
                echo "gagal unggah berkas edit";
            }
        }else{
            echo "<b>Gagal Upload File Edit Berkas</b>";
        }
    }elseif(isset($_POST["unggah_berkas"])){
        $id_user_unggah_unggah_berkas = mysqli_real_escape_string($koneksi, $_POST["id_user"]);
        $temp_kartu_keluarga_unggah_berkas = $_FILES['kartu_keluarga']['tmp_name'];
        $name_foto_kartu_keluarga_unggah_berkas = rand(0,9999).$_FILES['kartu_keluarga']['name'];
        $size_kartu_keluarga_unggah_berkas = $_FILES['kartu_keluarga']['size'];
        $type_kartu_keluarga_unggah_berkas = $_FILES['kartu_keluarga']['type'];

        $temp_kartu_tanda_penduduk_unggah_berkas = $_FILES['kartu_tanda_penduduk']['tmp_name'];
        $name_foto_kartu_tanda_penduduk_unggah_berkas = rand(0,9999).$_FILES['kartu_tanda_penduduk']['name'];
        $size_kartu_tanda_penduduk_unggah_berkas = $_FILES['kartu_tanda_penduduk']['size'];
        $type_kartu_tanda_penduduk_unggah_berkas = $_FILES['kartu_tanda_penduduk']['type'];

        $temp_akte_unggah_berkas = $_FILES['akte']['tmp_name'];
        $name_foto_akte_unggah_berkas = rand(0,9999).$_FILES['akte']['name'];
        $size_akte_unggah_berkas = $_FILES['akte']['size'];
        $type_akte_unggah_berkas = $_FILES['akte']['type'];
        $folder_unggah_unggah_berkas = "../../gambar/";

        if ($size_kartu_keluarga_unggah_berkas < 2048000 and $size_kartu_tanda_penduduk_unggah_berkas < 2048000 and $size_akte_unggah_berkas < 2048000 and ($type_kartu_keluarga_unggah_berkas =='image/jpeg' or $type_kartu_keluarga_unggah_berkas == 'image/png') and ($type_kartu_tanda_penduduk_unggah_berkas =='image/jpeg' or $type_kartu_tanda_penduduk_unggah_berkas == 'image/png') and ($type_akte_unggah_berkas =='image/jpeg' or $type_akte_unggah_berkas == 'image/png')  ) {
            // echo "yes"; die();
            move_uploaded_file($temp_kartu_keluarga_unggah_berkas, $folder_unggah_unggah_berkas . $name_foto_kartu_keluarga_unggah_berkas);

            move_uploaded_file($temp_kartu_tanda_penduduk_unggah_berkas, $folder_unggah_unggah_berkas . $name_foto_kartu_tanda_penduduk_unggah_berkas);

            move_uploaded_file($temp_akte_unggah_berkas, $folder_unggah_unggah_berkas . $name_foto_akte_unggah_berkas);

            $sql_unggah_berkas = mysqli_query($koneksi, "INSERT INTO `tb_unggah_berkas`(`id_user_unggah_berkas`, `nama_kartu_keluarga`, `nama_kartu_tanda_penduduk`, `nama_akte`) VALUES ('$id_user_unggah_unggah_berkas','$name_foto_kartu_keluarga_unggah_berkas','$name_foto_kartu_tanda_penduduk_unggah_berkas','$name_foto_akte_unggah_berkas')");
            
            if($sql_unggah_berkas){
                $_SESSION["alert_tambah"] = "";
                header("Location: ../index.php?table_berkas");
            }else{
                echo "gagal unggah berkas tambah";
            }
        }else{
            echo "<b>Gagal Upload File tambah Berkas</b>";
        }
    }elseif(isset($_GET["hapus_berkas"])){
        $id_berkas_hapus = mysqli_real_escape_string($koneksi, $_GET["hapus_berkas"]); 

        $sql_hapus_berkas_select = mysqli_query($koneksi, "SELECT `id_unggah_berkas`, `id_user_unggah_berkas`, `nama_kartu_keluarga`, `nama_kartu_tanda_penduduk`, `nama_akte` FROM `tb_unggah_berkas` WHERE `id_unggah_berkas` = '$id_berkas_hapus'");

        $row_hapus_berkas = mysqli_fetch_array($sql_hapus_berkas_select);
        $kk_hapus = $row_hapus_berkas["nama_kartu_keluarga"];
        $ktp_hapus = $row_hapus_berkas["nama_kartu_tanda_penduduk"];
        $akte_hapus = $row_hapus_berkas["nama_akte"]; 

        unlink("../../gambar/$kk_hapus");
        unlink("../../gambar/$ktp_hapus");
        unlink("../../gambar/$akte_hapus");

        $sql_hapus_berkas = mysqli_query($koneksi, "DELETE FROM `tb_unggah_berkas` WHERE `id_unggah_berkas` = '$id_berkas_hapus'");

        if($sql_hapus_berkas) {
            $_SESSION["alert_hapus"] = "";
            header("Location: ../index.php?table_berkas");
        }else{
            echo "gagal hapus berkas";
        }
    }

    
