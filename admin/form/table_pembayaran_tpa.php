<div class="container">

    <?php if(isset($_SESSION["alert"])): ?>

        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong><?php echo $_SESSION["alert"]; ?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

    <?php endif; ?>

    <div class="card">
        
        <div class="card-header bg-success">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="m-0 mt-2 text-white" style="font-size: 14px;">
                        <strong>Data Pembayaran TPA</strong>
                    </h1>
                </div>
                <div class="col-md-6">
                    <a class="btn btn-danger float-right btn-sm" href="index.php?tambah_pembayaran_tpa"><i class="fa fa-plus"></i></a>
                </div>
            </div>
        </div>

        <?php if(isset($_SESSION["alert_edit"])): ?>
        <script>alert("Berhasil Edit Pembayaran TPA")</script>
        <?php unset($_SESSION["alert_edit"]) ?>
        <?php endif; ?>

        <?php if(isset($_SESSION["alert_tambah"])): ?>
            <script>alert("Berhasil Tambah Pembayaran TPA")</script>
            <?php unset($_SESSION["alert_tambah"]) ?>
        <?php endif; ?>

        <?php if(isset($_SESSION["alert_hapus"])): ?>
            <script>alert("Berhasil Hapus Pembayaran TPA")</script>
            <?php unset($_SESSION["alert_hapus"]) ?>
        <?php endif; ?>

        <div class="card-body">
            <div class="table table-responsive">
                <table id="table_pembayaran_tpa" class="table table-striped">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Nama</td>
                            <td>Paket</td>
                            <td>Bukti TF</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include "../koneksi.php";
                            $no = 1;
                            $sql_pembayaran_tpa = mysqli_query($koneksi, "SELECT `id_pembayaran_tpa`, `id_daftar_biaya_tpa`, `id_user_pembayaran_tpa`, `bukti_pembayaran_tpa`, `nama_user` FROM tb_pembayaran_tpa t JOIN tb_user u ON t.id_user_pembayaran_tpa = u.id_user");
                            while($row = mysqli_fetch_array($sql_pembayaran_tpa)):
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row["nama_user"] ?></td>
                            <td><?= $row["id_daftar_biaya_tpa"] ?></td>
                            <td><img width="100px" src="../gambar/<?= $row["bukti_pembayaran_tpa"] ?>" alt=""></td>
                            <td>
                                <a onclick="return confirm('Hapus <?= $row['nama_user'] ?>')" class="btn btn-sm btn-danger" href="proses/proses.php?hapus_pembayaran_tpa="><i class="fa fa-trash"></i></a>
                                <a class="btn btn-sm btn-primary" href="index.php?edit_pembayaran_tpa=<?= $row["id_pembayaran_tpa"] ?>"><i class="fa fa-edit"></i></a>
                            </td>
                        </tr>
                            <?php endwhile ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</div>