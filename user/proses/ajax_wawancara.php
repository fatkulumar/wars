<?php
    include "../../koneksi.php";
    $id_wawancara_wawancara = $_POST["id_wawancara_wawancara"];
    $id_user_wawancara = $_POST["id_user_wawancara"];

    $sql_update_wawancara = mysqli_query($koneksi, "UPDATE `tb_wawancara` SET `id_jadwal_wawancara_wawancara`='$id_wawancara_wawancara' WHERE `id_user_wawancara`= '$id_user_wawancara'");

    $sql_select_jadwal = mysqli_query($koneksi, "SELECT `id_wawancara`, `id_user_wawancara`, `id_jadwal_wawancara_wawancara`, `jadwal_wawancara`, `jam_wawancara` FROM tb_wawancara w JOIN tb_jadwal_wawancara j ON j.id_jadwal_wawancara=w.id_jadwal_wawancara_wawancara");

    $row = mysqli_fetch_array($sql_select_jadwal);

    $jadwal_wawancara = $row["jadwal_wawancara"];
    $jam_wawancara = $row["jam_wawancara"];

    $data[] = [
        'jadwal_wawancara' => $jadwal_wawancara,
        'jam_wawancara' => $jam_wawancara
    ];
    echo json_encode($data);