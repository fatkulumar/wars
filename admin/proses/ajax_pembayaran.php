<?php
    include "../../koneksi.php";
    $id = $_POST["id"];
    $biaya = $_POST["biaya_gelombang"];

    mysqli_query($koneksi, "UPDATE `tb_pembayaran` SET `biaya_gelombang`='$biaya' WHERE `id_pembayaran`='$id'");

    echo json_encode($biaya);
?>