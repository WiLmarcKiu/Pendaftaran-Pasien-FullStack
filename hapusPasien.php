<h2>Hapus Pasien</h2>

<?php include 'koneksi.php'; ?>
<?php
$koneksi->query("DELETE FROM tb_daftar_pasien WHERE id_pasien='$_GET[id]'");
$koneksi->query("DELETE FROM tb_diagnosa_pasien WHERE id_pasien='$_GET[id]'");
echo "<script>alert('Data Telah Dihapus');</script>";
echo "<script>history.back();</script>";
?>