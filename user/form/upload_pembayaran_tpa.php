<?php
    $id_user = $_SESSION["id"];
    $sql_pembayaran_tpa = mysqli_query($koneksi, "SELECT id_pembayaran_tpa FROM `tb_pembayaran_tpa` WHERE `id_user_pembayaran_tpa` = '$id_user'");
    $row_pembayaran_tpa = mysqli_fetch_array($sql_pembayaran_tpa);
?>

    <div class="card bg-success">
        <div class="row">
            <div class="col-md-6">
                <h1 class="mt-2 ml-2 text-white" style="font-size: 14px;">
                    <strong>Pembayaran TPA</strong>
                </h1>
            </div>
        </div>
    </div>

<form action="proses/proses.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id_pembayaran" value="<?= $row_pembayaran_tpa["id_pembayaran_tpa"] ?>">
    <div class="row">
        <div class="col-12 col-sm-6 col-md-6" style="margin-left: 240px;">
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fa fa-camera"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text"></span>
                        <span class="info-box-number">
                            <input id="nama_pembayaran_tpa" type="file" name="nama_pembayaran_tpa" required>
                        </span>
                    </span>
                </div>
                
                <!-- /.info-box-content -->
            </div>

            <div class="mb-2">
                <img width="410px" src="" alt="" id="gambar_nodin">
            </div>
            <div>
                <button type="submit" name="upload_pembayaran_tpa">Upload</button>
            </div>
            <!-- /.info-box -->
        <!-- /.col -->
        
        <!-- /.col -->

        </div>
    </div>
    
</form>

<script>
    function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
        $('#gambar_nodin').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
    }
    $("#nama_pembayaran_tpa").change(function() {
    readURL(this);
    });
</script>

