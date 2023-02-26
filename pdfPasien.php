<?php

require_once __DIR__ . '/vendor/autoload.php';
require 'koneksi.php';
$laporan = mysqli_query($koneksi, "SELECT * FROM tb_daftar_pasien");

$mpdf = new \Mpdf\Mpdf();

$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pendaftaran Pasien</title>
    <link rel="stylesheet" href="css/pdf.css">
</head>
<body>
    <h2 class="judul" align="center">Laporan Pendaftaran Pasien <br>
    Klinik Pendidikan Prodi Kesehatan Gigi Kupang
    </h2>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr class="thead">
            <th>No</th>
            <th>Pasien</th>
            <th>No. Registrasi</th>
            <th>Operator</th>
            <th>Umur</th>
            <th>Alamat</th>
            <th>Jenis Kelamin</th>
            <th>Pekerjaan</th>
            <th>No. HP</th>
            <th>Orang Tua</th>
            <th>Tanggal Daftar</th>
        </tr>';

$i = 1;
foreach ($laporan as $row) {
    $html .= '<tr>
                <td>' . $i++ . '</td>
                <td>' . $row["nama"] . '</td>
                <td>' . $row["no_registrasi"] . '</td>
                <td>' . $row["nama_operator"] . '</td>
                <td>' . $row["umur"] . '</td>
                <td>' . $row["alamat"] . '</td>
                <td>' . $row["jk"] . '</td>
                <td>' . $row["pekerjaan"] . '</td>
                <td>' . $row["no_hp"] . '</td>
                <td>' . $row["nama_ortu"] . '</td>
                <td>' . date("d F Y", strtotime($row['tgl_daftar'])) . '</td>
            </tr>';
}

$html .= '</table>
</body>
</html>';

$mpdf->WriteHTML($html);
$mpdf->Output();
