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
                            <th>Bukti TF</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            include "../../koneksi.php";
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
                            <td>
                                <?php
                                    if($row["status_pembayaran"] == 0){
                                        echo "Belum Bayar";
                                    }else{
                                        echo "Sudah Bayar";
                                    }
                                ?>
                            </td>
                        </tr>

                        <?php endwhile ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>