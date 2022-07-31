<h2>Hapus Mutasi</h2>

<?php include 'koneksi.php'; ?>
<?php
$ambil = $koneksi->query("SELECT * FROM mutasi WHERE id_mutasi='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

$koneksi->query("DELETE FROM mutasi WHERE id_mutasi='$_GET[id]'");
echo "<script>alert('Data Telah Dihapus');</script>";
echo "<script>location='daftarMutasi.php';</script>";
?>