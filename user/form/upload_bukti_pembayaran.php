<?php
    $id_user = $_SESSION["id"];
    $sql_pembayaran = mysqli_query($koneksi, "SELECT id_pembayaran FROM `tb_pembayaran` WHERE `id_user_pembayaran` = '$id_user'");
    $row_pembayaran = mysqli_fetch_array($sql_pembayaran);
?>

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

