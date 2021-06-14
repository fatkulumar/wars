<div class="container">
    <!-- <?php if(isset($_SESSION["alert"])): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong><?php echo $_SESSION["alert"]; unset($_SESSION["alert"])?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

    <?php endif; ?> -->

    <?php if(isset($_SESSION["alert_edit"])): ?>
        <script>alert("Berhasil Edit Berkas")</script>
        <?php unset($_SESSION["alert_edit"]) ?>
    <?php endif; ?>

    <?php if(isset($_SESSION["alert_tambah"])): ?>
        <script>alert("Berhasil Tambah Berkas")</script>
        <?php unset($_SESSION["alert_tambah"]) ?>
    <?php endif; ?>

    <?php if(isset($_SESSION["alert_hapus"])): ?>
        <script>alert("Berhasil Hapus Berkas")</script>
        <?php unset($_SESSION["alert_hapus"]) ?>
    <?php endif; ?>
    

    <div class="card">
        
        <div class="card-header bg-success">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="m-0 mt-2 text-white" style="font-size: 14px;">
                        <strong>Data Berkas</strong>
                    </h1>
                </div>
                <div class="col-md-6">
                    <a class="btn btn-danger float-right btn-sm" href="index.php?tambah_berkas"><i class="fa fa-camera"></i></a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="table table-responsive">
                <table id="table_user" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Kartu Keluarga</th>
                            <th>KTP</th>
                            <th>Akte</th>
                            <th style="text-align: center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            include "../koneksi.php";
                            $no = 1;
                            $sql_berkas = mysqli_query($koneksi, "SELECT `id_unggah_berkas`, `id_user_unggah_berkas`, `nama_kartu_keluarga`, `nama_kartu_tanda_penduduk`, `nama_akte`, nama_user FROM tb_unggah_berkas b JOIN tb_user u ON u.id_user = b.id_user_unggah_berkas");
                            while($row = mysqli_fetch_array($sql_berkas)):
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row["nama_user"] ?></td>
                            <td><img width="100px" src="../gambar/<?= $row["nama_kartu_keluarga"]; ?>" alt="gambar kartu keluarga" id="gambar_kartu_keluarga"></td>

                            <td><img width="100px" src="../gambar/<?= $row["nama_kartu_tanda_penduduk"]; ?>" alt="gambar kartu keluarga" id="nama_kartu_tanda_penduduk"></td>

                            <td><img width="100px" src="../gambar/<?= $row["nama_akte"]; ?>" alt="gambar kartu keluarga" id="nama_akte"></td>

                            <td style="text-align: center;">
                                <a onclick="return confirm('Hapus <?= $row['nama_user'] ?> ?')" class="btn btn-sm btn-danger" href="proses/proses.php?hapus_berkas=<?= $row["id_unggah_berkas"] ?>"><i class="fa fa-trash"></i> </a><a class="btn btn-sm btn-primary" href="index.php?edit_berkas=<?= $row["id_unggah_berkas"] ?>"><i class="fa fa-edit"></i></a>
                            </td>
                        </tr>

                        <?php endwhile ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
