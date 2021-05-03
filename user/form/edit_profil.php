<?php  
    $id = $_GET["edit_profil"];
    $sql_user = mysqli_query($koneksi, "SELECT nama_user, foto_user FROM tb_user WHERE id_user = '$id'");
    $row = mysqli_fetch_array($sql_user);
?>

<div class="card">
        
        <div class="card-header bg-primary">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="m-0 text-white">
                        <strong>Edit Profil</strong>
                    </h1>
                </div>
            </div>
        </div>

        <div class="card-body">

            <form action="proses/proses.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id_user" value="<?= $id ?>">
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama_user">Nama</label>
                            <input class="form-control" type="text" name="nama_user" value="<?= $row['nama_user'] ?>" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input class="form-control" type="file" name="foto_user" id="foto_user">
                            <img src="../gambar/<?= $row["foto_user"] ?>" id="gambar_nodin" width="400" alt="Preview Gambar" />
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
                        $("#foto_user").change(function() {
                        readURL(this);
                        });
                    </script>

                    <div class="col-md-12">
                        <div class="form-group">
                            <button class="btn btn-sm btn-danger" name="edit_profil">Edit</button>
                        </div>
                    </div>

                </div>
            </form>

        </div>

</div>