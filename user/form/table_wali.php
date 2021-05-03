<?php
    $id_user = $_SESSION["id"];
    $sql_wali = mysqli_query($koneksi, "SELECT `id_wali`, `id_user_wali`, `nama_wali`, `tempat_lahir_wali`, `tgl_lahir_wali`, `pendidikan_wali`, `agama_wali`, `negara_wali`, `bangsa_wali`, `pekerjaan_wali`, `penghasilan_wali`, `alamat_kantor_wali`, `hp_kantor_wali`, `golongan_darah_wali`, `alamat_rumah_wali` FROM `tb_wali` WHERE `id_user_wali`='$id_user'");
    $row = mysqli_fetch_array($sql_wali);
?>

        <div class="card-header bg-primary">
            <div style="position: absolute;">  
                <h3 class="m-0 text-white">
                    <strong>Data Ayah</strong>
                </h3>
            </div>
            <div style="position: relative;">
                <a class="btn btn-danger float-right btn-sm" href="index.php?edit_wali=<?= $row["id_wali"] ?>"><i class="fa fa-edit"></i></a>
            </div>
        </div>

        <?php if(isset($_SESSION["alert_edit"])): ?>
            <script>alert("Berhasil Edit Ayah")</script>
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
                        <td><?= $row["tempat_lahir_wali"]?></td>
                    </tr>
                    <tr>
                        <td><strong>Tanggal Lahir</strong></td>
                        <td><?= $row["tgl_lahir_wali"]?></td>
                    </tr>

                    <tr>
                        <td><strong>Pendidikan</strong></td>
                        <td><?= $row["agama_wali"]?></td>
                    </tr>

                    <tr>
                        <td><strong>Agama</strong></td>
                        <td><?= $row["agama_wali"]?></td>
                    </tr>

                    <tr>
                        <td><strong>Negara</strong></td>
                        <td><?= $row["agama_wali"]?></td>
                    </tr>

                    <tr>
                        <td><strong>Bangsa</strong></td>
                        <td><?= $row["bangsa_wali"]?></td>
                    </tr>
                </table>
            </div>

            <div class="col-md-6">
                <table class="table table-bordered"> 
                    <tr>
                        <td><strong>Pekerjaan</strong></td>
                        <td><?= $row["pekerjaan_wali"]?></td>
                    </tr>
                    <tr>
                        <td><strong>Penghasilan</strong></td>
                        <td><?= $row["penghasilan_wali"]?></td>
                    </tr>
                    <tr>
                        <td><strong>Alamat Kantor</strong></td>
                        <td><?= $row["alamat_kantor_wali"]?></td>
                    </tr>
                    <tr>
                        <td><strong>Telp. Kantor</strong></td>
                        <td><?= $row["hp_kantor_wali"]?></td>
                    </tr>
                    <tr>
                        <td><strong>Golongan Darah</strong></td>
                        <td><?= $row["golongan_darah_wali"]?></td>
                    </tr>
                    <tr>
                        <td><strong>Alamat Rumah</strong></td>
                        <td><?= $row["alamat_rumah_wali"]?></td>
                    </tr>

                </table>
            </div>
        <!-- <a class="btn btn-primary mt-5" href="../../../proses/proses.php?editProfil=<?= $row["nis"] ?>">Edit</a> -->
            </div>
        </div>

    </div>

