<?php  
    include "../../koneksi.php";

    $gel = $_POST["gelombang"];
    $pendidikan = $_POST["pendidikan"];
    $gelombang = [];
    $data = [];
    $sql_gelombang = mysqli_query($koneksi, "SELECT `id_daftar_biaya`, `gel_ke`, `pendidikan`, `tgl_gel1`, `tgl_gel2`, `biaya_formulir`, `dpp`, `uang_kegiatan`, `uang_buku_pertahun`, `uang_seragam`, `spp`, `tahun_ajaran_biaya` FROM `tb_daftar_biaya_tk_kb` WHERE `pendidikan` = '$pendidikan' AND `gel_ke` = '$gel'");
    while($row = mysqli_fetch_array($sql_gelombang)){
        // $gelombang[] = $row_gel["gel_ke"];
        $dpp = $row["dpp"];
        $dpp50 = number_format($dpp,2,',','.');
        $akhir_gel = $row["tgl_gel2"];
        $akr_gelombang = date('d F Y', strtotime($akhir_gel));
        $akhir_gelombang = substr($akr_gelombang, 3);

        $uang_formulir = $row["biaya_formulir"];
        $uang_dpp = $row["dpp"];
        $uang_kegiatan = $row["uang_kegiatan"];
        $uang_buku = $row["uang_buku_pertahun"];
        $uang_seragam = $row["uang_seragam"];
        $uang_spp = $row["spp"];
        $total_uang = $uang_formulir + $uang_dpp + $uang_kegiatan + $uang_buku + $uang_seragam + $uang_spp;

        $data[] = [
            'gel_ke' => $row["gel_ke"],
            'pendidikan' => $row["pendidikan"],
            'tgl_gel1' => $row["tgl_gel1"],
            'tgl_gel2' => $row["tgl_gel2"],
            'biaya_formulir' => $row["biaya_formulir"],
            'dpp' => $row["dpp"],
            'uang_kegiatan' => $row["uang_kegiatan"],
            'uang_buku_pertahun' => $row["uang_buku_pertahun"],
            'uang_seragam' => $row["uang_seragam"],
            'spp' => $row["spp"],
            'tahun_ajaran_biaya' => $row["tahun_ajaran_biaya"],
            'dpp50' => $dpp50,
            'akhir_gel' => $akhir_gelombang,
            'total_biaya' => $total_uang
        ];
    }
    echo json_encode($data);
?>