<div class="card">
        
        <div class="card-header bg-primary">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="m-0 text-white" style="font-size: 14px;">
                        <strong>Tambah Pendaftaran TK & KB</strong>
                    </h1>
                </div>
            </div>
        </div>

        <div class="card-body">

            <form action="proses/proses.php" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="gel_ke">Gelombang Ke</label>
                            <input class="form-control" type="number" name="gel_ke" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pendidikan">Pendidikan</label>
                            <select class="form-control" name="pendidikan" required>
                                <option value="">Pilih</option>
                                <option value="tk">TK</option>
                                <!-- <option value="tpa">TPA</option> -->
                                <option value="kb">KB</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tgl_gel1">Tgl Gelombang 1</label>
                            <input class="form-control" type="date" name="tgl_gel1" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tgl_gel2">Tgl Gelombang 2</label>
                            <input class="form-control" type="date" name="tgl_gel2" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="biaya_formulir">Biaya Formulir</label>
                            <input class="form-control" type="text" name="biaya_formulir" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="dpp">Biaya Formulir</label>
                            <input class="form-control" type="text" name="dpp" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="uang_kegiatan">Biaya Kegiatan</label>
                            <input class="form-control" type="text" name="uang_kegiatan" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="uang_buku_pertahun">Biaya Buku Pertahun</label>
                            <input class="form-control" type="text" name="uang_buku_pertahun" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="uang_seragam">Biaya Seragam</label>
                            <input class="form-control" type="text" name="uang_seragam" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="spp">SPP</label>
                            <input class="form-control" type="text" name="spp" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tahun_ajaran">Tahun Ajaran</label>
                            <input class="form-control" type="text" name="tahun_ajaran" placeholder="2020-2021" required>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <button class="btn btn-sm btn-danger" name="tambah_pendaftaran_tk_kb">Tambah</button>
                        </div>
                    </div>

                </div>
            </form>

        </div>

</div>