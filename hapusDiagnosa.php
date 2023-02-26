<h2>Hapus Diagnosa</h2>

<?php include 'koneksi.php'; ?>
<?php
$koneksi->query("DELETE FROM tb_diagnosa_pasien WHERE id_diagnosa='$_GET[id]'");
echo "<script>alert('Data Telah Dihapus');</script>";
echo "<script>history.back();</script>";
?>