<?php
    $id = $_GET["edit_pembayaran"];
    $sql_pembayaran = mysqli_query($koneksi, "SELECT `id_pembayaran`, `id_user_pembayaran`, `jenis_pendidikan`,`nama_pembayaran`, `gelombang_ke`, `biaya_gelombang`, `status_pembayaran` FROM `tb_pembayaran` WHERE `id_pembayaran`= '$id'");
    $row = mysqli_fetch_array($sql_pembayaran);
?>

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
                <input type="hidden" name="id_pembayaran" value="<?= $id ?>">
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
                                    <option value="<?= $row_user["id_user"] ?>" <?php if($row_user["id_user"] == $row["id_user_pembayaran"]){echo "selected";} ?>><?= $row_user["nik"] ?></option>
                                <?php endwhile ?>
                            </select>
                        </div>
                    </div>

                    <!-- <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama_user">Nama</label>
                            <input class="form-control" type="text" name="nama_user" value="" required>
                        </div>
                    </div> -->

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="gelombang_ke">Gelombang</label>
                            <select class="form-control" name="gelombang_ke" id="">
                                    <option value="">Pilih Gelombang</option>
                                    <?php
                                        $sql_daftar = mysqli_query($koneksi, "SELECT `id_daftar_biaya`, `gel_ke` FROM `tb_daftar_biaya_tk_kb`");
                                        while($row_daftar = mysqli_fetch_array($sql_daftar)):
                                    ?>
                                    <option value="<?= $row_daftar['gel_ke'] ?>" <?php if($row_daftar["gel_ke"] == $row["gelombang_ke"]){echo "selected";} ?> ><?= $row_daftar["gel_ke"] ?></option>
                                    <?php endwhile ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="biaya_gelombang ">Biaya</label>
                            <input class="form-control" type="text" name="biaya_gelombang" value="<?= $row["biaya_gelombang"] ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="jenis_pendidikan">Jenis Pendidikan</label>
                            <select class="form-control" name="jenis_pendidikan">
                                <option value="">Pilih</option>
                                <option value="tk" <?php if($row["jenis_pendidikan"] == "tk")echo "selected"; ?>>TK</option>
                                <option value="kb" <?php if($row["jenis_pendidikan"] == "kb")echo "selected"; ?>>KB</option>
                                <option value="tpa" <?php if($row["jenis_pendidikan"] == "tpa")echo "selected"; ?>>TPA</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama_pembayaran">Bukti TF</label>
                            <input class="form-control" type="file" name="nama_pembayaran" id="nama_pembayaran">
                            <img src="../gambar/<?= $row["nama_pembayaran"] ?>" id="gambar_nodin" width="400" alt="Preview Gambar" />
                        </div>
                    </div>

                    <script>
                        function readURL(input) {
                        if (input.files && input.files[0]) {
                            var reader = new FileReader();
                            reader.onload = function(e) {
                            $('#gambar_nodin').attr('src', e.target.result);
                            }
                            reader.readAsDataURL(input.files[0]);
                        }
                        }
                        $("#nama_pembayaran").change(function() {
                        readURL(this);
                        });
                    </script>

                    <div class="col-md-12">
                        <div class="form-group">
                            <button class="btn btn-sm btn-danger" name="edit_pembayaran">Edit</button>
                        </div>
                    </div>

                </div>
            </form>

        </div>

</div>

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