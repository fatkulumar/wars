<?php
    $id_user = $_SESSION["id"];
    $sql_pembayaran = mysqli_query($koneksi, "SELECT id_pembayaran_tpa FROM `tb_pembayaran_tpa` WHERE `id_user_pembayaran_tpa` = '$id_user'");
    $row_pembayaran = mysqli_fetch_array($sql_pembayaran);
?>

<div class="card bg-success">
    <div class="row">
        <div class="col-md-6">
            <h1 class="mt-2 ml-2 text-white" style="font-size: 14px;">
                <strong>Pembayaran TK & TPA</strong>
            </h1>
        </div>
        <!-- <div class="col-md-6">
            <h1 class="mt-0 text-white" style="font-size: 14px; float: right;">
                <a class="btn btn-sm btn-danger" href="<?php if($row_pemb["nama_pembayaran"] == null){echo "index.php?upload_bukti_pembayaran";}else{echo "javascript:void(0)";}?>"><i class="fa fa-camera"></i></a>
            </h1>
        </div> -->
    </div>
</div>

<form action="proses/proses.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id_pembayaran" value="<?= $row_pembayaran["id_pembayaran"] ?>">
    <div class="row">
        <div class="col-12 col-sm-6 col-md-6" style="margin-left: 240px;">
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fa fa-camera"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text"></span>
                        <span class="info-box-number">
                            <input id="nama_pembayaran" type="file" name="nama_pembayaran" required>
                        </span>
                    </span>
                </div>
                
                <!-- /.info-box-content -->
            </div>

            <div class="mb-2">
                <img width="410px" src="" alt="" id="gambar_nodin">
            </div>
            <div>
                <button type="submit" name="upload_pembayaran">Upload</button>
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
    $("#nama_pembayaran").change(function() {
    readURL(this);
    });
</script>

