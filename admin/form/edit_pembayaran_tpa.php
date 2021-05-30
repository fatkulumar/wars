<?php
    $id = $_GET["edit_pembayaran_tpa"];
    $sql_pemb_tpa = mysqli_query($koneksi, "SELECT `id_pembayaran_tpa`, `nama_paket_pembayaran_tpa`, `biaya_formulir_pembayaran_tpa`, `insidental_pembayaran_tpa`, `biaya_pembayaran_tpa` FROM `tb_pembayaran_tpa` WHERE `id_pembayaran_tpa` = '$id'");
    $row = mysqli_fetch_array($sql_pemb_tpa);
?>

<div class="card">
        
        <div class="card-header bg-success">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="m-0 text-white" style="font-size: 14px;">
                        <strong>Edit Pembayaran TPA</strong>
                    </h1>
                </div>
            </div>
        </div>

        <div class="card-body">

            <form action="proses/proses.php" method="POST" enctype="multipart/form-data">
            
            <input type="hidden" name="id_pembayaran_tpa" value="<?= $row["id_pembayaran_tpa"] ?>" required>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama_paket">Nama Paket</label>
                            <input class="form-control" type="text" name="nama_paket_pembayaran_tpa" value="<?= $row["nama_paket_pembayaran_tpa"] ?>" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="biaya_formulir_pembayaran_tpa">Biaya Formulir</label>
                            <input class="form-control" type="text" name="biaya_formulir_pembayaran_tpa" value="<?= $row["biaya_formulir_pembayaran_tpa"] ?>" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="insidental_pembayaran_tpa">Biaya Insidental</label>
                            <input class="form-control" type="text" name="insidental_pembayaran_tpa" value="<?= $row["insidental_pembayaran_tpa"] ?>" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="biaya_pembayaran_tpa">Biaya Pedaftaran TPA</label>
                            <input class="form-control" type="text" name="biaya_pembayaran_tpa" value="<?= $row["biaya_pembayaran_tpa"] ?>" required>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="form-group">
                            <button class="btn btn-sm btn-danger" name="edit_pembayaran_tpa">Tambah</button>
                        </div>
                    </div>

                </div>
            </form>

        </div>

</div>
