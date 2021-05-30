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
                            <label for="nama_paket">Nama Paket</label>
                            <input class="form-control" type="text" name="nama_paket" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="biaya_tpa">Biaya</label>
                            <input class="form-control" type="text" name="biaya_tpa" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="biaya_formulir_tpa">Biaya Formulir TPA</label>
                            <input class="form-control" type="text" name="biaya_formulir_tpa" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="insidental">Biaya Insidental</label>
                            <input class="form-control" type="text" name="insidental" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="biaya_pendaftaran_tpa">Biaya Pedaftaran TPA TF</label>
                            <input class="form-control" type="text" name="biaya_pendaftaran_tpa" required>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="form-group">
                            <button class="btn btn-sm btn-danger" name="tambah_pembayaran_tpa">Tambah</button>
                        </div>
                    </div>

                </div>
            </form>

        </div>

</div>
