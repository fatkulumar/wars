<?php 
    $id = $_SESSION["id"];
    $sql_bidata = mysqli_query($koneksi, "SELECT * FROM tb_ibu i JOIN tb_wali w ON w.id_wali = i.id_wali_ibu JOIN tb_anak a ON a.id_ibu_anak = i.id_ibu JOIN tb_user u ON u.id_user = w.id_user_wali WHERE u.id_user = '$id'");
    $row = mysqli_fetch_array($sql_bidata);

    $sql_pembayaran = mysqli_query($koneksi, "SELECT nama_pembayaran FROM tb_pembayaran WHERE id_user_pembayaran = '$id'");
    $row_pembayaran = mysqli_fetch_array($sql_pembayaran);
?>

<div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Well done!</h4>
  <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
  <hr>
  <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
</div>


<div class="row">
    <div class="col-12 col-sm-6 col-md-6">
        <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Status Pengisian Biodata</span>
                    <span class="info-box-number">
                        <span class="bg-success">
                            <?php if($row == 0){echo "Biodata Kosong";}else{echo "Biodata Terisi";}?>
                        </span>
                        <div>
                            <small>Lengkapi Biodata <a href="index.php?table_anak">Disini</a></small>
                        </div>
                    </span>
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
    <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-6">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">
                    Status Pembayaran
                <span class="info-box-number">
                <span class="bg-success">
                    <?php if($row_pembayaran == 0){echo "Belum Lunas";}else{echo "Lunas";}?>
                </span>
                <div>
                    <small>Bayar <a href="<?php if($row_pembayaran == 0){echo 'index.php?table_pembayaran';}else{echo 'javascript:void(0)';}?>">Disini</a> apabila belum lunas</small>
                </div>
            <!-- /.info-box-content -->
        </div>
    <!-- /.info-box -->
    </div>
    <!-- /.col -->

    </div>
</div>


<!-- jalur masuk -->

<?php
    $id_user = $_SESSION["id"];
    // $sql_user = mysqli_query($koneksi, "SELECT id_user, nama_user, foto_user, nama_wali, nama_anak, id_anak FROM tb_user u JOIN tb_wali w ON u.id_user = w.id_user_wali JOIn tb_anak a ON a.id_wali_anak = w.id_wali");
    // $row = mysqli_fetch_array($sql_user);
    // $row["id_user"];
    // $sql_pembayaran = mysqli_query($koneksi, "SELECT * FROM tb_user u LEFT JOIN tb_wali w ON u.id_user = w.id_user_wali LEFT JOIN tb_anak a ON w.id_wali = a.id_wali_anak LEFT JOIN tb_pembayaran p ON p.id_user_pembayaran = u.id_user WHERE u.id_user = '$id_user'");
    // $row = mysqli_fetch_array($sql_pembayaran);
    //sql pembayaran
    $sql_pemb = mysqli_query($koneksi, "SELECT nama_pembayaran, id_user_pembayaran FROM tb_pembayaran WHERE id_user_pembayaran = '$id_user'");
    $row_pemb = mysqli_fetch_array($sql_pemb);
        if($row_pemb == null){
            echo "<div class='alert alert-warning' role='alert'>
                    <i>Segera Lunasi Pembayaran Anda</i><i style='font-size: 10px; color:red'>*Pilih Jalur Masuk</i>
                </div>";
        }
    
