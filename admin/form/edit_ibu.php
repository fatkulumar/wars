<?php
    $id = $_GET["edit_ibu"];
    $sql_ibu = mysqli_query($koneksi, "SELECT * FROM tb_ibu");
    $row = mysqli_fetch_array($sql_ibu);
?>

<div class="card">
        
        <div class="card-header bg-primary">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="m-0 text-white">
                        <strong>Edit Ibu</strong>
                    </h1>
                </div>
            </div>
        </div>

        <div class="card-body">

            <form action="proses/proses.php" method="POST">
                <input type="text" name="id_ibu" value="<?= $id ?>">
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="id_wali_ibu">Nama Ayah</label>
                            <select class="form-control" name="id_wali_ibu">
                                <option value="">Pilih Ayah</option>
                                <?php
                                    $sql_wali = mysqli_query($koneksi, "SELECT id_wali, nama_wali FROM tb_wali");
                                    while($row_wali = mysqli_fetch_array($sql_wali)):
                                ?>
                                    <option value="<?= $row_wali["id_wali"] ?>" <?php if($row_wali["id_wali"] == $row["id_wali_ibu"]){echo "selected";}?>><?= $row_wali["id_wali"] ?></option>
                                <?php endwhile ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama_ibu">Nama Ibu</label>
                            <input class="form-control" type="text" name="nama_ibu" value="<?= $row["nama_ibu"] ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tempat_lahir_ibu">Tempat Lahir</label>
                            <input class="form-control" type="text" name="tempat_lahir_ibu" value="<?= $row["tempat_lahir_ibu"] ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tgl_lahir_ibu">Tanggal Lahir</label>
                            <input class="form-control" type="date" name="tgl_lahir_ibu" value="<?= $row["tgl_lahir_ibu"] ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pendidikan_ibu">Pendidikan Terakhir</label>
                            <input class="form-control" type="text" name="pendidikan_ibu" value="<?= $row["pendidikan_ibu"] ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="agama_ibu">Agama</label>
                            <input class="form-control" type="text" name="agama_ibu" value="<?= $row["agama_ibu"] ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="negara_ibu">Negara</label>
                            <input class="form-control" type="text" name="negara_ibu" value="<?= $row["negara_ibu"] ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="bangsa_ibu">Suku Bangsa</label>
                            <input class="form-control" type="text" name="bangsa_ibu" value="<?= $row["bangsa_ibu"] ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pekerjaan_ibu">Pekerjaan</label>
                            <input class="form-control" type="text" name="pekerjaan_ibu" value="<?= $row["pekerjaan_ibu"] ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="perngahsilan_ibu">Penghasilan</label>
                            <input class="form-control" type="text" name="penghasilan_ibu" value="<?= $row["penghasilan_ibu"] ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="alamat_kantor_ibu">Alamat Kantor</label>
                            <textarea class="form-control" name="alamat_kantor_ibu" cols="10" rows="5"><?= $row["alamat_kantor_ibu"] ?></textarea>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="hp_kantor_ibu">Telp Kantor</label>
                            <input class="form-control" type="text" name="hp_kantor_ibu" value="<?= $row["hp_kantor_ibu"] ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="golongan_darah_ibu">Golongan Darah</label>
                            <input class="form-control" type="text" name="golongan_darah_ibu" value="<?= $row["golongan_darah_ibu"] ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="alamat_rumah_ibu">Alamat Rumah</label>
                            <textarea class="form-control" name="alamat_rumah_ibu" id="" cols="30" rows="10"><?= $row["alamat_rumah_ibu"] ?></textarea>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <button class="btn btn-sm btn-danger" name="edit_ibu">Edit</button>
                        </div>
                    </div>

                </div>
            </form>

        </div>

</div>