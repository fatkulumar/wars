<div class="card">
        
        <div class="card-header bg-primary">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="m-0 text-white">
                        <strong>Tambah Jadwal Wawancara</strong>
                    </h1>
                </div>
            </div>
        </div>

        <div class="card-body">

            <form action="proses/proses.php" method="POST">
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="jadwal_wawancara">Jadwal</label>
                            <input class="form-control" type="date" name="jadwal_wawancara">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="jam_wawancara">Waktu</label>
                            <input class="form-control" type="time" name="jam_wawancara">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <button class="btn btn-sm btn-danger" name="tambah_jadwal_wawancara">Tambah</button>
                        </div>
                    </div>

                </div>
            </form>

        </div>

</div>