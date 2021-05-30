<div class="card">
        
        <div class="card-header bg-primary">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="m-0 text-white" style="font-size: 14px;">
                        <strong>Edit Anak</strong>
                    </h1>
                </div>
            </div>
        </div>

        <?php
            $id = $_GET["edit_anak"];
            $sql_anak = mysqli_query($koneksi, "SELECT * FROM tb_anak WHERE id_anak = '$id'");
            $row_anak = mysqli_fetch_array($sql_anak);
        ?>

        <div class="card-body">

            <form action="proses/proses.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="id_anak" value="<?= $id ?>">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="id_wali">Ayah</label>
                            <select class="form-control" name="id_wali">
                                <option value="">Pilih Ayah</option>
                            <?php 
                                $sql_wali = mysqli_query($koneksi, "SELECT id_wali, nama_wali FROM tb_wali");
                                while($row_wali = mysqli_fetch_array($sql_wali)):
                            ?>
                                <option value="<?= $row_wali["id_wali"] ?>" <?php if($row_anak["id_wali_anak"] == $row_wali["id_wali"]){echo "selected";} ?>><?= $row_wali["nama_wali"] ?></option>
                            <?php
                                endwhile
                            ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="id_ibu">Ibu</label>
                            <select class="form-control" name="id_ibu">
                                <option value="">Pilih Ibu</option>
                            <?php 
                                $sql_ibu = mysqli_query($koneksi, "SELECT id_ibu, nama_ibu FROM tb_ibu");
                                while($row_ibu = mysqli_fetch_array($sql_ibu)):
                            ?>
                                <option value="<?= $row_ibu["id_ibu"] ?>" <?php if($row_anak["id_ibu_anak"] == $row_ibu["id_ibu"]){echo "selected";} ?>><?= $row_ibu["nama_ibu"] ?></option>
                            <?php
                                endwhile
                            ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama_anak">Nama Anak</label>
                            <input class="form-control" type="text" name="nama_anak" value="<?= $row_anak["nama_anak"] ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="jenis_kelamin_anak">Jenis Kelamin</label>
                            <select class="form-control" name="jenis_kelamin_anak">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="L" <?php if($row_anak["jenis_kelamin_anak"] == "L"){echo "selected";}  ?>>Laki-laki</option>
                                <option value="P" <?php if($row_anak["jenis_kelamin_anak"] == "P"){echo "selected";}  ?>>Perempuan</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tempat_lahir_anak">Tempat Lahir</label>
                            <input class="form-control" type="text" name="tempat_lahir_anak" value="<?= $row_anak["tempat_lahir_anak"] ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tgl_lahir_anak">Tanggal Lahir</label>
                            <input class="form-control" type="date" name="tgl_lahir_anak" value="<?= $row_anak["tgl_lahir_anak"] ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="agama_anak">Agama Anak</label>
                            <input class="form-control" type="text" name="agama_anak" value="<?= $row_anak["agama_anak"] ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="anak_ke">Anak Ke</label>
                            <input class="form-control" type="text" name="anak_ke" value="<?= $row_anak["anak_ke"] ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="jml_saudara_anak">Jumlah Saudara</label>
                            <input class="form-control" type="text" name="jml_saudara_anak" value="<?= $row_anak["jml_saudara_anak"] ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="warga_negara_anak">Warga Negara</label>
                            <input class="form-control" type="text" name="warga_negara_anak" value="<?= $row_anak["warga_negara_anak"] ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="suku_bangsa_anak">Suku Bangsa</label>
                            <input class="form-control" type="text" name="suku_bangsa_anak" value="<?= $row_anak["suku_bangsa_anak"] ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="bahasa_anak">Bahasa</label>
                            <input class="form-control" type="text" name="bahasa_anak" value="<?= $row_anak["bahasa_anak"] ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="golongan_darah_anak">Golongan Darah</label>
                            <input class="form-control" type="text" name="golongan_darah_anak" value="<?= $row_anak["golongan_darah_anak"] ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="riwayat_penyakit_anak">Riwayat Penyakit</label>
                            <textarea class="form-control" name="riwayat_penyakit_anak" cols="10" rows="5"><?= $row_anak["riwayat_penyakit_anak"] ?></textarea>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="alamat_rumah_anak">Alamat Rumah</label>
                            <textarea class="form-control" name="alamat_rumah_anak" cols="10" rows="5"><?= $row_anak["alamat_rumah_anak"] ?></textarea>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="foto_anak">Foto Anak</label>
                            <input class="form-control" type="file" name="foto_anak" id="foto_anak">
                            <img src="../gambar/<?= $row_anak["foto_anak"] ?>" id="gambar_nodin" width="400" alt="Preview Gambar" />
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
                        $("#foto_anak").change(function() {
                        readURL(this);
                        });
                    </script>

                    <div class="col-md-12">
                        <div class="form-group">
                            <button class="btn btn-sm btn-danger" name="edit_anak">Edit</button>
                        </div>
                    </div>

                </div>
            </form>

        </div>

</div>