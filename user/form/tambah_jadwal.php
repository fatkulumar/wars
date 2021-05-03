<div class="card">
        
        <div class="card-header bg-primary">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="m-0 text-white">
                        <strong>Pilih Jadwal</strong>
                    </h1>
                </div>
            </div>
        </div>

        <div class="card-body">

            <form action="proses/proses.php" method="POST">
                <div class="row">
                    
                    <div class="col-md-12">
                        <div>
                            <label for="id_jadwal_wawancara_wawancara">Pilih Jadwal</label>
                        </div>
                        <div class="form-check">
                            <?php
                                $sql_jadwal_wawancara = mysqli_query($koneksi, "SELECT `id_jadwal_wawancara`, `jadwal_wawancara`, `jam_wawancara` FROM `tb_jadwal_wawancara`");
                                while($row_jadwal_wawancara = mysqli_fetch_array($sql_jadwal_wawancara)):
                            ?>
                                <input class="form-check-input" type="radio" name="id_jadwal_wawancara_wawancara" value="<?= $row_jadwal_wawancara["id_jadwal_wawancara"] ?>">

                                <label class="form-check-label" for="id_jadwal_wawancara_wawancara"><?php echo $row_jadwal_wawancara["jadwal_wawancara"]; echo " "; echo $row_jadwal_wawancara["jam_wawancara"]; ?></label>
                                <br>
                            <?php endwhile ?>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="form-group">
                            <button class="btn btn-sm btn-danger" name="tambah_wawancara">Tambah</button>
                        </div>
                    </div>

                </div>
            </form>

        </div>

</div>