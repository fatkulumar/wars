<div class="container">

    <?php if(isset($_SESSION["alert"])): ?>

        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong><?php echo $_SESSION["alert"]; ?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

    <?php endif; ?>

    <?php if(isset($_SESSION["alert_edit"])): ?>
        <script>alert("Berhasil Edit Wali")</script>
        <?php unset($_SESSION["alert_edit"]) ?>
    <?php endif; ?>

    <?php if(isset($_SESSION["alert_tambah"])): ?>
        <script>alert("Berhasil Tambah Wali")</script>
        <?php unset($_SESSION["alert_tambah"]) ?>
    <?php endif; ?>

    <?php if(isset($_SESSION["alert_hapus"])): ?>
        <script>alert("Berhasil Hapus Wali")</script>
        <?php unset($_SESSION["alert_hapus"]) ?>
    <?php endif; ?>

    <div class="card">
        
        <div class="card-header bg-primary">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="m-0 mt-2 text-white" style="font-size: 14px;">
                        <strong>Data Ayah</strong>
                    </h1>
                </div>
                <div class="col-md-6">
                    <a class="btn btn-danger float-right btn-sm" href="index.php?tambah_wali"><i class="fa fa-plus"></i></a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="table table-responsive">
                <table id="table_wali" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Ayah</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Pendidikan</th>
                            <th>Agama</th>
                            <th>Negara</th>
                            <th>Bangsa</th>
                            <th>Pekerjaan</th>
                            <th>Penghasilan</th>
                            <th>Alamat Kantor</th>
                            <th>Telp Kantor</th>
                            <th>Golongan Darah</th>
                            <th>Alamat Rumah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            include "../koneksi.php";
                            $no = 1;
                            $sql_wali = mysqli_query($koneksi, "SELECT * FROM tb_wali");
                            while($row = mysqli_fetch_array($sql_wali)):
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row["nama_wali"] ?></td>
                            <td><?= $row["tempat_lahir_wali"] ?></td>
                            <td><?= $row["tgl_lahir_wali"] ?></td>
                            <td><?= $row["pendidikan_wali"] ?></td>
                            <td><?= $row["agama_wali"] ?></td>
                            <td><?= $row["negara_wali"] ?></td>
                            <td><?= $row["bangsa_wali"] ?></td>
                            <td><?= $row["pekerjaan_wali"] ?></td>
                            <td><?= $row["penghasilan_wali"] ?></td>
                            <td><?= $row["alamat_kantor_wali"] ?></td>
                            <td><?= $row["hp_kantor_wali"] ?></td>
                            <td><?= $row["golongan_darah_wali"] ?></td>
                            <td><?= $row["alamat_rumah_wali"] ?></td>
                            <td>
                                <a onclick="return confirm('Hapus <?= $row['nama_wali'] ?> ?')" class="btn btn-sm btn-danger" href="proses/proses.php?hapus_wali=<?= $row["id_wali"] ?>"><i class="fa fa-trash"></i></a><a class="btn btn-sm btn-primary" href="index.php?edit_wali=<?= $row["id_wali"] ?>"><i class="fa fa-edit"></i></a>
                            </td>
                        </tr>

                        <?php endwhile ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>