<?php
    $id_user = $_SESSION["id"];
    // $sql_user = mysqli_query($koneksi, "SELECT id_user, nama_user, foto_user, nama_wali, nama_anak, id_anak FROM tb_user u JOIN tb_wali w ON u.id_user = w.id_user_wali JOIn tb_anak a ON a.id_wali_anak = w.id_wali");
    // $row = mysqli_fetch_array($sql_user);
    // $row["id_user"];
    // $sql_pembayaran = mysqli_query($koneksi, "SELECT * FROM tb_user u LEFT JOIN tb_wali w ON u.id_user = w.id_user_wali LEFT JOIN tb_anak a ON w.id_wali = a.id_wali_anak LEFT JOIN tb_pembayaran p ON p.id_user_pembayaran = u.id_user WHERE u.id_user = '$id_user'");
    // $row = mysqli_fetch_array($sql_pembayaran);
    //sql pembayaran
    $sql_pemb = mysqli_query($koneksi, "SELECT * FROM tb_pembayaran");
    while($row_pemb = mysqli_fetch_array($sql_pemb)){
        if($row_pemb["id_user_pembayaran"] != $id){
            echo "<div class='alert alert-warning' role='alert'>
                    <i>Segera Lunasi Pembayaran Anda</i>
                </div>";
        }
    }
?>

        <div class="card-header bg-success">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="mt-2 text-white" style="font-size: 14px;">
                        <strong>Pembayaran</strong>
                    </h1>
                </div>
                <div class="col-md-6">
                    <h1 class="mt-0 text-white" style="font-size: 14px; float: right;">
                        <a class="btn btn-sm btn-danger" href="index.php?upload_bukti_pembayaran"><i class="fa fa-camera"></i></a>
                    </h1>
                </div>
            </div>
        </div>

        <?php if(isset($_SESSION["alert_edit"])): ?>
            <script>alert("Berhasil Edit Pembayaran")</script>
        <?php unset($_SESSION["alert_edit"]) ?>
        <?php endif; ?>

        <?php if(isset($_SESSION["alert_hapus"])): ?>
            <script>alert("Berhasil Hapus Pembayaran")</script>
        <?php unset($_SESSION["alert_hapus"]) ?>
        <?php endif; ?>

        <?php if(isset($_SESSION["alert_tambah"])): ?>
            <script>alert("Berhasil Tambah Pembayaran")</script>
        <?php unset($_SESSION["alert_tambah"]) ?>
        <?php endif; ?>
        
        <div class="card">
            <div class="card-body">
               
        <div class="row">
            <!-- <div class="col-md-6"> 
                <img class="card-img-top" src="../gambar/<?= $row['foto_user'] ?>" class="elevation-2" alt="User Image">
            </div> -->

            <div class="table table-responsive">
                <table id="table_user" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Wali</th>
                            <th>Nama Anak</th>
                            <th>Pendidikan</th>
                            <th>Gelombang</th>
                            <th>Biaya</th>
                            <th>Bukti</th>
                            <th>Status</th>
                            <th>Tgl Pembayaran</th>
                            <th style="text-align: center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php
                        $no =1;
                        $sql_pembayaran = mysqli_query($koneksi, "SELECT * FROM tb_ibu i JOIN tb_wali w ON w.id_wali = i.id_wali_ibu JOIN tb_anak a ON a.id_ibu_anak = i.id_ibu JOIN tb_user u ON u.id_user = w.id_user_wali JOIN tb_pembayaran p ON p.id_user_pembayaran = u.id_user  WHERE u.id_user = '$id_user'");
                        while($row = mysqli_fetch_array($sql_pembayaran)):
                    ?>
                        
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row["nama_wali"] ?></td>
                            <td><?= $row["nama_anak"] ?></td>
                            <td><?= $row["jenis_pendidikan"] ?></td>
                            <td><?= $row["gelombang_ke"] ?></td>
                            <td><?= $row["biaya_gelombang"] ?></td>
                            <td><img width="100px" src="../gambar/<?= $row["nama_pembayaran"] ?>" alt=""></td>
                            <td>
                                <?php 
                                    if($row["status_pembayaran"] == 0){
                                        echo "Belum Lunas";
                                    }
                            ?>
                            </td>
                            <td><?= $row["tgl_pembayaran"] ?></td>

                            <td style="text-align: center;">
                                <!-- <a class="btn btn-sm btn-danger" href="proses/proses.php?hapus_pembayaran=<?= $row["id_pembayaran"] ?>"><i class="fa fa-trash"></i>  -->
                                </a><a class="btn btn-sm btn-primary" href="index.php?edit_pembayaran=<?= $row["id_pembayaran"] ?>"><i class="fa fa-edit"></i></a>
                            </td>
                        </tr>

                        <?php endwhile ?>
                    </tbody>
                </table>
            </div>
        <!-- <a class="btn btn-primary mt-5" href="../../../proses/proses.php?editProfil=<?= $row["nis"] ?>">Edit</a> -->
            </div>
        </div>

    </div>

