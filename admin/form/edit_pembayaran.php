<div class="card">
        
        <div class="card-header bg-primary">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="m-0 text-white">
                        <strong>Edit Pembayaran</strong>
                    </h1>
                </div>
            </div>
        </div>

        <div class="card-body">

            <form action="proses/proses.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input class="form-control" type="text" name="nik" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama_user">Nama</label>
                            <input class="form-control" type="text" name="nama_user" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email_user">Email</label>
                            <input class="form-control" type="text" name="email_user" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password_user">Password</label>
                            <input class="form-control" type="text" name="password_user" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="level">Level</label>
                            <select class="form-control" name="level">
                                <option value="1">User</option>
                                <option value="2">Kepala Sekolah</option>
                                <option value="0">Admin</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <button class="btn btn-sm btn-danger" name="tambah_user">Tambah</button>
                        </div>
                    </div>

                </div>
            </form>

        </div>

</div>