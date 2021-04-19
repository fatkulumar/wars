<?php
    $id = $_GET["edit_pendaftaran"];
    $sql_daftar_biaya = mysqli_query($koneksi, "SELECT `gel_ke`, `pendidikan`, `tgl_gel1`, `tgl_gel2`, `biaya_formulir`, `dpp`, `uang_kegiatan`, `uang_buku_pertahun`, `uang_seragam`, `spp` FROM `tb_daftar_biaya_tk_kb` WHERE `id_daftar_biaya` = '$id'");
    $row = mysqli_fetch_array($sql_daftar_biaya);
?>

<div class="card">
        
        <div class="card-header bg-primary">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="m-0 text-white">
                        <strong>Tambah Pendaftaran</strong>
                    </h1>
                </div>
            </div>
        </div>

        <div class="card-body">

            <form action="proses/proses.php" method="POST">
            <input type="hidden" name="id_daftar_biaya" value="<?= $id ?>">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="gel_ke">Gelombang Ke</label>
                            <input class="form-control" type="text" name="gel_ke" value="<?= $row["gel_ke"] ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pendidikan">Pendidikan</label>
                            <input class="form-control" type="text" name="pendidikan" value="<?= $row["pendidikan"] ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tgl_gel1">Tgl Gelombang 1</label>
                            <input class="form-control" type="date" name="tgl_gel1" value="<?= $row["tgl_gel1"] ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tgl_gel2">Tgl Gelombang 2</label>
                            <input class="form-control" type="date" name="tgl_gel2" value="<?= $row["tgl_gel2"] ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="biaya_formulir">Biaya Formulir</label>
                            <input class="form-control" type="text" name="biaya_formulir" value="<?= $row["biaya_formulir"] ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="dpp">Biaya Formulir</label>
                            <input class="form-control" type="text" name="dpp" value="<?= $row["dpp"] ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="uang_kegiatan">Biaya Kegiatan</label>
                            <input class="form-control" type="text" name="uang_kegiatan" value="<?= $row["uang_kegiatan"] ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="uang_buku_pertahun">Biaya Buku Pertahun</label>
                            <input class="form-control" type="text" name="uang_buku_pertahun" value="<?= $row["uang_buku_pertahun"] ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="uang_seragam">Biaya Seragam</label>
                            <input class="form-control" type="text" name="uang_seragam" value="<?= $row["uang_seragam"] ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="spp">SPP</label>
                            <input class="form-control" type="text" name="spp" value="<?= $row["spp"] ?>">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <button class="btn btn-sm btn-danger" name="edit_pendaftaran">Tambah</button>
                        </div>
                    </div>

                </div>
            </form>

        </div>

</div>
