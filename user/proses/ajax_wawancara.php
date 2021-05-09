<?php
    include "../../koneksi.php";
    // $data = "umar";
    $id_wawancara_wawancara = $_POST["id_wawancara_wawancara"];
    $id_user_wawancara = $_POST["id_user_wawancara"];
    //select tb_wawancara
    $sql_select_wawancara = mysqli_query($koneksi, "SELECT `id_wawancara`, `id_user_wawancara`, `id_jadwal_wawancara_wawancara` FROM `tb_wawancara` WHERE `id_user_wawancara` = '$id_user_wawancara'");
    $row_wawancara = mysqli_fetch_array($sql_select_wawancara);
    //cek apakah null
    if($row_wawancara == null){
        $sql_insert_wawancara = mysqli_query($koneksi, "INSERT INTO `tb_wawancara`(`id_user_wawancara`, `id_jadwal_wawancara_wawancara`) VALUES ('$id_user_wawancara', '$id_wawancara_wawancara')");
    }else{
        $sql_update_wawancara = mysqli_query($koneksi, "UPDATE `tb_wawancara` SET `id_jadwal_wawancara_wawancara`='$id_wawancara_wawancara' WHERE `id_user_wawancara`= '$id_user_wawancara'");
    }
    //select tb_wawancara join tb_jadwal wawancara
    $sql_select_jadwal = mysqli_query($koneksi, "SELECT `id_wawancara`, `id_user_wawancara`, `id_jadwal_wawancara_wawancara`, `jadwal_wawancara`, `jam_wawancara` FROM tb_wawancara w JOIN tb_jadwal_wawancara j ON j.id_jadwal_wawancara=w.id_jadwal_wawancara_wawancara");

    $row = mysqli_fetch_array($sql_select_jadwal);

    $jadwal_wawancara = $row["jadwal_wawancara"];
    $jam_wawancara = $row["jam_wawancara"];

    $data[] = [
        'jadwal_wawancara' => $jadwal_wawancara,
        'jam_wawancara' => $jam_wawancara
    ];
    echo json_encode($data);