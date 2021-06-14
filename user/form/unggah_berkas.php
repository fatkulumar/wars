<?php
    $id_user = $_SESSION["id"];
    $sql_pembayaran = mysqli_query($koneksi, "SELECT id_pembayaran FROM `tb_pembayaran` WHERE `id_user_pembayaran` = '$id_user'");
    $row_pembayaran = mysqli_fetch_array($sql_pembayaran);
?>

<div class="card">
<div class="card-header bg-success">
    <div class="row">
        <div class="col-md-6">
            <h1 class="m-0 text-white" style="font-size: 14px;">
                <strong>Unggah Berkas</strong>
            </h1>
        </div>
    </div>
</div>

<form action="proses/proses.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id_user" value="<?= $id_user ?>">
    <div class="row">
        <div class="col-12 col-sm-4 col-md-4">
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fa fa-camera"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Kartu Keluarga</span>
                        <span class="info-box-number">
                            <input id="kartu_keluarga" type="file" name="kartu_keluarga" required>
                        </span>
                    </span>
                </div>
                
                <!-- /.info-box-content -->
            </div>

            <div class="mb-2">
                <img width="275px" src="" alt="" id="gambar_kartu_keluarga">
            </div>
            <!-- /.info-box -->
        <!-- /.col -->
        
        <!-- /.col -->

        </div>


        <div class="col-12 col-sm-4 col-md-4">
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fa fa-camera"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Kartu Tanda Penduduk</span>
                        <span class="info-box-number">
                            <input id="kartu_tanda_penduduk" type="file" name="kartu_tanda_penduduk" required>
                        </span>
                    </span>
                </div>
                
                <!-- /.info-box-content -->
            </div>

            <div class="mb-2">
                <img width="275px" src="" alt="" id="gambar_kartu_tanda_penduduk">
            </div>
            <!-- /.info-box -->
        <!-- /.col -->
        
        <!-- /.col -->

        </div>

        <div class="col-12 col-sm-4 col-md-4">
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fa fa-camera"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Akte</span>
                        <span class="info-box-number">
                            <input id="akte" type="file" name="akte" required>
                        </span>
                    </span>
                </div>
                
                <!-- /.info-box-content -->
            </div>

            <div class="mb-2">
                <img width="275px" src="" alt="" id="gambar_akte">
            </div>
            
            <!-- /.info-box -->
        <!-- /.col -->
        
        <!-- /.col -->
        </div>


        <div class="container">
            <button type="submit" name="unggah_berkas">Upload</button>
        </div>
    </div>
    
</form>

</div>


<script>
    //kartu keluarga
    function readURLKK(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
        $('#gambar_kartu_keluarga').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
    }
    $("#kartu_keluarga").change(function() {
    readURLKK(this);
    });
    //kartu tanda penduduk
    function readURL2KTP(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
        $('#gambar_kartu_tanda_penduduk').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
    }
    $("#kartu_tanda_penduduk").change(function() {
    readURL2KTP(this);
    });
    //kartu akte
    function readURLAkte(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
        $('#gambar_akte').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
    }
    $("#akte").change(function() {
    readURLAkte(this);
    });
</script>

