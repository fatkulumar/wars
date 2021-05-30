<?php
    $id_user = $_SESSION["id"];
    // $sql_pembayaran = mysqli_query($koneksi, "SELECT id_pembayaran FROM `tb_pembayaran` WHERE `id_user_pembayaran` = '$id_user'");
    // $row_pembayaran = mysqli_fetch_array($sql_pembayaran);

    $sql_berkas = mysqli_query($koneksi, "SELECT `id_unggah_berkas`, `id_user_unggah_berkas`, `nama_kartu_keluarga`, `nama_kartu_tanda_penduduk`, `nama_akte` FROM `tb_unggah_berkas` WHERE `id_user_unggah_berkas` = '$id_user'");
    $row_berkas = mysqli_fetch_array($sql_berkas);
    $kk = $row_berkas["nama_kartu_keluarga"];
    $ktp = $row_berkas["nama_kartu_tanda_penduduk"];
    $akte = $row_berkas["nama_akte"];
?>

<div class="card">
<div class="card-header bg-success">
    <div class="row">
        <div class="col-md-6">
            <h1 class="m-0 mt-2 text-white" style="font-size: 14px;">
                <strong>Data Unggah Berkas</strong>
                <i><small style="color: white;"><?php if($kk == null || $ktp == null || $akte == null) {echo "*lengkapi berkas anda";}else{echo "Menunggu verifikasi";}?></small></i>
            </h1>
        </div>
        <div class="col-md-6">
            <h1 class="m-0 text-white" style="font-size: 14px; float: right;">
                <strong><a class="btn btn-sm btn-danger" href="<?php if($kk != null || $ktp != null || $akte != null) {echo "javascript:void(0)";}else{echo "index.php?unggah_berkas";}?>"><i class="fa fa-camera"></i></a></strong>
            </h1>
        </div>
    </div>
</div>

<form action="proses/proses.php" method="POST" enctype="multipart/form-data">
    <!-- <input type="hidden" name="id_user" value="<?= $id_user ?>"> -->
    <div class="row">
        <div class="col-12 col-sm-4 col-md-4">
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fa fa-camera"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Kartu Keluarga</span>
                        <span class="info-box-number">
                            <!-- <input id="kartu_keluarga" type="file" name="kartu_keluarga" required> -->
                        </span>
                    </span>
                </div>
                
                <!-- /.info-box-content -->
            </div>

            <div class="mb-2">
                <img width="275px" src="../gambar/<?= $row_berkas["nama_kartu_keluarga"]; ?>" alt="gambar_kartu_keluarga" id="gambar_kartu_keluarga">
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
                            <!-- <input id="kartu_tanda_penduduk" type="file" name="kartu_tanda_penduduk" required> -->
                        </span>
                    </span>
                </div>
                
                <!-- /.info-box-content -->
            </div>

            <div class="mb-2">
                <img width="275px" src="../gambar/<?= $row_berkas["nama_kartu_tanda_penduduk"]; ?>" alt="gambar_kartu_tanda_penduduk" id="gambar_kartu_tanda_penduduk">
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
                            <!-- <input id="akte" type="file" name="akte" required> -->
                        </span>
                    </span>
                </div>
                
                <!-- /.info-box-content -->
            </div>

            <div class="mb-2">
                <img width="275px" src="../gambar/<?= $row_berkas["nama_akte"]; ?>" alt="gambar_akte" id="gambar_akte">
            </div>
            
            <!-- /.info-box -->
        <!-- /.col -->
        
        <!-- /.col -->
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

