<?php
    $id_user = $_SESSION["id"];
    $sql_anak = mysqli_query($koneksi, "SELECT * FROM tb_ibu i JOIN tb_wali w ON w.id_wali = i.id_wali_ibu JOIN tb_anak a ON a.id_ibu_anak = i.id_ibu JOIN tb_user u ON u.id_user = w.id_user_wali WHERE u.id_user = '$id_user'");
    $row = mysqli_fetch_array($sql_anak);
?>

        <div class="card-header bg-primary">
            <div style="position: absolute;">  
                <h3 class="mt-2 text-white" style="font-size: 14px;">
                    <strong>Data Anak</strong>
                </h3>
            </div>
            <div style="position: relative;">
                <a class="btn btn-danger float-right btn-sm" href="index.php?edit_anak=<?= $row["id_anak"] ?>"><i class="fa fa-edit"></i></a>
            </div>
        </div>

        <?php if(isset($_SESSION["alert_edit"])): ?>
            <script>alert("Berhasil Edit Anak")</script>
        <?php unset($_SESSION["alert_edit"]) ?>
        <?php endif; ?>
        
        <div class="card">
            <div class="card-body">

            <div style="float: right;" class="col-md-3"> 
                <img class="card-img-top" src="../gambar/<?= $row['foto_anak'] ?>" class="elevation-2" alt="Anak Image">
            </div>
               
        <div class="row">

            <div class="col-md-6">
                <table class="table table-bordered"> 
                    <tr>
                        <td><strong>Nama Anak</strong></td>
                        <td><?= $row["nama_anak"]?></td>
                    </tr>
                    <tr>
                        <td><strong>Nama Ayah</strong></td>
                        <td><?= $row["nama_wali"]?></td>
                    </tr>
                    <tr>
                        <td><strong>Nama Ibu</strong></td>
                        <td><?= $row["nama_ibu"]?></td>
                    </tr>
                    <tr>
                        <td><strong>Jenis Kelamin</strong></td>
                        <td><?= $row["jenis_kelamin_anak"]?></td>
                    </tr>
                    <tr>
                        <td><strong>Tempat Lahir</strong></td>
                        <td><?= $row["tempat_lahir_anak"]?></td>
                    </tr>
                    <tr>
                        <td><strong>Tanggal Lahir</strong></td>
                        <td><?= $row["tgl_lahir_anak"]?></td>
                    </tr>

                    <tr>
                        <td><strong>Agama</strong></td>
                        <td><?= $row["agama_anak"]?></td>
                    </tr>

                    <tr>
                        <td><strong>Saudara Ke</strong></td>
                        <td><?= $row["anak_ke"]?></td>
                    </tr>
                </table>
            </div>

            <div class="col-md-6">
                <table class="table table-bordered"> 
                    <tr>
                        <td><strong>Jumlah Saudara</strong></td>
                        <td><?= $row["jml_saudara_anak"]?></td>
                    </tr>
                    <tr>
                        <td><strong>Warga Negara</strong></td>
                        <td><?= $row["warga_negara_anak"]?></td>
                    </tr>
                    <tr>
                        <td><strong>Suku Bangsa</strong></td>
                        <td><?= $row["suku_bangsa_anak"]?></td>
                    </tr>
                    <tr>
                        <td><strong>Bahasa</strong></td>
                        <td><?= $row["bahasa_anak"]?></td>
                    </tr>
                    <tr>
                        <td><strong>Golongan Darah</strong></td>
                        <td><?= $row["golongan_darah_anak"]?></td>
                    </tr>
                    <tr>
                        <td><strong>Riwayat Penyakit</strong></td>
                        <td><?= $row["riwayat_penyakit_anak"]?></td>
                    </tr>
                    <tr>
                        <td><strong>Alamat</strong></td>
                        <td><?= $row["alamat_rumah_anak"]?></td>
                    </tr>

                </table>
            </div>
        <!-- <a class="btn btn-primary mt-5" href="../../../proses/proses.php?editProfil=<?= $row["nis"] ?>">Edit</a> -->
            </div>
        </div>

    </div>

