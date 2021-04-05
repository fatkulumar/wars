<div class="container">

    <div class="card">
        
        <div class="card-header bg-primary">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="m-0 text-white">
                        <strong>Data Users</strong>
                    </h1>
                </div>
                <div class="col-md-6">
                    <a class="btn btn-danger float-right btn-sm mt-2" href="/user/profil/edit/{{ $id }}">Edit</a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="table table-responsive">
                <table id="table_buku" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Tanggal Daftar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            include "../../koneksi.php";
                            $no = 1;
                            $sql_users = mysqli_query($koneksi, "SELECT nik, nama_user, email_user, tgl_registrasi FROM tb_user");
                            while($row = mysqli_fetch_array($sql_users)):
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row["nik"] ?></td>
                            <td><?= $row["nama_user"] ?></td>
                            <td><?= $row["email_user"] ?></td>
                            <td><?= $row["tgl_registrasi"] ?></td>
                        </tr>

                        <?php endwhile ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>