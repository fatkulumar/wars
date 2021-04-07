<?php
    include "../../koneksi.php";
    $id_user = $_POST["id_user"];
    $sql_user = mysqli_query($koneksi, "SELECT id_user, nik, nama_user, email_user FROM tb_user WHERE id_user = '$id_user'");
    $data= [];
    while($row_user = mysqli_fetch_array($sql_user)) {
        $data[] = [
            'id_user' => $row_user["id_user"],
            'nik' => $row_user["nik"],
            'nama_user' => $row_user["nama_user"],
            'email_user' => $row_user["email_user"]
        ];
    }

    echo json_encode($data);
?>