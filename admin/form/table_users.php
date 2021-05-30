

<!-- <script src="../sweetalert/sweetalert.min.js"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> -->
<!-- <script>
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
    <?php if(isset($_SESSION["alert"])): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong><?php echo $_SESSION["alert"]; unset($_SESSION["alert"])?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

    <?php endif; ?>

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
    

    <div class="card">
        
        <div class="card-header bg-primary">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="m-0 mt-2 text-white" style="font-size: 14px;">
                        <strong>Data Users</strong>
                    </h1>
                </div>
                <div class="col-md-6">
                    <a class="btn btn-danger float-right btn-sm" href="index.php?tambah_user"><i class="fa fa-plus"></i></a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="table table-responsive">
                <table id="table_user" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Tanggal Daftar</th>
                            <th>Level</th>
                            <th style="text-align: center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            include "../koneksi.php";
                            $no = 1;
                            $sql_users = mysqli_query($koneksi, "SELECT id_user, nik, nama_user, email_user, tgl_registrasi, level FROM tb_user");
                            while($row = mysqli_fetch_array($sql_users)):
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row["nik"] ?></td>
                            <td><?= $row["nama_user"] ?></td>
                            <td><?= $row["email_user"] ?></td>
                            <td><?= $row["tgl_registrasi"] ?></td>
                            <td><?= $row["level"] ?></td>
                            <td style="text-align: center;">
                                <a onclick="return confirm('Hapus <?= $row['nama_user'] ?>')" class="btn btn-sm btn-danger" href="proses/proses.php?hapus_user=<?= $row["id_user"] ?>"><i class="fa fa-trash"></i> </a><a class="btn btn-sm btn-primary" href="index.php?edit_users=<?= $row["id_user"] ?>"><i class="fa fa-edit"></i></a>
                            </td>
                        </tr>

                        <?php endwhile ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
