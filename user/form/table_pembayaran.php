<?php
    $id_user = $_SESSION["id"];
    // $sql_user = mysqli_query($koneksi, "SELECT id_user, nama_user, foto_user, nama_wali, nama_anak, id_anak FROM tb_user u JOIN tb_wali w ON u.id_user = w.id_user_wali JOIn tb_anak a ON a.id_wali_anak = w.id_wali");
    // $row = mysqli_fetch_array($sql_user);
    // $row["id_user"];
    // $sql_pembayaran = mysqli_query($koneksi, "SELECT * FROM tb_user u LEFT JOIN tb_wali w ON u.id_user = w.id_user_wali LEFT JOIN tb_anak a ON w.id_wali = a.id_wali_anak LEFT JOIN tb_pembayaran p ON p.id_user_pembayaran = u.id_user WHERE u.id_user = '$id_user'");
    // $row = mysqli_fetch_array($sql_pembayaran);
    //sql pembayaran
    $sql_pemb = mysqli_query($koneksi, "SELECT nama_pembayaran, id_user_pembayaran FROM tb_pembayaran WHERE id_user_pembayaran = '$id_user'");
    $row_pemb = mysqli_fetch_array($sql_pemb);
        if($row_pemb == null){
            echo "<div class='alert alert-warning' role='alert'>
                    <i>Segera Lunasi Pembayaran Anda</i><i style='font-size: 10px; color:red'>*Pilih Jalur Masuk</i>
                </div>";
        }
    
?>

        <div class="card-header bg-success">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="mt-2 text-white" style="font-size: 14px;">
                        <strong>Pembayaran</strong>
                    </h1>
                </div>
                <!-- <div class="col-md-6">
                    <h1 class="mt-0 text-white" style="font-size: 14px; float: right;">
                        <a class="btn btn-sm btn-danger" href="<?php if($row_pemb["nama_pembayaran"] == null){echo "index.php?upload_bukti_pembayaran";}else{echo "javascript:void(0)";}?>"><i class="fa fa-camera"></i></a>
                    </h1>
                </div> -->
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
                        $sql_pembayaran = mysqli_query($koneksi, "SELECT `id_pembayaran`, `id_user_pembayaran`, `jenis_pendidikan`, `nama_pembayaran`, `gelombang_ke`, `biaya_gelombang`, `status_pembayaran`, `tahun_pembayaran`, `tgl_pembayaran`, nama_user, nama_anak, nama_wali FROM  tb_user u JOIN tb_pembayaran p ON p.id_user_pembayaran = u.id_user JOIN tb_wali w ON w.id_user_wali = u.id_user JOIN tb_anak a ON a.id_wali_anak = w.id_wali  WHERE u.id_user = '$id_user'");
                        while($row = mysqli_fetch_array($sql_pembayaran)):
                    ?>
                        
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row["nama_wali"] ?></td>
                            <td><?= $row["nama_anak"] ?></td>
                            <td><?= $row["jenis_pendidikan"] ?></td>
                            <td><?= $row["gelombang_ke"] ?></td>
                            <td><?= $row["biaya_gelombang"] ?></td>
                            <td>
                                <?php if($row["nama_pembayaran"] == ""):?>
                                    <a class="btn btn-sm btn-danger" href="<?php if($row_pemb["nama_pembayaran"] == null){echo "index.php?upload_bukti_pembayaran";}else{echo "javascript:void(0)";}?>"><i class="fa fa-camera"></i></a>
                                <?php else: ?>
                                    <img width="100px" src="../gambar/<?= $row["nama_pembayaran"] ?>" alt=""></td>
                                <?php endif ?>
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

            <div class="card bg-success">
            <div class="col-md-12">
                    <h1 class="mt-2 text-white" style="font-size: 14px;">
                        <strong>Pembayaran TPA</strong>
                    </h1>
                </div>
            </div>

            <!-- table pembayaran tpa -->
            <div class="table table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                           <th>No</th>
                           <th>Nama Paket</th>
                           <th>Bukti TF</th>
                           <th>Tgl Pembayaran</th>
                           <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                           <?php
                                $nomor = 0;
                                $sql_pemb_tpa = mysqli_query($koneksi, "SELECT `id_pembayaran_tpa`, `id_daftar_biaya_tpa`, `id_user_pembayaran_tpa`, `bukti_pembayaran_tpa`, `status_pembayaran_tpa`, `tgl_pembayaran_tpa`, `tahun_pembayaran_tpa`, `nama_paket` FROM tb_daftar_biaya_tpa tpa JOIN tb_pembayaran_tpa t ON tpa.id_biaya_tpa = t.id_daftar_biaya_tpa WHERE id_user_pembayaran_tpa = '$id_user'");
                                $row_pemb_tpa = mysqli_fetch_array($sql_pemb_tpa);
                                $nomor++;
                                //jika isi database ada isinya
                                if($sql_pemb_tpa->num_rows >0){
                            ?>
                           <td><?= $nomor ?></td>
                           <td><?= $row_pemb_tpa["nama_paket"] ?></td>
                           <td>
                                <?php 
                                    if($row_pemb_tpa["bukti_pembayaran_tpa"] == null):
                                ?>
                                    <a class="btn btn-sm btn-danger" href="index.php?upload_bukti_pembayaran_tpa"><i class="fa fa-camera"></i></a>
                                <?php else:?>
                                    <img width="100px" src="../gambar/<?= $row_pemb_tpa["bukti_pembayaran_tpa"] ?>" alt="">
                                <?php endif?>
                           <td><?= $row_pemb_tpa["tgl_pembayaran_tpa"] ?></td>
                           <td>
                                <!-- <a onclick="return confirm('Hapus <?= $row_pemb_tpa['nama_paket'] ?>')" class="btn btn-sm btn-danger" href="#"><i class="fa fa-trash"></i></a> -->
                                <a class="btn btn-sm btn-primary" href="#"><i class="fa fa-edit"></i></a>
                           </td>
                           <?php }?>
                        </tr>
                    </tbody>               
                </table>
            </div>

        <!-- <a class="btn btn-primary mt-5" href="../../../proses/proses.php?editProfil=<?= $row["nis"] ?>">Edit</a> -->
            </div>
        </div>

    </div>

