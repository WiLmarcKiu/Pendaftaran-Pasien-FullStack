<h2>Hapus Pangkat</h2>

<?php include 'koneksi.php'; ?>
<?php
$ambil = $koneksi->query("SELECT * FROM pangkat WHERE id_pangkat='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$filepangkat = $pecah['sk_pangkat_terakhir'];
if (file_exists("sk_pangkat_terakhir/$filepangkat")) {
    unlink("sk_pangkat_terakhir/$filepangkat");
}

$koneksi->query("DELETE FROM pangkat WHERE id_pangkat='$_GET[id]'");
echo "<script>alert('Data Telah Dihapus');</script>";
echo "<script>location='daftarPangkat.php';</script>";
?>