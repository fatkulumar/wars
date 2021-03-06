<div class="card">
        
        <div class="card-header bg-primary">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="m-0 text-white" style="font-size: 14px;">
                        <strong>Tambah Pembayaran</strong>
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
                                    $sql_user = mysqli_query($koneksi, "SELECT nik, id_user FROM tb_user WHERE id_user NOT IN (SELECT id_user_pembayaran FROM tb_pembayaran)");
                                    while($row_user = mysqli_fetch_array($sql_user)):
                                ?>
                                    <option value="<?= $row_user["id_user"] ?>"><?= $row_user["nik"] ?></option>
                                <?php endwhile ?>
                            </select>
                        </div>
                    </div>



                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="gelombang_ke">Gelombang</label>
                            <select class="form-control" name="gelombang_ke" id="">
                                    <option value="">Pilih Gelombang</option>
                                    <?php
                                        $sql_daftar = mysqli_query($koneksi, "SELECT `id_daftar_biaya`, `gel_ke` FROM `tb_daftar_biaya_tk_kb`");
                                        while($row_daftar = mysqli_fetch_array($sql_daftar)):
                                    ?>
                                    <option value="<?= $row_daftar['gel_ke'] ?>"><?= $row_daftar["gel_ke"] ?></option>
                                    <?php endwhile ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="jenis_pendidikan">Jenis Pendidikan</label>
                            <select class="form-control" name="jenis_pendidikan">
                                <option value="">Pilih</option>
                                <?php 
                                    $sql_daftar_biaya_tk_kb = mysqli_query($koneksi, "SELECT `pendidikan` FROM `tb_daftar_biaya_tk_kb` GROUP BY `pendidikan`");
                                    while($row_daftar = mysqli_fetch_array($sql_daftar_biaya_tk_kb)):
                                ?>
                                <option value="<?= $row_daftar["pendidikan"] ?>"><?= $row_daftar["pendidikan"] ?></option>
                                <?php endwhile ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama_pembayaran">Bukti TF</label>
                            <input class="form-control" type="file" name="nama_pembayaran">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <button class="btn btn-sm btn-danger" name="tambah_pembayaran">Tambah</button>
                        </div>
                    </div>

                </div>
            </form>

        </div>

</div>

<script src="../jquery/jquery.min.js"></script>

<script>
    function change_nik(value){
        $.ajax({
            url: "proses/ajax_nik.php",
            type: "POST",
            data: {"id_user":value},
            dataType: "JSON",
            success: function(data) {
                $("input[name=nama_user]").val(data[0].nama_user)
                $("input[name=email_user]").val(data[0].email_user)
                $("input[name=id_user]").val(data[0].id_user)
            }
        })
    }

</script>