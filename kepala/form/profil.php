<?php
    $id_user = $_SESSION["id"];
    $sql_user = mysqli_query($koneksi, "SELECT id_user, nama_user, foto_user FROM tb_user");
    $row = mysqli_fetch_array($sql_user);
    $row["id_user"];
?>

        <div class="card-header bg-primary">
            <div style="position: absolute;">  
                <h3 class="m-0 text-white">
                    <strong>Profil</strong>
                </h3>
            </div>
            <div style="position: relative;">
                <a class="btn btn-danger float-right btn-sm" href="index.php?edit_profil=<?= $row["id_user"] ?>">Edit</a>
            </div>
        </div>

        <?php if(isset($_SESSION["alert_edit"])): ?>
            <script>alert("Berhasil Edit Profil")</script>
        <?php unset($_SESSION["alert_edit"]) ?>
        <?php endif; ?>
        
        <div class="card">
            <div class="card-body">
               
        <div class="row">
            <div class="col-md-6"> 
                <img class="card-img-top" src="../gambar/<?= $row['foto_user'] ?>" class="elevation-2" alt="User Image"></div>
            <tr>
                <div class="col-md-6"><table class="table table-bordered"> <tr>
                <td><strong>Nama</strong></td>
                <td><?= $row["nama_user"]?></td>
            </tr>

        </table>
    </div>
        <!-- <a class="btn btn-primary mt-5" href="../../../proses/proses.php?editProfil=<?= $row["nis"] ?>">Edit</a> -->
            </div>
            </div>

    </div>