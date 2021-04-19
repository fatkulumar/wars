<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
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
</script>


<div class="container">

    <div class="card">
        
        <div class="card-header bg-primary">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="m-0 text-white">
                        <strong>Data Pembayaran</strong>
                    </h1>
                </div>
                <div class="col-md-6">
                    <a class="btn btn-danger float-right btn-sm mt-2" href="index.php?tambah_pembayaran"><i class="fa fa-plus"></i></a>
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
                <table id="table_buku" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Jenis Pendidikan</th>
                            <th>Bukti TF</th>
                            <th>Gelombang Ke</th>
                            <th>Biaya</th>
                            <th style="text-align: center;">Status</th>
                            <th style="text-align: center;">Cetak</th>
                            <th style="text-align: center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            include "../koneksi.php";
                            $no = 1;
                            $sql_pembayaran = mysqli_query($koneksi, "SELECT nik,gelombang_ke, biaya_gelombang, nama_user, email_user, id_user_pembayaran, status_pembayaran, tgl_registrasi, id_pembayaran, jenis_pendidikan, nama_pembayaran FROM tb_user u JOIN tb_pembayaran p ON u.id_user = p.id_user_pembayaran");
                            while($row = mysqli_fetch_array($sql_pembayaran)):
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row["nik"] ?></td>
                            <td><?= $row["nama_user"] ?></td>
                            <td><?= $row["email_user"] ?></td>
                            <td><?= $row["jenis_pendidikan"] ?></td>
                            <td><img width="100px" src="../gambar/<?= $row["nama_pembayaran"] ?>" alt=""></td>
                            <td><?= $row["gelombang_ke"] ?></td>
                            <td id="<?= $row["id_pembayaran"] ?>"><?= $row["biaya_gelombang"] ?></td>
                            <td style="text-align: center;">
                                <?php if($row["status_pembayaran"] == 0): ?>
                                    <a onclick="return confirm('Lunas <?= $row['nama_user'] ?> ?')" class="btn btn-sm btn-danger" href="#"><i class="fa fa-times-circle"></i></a>
                                <?php else: ?>
                                    <i class="fa fa-check-circle"></i>
                                <?php endif ?>
                            </td>
                            <td style="text-align: center;">
                                <?php if($row["status_pembayaran"] == 1):?>
                                    <a href="#"><i class="fa fa-print"></i></a>
                                <?php else: ?>
                                    Belum Lunas
                                <?php endif ?>
                            </td>
                            <td style="text-align: center;">
                                <a onclick="return confirm('Hapus <?= $row['nama_user'] ?>')" class="btn btn-sm btn-danger" href="proses/proses.php?hapus_pembayaran=<?= $row["id_pembayaran"] ?>"><i class="fa fa-trash"></i> </a><a class="btn btn-sm btn-primary" href="index.php?edit_pembayaran=<?= $row["id_pembayaran"] ?>"><i class="fa fa-edit"></i></a>
                                <a class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modalPembayaran<?= $row["id_pembayaran"] ?>" href="#"><i class="fa fa-money-bill-wave"></i></a>
                            </td>
                        </tr>

                        <!-- Modal Pembayaran-->
                        <div class="modal fade" id="modalPembayaran<?= $row["id_pembayaran"] ?>" tabindex="-1" role="dialog" aria-labelledby="modalPembayaranLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <h5 class="modal-title m-0" id="modalPembayaranLabel"><strong>Pembayaran</strong></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="biaya_gelombang">Bayar</label>
                                        <input class="form-control" type="text" id="biaya_gelombang<?= $row["id_pembayaran"] ?>" name="biaya_gelombang" value="<?= $row["biaya_gelombang"] ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button onclick="save_pembayaran(<?= $row['id_pembayaran'] ?>)" type="button" class="btn btn-primary">Save changes</button>
                            </div>
                            </div>
                        </div>
                        </div>

                        <!-- <script>
                            $('#save_bayar').on('click', function(){
                                $('#modalPembayaran<?= $row["id_pembayaran"] ?>').modal('hide')
                            })
                        </script> -->

                        <?php endwhile ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

