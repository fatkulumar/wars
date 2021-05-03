<?php
    session_start();
    include "../../koneksi.php";
    if(isset($_GET["cetak_kartu_wawancara"])){
        echo "cetak kartu";
    }elseif(isset($_POST["edit_pembayaran"])){
        $id_pembayaran_edit = mysqli_real_escape_string($koneksi, $_POST["id_pembayaran"]);
        $id_user_pembayaran_edit = mysqli_real_escape_string($koneksi, $_POST["nik"]);
       //  $nama_user_pembayaran_edit = mysqli_real_escape_string($koneksi, $_POST["nama_user"]);
        $gel_ke_pembayaran_edit = mysqli_real_escape_string($koneksi, $_POST["gelombang_ke"]); 
        $biaya_gelombang_pembayaran_edit = mysqli_real_escape_string($koneksi, $_POST["biaya_gelombang"]); 
        echo $jenis_pendidikan_pembayaran_edit = mysqli_real_escape_string($koneksi, $_POST["jenis_pendidikan"]);

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
           mysqli_query($koneksi, "UPDATE `tb_pembayaran` SET `id_user_pembayaran`='$id_user_pembayaran_edit',`jenis_pendidikan`='$jenis_pendidikan_pembayaran_edit', `nama_pembayaran`='$name_pembayaran_edit',`gelombang_ke`='$gel_ke_pembayaran_edit',`biaya_gelombang`='$biaya_gelombang_pembayaran_edit' WHERE `id_pembayaran` = '$id_pembayaran_edit'");
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
    }elseif(isset($_POST["edit_profil"])){
        $id_profil = mysqli_real_escape_string($koneksi, $_POST["id_user"]);
        echo $nama_user_profil = mysqli_real_escape_string($koneksi, $_POST["nama_user"]);

        $temp_user = $_FILES['foto_user']['tmp_name'];
        echo $name_foto_user = rand(0,9999).$_FILES['foto_user']['name'];
        $size_user = $_FILES['foto_user']['size'];
        $type_user = $_FILES['foto_user']['type'];
        $folder_user = "../../gambar/";
        
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