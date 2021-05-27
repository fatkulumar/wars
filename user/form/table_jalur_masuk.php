<?php
    $id_user = $_SESSION["id"];
    $sql_wali = mysqli_query($koneksi, "SELECT `id_wali`, `id_user_wali`, `nama_wali`, `tempat_lahir_wali`, `tgl_lahir_wali`, `pendidikan_wali`, `agama_wali`, `negara_wali`, `bangsa_wali`, `pekerjaan_wali`, `penghasilan_wali`, `alamat_kantor_wali`, `hp_kantor_wali`, `golongan_darah_wali`, `alamat_rumah_wali` FROM `tb_wali` WHERE `id_user_wali`='$id_user'");
    $row = mysqli_fetch_array($sql_wali);

    $sql_pembayaran = mysqli_query($koneksi, "SELECT `id_user_pembayaran` FROM `tb_pembayaran`");
    $row_pemb = mysqli_fetch_array($sql_pembayaran);
    
?>

        <div class="card-header bg-success">
            <div class="row">
                <div class="col-md-6">
                    <span class="m-0 text-white" style="font-size: 14px;">
                        <strong>Jalur Masuk</strong>
                    </span>
                </div>
                <!-- <div class="col-md-6">
                    <a class="btn btn-danger float-right btn-sm mt-2" href="index.php?tambah_ibu"><i class="fa fa-plus"></i></a>
                </div> -->
            </div>
        </div>

        <?php if(isset($_SESSION["alert_edit"])): ?>
            <script>alert("Berhasil Edit Ayah")</script>
        <?php unset($_SESSION["alert_edit"]) ?>
        <?php endif; ?>

        
        <div class="card-body">

            <form action="proses/proses.php" method="POST">
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

                    <div class="mb-1" id="tampil_biaya"></div>

                    <div class="form-group">
                        <input class="form-control" type="hidden" name="biaya_gelombang" id="biaya_gelombang">
                    </div>

                    <div class="form-group">
                        <input class="form-control" type="hidden" name="tahun_pembayaran" id="tahun_pembayaran" value="<?= date('Y') ?>">
                    </div>

                    <div class="form-group">
                        <input class="form-control" type="hidden" name="tgl_pembayaran" id="tgl_pembayaran" value="<?= date('d-m-Y') ?>">
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <button <?php if($row != null) {echo "disabled";} ?> class="btn btn-sm btn-danger" name="tambah_pembayaran">Tambah</button>
                            <i><span style="color: red;"><?php if($row != null) {echo "*sudah memilih jalur masuk";} ?></span></i>
                        </div>
                    </div>

            </form>

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
