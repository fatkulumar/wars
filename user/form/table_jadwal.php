<?php
    $id = $_SESSION["id"];
    $sql_wawancara = mysqli_query($koneksi, "SELECT * FROM tb_wawancara w RIGHT JOIN tb_jadwal_wawancara j ON w.id_jadwal_wawancara_wawancara = j.id_jadwal_wawancara left JOIN tb_user u ON u.id_user = w.id_user_wawancara");
    $row = mysqli_fetch_array($sql_wawancara);
?>

<div class="card">
        
        <div class="card-header bg-primary">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="m-0 text-white">
                        <strong>Jadwal Wawancara</strong>
                    </h1>
                </div>
                <div class="col-md-6">
                    <a class="btn btn-danger float-right btn-sm mt-2" onclick="modalWawancara(<?= $id ?>)" href="#"><i class="fa fa-plus"></i></a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="table table-responsive">
                <div class="modal-body">
                    
                        <div class="card-header bg-success">
                            <div class="row">
                                <div class="col-md-6">
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

<!-- Modal -->
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

 