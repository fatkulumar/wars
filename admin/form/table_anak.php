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
        
        <div class="card-header bg-primary">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="m-0 text-white">
                        <strong>Data Anak</strong>
                    </h1>
                </div>
                <div class="col-md-6">
                    <a class="btn btn-danger float-right btn-sm mt-2" href="index.php?tambah_anak"><i class="fa fa-plus"></i></a>
                </div>
            </div>
        </div>

        <?php if(isset($_SESSION["alert_edit"])): ?>
        <script>alert("Berhasil Edit Anak")</script>
        <?php unset($_SESSION["alert_edit"]) ?>
        <?php endif; ?>

        <?php if(isset($_SESSION["alert_tambah"])): ?>
            <script>alert("Berhasil Tambah Anak")</script>
            <?php unset($_SESSION["alert_tambah"]) ?>
        <?php endif; ?>

        <?php if(isset($_SESSION["alert_hapus"])): ?>
            <script>alert("Berhasil Hapus Anak")</script>
            <?php unset($_SESSION["alert_hapus"]) ?>
        <?php endif; ?>

        <div class="card-body">
            <div class="table table-responsive">
                <table id="table_anak" class="table table-striped">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Nama Anak</td>
                            <td>Ayah Anak</td>
                            <td>Ibu Anak</td>
                            <td>Jenis Kelamin</td>
                            <td>Tempat Lahir</td>
                            <td>Tanggal Lahir</td>
                            <td>Agama</td>
                            <td>Anak Ke</td>
                            <td>Jumlah Saudara</td>
                            <td>Warga Negara</td>
                            <td>Suku Bangsa</td>
                            <td>Bahasa</td>
                            <td>Golongan Darah</td>
                            <td>Riwayat Penyakit</td>
                            <td>Alamat</td>
                            <td>Foto</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include "../koneksi.php";
                            $no = 1;
                            $sql_anak = mysqli_query($koneksi, "SELECT * FROM tb_anak a JOIN tb_wali w ON w.id_wali = a.id_wali_anak JOIN tb_ibu i ON i.id_ibu = a.id_ibu_anak");
                            while($row = mysqli_fetch_array($sql_anak)):
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row["nama_anak"] ?></td>
                            <td><?= $row["nama_wali"]?></td>
                            <td><?= $row["nama_ibu"]?></td>
                            <td><?= $row["jenis_kelamin_anak"] ?></td>
                            <td><?= $row["tempat_lahir_anak"] ?></td>
                            <td><?= $row["tgl_lahir_anak"] ?></td>
                            <td><?= $row["agama_anak"] ?></td>
                            <td><?= $row["anak_ke"] ?></td>
                            <td><?= $row["jml_saudara_anak"] ?></td>
                            <td><?= $row["warga_negara_anak"] ?></td>
                            <td><?= $row["suku_bangsa_anak"] ?></td>
                            <td><?= $row["bahasa_anak"] ?></td>
                            <td><?= $row["golongan_darah_anak"] ?></td>
                            <td><?= $row["riwayat_penyakit_anak"] ?></td>
                            <td><?= $row["alamat_rumah_anak"] ?></td>
                            <td><img width="100px" src="../gambar/<?= $row["foto_anak"] ?>" alt=""></td>
                            <td>
                                <a onclick="return confirm('Hapus <?= $row['nama_anak'] ?>')" if class="btn btn-sm btn-danger" href="proses/proses.php?hapus_anak=<?= $row["id_anak"] ?>"><i class="fa fa-trash"></i></a><a class="btn btn-sm btn-primary" href="index.php?edit_anak=<?= $row["id_anak"] ?>"><i class="fa fa-edit"></i></a>
                            </td>
                        </tr>
                            <?php endwhile ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</div>