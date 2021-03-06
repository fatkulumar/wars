<div class="card">
        
        <div class="card-header bg-success">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="m-0 text-white" style="font-size: 14px;">
                        <strong>Tambah Pembayaran TPA</strong>
                    </h1>
                </div>
            </div>
        </div>

        <div class="card-body">

            <form action="proses/proses.php" method="POST" enctype="multipart/form-data">
            
            <!-- <input type="hidden" name="id_user"> -->
            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <select onchange="change_nik(this.value)" class="form-control" name="nik" required>
                            <option value="">Pilih NIK</option>
                            <?php
                                include "../koneksi.php";
                                $sql_user = mysqli_query($koneksi, "SELECT nik, id_user FROM tb_user WHERE id_user NOT IN (SELECT id_user_pembayaran_tpa FROM tb_pembayaran_tpa)");
                                while($row_user = mysqli_fetch_array($sql_user)):
                            ?>
                                <option value="<?= $row_user["id_user"] ?>"><?= $row_user["nik"] ?></option>
                            <?php endwhile ?>
                        </select>
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama_pendaftar_pembayaran_tpa">Nama</label>
                        <input class="form-control" type="text" name="nama_pendaftar_pembayaran_tpa" required readonly>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama_paket">Nama Paket</label>
                        <select class="form-control" name="nama_paket" id="nama_paket" required>
                            <option value="">-Pilih Paket-</option>
                        <?php
                            $sql_nama_paket = mysqli_query($koneksi, "SELECT `id_biaya_tpa`, `nama_paket` FROM `tb_daftar_biaya_tpa`");
                            while($row_nama_paket = mysqli_fetch_array($sql_nama_paket)):
                        ?>
                            <option value="<?= $row_nama_paket["id_biaya_tpa"] ?>"><?= $row_nama_paket["nama_paket"] ?></option>
                            <?php endwhile ?>
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="bukti_pendaftaran_tpa">Bukti Pedaftaran TPA TF</label>
                        <input class="form-control" type="file" name="bukti_pendaftaran_tpa" id="bukti_pendaftaran_tpa" required>
                    </div>
                    <img src="" width="400px" alt="" id="gambar_bukti_pendaftaran_tpa">
                </div>


                <script>
                    function readURL(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                        $('#gambar_bukti_pendaftaran_tpa').attr('src', e.target.result);
                        }
                        reader.readAsDataURL(input.files[0]);
                    }
                    }
                    $("#bukti_pendaftaran_tpa").change(function() {
                    readURL(this);
                    });
                </script>



                <div class="col-md-12">
                    <div class="form-group">
                        <button class="btn btn-sm btn-danger" name="tambah_pembayaran_tpa">Edit</button>
                    </div>
                </div>

                </div>
            </form>

        </div>

</div>
