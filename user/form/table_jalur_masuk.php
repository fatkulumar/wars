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
                            <option value="tpa">TPA</option>
                            <option value="tk">TK</option>
                            <option value="kb">KB</option>
                        </select>
                    </div>
                    <!-- daftar tpa -->
                    <div class="form-group" id="daftar_tpa" style="display: none;">
                        <input type='radio' class="daftar_tpa" id="daftar_tpa" name="daftar_tpa" value="daftar_tpa">Daftar TPA</input>
                    </div>

                    <div class="form-group" id="pilih_paket">
                        <label for="p_paket">Pilih Paket</label>
                        <select class="form-control" name="p_paket" id="p_paket">
                            <option value="0">Pilih Paket</option>
                            <?php  
                                $sql_nama_paket = mysqli_query($koneksi, "SELECT `id_biaya_tpa`, `nama_paket` FROM `tb_daftar_biaya_tpa`");
                                while($row_paket = mysqli_fetch_array($sql_nama_paket)):
                            ?>
                                <option value="<?= $row_paket["id_biaya_tpa"] ?>"><?= $row_paket["nama_paket"] ?></option>
                                <?php endwhile ?>
                        </select>
                    </div>

                    <div class='form-group' id='tampil_paket' style='display: block;'></div>
                    
                    <div class="form-group" id="pilih_gelombang">
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

                    

                    <hr>
                        <div class="mb-1 bg-warning" id="tampil_biaya">
                        </div>
                    <hr>

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
                            <button <?php if($row_pemb == $id_user) {echo "disabled";} ?> class="btn btn-sm btn-danger" name="tambah_pembayaran">Tambah</button>
                            <i><span style="color: red;"><?php if($row_pemb == $id_user) {echo "*sudah memilih jalur masuk";} ?></span></i>
                        </div>
                    </div>

            </form>

        </div>

        <script>
            //pilih pendidikan
            $('#pilih_gelombang').hide()
            $('#pilih_paket').hide()
            $('#jenis_pendidikan').on('change', function() {
            var dtpa = $('daftar_tpa').val()
            // alert(dtpa)
                $('#tampil_biaya').html("")
                var jenis_pendidikan = document.getElementById("jenis_pendidikan").value;

                if(jenis_pendidikan == "tpa"){
                    $('#pilih_paket').hide()
                    $('#daftar_tpa').hide()
                    $('#tampil_paket').show()
                    $('#tampil_biaya').html()
                    $('#pilih_gelombang').hide()
                    $('#pilih_paket').show()
                }else if(jenis_pendidikan == 0){
                    $('#tampil_biaya').html()
                    $('#daftar_tpa').hide()
                    $('#pilih_gelombang').hide()
                    $('#pilih_paket').hide()
                    $('#tampil_paket').hide()
                }else{
                    $('#pilih_gelombang').show()
                    // $('#tampil_paket').hide()
                    $('#pilih_paket').hide()
                    $('#tampil_paket').show()
                    $('#daftar_tpa').show()
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
                                    var gel = i + 1
                                    var html = "<option value=''>Pilih Gelombang</option><option value="+gel+">"+gel+"</option>"
                                    $('#gel_ke').html(html)
                                }
                            }
                        }
                    })
                }
            })

            //pilih gelombang
            $('#gel_ke').on('change', function(){
                var gelombang = document.getElementById("gel_ke").value;
                var pendidikan = document.getElementById("jenis_pendidikan").value;

                $.ajax({
                    url : "proses/ajax_tk.php",
                    type: "POST",
                    data : {"gelombang" : gelombang, 'pendidikan' : pendidikan},
                    dataType: "JSON",
                    success: function(data) {
                        // console.log(data)
                        var html = "<b><center><span>Daftar Biaya TK KARTIKA PRADANA</span></center><center><span>Gelombang Inden ("+data[0].tgl_gel1+" - "+data[0].tgl_gel2+")</span></center><center>Tahun Anjaran "+data[0].tahun_ajaran_biaya+"</center></b><table class='table table-striped'><tr><td><strong>Formulir</strong></td><td>Rp. " + data[0].biaya_formulir +"</td></tr><tr><td><strong>DPP</strong></td><td>Rp. "+data[0].dpp+"</td></tr><tr><td><strong>Uang Kegiatan</strong></td><td>Rp. "+data[0].uang_kegiatan+" /semester</td></tr><tr><td><strong>Uang Buku Dan Peralatan 1 Tahun</strong></td><td>Rp. "+data[0].uang_buku_pertahun+"</td></tr><tr><td><strong>Uang Seragam 3 Setel</strong></td><td>Rp. "+data[0].uang_seragam+"</td></tr><tr><td><strong>SPP 1 Bulan</strong></td><td>Rp. "+ data[0].spp +"</td></tr><tr><td><span style='float: right'>Total</span></td><td>Rp. "+data[0].total_biaya+"</td></tr></table><li style='margin-left : 15px'><b>Pada saat pendaftaran minimun telah membayar DPP 50% (Rp."+data[0].dpp50+",-) & formulir pendaftaran Rp. "+data[0].biaya_formulir+"</b></li><li style='margin-left : 15px'><b>Selanjutnya sisa pembayaran dapat di angsur dan harus LUNAS pada akhir Bulan "+data[0].akhir_gel+"</b></li><li style='margin-left : 15px'><b>Selama ,emjadi siswa/siswi Kartika Pradana, biaya DPP hanya di lakukan sekali saja</b></li><li style='margin-left : 15px'><b>Uang yang telah masuk / terdaftar tidak dapat ditarik kembali</b></li><li style='margin-left : 15px'><b>Uang yang telah masuk / terdaftar tidak dapat ditarik kembali</b></li></div>"
                        $('#tampil_biaya').html(html)
                        $('#biaya_gelombang').val(data[0].total_biaya)
                    }
                })
            })

            $('#p_paket').on('change', function() {
                var id_biaya_tpa = $('#p_paket').val()
                alert(id_biaya_tpa)
                $.ajax({
                    url: "proses/ajax_paket_tpa.php",
                    data: {"id_biaya_tpa" : id_biaya_tpa},
                    type: "POST",
                    dataType: "JSON",
                    success: function(data) {
                        console.log(data)
                        var insidental = data.insidental
                        var nominal = data.nominal
                        var formulir = data.biaya_formulir_tpa
                        var nama_paket = data.nama_paket
                        var html = "<div class='bg-success'><b>Pendaftaran:</b> "+formulir+"<table><thead class='table table-bordered'><tr><th align='center' style='width: 459px;'>Nama Paket</th><th align='center' style='width: 459px;'>Nominal</th></tr></thead><tbody><tr><td style='width: 450px;'>"+nama_paket+"</td><td> Rp. "+nominal+"</td></tr></tbody></table><b>Insidental: "+insidental+"</b></div>"
                        $('#tampil_paket').html(html)
                    }
                })
            })

            $('#daftar_tpa').on('change', function(){
                $('input[type="radio"]').not(':checked').prop("checked", true);
                $('#pilih_paket').show()
            })
            //daftar tpa
            $('input[type="radio"]').on('mousedown', function() {
                if (this.checked) { //on mousedown we can easily determine if the radio is already checked
                    this.dataset.check = '1'; //if so, we set a custom attribute (in DOM it would be data-check="1")
                }
            }).on('mouseup', function() {
                if (this.dataset.check) { //then on mouseup we determine if the radio was just meant to be unchecked
                    var radio = this;
                    setTimeout(function() {radio.checked = false;}, 20); //we give it a 20ms delay because radio checking fires right after mouseup event
                    $('#pilih_paket').hide()
                    delete this.dataset.check; //get rid of our custom attribute
                }
            });
        </script>
