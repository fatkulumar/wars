<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    function alert(pesan) {
        const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
        })

        Toast.fire({
        icon: 'success',
        title: pesan
        })
    }
</script> -->
<div class="container">

    <div class="card">
        
        <div class="card-header bg-primary">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="m-0 text-white">
                        <strong>Data Pendaftaran</strong>
                    </h1>
                </div>
                <div class="col-md-6">
                    <a class="btn btn-danger float-right btn-sm mt-2" href="index.php?tambah_pendaftaran"><i class="fa fa-plus"></i></a>
                </div>
            </div>
        </div>

        <?php if(isset($_SESSION["alert_edit"])): ?>
            <script>alert("Berhasil Edit Pembayaran")</script>
            <?php unset($_SESSION["alert_edit"]) ?>
        <?php endif; ?>

        <?php if(isset($_SESSION["alert_tambah"])): ?>
            <script>alert("Berhasil Tambah Pembayaran")</script>
            <?php unset($_SESSION["alert_tambah"]) ?>
        <?php endif; ?>

        <?php if(isset($_SESSION["alert_hapus"])): ?>
            <script>alert("Berhasil Hapus Pembayaran")</script>
            <?php unset($_SESSION["alert_hapus"]) ?>
        <?php endif; ?>

        <div class="card-body">
            <div class="table table-responsive">
                <table id="table_pendaftaran" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gelombang</th>
                            <th>Pendidikan</th>
                            <th>Tgl Gel Awal</th>
                            <th>Tgl Gel Akhir</th>
                            <th>Biaya Formulir</th>
                            <th>DPP</th>
                            <th>Uang Kegiatan</th>
                            <th style="text-align: center;">Uang Buku/tahun</th>
                            <th style="text-align: center;">Uang Seragam</th>
                            <th style="text-align: center;">SPP</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            include "../koneksi.php";
                            $no = 1;
                            $sql_pendaftaran = mysqli_query($koneksi, "SELECT `id_daftar_biaya`, `gel_ke`, `pendidikan`, `tgl_gel1`, `tgl_gel2`, `biaya_formulir`, `dpp`, `uang_kegiatan`, `uang_buku_pertahun`, `uang_seragam`, `spp` FROM `tb_daftar_biaya_tk_kb`");
                            while($row = mysqli_fetch_array($sql_pendaftaran)):
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row["gel_ke"] ?></td>
                            <td><?= $row["pendidikan"] ?></td>
                            <td><?= $row["tgl_gel1"] ?></td>
                            <td><?= $row["tgl_gel2"] ?></td>
                            <td><?= $row["biaya_formulir"] ?></td>
                            <td><?= $row["dpp"] ?></td>
                            <td><?= $row["uang_kegiatan"] ?></td>
                            <td><?= $row["uang_buku_pertahun"] ?></td>
                            <td><?= $row["uang_seragam"] ?></td>
                            <td><?= $row["spp"] ?></td>
                            <td style="text-align: center;">
                                <a class="btn btn-sm btn-danger" href="proses/proses.php?hapus_pendaftaran=<?= $row["id_daftar_biaya"] ?>"><i class="fa fa-trash"></i> </a><a class="btn btn-sm btn-primary" href="index.php?edit_pendaftaran=<?= $row["id_daftar_biaya"] ?>"><i class="fa fa-edit"></i></a>
                            </td>
                        </tr>

                        <?php endwhile ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>