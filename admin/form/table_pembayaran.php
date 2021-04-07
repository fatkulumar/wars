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
            <script>alert("Berhasil Edit Users")</script>
            <?php unset($_SESSION["alert_edit"]) ?>
        <?php endif; ?>

        <?php if(isset($_SESSION["alert_tambah"])): ?>
            <script>alert("Berhasil Tambah Users")</script>
            <?php unset($_SESSION["alert_tambah"]) ?>
        <?php endif; ?>

        <?php if(isset($_SESSION["alert_hapus"])): ?>
            <script>alert("Berhasil Hapus Users")</script>
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
                            <th>Bukti TF</th>
                            <th style="text-align: center;">Status</th>
                            <th style="text-align: center;">Cetak</th>
                            <th style="text-align: center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            include "../koneksi.php";
                            $no = 1;
                            $sql_pembayaran = mysqli_query($koneksi, "SELECT nik, nama_user, email_user, id_user_pembayaran, status_pembayaran, tgl_registrasi, nama_pembayaran FROM tb_user u JOIN tb_pembayaran p ON u.id_user = p.id_user_pembayaran");
                            while($row = mysqli_fetch_array($sql_pembayaran)):
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row["nik"] ?></td>
                            <td><?= $row["nama_user"] ?></td>
                            <td><?= $row["email_user"] ?></td>
                            <td><?= $row["nama_pembayaran"] ?></td>
                            <td style="text-align: center;">
                                <?php if($row["status_pembayaran"] == 0): ?>
                                    <i class="fa fa-times-circle"></i>
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
                                <a class="btn btn-sm btn-danger" href="#"><i class="fa fa-trash"></i> </a><a class="btn btn-sm btn-primary" href="index.php?edit_pembayaran"><i class="fa fa-edit"></i></a>
                            </td>
                        </tr>

                        <?php endwhile ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>