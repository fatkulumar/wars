<?php
    $id_user = $_SESSION["id"];
    $sql_wali = mysqli_query($koneksi, "SELECT `id_ibu`, `id_wali_ibu`, `id_anak_ibu`, `nama_ibu`, `tempat_lahir_ibu`, `tgl_lahir_ibu`, `pendidikan_ibu`, `agama_ibu`, `negara_ibu`, `bangsa_ibu`, `pekerjaan_ibu`, `penghasilan_ibu`, `alamat_kantor_ibu`, `hp_kantor_ibu`, `golongan_darah_ibu`, `alamat_rumah_ibu`, `id_wali`, `id_user`, `id_user_wali`, 'nama_wali' FROM tb_ibu i JOIN tb_wali w ON i.id_wali_ibu = w.id_wali JOIN tb_user u ON u.id_user = w.id_user_wali");
    $row = mysqli_fetch_array($sql_wali);
?>

        <div class="card-header bg-primary">
            <div style="position: absolute;">  
                <h3 class="mt-2 text-white" style="font-size: 14px;">
                    <strong>Data Ibu</strong>
                </h3>
            </div>
            <div style="position: relative;">
                <a class="btn btn-danger float-right btn-sm" href="index.php?edit_ibu=<?= $row["id_ibu"] ?>"><i class="fa fa-edit"></i></a>
            </div>
        </div>

        <?php if(isset($_SESSION["alert_edit"])): ?>
            <script>alert("Berhasil Edit Ibu")</script>
        <?php unset($_SESSION["alert_edit"]) ?>
        <?php endif; ?>
        
        <div class="card">
            <div class="card-body">

            <!-- <div style="float: right;" class="col-md-3"> 
                <img class="card-img-top" src="../gambar/<?= $row['foto_wali'] ?>" class="elevation-2" alt="User Image">
            </div> -->
               
        <div class="row">

            <div class="col-md-6">
                <table class="table table-bordered"> 
                    <tr>
                        <td><strong>Nama Ayah</strong></td>
                        <td><?= $row["nama_wali"]?></td>
                    </tr>
                    <tr>
                        <td><strong>Tempat Lahir</strong></td>
                        <td><?= $row["tempat_lahir_ibu"]?></td>
                    </tr>
                    <tr>
                        <td><strong>Tanggal Lahir</strong></td>
                        <td><?= $row["tgl_lahir_ibu"]?></td>
                    </tr>

                    <tr>
                        <td><strong>Pendidikan</strong></td>
                        <td><?= $row["agama_ibu"]?></td>
                    </tr>

                    <tr>
                        <td><strong>Agama</strong></td>
                        <td><?= $row["agama_ibu"]?></td>
                    </tr>

                    <tr>
                        <td><strong>Negara</strong></td>
                        <td><?= $row["agama_ibu"]?></td>
                    </tr>

                    <tr>
                        <td><strong>Bangsa</strong></td>
                        <td><?= $row["bangsa_ibu"]?></td>
                    </tr>
                </table>
            </div>

            <div class="col-md-6">
                <table class="table table-bordered"> 
                    <tr>
                        <td><strong>Pekerjaan</strong></td>
                        <td><?= $row["pekerjaan_ibu"]?></td>
                    </tr>
                    <tr>
                        <td><strong>Penghasilan</strong></td>
                        <td><?= $row["penghasilan_ibu"]?></td>
                    </tr>
                    <tr>
                        <td><strong>Alamat Kantor</strong></td>
                        <td><?= $row["alamat_kantor_ibu"]?></td>
                    </tr>
                    <tr>
                        <td><strong>Telp. Kantor</strong></td>
                        <td><?= $row["hp_kantor_ibu"]?></td>
                    </tr>
                    <tr>
                        <td><strong>Golongan Darah</strong></td>
                        <td><?= $row["golongan_darah_ibu"]?></td>
                    </tr>
                    <tr>
                        <td><strong>Alamat Rumah</strong></td>
                        <td><?= $row["alamat_rumah_ibu"]?></td>
                    </tr>

                </table>
            </div>
        <!-- <a class="btn btn-primary mt-5" href="../../../proses/proses.php?editProfil=<?= $row["nis"] ?>">Edit</a> -->
            </div>
        </div>

    </div>

