<h2>Hapus Gaji</h2>

<?php include 'koneksi.php'; ?>
<?php
$ambil = $koneksi->query("SELECT * FROM gaji WHERE id_gaji='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

$koneksi->query("DELETE FROM gaji WHERE id_gaji='$_GET[id]'");
echo "<script>alert('Data Telah Dihapus');</script>";
echo "<script>location='daftarGaji.php';</script>";
?>