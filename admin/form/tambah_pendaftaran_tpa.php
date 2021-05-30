<div class="card">
        
        <div class="card-header bg-primary">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="m-0 text-white" style="font-size: 14px;">
                        <strong>Tambah Pendaftaran TPA</strong>
                    </h1>
                </div>
            </div>
        </div>

        <div class="card-body">

            <form action="proses/proses.php" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama_paket">Nama Paket</label>
                            <input class="form-control" type="text" name="nama_paket" required>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="biaya_tpa">Biaya TPA</label>
                            <input class="form-control" type="number" name="biaya_tpa" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="biaya_formulir">Biaya Formulir</label>
                            <input class="form-control" type="number" name="biaya_formulir" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="isidental">Insidental</label>
                            <input class="form-control" type="number" name="isidental" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="biaya_pendaftaran">Biaya Pendaftaran</label>
                            <input class="form-control" type="number" name="biaya_pendaftaran" required>
                        </div>
                    </div>

                    
                    <div class="col-md-12">
                        <div class="form-group">
                            <button class="btn btn-sm btn-danger" name="tambah_pendaftaran_tpa">Tambah</button>
                        </div>
                    </div>

                </div>
            </form>

        </div>

</div>