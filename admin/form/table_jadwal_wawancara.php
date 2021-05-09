<div class="container">

    <div class="card">
        
        <div class="card-header bg-primary">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="m-0 text-white">
                        <strong>Data Jadwal Wawancara</strong>
                    </h1>
                </div>
                <div class="col-md-6">
                    <a class="btn btn-danger float-right btn-sm mt-2" href="index.php?tambah_jadwal_wawancara"><i class="fa fa-plus"></i></a>
                </div>
            </div>
        </div>

        <?php if(isset($_SESSION["alert_edit"])): ?>
            <script>alert("Berhasil Edit Wawancara")</script>
            <?php unset($_SESSION["alert_edit"]) ?>
        <?php endif; ?>

        <?php if(isset($_SESSION["alert_tambah"])): ?>
            <script>alert("Berhasil Tambah Wawancara")</script>
            <?php unset($_SESSION["alert_tambah"]) ?>
        <?php endif; ?>

        <?php if(isset($_SESSION["alert_hapus"])): ?>
            <script>alert("Berhasil Hapus Wawancara")</script>
            <?php unset($_SESSION["alert_hapus"]) ?>
        <?php endif; ?>

        <div class="card-body">
            <div class="table table-responsive">
                <table id="table_jadwal_wawancara" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal Wawancara</th>
                            <th>Jam Wawancara</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            include "../koneksi.php";
                            $no = 1;
                            $sql_jadwal_wawancara = mysqli_query($koneksi, "SELECT `id_jadwal_wawancara`, `jadwal_wawancara`, `jam_wawancara` FROM `tb_jadwal_wawancara`");
                            while($row = mysqli_fetch_array($sql_jadwal_wawancara)):
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row["jadwal_wawancara"] ?></td>
                            <td><?= $row["jam_wawancara"] ?></td>
                            <td style="text-align: center;">
                                <a class="btn btn-sm btn-danger" href="proses/proses.php?hapus_jadwal_wawancara=<?= $row["id_jadwal_wawancara"] ?>"><i class="fa fa-trash"></i> </a><a class="btn btn-sm btn-primary" href="index.php?edit_jadwal_wawancara=<?= $row["id_jadwal_wawancara"] ?>"><i class="fa fa-edit"></i></a>
                            </td>
                        </tr>

                        <?php endwhile ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>