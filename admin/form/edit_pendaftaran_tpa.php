<?php
    $id = $_GET["edit_pendaftaran_tpa"];
    $sql_pendaftaran_tpa = mysqli_query($koneksi, "SELECT `id_biaya_tpa`, `biaya_tpa`, `nama_paket`, `biaya_formulir_tpa`, `insidental`, `biaya_pendaftaran_tpa` FROM `tb_daftar_biaya_tpa` WHERE `id_biaya_tpa` = '$id'");
    $row = mysqli_fetch_array($sql_pendaftaran_tpa);
?>

<div class="card">
        
        <div class="card-header bg-primary">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="m-0 text-white" style="font-size: 14px;">
                        <strong>Edit Pendaftaran TPA</strong>
                    </h1>
                </div>
            </div>
        </div>

        <div class="card-body">

            <form action="proses/proses.php" method="POST">
                <input type="hidden" name="id_biaya_tpa" value="<?= $row["id_biaya_tpa"]; ?>">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama_paket">Nama Paket</label>
                            <input class="form-control" type="text" name="nama_paket" value="<?= $row['nama_paket'] ?>" required>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="biaya_tpa">Biaya TPA</label>
                            <input class="form-control" type="number" name="biaya_tpa" value="<?= $row['biaya_tpa'] ?>" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="biaya_formulir">Biaya Formulir</label>
                            <input class="form-control" type="number" name="biaya_formulir" value="<?= $row['biaya_formulir_tpa'] ?>" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="isidental">Insidental</label>
                            <input class="form-control" type="number" name="isidental" value="<?= $row['insidental'] ?>" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="biaya_pendaftaran">Biaya Pendaftaran</label>
                            <input class="form-control" type="number" name="biaya_pendaftaran" value="<?= $row['biaya_pendaftaran_tpa'] ?>" required>
                        </div>
                    </div>

                    
                    <div class="col-md-12">
                        <div class="form-group">
                            <button class="btn btn-sm btn-danger" name="edit_pendaftaran_tpa">Update</button>
                        </div>
                    </div>

                </div>
            </form>

        </div>

</div>