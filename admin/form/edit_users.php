<?php
    $id = $_GET["edit_users"];
    $sql_users = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE id_user = '$id'");
    $row = mysqli_fetch_array($sql_users);
?>

<div class="card">
        
        <div class="card-header bg-primary">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="m-0 text-white">
                        <strong>Edit User</strong>
                    </h1>
                </div>
            </div>
        </div>

        <div class="card-body">

            <form action="proses/proses.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id_user" value="<?= $row["id_user"] ?>">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input class="form-control" type="text" name="nik" value="<?= $row['nik'] ?>" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama_user">Nama</label>
                            <input class="form-control" type="text" name="nama_user" value="<?= $row['nama_user'] ?>" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email_user">Email</label>
                            <input class="form-control" type="text" name="email_user" value="<?= $row['email_user'] ?>" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password_user">Password</label>
                            <input class="form-control" type="password" name="password_user" value="<?= $row['password_user'] ?>" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="level">Level</label>
                            <select class="form-control" name="level">
                                <option value="1" <?php if($row["level"] == 1){echo "selected";}?>>User</option>
                                <option value="2" <?php if($row["level"] == 2){echo "selected";}?>>Kepala Sekolah</option>
                                <option value="0" <?php if($row["level"] == 0){echo "selected";}?>>Admin</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <button class="btn btn-sm btn-danger" name="edit_user">Edit</button>
                        </div>
                    </div>

                </div>
            </form>

        </div>

</div>