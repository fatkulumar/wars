<?php
    $sql_pembayaran_tk = mysqli_query($koneksi, "SELECT `jenis_pendidikan`, count('jenis_pendidikan') AS jml_jenis_pendidikan_tk FROM `tb_pembayaran` WHERE jenis_pendidikan = 'tk'");

    $sql_pembayaran_kb = mysqli_query($koneksi, "SELECT `jenis_pendidikan`, count('jenis_pendidikan') AS jml_jenis_pendidikan_kb FROM `tb_pembayaran` WHERE jenis_pendidikan = 'kb'");
    
    $sql_pembayaran_tpa = mysqli_query($koneksi, "SELECT `jenis_pendidikan`, count('jenis_pendidikan') AS jml_jenis_pendidikan_tpa FROM `tb_pembayaran` WHERE jenis_pendidikan = 'tpa'");

    $sql_user = mysqli_query($koneksi, "SELECT id_user, count('id_user') AS jml_user FROM tb_user");

    $jml_user = mysqli_fetch_array($sql_user);
    $jml_user["jml_user"];

    $jml_tk = mysqli_fetch_array($sql_pembayaran_tk);
    $jml_tk["jml_jenis_pendidikan_tk"];

    $jml_kb = mysqli_fetch_array($sql_pembayaran_kb);
    $jml_kb["jml_jenis_pendidikan_kb"];

    $jml_tpa = mysqli_fetch_array($sql_pembayaran_tpa);
    $jml_tpa["jml_jenis_pendidikan_tpa"];

?>

<!-- <script src="../highcharts/code/highcharts.js"></script>
<script src="../highcharts/code/export-data.js"></script>
<script src="../highcharts/code/exporting.js"></script> -->
<!-- <style>
    .modal{
        width: 20%;
    }
</style> -->

<div class="card-header bg-primary">
    <div style="position: absolute;">  
        <h3 class="m-0 text-white">
            <strong>Grafik</strong>
        </h3>
    </div>
    <div style="position: relative;">
        <a class="btn btn-danger float-right btn-sm" href="index.php?cetak_grafik"><i class="fa fa-print"></i></a>
    </div>
</div>
<div id="container"></div>

<div class="row">
    <div class="col-12 col-sm-6 col-md-3" data-toggle="modal" data-target="#modalTK">
    <div class="info-box">
        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

        <div class="info-box-content">
            <span class="info-box-text">TK Traffic</span>
            <span class="info-box-number">
                <?= $jml_tk["jml_jenis_pendidikan_tk"] ?>
                <!-- <small>%</small> -->
            </span>
        </div>
        <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3" data-toggle="modal" data-target="#modalKB">
        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

        <div class="info-box-content" data-toggle="modal" data-target="#modalKB">
            <span class="info-box-text">KB Traffic</span>
            <span class="info-box-number"><?= $jml_kb["jml_jenis_pendidikan_kb"] ?></span>
        </div>
        <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix hidden-md-up"></div>

    <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3" data-toggle="modal" data-target="#modalTPA">
        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

        <div class="info-box-content">
            <span class="info-box-text">TPA Traffic</span>
            <span class="info-box-number"><?= $jml_tpa["jml_jenis_pendidikan_tpa"] ?></span>
        </div>
        <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

        <div class="info-box-content">
        <span class="info-box-text">New Members</span>
        <span class="info-box-number"><?= $jml_user["jml_user"] ?></span>
        </div>
        <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->

<!-- Modal Modal TK-->
<div class="modal fade" id="modalTK" tabindex="-1" role="dialog" aria-labelledby="modalPembayaranLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
        <div class="modal-header bg-primary">
            <h5 class="modal-title m-0" id="modalPembayaranLabel"><strong>TK</strong></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="table table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gelombang</th>
                            <th>Jumlah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $no = 1;
                            $sql_gel_tk = mysqli_query($koneksi, "SELECT `id_pembayaran`,`gelombang_ke`, count('gelombang_ke') AS jml_gel_tk FROM `tb_pembayaran` WHERE `jenis_pendidikan` = 'tk' GROUP BY `gelombang_ke`");
                            while($row_tk = mysqli_fetch_array($sql_gel_tk)): 
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row_tk["gelombang_ke"] ?></td>
                            <td><?= $row_tk["jml_gel_tk"] ?></td>
                            <td><a href="proses/proses.php?print_tk=<?= $row_tk['id_pembayaran'] ?>"><i class="fa fa-print"></i></a></td>
                        </tr>
                        <?php endwhile ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>
        </div>
    </div>
</div>

<!-- Modal Modal KB-->
<div class="modal fade" id="modalKB" tabindex="-1" role="dialog" aria-labelledby="modalPembayaranLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
        <div class="modal-header bg-primary">
            <h5 class="modal-title m-0" id="modalPembayaranLabel"><strong>KB</strong></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <div class="table table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gelombang</th>
                            <th>Jumlah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $no = 1;
                            $sql_gel_tk = mysqli_query($koneksi, "SELECT `gelombang_ke`, count('gelombang_ke') AS jml_gel_tk FROM `tb_pembayaran` WHERE `jenis_pendidikan` = 'kb' GROUP BY `gelombang_ke`");
                            while($row_tk = mysqli_fetch_array($sql_gel_tk)): 
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row_tk["gelombang_ke"] ?></td>
                            <td><?= $row_tk["jml_gel_tk"] ?></td>
                            <td><a href="#"><i class="fa fa-print"></i></a></td>
                        </tr>
                        <?php endwhile ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>
        </div>
    </div>
</div>

<!-- Modal Modal TPA-->
<div class="modal fade" id="modalTPA" tabindex="-1" role="dialog" aria-labelledby="modalPembayaranLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
        <div class="modal-header bg-primary">
            <h5 class="modal-title m-0" id="modalPembayaranLabel"><strong>TPA</strong></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <div class="table table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gelombang</th>
                            <th>Jumlah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $no = 1;
                            $sql_gel_tk = mysqli_query($koneksi, "SELECT `gelombang_ke`, count('gelombang_ke') AS jml_gel_tk FROM `tb_pembayaran` WHERE `jenis_pendidikan` = 'tpa' GROUP BY `gelombang_ke`");
                            while($row_tk = mysqli_fetch_array($sql_gel_tk)): 
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row_tk["gelombang_ke"] ?></td>
                            <td><?= $row_tk["jml_gel_tk"] ?></td>
                            <td><a href="#"><i class="fa fa-print"></i></a></td>
                        </tr>
                        <?php endwhile ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>
        </div>
    </div>
</div>