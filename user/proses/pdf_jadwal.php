<?php

include "../../koneksi.php";
require_once __DIR__ . '/../../vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();
echo $id = $_GET["print_jadwal"];
// $db1->close();
$sql_wawancara = mysqli_query($koneksi, "SELECT * FROM tb_wawancara w JOIN tb_wali wa ON w.id_user_wawancara = wa.id_user_wali JOIN tb_anak a ON a.id_wali_anak = wa.id_wali JOIN tb_jadwal_wawancara jw ON w.id_jadwal_wawancara_wawancara = jw.id_jadwal_wawancara WHERE w.id_user_wawancara = '$id'");
$row_wawancara = mysqli_fetch_array($sql_wawancara);
$nama_dokumen ="test-umar";
ob_start();
?>

<div style="position: absolute;">
    <img width="100px" src="../../gambar/2091Screenshot from 2021-02-04 17-42-07.png" alt="nama sekolah">
</div>
<div style="text-align: center; position: relative;">
    <strong>Laporan Jadwal Wawancara</strong> <br>
    <strong>Nama Sekolah</strong> <br>
    <strong>telp. 098989987998 Website: wwww.wwww.com</strong><br>
    alamat
</div>
<hr>
<div style="text-align: center;">
    <strong>Jadwal Wawancara</strong>
</div>

<div style="position: absolute; background: red; width: 170px; height: 200px;">
<img width="170px" height="200px" src="../../gambar/<?= $row_wawancara["foto_anak"] ?>">
    
</div>

<div style="margin-left: 180px;">
    atas nama <strong> <?= $row_wawancara["nama_wali"] ?> </strong> dengan nama anak <strong> <?= $row_wawancara["nama_anak"] ?> </strong> di harapkan hadir untuk wawancara di sekolah pada <strong> <?= $row_wawancara["jadwal_wawancara"] ?> <?= $row_wawancara["jam_wawancara"] ?> </strong>
</div>

<?php
$html = ob_get_contents();
ob_end_clean();

$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output();

$mpdf->Output("".$nama_dokumen.".pdf" ,'D');
?>