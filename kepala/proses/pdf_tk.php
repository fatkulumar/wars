<?php

include "../../koneksi.php";
require_once __DIR__ . '/../../vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();
$id = $_GET["print_tk"];
// $db1->close();

if($_GET["print_tk"] == null){
    $sql_tk = mysqli_query($koneksi, "SELECT `id_user_pembayaran`, `nama_pembayaran`, `gelombang_ke`, `biaya_gelombang`, `status_pembayaran`, `nama_user`, `nama_wali`, `nama_ibu`, `nama_anak` FROM tb_pembayaran p JOIN tb_user u JOIN tb_wali w ON w.id_user_wali = u.id_user JOIN tb_ibu i ON i.id_wali_ibu = w.id_wali JOIN tb_anak a ON a.id_wali_anak = w.id_wali WHERE p.jenis_pendidikan = 'tk' GROUP BY id_user_pembayaran");
}else{
    $sql_tk = mysqli_query($koneksi, "SELECT `id_user_pembayaran`, `nama_pembayaran`, `gelombang_ke`, `biaya_gelombang`, `status_pembayaran`, `nama_user`, `nama_wali`, `nama_ibu`, `nama_anak` FROM tb_pembayaran p JOIN tb_user u JOIN tb_wali w ON w.id_user_wali = u.id_user JOIN tb_ibu i ON i.id_wali_ibu = w.id_wali JOIN tb_anak a ON a.id_wali_anak = w.id_wali WHERE p.gelombang_ke = '$id' AND p.jenis_pendidikan = 'tk' GROUP BY id_user_pembayaran");
}
$nama_dokumen ="test-umar";
ob_start();
?>

<div style="position: absolute;">
    <img width="100px" src="../../gambar/2091Screenshot from 2021-02-04 17-42-07.png" alt="nama sekolah">
</div>
<div style="text-align: center; position: relative;">
    <strong>Laporan Pendaftaran TK</strong> <br>
    <strong>telp. 098989987998 Website: wwww.wwww.com</strong><br>
    alamat
</div>
<hr>
<div style="text-align: center;">
    <strong>Laporan Pendaftaran</strong>
</div>

<table align="center">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama User</th>
            <th>Nama Anak</th>
            <th>Nama Ayah</th>
            <th>Nama Ibu</th>
            <th>Gelombang</th>
            <th>Jumlah</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php  $no = 1; while($row = mysqli_fetch_array($sql_tk)): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $row["nama_user"] ?></td>
            <td><?= $row["nama_anak"] ?></td>
            <td><?= $row["nama_wali"] ?></td>
            <td><?= $row["nama_ibu"] ?></td>
            <td><?= $row["gelombang_ke"] ?></td>
            <td><?= $row["biaya_gelombang"] ?></td>
            <td><?php
                $status = $row["status_pembayaran"]; 
                if($status == 0){
                    echo "Belum Lunas";
                }else{
                    echo "Lunas";
                }    
            ?></td>
        </tr>
        <?php endwhile ?>
    </tbody>
</table>



<?php
$html = ob_get_contents();
ob_end_clean();

$mpdf->WriteHTML(utf8_encode($html));
// $mpdf->SetHTMLFooter('{PAGENO} of {nbpg}');
$mpdf->SetHTMLFooter('<h1>um</h1>');
$mpdf->setFooter('{PAGENO} of {nbpg}');
$mpdf->Output();

$mpdf->Output("".$nama_dokumen.".pdf" ,'D');
?>

<!-- // Require composer autoload
require_once __DIR__ . '/vendor/autoload.php';
// Create an instance of the class:
$mpdf = new \Mpdf\Mpdf();
// $mpdf = new \mPDF();

// Write some HTML code:
// $mpdf->loadHTML("table_print_tk.php");
$mpdf->WriteHTML($content);

// Output a PDF file directly to the browser
$mpdf->Output();




?> -->