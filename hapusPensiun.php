<h2>Hapus Pensiun</h2>

<?php include 'koneksi.php'; ?>
<?php
$ambil = $koneksi->query("SELECT * FROM pensiun WHERE id_pensiun='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$filepensiun = $pecah['sk_pensiun'];
if (file_exists("sk_pensiun/$filepensiun")) {
    unlink("sk_pensiun/$filepensiun");
}

$koneksi->query("DELETE FROM pensiun WHERE id_pensiun='$_GET[id]'");
echo "<script>alert('Data Telah Dihapus');</script>";
echo "<script>location='daftarPensiun.php';</script>";
?>