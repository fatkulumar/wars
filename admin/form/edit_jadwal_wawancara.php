<?php
    $id = $_GET["edit_jadwal_wawancara"];
    $sql_jadwal_wawancara = mysqli_query($koneksi, "SELECT `id_jadwal_wawancara`, `jadwal_wawancara`, `jam_wawancara` FROM `tb_jadwal_wawancara` WHERE `id_jadwal_wawancara`='$id'");
    $row = mysqli_fetch_array($sql_jadwal_wawancara);
?>

<div class="card">
        
        <div class="card-header bg-primary">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="m-0 text-white">
                        <strong>Edit Jadwal Wawancara</strong>
                    </h1>
                </div>
            </div>
        </div>

        <div class="card-body">

            <form action="proses/proses.php" method="POST">
                <input type="hidden" name="id_jadwal_wawancara" value="<?= $id ?>">
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="jadwal_wawancara">Jadwal</label>
                            <input class="form-control" type="date" name="jadwal_wawancara" value="<?= $row["jadwal_wawancara"] ?>">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="jam_wawancara">Waktu</label>
                            <input class="form-control" type="time" name="jam_wawancara" value="<?= $row["jam_wawancara"] ?>">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <button class="btn btn-sm btn-danger" name="edit_jadwal_wawancara">Edit</button>
                        </div>
                    </div>

                </div>
            </form>

        </div>

</div>