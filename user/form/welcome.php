<div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Well done!</h4>
  <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
  <hr>
  <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
</div>

<?php 
    $id = $_SESSION["id"];
    $sql_bidata = mysqli_query($koneksi, "SELECT * FROM tb_ibu i JOIN tb_wali w ON w.id_wali = i.id_wali_ibu JOIN tb_anak a ON a.id_ibu_anak = i.id_ibu JOIN tb_user u ON u.id_user = w.id_user_wali WHERE u.id_user = '$id'");
    $row = mysqli_fetch_array($sql_bidata);

    $sql_pembayaran = mysqli_query($koneksi, "SELECT * FROM tb_pembayaran WHERE id_user_pembayaran = 16");
    $row_pembayaran = mysqli_fetch_array($sql_pembayaran);
?>
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
<div class="card">
    
    <div class="card-header bg-success">
        <div class="row">
            <div class="col-md-6">
                <span class="m-0 text-white" style="font-size: 14px;">
                    <strong>Jalur Masuk Yang Di Ikuti</strong>
                </span>
            </div>
            <!-- <div class="col-md-6">
                <a class="btn btn-danger float-right btn-sm mt-2" href="index.php?tambah_ibu"><i class="fa fa-plus"></i></a>
            </div> -->
        </div>
    </div>

    <div class="card-body">
        <div class="table table-responsive">
            <table id="table_ibu" class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Anak</th>
                        <th>Nama Ibu</th>
                        <th>Nama Ayah</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Pendidikan</th>
                        <th>Agama</th>
                        <th>Negara</th>
                        <th>Bangsa</th>
                        <th>Pekerjaan</th>
                        <th>Penghasilan</th>
                        <th>Alamat Kantor</th>
                        <th>Telp</th>
                        <th>Golongan Darah</th>
                        <th>Alamat Rumah</th>
                        <!-- <th>Aksi</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        include "../koneksi.php";
                        $ses_id = $_SESSION["id"];
                        $no = 1;
                        $sql_wali = mysqli_query($koneksi, "SELECT * FROM tb_ibu i JOIN tb_wali w ON w.id_wali = i.id_wali_ibu JOIN tb_anak a ON a.id_ibu_anak = i.id_ibu JOIN tb_user u ON u.id_user = w.id_user_wali WHERE u.id_user = '$ses_id'");
                        while($row = mysqli_fetch_array($sql_wali)):
                    ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row["nama_anak"] ?></td>
                        <td><?= $row["nama_ibu"] ?></td>
                        <td><?= $row["nama_wali"] ?></td>
                        <td><?= $row["tempat_lahir_ibu"] ?></td>
                        <td><?= $row["tgl_lahir_ibu"] ?></td>
                        <td><?= $row["pendidikan_ibu"] ?></td>
                        <td><?= $row["agama_ibu"] ?></td>
                        <td><?= $row["negara_ibu"] ?></td>
                        <td><?= $row["bangsa_ibu"] ?></td>
                        <td><?= $row["pekerjaan_ibu"] ?></td>
                        <td><?= $row["penghasilan_ibu"] ?></td>
                        <td><?= $row["alamat_kantor_ibu"] ?></td>
                        <td><?= $row["hp_kantor_ibu"] ?></td>
                        <td><?= $row["golongan_darah_ibu"] ?></td>
                        <td><?= $row["alamat_rumah_ibu"] ?></td>
                        <!-- <td>
                            <a class="btn btn-sm btn-danger" href="#"><i class="fa fa-trash"></i> </a><a class="btn btn-sm btn-primary" href="index.php?edit_ibu=<?= $row["id_ibu"] ?>"><i class="fa fa-edit"></i></a>
                        </td> -->
                    </tr>

                    <?php endwhile ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<!-- jadwal -->
<?php
    $id = $_SESSION["id"];
    $sql_wawancara = mysqli_query($koneksi, "SELECT * FROM tb_wawancara w RIGHT JOIN tb_jadwal_wawancara j ON w.id_jadwal_wawancara_wawancara = j.id_jadwal_wawancara left JOIN tb_user u ON u.id_user = w.id_user_wawancara");
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
                                            if($row["id_user_wawancara"] == null){
                                                // echo "Anda Belum Memilih Jadwal Wawancara";
                                                echo "jadwal wawancara anda pada: " . "<i><strong><span id='jadwal'>belum memilih jadwal</span></strong></i>";

                                            }else{
                                                echo "jadwal wawancara anda pada " . "<span id='jadwal'>" . $row["jadwal_wawancara"]; echo " "; echo $row["jam_wawancara"]. "</span>";
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



 