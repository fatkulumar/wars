<div class="card">
        
        <div class="card-header bg-primary">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="m-0 text-white">
                        <strong>Tambah Pembayaran</strong>
                    </h1>
                </div>
            </div>
        </div>

        <div class="card-body">

            <form action="proses/proses.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id_user">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <select onchange="change_nik(this.value)" class="form-control" name="nik" required>
                                <option value="">Pilih NIK</option>
                                <?php
                                    include "../koneksi.php";
                                    $sql_user = mysqli_query($koneksi, "SELECT nik, id_user FROM tb_user");
                                    while($row_user = mysqli_fetch_array($sql_user)):
                                ?>
                                    <option value="<?= $row_user["id_user"] ?>"><?= $row_user["nik"] ?></option>
                                <?php endwhile ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama_user">Nama</label>
                            <input class="form-control" type="text" name="nama_user" required>
                        </div>
                    </div>

                    <!-- <div class="col-md-6">
                        <div class="form-group">
                            <label for="email_user">Email</label>
                            <input class="form-control" type="text" name="email_user" required>
                        </div>
                    </div> -->

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama_pembayaran">Bukti TF</label>
                            <input class="form-control" type="file" name="nama_pembayaran">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <button class="btn btn-sm btn-danger" name="tambah_pembayaran">Tambah</button>
                        </div>
                    </div>

                </div>
            </form>

        </div>

</div>

<script src="../jquery/jquery.min.js"></script>

<script>
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

</script>