?>

        <div class="card-header bg-success">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="mt-2 text-white" style="font-size: 14px;">
                        <strong>Pembayaran</strong>
                    </h1>
                </div>
                <!-- <div class="col-md-6">
                    <h1 class="mt-0 text-white" style="font-size: 14px; float: right;">
                        <a class="btn btn-sm btn-danger" href="<?php if($row_pemb["nama_pembayaran"] == null){echo "index.php?upload_bukti_pembayaran";}else{echo "javascript:void(0)";}?>"><i class="fa fa-camera"></i></a>
                    </h1>
                </div> -->
            </div>
        </div>

        <?php if(isset($_SESSION["alert_edit"])): ?>
            <script>alert("Berhasil Edit Pembayaran")</script>
        <?php unset($_SESSION["alert_edit"]) ?>
        <?php endif; ?>

        <?php if(isset($_SESSION["alert_hapus"])): ?>
            <script>alert("Berhasil Hapus Pembayaran")</script>
        <?php unset($_SESSION["alert_hapus"]) ?>
        <?php endif; ?>

        <?php if(isset($_SESSION["alert_tambah"])): ?>
            <script>alert("Berhasil Tambah Pembayaran")</script>
        <?php unset($_SESSION["alert_tambah"]) ?>
        <?php endif; ?>
        
        <div class="card">
            <div class="card-body">
               
        <div class="row">
            <!-- <div class="col-md-6"> 
                <img class="card-img-top" src="../gambar/<?= $row['foto_user'] ?>" class="elevation-2" alt="User Image">
            </div> -->

            <div class="table table-responsive">
                <table id="table_user" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Wali</th>
                            <th>Nama Anak</th>
                            <th>Pendidikan</th>
                            <th>Gelombang</th>
                            <th>Biaya</th>
                            <th>Bukti</th>
                            <th>Status</th>
                            <th>Tgl Pembayaran</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php
                        $no =1;
                        $sql_pembayaran = mysqli_query($koneksi, "SELECT `id_pembayaran`, `id_user_pembayaran`, `jenis_pendidikan`, `nama_pembayaran`, `gelombang_ke`, `biaya_gelombang`, `status_pembayaran`, `tahun_pembayaran`, `tgl_pembayaran`, nama_user, nama_anak, nama_wali FROM  tb_user u JOIN tb_pembayaran p ON p.id_user_pembayaran = u.id_user JOIN tb_wali w ON w.id_user_wali = u.id_user JOIN tb_anak a ON a.id_wali_anak = w.id_wali  WHERE u.id_user = '$id_user'");
                        while($row = mysqli_fetch_array($sql_pembayaran)):
                    ?>
                        
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row["nama_wali"] ?></td>
                            <td><?= $row["nama_anak"] ?></td>
                            <td><?= $row["jenis_pendidikan"] ?></td>
                            <td><?= $row["gelombang_ke"] ?></td>
                            <td><?= $row["biaya_gelombang"] ?></td>
                            <td>
                                <?php if($row["nama_pembayaran"] == ""):?>
                                    <a class="btn btn-sm btn-danger" href="<?php if($row_pemb["nama_pembayaran"] == null){echo "index.php?upload_bukti_pembayaran";}else{echo "javascript:void(0)";}?>"><i class="fa fa-camera"></i></a>
                                <?php else: ?>
                                    <img width="100px" src="../gambar/<?= $row["nama_pembayaran"] ?>" alt=""></td>
                                <?php endif ?>
                            <td>
                                <?php 
                                    if($row["status_pembayaran"] == 0){
                                        echo "Belum Lunas";
                                    }
                            ?>
                            </td>
                            <td><?= $row["tgl_pembayaran"] ?></td>
                        </tr>

                        <?php endwhile ?>
                    </tbody>
                </table>
            </div>

            <div class="card bg-success">
            <div class="col-md-12">
                    <h1 class="mt-2 text-white" style="font-size: 14px;">
                        <strong>Pembayaran TPA</strong>
                    </h1>
                </div>
            </div>

            <!-- table pembayaran tpa -->
            <div class="table table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                           <th>No</th>
                           <th>Nama Paket</th>
                           <th>Bukti TF</th>
                           <th>Tgl Pembayaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                           <?php
                                $nomor = 0;
                                $sql_pemb_tpa = mysqli_query($koneksi, "SELECT `id_pembayaran_tpa`, `id_daftar_biaya_tpa`, `id_user_pembayaran_tpa`, `bukti_pembayaran_tpa`, `status_pembayaran_tpa`, `tgl_pembayaran_tpa`, `tahun_pembayaran_tpa`, `nama_paket` FROM tb_daftar_biaya_tpa tpa JOIN tb_pembayaran_tpa t ON tpa.id_biaya_tpa = t.id_daftar_biaya_tpa WHERE id_user_pembayaran_tpa = '$id_user'");
                                $row_pemb_tpa = mysqli_fetch_array($sql_pemb_tpa);
                                $nomor++;
                                //jika isi database ada isinya
                                if($sql_pemb_tpa->num_rows >0){
                            ?>
                           <td><?= $nomor ?></td>
                           <td><?= $row_pemb_tpa["nama_paket"] ?></td>
                           <td>
                                <?php 
                                    if($row_pemb_tpa["bukti_pembayaran_tpa"] == null):
                                ?>
                                    <a class="btn btn-sm btn-danger" href="index.php?upload_bukti_pembayaran_tpa"><i class="fa fa-camera"></i></a>
                                <?php else:?>
                                    <img width="100px" src="../gambar/<?= $row_pemb_tpa["bukti_pembayaran_tpa"] ?>" alt="">
                                <?php endif?>
                           <td><?= $row_pemb_tpa["tgl_pembayaran_tpa"] ?></td>
                           <?php }?>
                        </tr>
                    </tbody>               
                </table>
            </div>

        <!-- <a class="btn btn-primary mt-5" href="../../../proses/proses.php?editProfil=<?= $row["nis"] ?>">Edit</a> -->
            </div>
        </div>

    </div>



