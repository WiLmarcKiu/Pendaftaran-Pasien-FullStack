<h2>Hapus Pegawai</h2>

<?php include 'koneksi.php'; ?>
<?php
$ambil = $koneksi->query("SELECT * FROM pegawai WHERE id_pegawai='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$fotopegawai = $pecah['foto'];
if (file_exists("foto_pegawai/$fotopegawai")) {
    unlink("foto_pegawai/$fotopegawai");
}

$koneksi->query("DELETE FROM pegawai WHERE id_pegawai='$_GET[id]'");
echo "<script>alert('Data Telah Dihapus');</script>";
echo "<script>location='daftarpegawai.php';</script>";
?>