<?php
    include "../../koneksi.php";
    $jenis_pendidikan = $_POST["jenis_pendidikan"];

    $sql_gelombang = mysqli_query($koneksi, "SELECT `gel_ke` FROM `tb_daftar_biaya_tk_kb` WHERE `pendidikan` = '$jenis_pendidikan' GROUP BY `gel_ke`");

    $data = [];
    while($row_gel = mysqli_fetch_array($sql_gelombang)){
        $data[] = $row_gel["gel_ke"];
    }

    echo json_encode($data);
?>