<!-- jadwal -->
<?php
    $id = $_SESSION["id"];
    $sql_wawancara = mysqli_query($koneksi, "SELECT * FROM tb_wawancara w LEFT JOIN tb_jadwal_wawancara j ON w.id_jadwal_wawancara_wawancara = j.id_jadwal_wawancara LEFT JOIN tb_user u ON u.id_user = w.id_user_wawancara WHERE w.id_user_wawancara = '$id'");
    $row = mysqli_fetch_array($sql_wawancara);
?>

<!-- jadwal -->
<div class="card">
    
    <div class="card-header bg-success">
        <div class="row">
            <div class="col-md-6">
                <h1 class="m-0 text-white mt-2" style="font-size: 14px;">
                    <strong>Jadwal Wawancara</strong>
                </h1>
            </div>
            <div class="col-md-6">
                <a class="btn btn-danger float-right btn-sm" onclick="modalWawancara(<?= $id ?>)" href="javascript:void(0)"><i class="fa fa-plus"></i></a>
            </div>
        </div>
    </div>

    <div class="card-body">
            <div class="table table-responsive">
                <div class="modal-body">
                    
                        <div class="card-header bg-primary">
                            <div class="row">
                                <div class="col-md-6 mt-1">
                                    <strong>
                                        <?php 
                                            if($row["jenis_wawancara"] == null){
                                                // echo "Anda Belum Memilih Jadwal Wawancara";
                                                echo "jadwal wawancara anda pada: " . "<i><strong><span id='jadwal'>belum memilih jadwal</span></strong></i>";

                                            }else{
                                                echo "jadwal wawancara anda pada " . "<span id='jadwal'>" . $row["jadwal_wawancara"]; echo " "; echo $row["jam_wawancara"]; echo " "; echo $row["jenis_wawancara"]; "</span>";
                                            }
                                        ?>
                                    </strong>
                                </div>
                                <div class="col-md-6">
                                    <a target="_blank" class="float-right btn-sm" href="proses/pdf_jadwal.php?print_jadwal=<?= $id ?>"><i style="color: white;" class="fa fa-print" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>

                </div>
            </div>
        </div>

</div>

<!-- Modal jadwal-->
<div class="modal fade" id="exampleModalWawancara" tabindex="-1" role="dialog" aria-labelledby="exampleModalWawancaraLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title" id="exampleModalWawancaraLabel">Pilih Jadwal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-check">
            <?php
                $sql_jadwal_wawancara = mysqli_query($koneksi, "SELECT `id_jadwal_wawancara`, `jadwal_wawancara`, `jam_wawancara` FROM `tb_jadwal_wawancara`");
                while($row_jadwal_wawancara = mysqli_fetch_array($sql_jadwal_wawancara)):
            ?>
                <input class="form-check-input" type="radio" name="id_jadwal_wawancara_wawancara" value="<?= $row_jadwal_wawancara["id_jadwal_wawancara"] ?>"> 
                
                <label class="form-check-label" for="id_jadwal_wawancara_wawancara"><?php echo $row_jadwal_wawancara["jadwal_wawancara"]; echo " "; echo $row_jadwal_wawancara["jam_wawancara"]; ?></label>
                <br>
            <?php endwhile ?>
                <select name="jenis_wawancara" id="jenis_wawancara">
                    <option value="">-Pilih-</option>
                    <option value="offline">Offline</option>
                    <option value="online">Online</option>
                </select>
            </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="save_wawancara(<?= $id ?>)" id="save_wawancara">Save</button>
      </div>
    </div>
  </div>
</div>

<!-- ajax ada di file ../index.php -->
<script>
    // $('#save_wawancara').on('click', function(){
    //     var id = <?php echo $id ?>
    //     var jadwal = $('.form-check-input').val()
    //     alert(id)
    // })

    // function modalWawancara(id){
    //     alert(id)
    // }
</script>



 