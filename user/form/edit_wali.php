<?php
    $id = $_GET["edit_wali"];
    $sql_wali = mysqli_query($koneksi, "SELECT * FROM tb_wali WHERE id_wali = '$id'");
    $row = mysqli_fetch_array($sql_wali);
?>

<div class="card">
        
        <div class="card-header bg-primary">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="m-0 text-white" style="font-size: 14px;">
                        <strong>Edit Ayah</strong>
                    </h1>
                </div>
            </div>
        </div>

        <div class="card-body">

            <form action="proses/proses.php" method="POST">
                <input type="hidden" name="id_wali" value="<?= $id ?>">
                <div class="row">
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama_wali">Nama Ayah</label>
                            <input class="form-control" type="text" name="nama_wali" value="<?= $row['nama_wali'] ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tempat_lahir_wali">Tempat Lahir</label>
                            <input class="form-control" type="text" name="tempat_lahir_wali" value="<?= $row['tempat_lahir_wali'] ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tgl_lahir_wali">Tanggal Lahir</label>
                            <input class="form-control" type="date" name="tgl_lahir_wali" value="<?= $row['tgl_lahir_wali'] ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pendidikan_wali">Pendidikan Terakhir</label>
                            <input class="form-control" type="text" name="pendidikan_wali" value="<?= $row['pendidikan_wali'] ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="agama_wali">Agama</label>
                            <input class="form-control" type="text" name="agama_wali" value="<?= $row['agama_wali'] ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="negara_wali">Negara</label>
                            <input class="form-control" type="text" name="negara_wali" value="<?= $row['negara_wali'] ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="bangsa_wali">Suku Bangsa</label>
                            <input class="form-control" type="text" name="bangsa_wali" value="<?= $row['bangsa_wali'] ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pekerjaan_wali">Pekerjaan</label>
                            <input class="form-control" type="text" name="pekerjaan_wali" value="<?= $row['pekerjaan_wali'] ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="penghasilan_wali">Penghasilan</label>
                            <input class="form-control" type="text" name="penghasilan_wali" value="<?= $row['penghasilan_wali'] ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="alamat_kantor_wali">Alamat Kantor</label>
                            <textarea class="form-control" name="alamat_kantor_wali" cols="10" rows="5"><?= $row['alamat_kantor_wali'] ?></textarea>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="hp_kantor_wali">Telp Kantor</label>
                            <input class="form-control" type="text" name="hp_kantor_wali" value="<?= $row['hp_kantor_wali'] ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="golongan_darah_wali">Golongan Darah</label>
                            <input class="form-control" type="text" name="golongan_darah_wali" value="<?= $row['golongan_darah_wali'] ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="alamat_rumah_wali">Alamat Rumah</label>
                            <textarea class="form-control" name="alamat_rumah_wali" id="" cols="30" rows="10"><?= $row['alamat_rumah_wali'] ?></textarea>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <button class="btn btn-sm btn-danger" name="edit_wali">Edit</button>
                        </div>
                    </div>

                </div>
            </form>

        </div>

</div>