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
        <script>alert("Berhasil Edit Ibu")</script>
    <?php unset($_SESSION["alert_edit"]) ?>
    <?php endif; ?>

    <?php if(isset($_SESSION["alert_tambah"])): ?>
        <script>alert("Berhasil Tambah Ibu")</script>
        <?php unset($_SESSION["alert_tambah"]) ?>
    <?php endif; ?>

    <?php if(isset($_SESSION["alert_hapus"])): ?>
        <script>alert("Berhasil Hapus Ibu")</script>
        <?php unset($_SESSION["alert_hapus"]) ?>
    <?php endif; ?>

    <div class="card">
        
        <div class="card-header bg-primary">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="m-0 text-white">
                        <strong>Data Ibu</strong>
                    </h1>
                </div>
                <div class="col-md-6">
                    <a class="btn btn-danger float-right btn-sm mt-2" href="index.php?tambah_ibu"><i class="fa fa-plus"></i></a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="table table-responsive">
                <table id="table_ibu    " class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <!-- <th>Nama Anak</th> -->
                            <th>Nama Ibu</th>
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
                            <th>Telp</th>
                            <th>Golongan Darah</th>
                            <th>Alamat Rumah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            include "../koneksi.php";
                            $no = 1;
                            $sql_wali = mysqli_query($koneksi, "SELECT * FROM tb_ibu i JOIN tb_wali w ON w.id_wali = i.id_wali_ibu");
                            while($row = mysqli_fetch_array($sql_wali)):
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <!-- <td><?= $row["nama_anak"] ?></td> -->
                            <td><?= $row["nama_ibu"] ?></td>
                            <td><?= $row["nama_wali"] ?></td>
                            <td><?= $row["tempat_lahir_ibu"] ?></td>
                            <td><?= $row["tgl_lahir_ibu"] ?></td>
                            <td><?= $row["pendidikan_ibu"] ?></td>
                            <td><?= $row["agama_ibu"] ?></td>
                            <td><?= $row["negara_ibu"] ?></td>
                            <td><?= $row["bangsa_ibu"] ?></td>
                            <td><?= $row["pekerjaan_ibu"] ?></td>
                            <td><?= $row["penghasilan_ibu"] ?></td>
                            <td><?= $row["alamat_kantor_ibu"] ?></td>
                            <td><?= $row["hp_kantor_ibu"] ?></td>
                            <td><?= $row["golongan_darah_ibu"] ?></td>
                            <td><?= $row["alamat_rumah_ibu"] ?></td>
                            <td>
                                <a class="btn btn-sm btn-danger" href="#"><i class="fa fa-trash"></i> </a><a class="btn btn-sm btn-primary" href="index.php?edit_ibu=<?= $row["id_ibu"] ?>"><i class="fa fa-edit"></i></a>
                            </td>
                        </tr>

                        <?php endwhile ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>