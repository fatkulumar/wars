<?php
    include "../../koneksi.php";
     $id_biaya_tpa = $_POST["id_biaya_tpa"];

     $sql_paket_tpa = mysqli_query($koneksi, "SELECT `id_biaya_tpa`,`biaya_tpa`, `nama_paket`, `biaya_formulir_tpa`, `insidental`, `biaya_pendaftaran_tpa` FROM `tb_daftar_biaya_tpa` WHERE `id_biaya_tpa` = '$id_biaya_tpa'");

     $row = mysqli_fetch_array($sql_paket_tpa);

     $data = [
         'insidental' => $row["insidental"],
         'biaya_formulir_tpa' => $row["biaya_formulir_tpa"],
         'nominal' => $row["biaya_pendaftaran_tpa"],
         'id_biaya_tpa' => $row["id_biaya_tpa"],
         'nama_paket' => $row["nama_paket"]
     ];

     echo json_encode($data);
?>