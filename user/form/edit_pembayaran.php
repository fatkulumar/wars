<?php
    $id = $_GET["edit_pembayaran"];
    $sql_pembayaran = mysqli_query($koneksi, "SELECT `id_pembayaran`, `id_user_pembayaran`, `jenis_pendidikan`,`nama_pembayaran`, `gelombang_ke`, `biaya_gelombang`, `status_pembayaran`, `tahun_pembayaran`, `tgl_pembayaran` FROM `tb_pembayaran` WHERE `id_pembayaran`= '$id'");
    $row = mysqli_fetch_array($sql_pembayaran);
    $id_user_nik = $_SESSION["id"];
    $sql_user_nik = mysqli_query($koneksi, "SELECT nik FROM tb_user WHERE id_user = '$id_user_nik'");
    $row_nik = mysqli_fetch_array($sql_user_nik);
?>

<div class="card">
        
        <div class="card-header bg-primary">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="m-0 text-white" style="font-size: 14px;">
                        <strong>Edit Pembayaran</strong>
                    </h1>
                </div>
            </div>
        </div>

        <div class="card-body">

            <form action="proses/proses.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id_pembayaran" id="id_pembayaran" value="<?= $row["id_pembayaran"] ?>">
            <input class="form-control" type="hidden" name="id_user" value="<?= $_SESSION["id"] ?>" readonly>

            <div class="form-group">
                <label for="pendidikan">Pendidikan</label>
                <select class="form-control" name="jenis_pendidikan" id="jenis_pendidikan">
                    <option value="">Pilih Pendidikan</option>
                    <option value="tk">TK</option>
                    <option value="tb">TB</option>
                </select>
            </div>

            <div class="form-group">
                <label for="gel_ke">Pilih Gelombang</label>
                <select class="form-control" name="gelombang_ke" id="gel_ke">
                    <option value="">Pilih Gelombang</option>
                    <!-- <?php  
                        $sql_gelombang = mysqli_query($koneksi, "SELECT `gel_ke` FROM `tb_daftar_biaya_tk_kb` WHERE `pendidikan` = 'tk'");
                        while($row_gel = mysqli_fetch_array($sql_gelombang)):
                    ?>
                        <option value="<?= $row_gel["gel_ke"] ?>"><?= $row_gel["gel_ke"] ?></option>
                        <?php endwhile ?> -->
                </select>
            </div>

            <div class="mb-1" id="tampil_biaya">tampil</div>

            <div class="form-group">
                <input class="form-control" type="hidden" name="biaya_gelombang" id="biaya_gelombang">
            </div>

            <div class="form-group">
                <input class="form-control" type="hidden" name="tahun_pembayaran" id="tahun_pembayaran" value="<?= date('Y') ?>">
            </div>

            <div class="form-group">
                <input class="form-control" type="hidden" name="tgl_pembayaran" id="tgl_pembayaran" value="<?= date('d-m-Y') ?>">
            </div>

                    <!-- <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama_pembayaran">Bukti TF</label>
                            <input class="form-control" type="file" name="nama_pembayaran" id="nama_pembayaran">
                            <img src="../gambar/<?= $row["nama_pembayaran"] ?>" id="gambar_nodin" width="400" alt="Preview Gambar" />
                        </div>
                    </div>

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
                    </script> -->

                    <div class="col-md-12">
                        <div class="form-group">
                            <button class="btn btn-sm btn-danger" name="edit_pembayaran">Edit</button>
                        </div>
                    </div>

                </div>
            </form>

        <!-- </div> -->

</div>

<script>
        $('#jenis_pendidikan').on('change', function() {
                var jenis_pendidikan = document.getElementById("jenis_pendidikan").value;
                $.ajax({
                    url: "proses/ajax_jenis_pendidikan.php",
                    type: "POST",
                    dataType: "JSON",
                    data: {"jenis_pendidikan" : jenis_pendidikan},
                    success: function(data) {
                        if(data.length == 0) {
                            var html = "<option value=''>Pilih Gelombang</option>"
                            $('#tampil_biaya').html("")
                            $('#gel_ke').html(html)
                        }else{
                            for(i=0; i<data.length; i++) {
                                var html = "<option value=''>Pilih Gelombang</option><option value="+i+">"+i+"</option>"
                                $('#gel_ke').html(html)
                            }
                        }
                    }
                })
            })


    function change_nik(value){
        $.ajax({
            url: "proses/ajax_nik.php",
            type: "POST",
            data: {"id_user":value},
            dataType: "JSON",
            success: function(data) {
                $("input[name=nama_user]").val(data[0].nama_user)
                $("input[name=email_user]").val(data[0].email_user)
                $("input[name=id_user]").val(data[0].id_user)
            }
        })
    }

    $('#gel_ke').on('change', function(){
        var gelombang = document.getElementById("gel_ke").value;
        var pendidikan = document.getElementById("jenis_pendidikan").value;

        $.ajax({
                url : "proses/ajax_tk.php",
                type: "POST",
                data : {"gelombang" : gelombang, 'pendidikan' : pendidikan},
                dataType: "JSON",
                success: function(data) {
                    console.log(data)
                    var html = "<b><center><span>Daftar Biaya TK KARTIKA PRADANA</span></center><center><span>Gelombang Inden ("+data[0].tgl_gel1+" - "+data[0].tgl_gel2+")</span></center><center>Tahun Anjaran "+data[0].tahun_ajaran_biaya+"</center></b><table class='table table-striped'><tr><td><strong>Formulir</strong></td><td>Rp. " + data[0].biaya_formulir +"</td></tr><tr><td><strong>DPP</strong></td><td>Rp. "+data[0].dpp+"</td></tr><tr><td><strong>Uang Kegiatan</strong></td><td>Rp. "+data[0].uang_kegiatan+" /semester</td></tr><tr><td><strong>Uang Buku Dan Peralatan 1 Tahun</strong></td><td>Rp. "+data[0].uang_buku_pertahun+"</td></tr><tr><td><strong>Uang Seragam 3 Setel</strong></td><td>Rp. "+data[0].uang_seragam+"</td></tr><tr><td><strong>SPP 1 Bulan</strong></td><td>Rp. "+ data[0].spp +"</td></tr><tr><td><span style='float: right'>Total</span></td><td>Rp. "+data[0].total_biaya+"</td></tr></table><li style='margin-left : 15px'><b>Pada saat pendaftaran minimun telah membayar DPP 50% (Rp."+data[0].dpp50+",-) & formulir pendaftaran Rp. "+data[0].biaya_formulir+"</b></li><li style='margin-left : 15px'><b>Selanjutnya sisa pembayaran dapat di angsur dan harus LUNAS pada akhir Bulan "+data[0].akhir_gel+"</b></li><li style='margin-left : 15px'><b>Selama ,emjadi siswa/siswi Kartika Pradana, biaya DPP hanya di lakukan sekali saja</b></li><li style='margin-left : 15px'><b>Uang yang telah masuk / terdaftar tidak dapat ditarik kembali</b></li></div><div class='modal-footer'>"
                    $('#tampil_biaya').html(html)
                    $('#biaya_gelombang').val(data[0].total_biaya)
                }
        })
    })


</script>