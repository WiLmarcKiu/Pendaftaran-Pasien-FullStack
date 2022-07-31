<?php
session_start();
if (!isset($_SESSION['admin'])) {
    echo "<script>alert('Anda belum login');</script>";
    echo "<script>location='index.php';</script>";
    exit;
}
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>SIMPEG</title>
    <meta content='width=device-width, initial-scale=1, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="assets/img/icon.ico" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Lato:300,400,700,900"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
                urls: ['assets/css/fonts.min.css']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/atlantis.min.css">

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="assets/css/demo.css">
    <style>

    </style>
</head>

<body>
    <div class="wrapper">
        <div class="main-header">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="blue">

                <a href="indexAdmin.php" class="logo">
                    <!-- <img src="assets/img/logo.svg" alt="navbar brand" class="navbar-brand"> -->
                    <b>
                        <p class="navbar-brand text-align-center" style="font-size: 20px; font-style: italic; color: #FFF; letter-spacing: 3px; ">SIMPEG</p>
                    </b>
                </a>
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="icon-menu"></i>
                    </span>
                </button>
                <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
                <div class="nav-toggle">
                    <button class="btn btn-toggle toggle-sidebar">
                        <i class="icon-menu"></i>
                    </button>
                </div>
            </div>
            <!-- End Logo Header -->

            <!-- Navbar Header -->
            <?php require 'navbarTop.php';  ?>
            <!-- End Navbar -->
        </div>

        <!-- Sidebar -->
        <?php require 'navbarSide.php' ?>
        <!-- End Sidebar -->

        <div class="main-panel">
            <div class="content">
                <div class="page-inner">
                    <div class="page-header">
                        <h4 class="page-title">Pegawai</h4>
                        <ul class="breadcrumbs">
                            <li class="nav-home">
                                <a href="indexAdmin.php">
                                    <i class="flaticon-home"></i>
                                </a>
                            </li>
                            <li class="separator">
                                <i class="flaticon-right-arrow"></i>
                            </li>
                            <li class="nav-item">
                                <a href="daftarPegawai.php">Daftar Pegawai</a>
                            </li>
                        </ul>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h6>
                                        <a href="" class="btn btn-sm btn-primary" title="Tambah Data Baru" data-toggle="modal" data-target="#tambahPegawai">
                                            <i class="fas fa-plus"></i>
                                        </a>
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="basic-datatables" class="table table-head-bg-primary mt-4 table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Aksi</th>
                                                    <th>Nama</th>
                                                    <th>NIP</th>
                                                    <th>Golongan</th>
                                                    <th>Foto</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Aksi</th>
                                                    <th>Nama</th>
                                                    <th>NIP</th>
                                                    <th>Golongan</th>
                                                    <th>Foto</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <?php $nomor = 1; ?>
                                                <?php $dataPegawai = $koneksi->query("SELECT * FROM pegawai"); ?>
                                                <?php while ($pegawai = $dataPegawai->fetch_assoc()) { ?>
                                                    <tr>
                                                        <td><?php echo $nomor; ?></td>
                                                        <td>
                                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                                <a href="detailPegawai.php?id=<?php echo $pegawai['id_pegawai']; ?>" class="btn btn-sm btn-info" title="Detail">
                                                                    <i class="fas fa-eye"></i>
                                                                </a>
                                                                <a href="" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#ubahPegawai<?php echo $pegawai['id_pegawai']; ?>" title="Ubah">
                                                                    <i class="fas fa-pencil-alt"></i>
                                                                </a>
                                                                <a href="hapusPegawai.php?id=<?php echo $pegawai['id_pegawai']; ?>" onclick="return confirm('Anda yakin ingin menghapus data ini?')" class="btn btn-sm btn-danger" title="Hapus">
                                                                    <i class="fas fa-prescription-bottle"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                        <td><?php echo $pegawai['nama_pegawai']; ?></td>
                                                        <td><?php echo $pegawai['nip']; ?></td>
                                                        <td><?php echo $pegawai['gol_pegawai']; ?></td>
                                                        <td><img src="foto_pegawai/<?php echo $pegawai['foto']; ?>" class="rounded-circle" width="50" height="50" alt=""></td>
                                                    </tr>

                                                    <!-- UBAH DATA -->
                                                    <div class="modal fade" id="ubahPegawai<?php echo $pegawai['id_pegawai']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-primary">
                                                                    <h5 class="modal-title" id="exampleModalLabel"><b>Ubah Data</b></h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span class="text-white" aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form method="POST" enctype="multipart/form-data" action="daftarPegawai.php?id=<?php echo $pegawai['id_pegawai']; ?>" enctype="multipart/form-data">
                                                                        <div class="form-group">
                                                                            <label for="nama_pegawai">Nama</label>
                                                                            <input type="text" class="form-control" name="nama_pegawai" id="nama_pegawai" required value="<?php echo $pegawai['nama_pegawai']; ?>">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="nip">NIP</label>
                                                                            <input type="number" class="form-control" name="nip" id="nip" required value="<?php echo $pegawai['nip']; ?>">
                                                                        </div>
                                                                        <div class=" form-group">
                                                                            <label for="jk">Jenis Kelamin</label>
                                                                            <select class="form-control" name="jk" id="jk" required>
                                                                                <option value="">Pilih Jenis Kelamin</option>
                                                                                <option <?php if ($pegawai['jk'] == 'Laki - Laki') {
                                                                                            echo "selected";
                                                                                        } ?> value="Laki - Laki">Laki - Laki</option>
                                                                                <option <?php if ($pegawai['jk'] == 'Perempuan') {
                                                                                            echo "selected";
                                                                                        } ?> value="Perempuan">Perempuan</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="tempat_lahir">Tempat Lahir</label>
                                                                            <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" required value="<?php echo $pegawai['tempat_lahir']; ?>">
                                                                        </div>
                                                                        <div class=" form-group">
                                                                            <label for="tgl_lahir">Tanggal Lahir</label>
                                                                            <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" value="<?php echo $pegawai['tgl_lahir']; ?>" required>
                                                                        </div>
                                                                        <div class=" form-group">
                                                                            <label for="alamat">Alamat</label>
                                                                            <input type="text" class="form-control" name="alamat" id="alamat" required value="<?php echo $pegawai['alamat']; ?>">
                                                                        </div>
                                                                        <div class=" form-group">
                                                                            <label for="agama">Agama</label>
                                                                            <select class="form-control" name="agama" id="agama" required>
                                                                                <option value="">Pilih Agama</option>
                                                                                <option <?php if ($pegawai['agama'] == 'Kristen Protestan') {
                                                                                            echo "selected";
                                                                                        } ?> value="Kristen Protestan">Kristen Protestan</option>
                                                                                <option <?php if ($pegawai['agama'] == 'Katolik') {
                                                                                            echo "selected";
                                                                                        } ?> value="Katolik">Katolik</option>
                                                                                <option <?php if ($pegawai['agama'] == 'Islam') {
                                                                                            echo "selected";
                                                                                        } ?> value="Islam">Islam</option>
                                                                                <option <?php if ($pegawai['agama'] == 'Hindu') {
                                                                                            echo "selected";
                                                                                        } ?> value="Hindu">Hindu</option>
                                                                                <option <?php if ($pegawai['agama'] == 'Budha') {
                                                                                            echo "selected";
                                                                                        } ?> value="Budha">Budha</option>
                                                                                <option <?php if ($pegawai['agama'] == 'Konghucu') {
                                                                                            echo "selected";
                                                                                        } ?> value="Konghucu">Konghucu</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="pendidikan_terakhir">Pendidikan Terakhir</label>
                                                                            <select class="form-control" name="pendidikan_terakhir" id="pendidikan_terakhir" required>
                                                                                <option value="">Pilih Pendidikan Terakhir</option>
                                                                                <option <?php if ($pegawai['pendidikan_terakhir'] == 'TAMAT SD / SEDERAJAT') {
                                                                                            echo "selected";
                                                                                        } ?> value="TAMAT SD / SEDERAJAT">
                                                                                    TAMAT SD / SEDERAJAT</option>
                                                                                <option <?php if ($pegawai['pendidikan_terakhir'] == 'SLTP / SEDERAJAT') {
                                                                                            echo "selected";
                                                                                        } ?> value="SLTP / SEDERAJAT">
                                                                                    SLTP / SEDERAJAT</option>
                                                                                <option <?php if ($pegawai['pendidikan_terakhir'] == 'TIDAK / BELUM SEKOLAH') {
                                                                                            echo "selected";
                                                                                        } ?> value="TIDAK / BELUM SEKOLAH">
                                                                                    TIDAK / BELUM SEKOLAH</option>
                                                                                <option <?php if ($pegawai['pendidikan_terakhir'] == 'SLTA / SEDERAJAT') {
                                                                                            echo "selected";
                                                                                        } ?> value="SLTA / SEDERAJAT">
                                                                                    SLTA / SEDERAJAT</option>
                                                                                <option <?php if ($pegawai['pendidikan_terakhir'] == 'BELUM TAMAT SD / SEDERAJAT') {
                                                                                            echo "selected";
                                                                                        } ?> value="BELUM TAMAT SD / SEDERAJAT">BELUM TAMAT SD / SEDERAJAT</option>
                                                                                <option <?php if ($pegawai['pendidikan_terakhir'] == 'DIPLOMA IV / STRATA I') {
                                                                                            echo "selected";
                                                                                        } ?> value="DIPLOMA IV / STRATA I">
                                                                                    DIPLOMA IV / STRATA I</option>
                                                                                <option <?php if ($pegawai['pendidikan_terakhir'] == 'AKADEMI / DIPLOMA III / S. MUDA') {
                                                                                            echo "selected";
                                                                                        } ?> value="AKADEMI / DIPLOMA III / S. MUDA">AKADEMI / DIPLOMA III / S. MUDA</option>
                                                                                <option <?php if ($pegawai['pendidikan_terakhir'] == 'DIPLOMA I / II') {
                                                                                            echo "selected";
                                                                                        } ?> value="DIPLOMA I / II">
                                                                                    DIPLOMA I / II</option>
                                                                                <option <?php if ($pegawai['pendidikan_terakhir'] == 'STRATA II') {
                                                                                            echo "selected";
                                                                                        } ?> value="STRATA II">
                                                                                    STRATA II</option>
                                                                                <option <?php if ($pegawai['pendidikan_terakhir'] == 'STRATA III') {
                                                                                            echo "selected";
                                                                                        } ?> value="STRATA III">
                                                                                    STRATA III</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="gol_pegawai">Golongan</label>
                                                                            <select class="form-control" name="gol_pegawai" id="gol_pegawai" required>
                                                                                <option value="">Pilih Golongan</option>
                                                                                <option <?php if ($pegawai['gol_pegawai'] == 'Ia') {
                                                                                            echo "selected";
                                                                                        } ?> value="Ia">Ia</option>
                                                                                <option <?php if ($pegawai['gol_pegawai'] == 'Ib') {
                                                                                            echo "selected";
                                                                                        } ?> value="Ib">Ib</option>
                                                                                <option <?php if ($pegawai['gol_pegawai'] == 'Ic') {
                                                                                            echo "selected";
                                                                                        } ?> value="Ic">Ic</option>
                                                                                <option <?php if ($pegawai['gol_pegawai'] == 'Id') {
                                                                                            echo "selected";
                                                                                        } ?> value="Id">Id</option>
                                                                                <option <?php if ($pegawai['gol_pegawai'] == 'IIa') {
                                                                                            echo "selected";
                                                                                        } ?> value="IIa">IIa</option>
                                                                                <option <?php if ($pegawai['gol_pegawai'] == 'IIb') {
                                                                                            echo "selected";
                                                                                        } ?> value="IIb">IIb</option>
                                                                                <option <?php if ($pegawai['gol_pegawai'] == 'IIc') {
                                                                                            echo "selected";
                                                                                        } ?> value="IIc">IIc</option>
                                                                                <option <?php if ($pegawai['gol_pegawai'] == 'IId') {
                                                                                            echo "selected";
                                                                                        } ?>value="IId">IId</option>
                                                                                <option <?php if ($pegawai['gol_pegawai'] == 'IIIa') {
                                                                                            echo "selected";
                                                                                        } ?> value="IIIa">IIIa</option>
                                                                                <option <?php if ($pegawai['gol_pegawai'] == 'IIIb') {
                                                                                            echo "selected";
                                                                                        } ?> value="IIIb">IIIb</option>
                                                                                <option <?php if ($pegawai['gol_pegawai'] == 'IIIc') {
                                                                                            echo "selected";
                                                                                        } ?> value="IIIc">IIIc</option>
                                                                                <option <?php if ($pegawai['gol_pegawai'] == 'IIId') {
                                                                                            echo "selected";
                                                                                        } ?> value="IIId">IIId</option>
                                                                                <option <?php if ($pegawai['gol_pegawai'] == 'IVa') {
                                                                                            echo "selected";
                                                                                        } ?> value="IVa">IVa</option>
                                                                                <option <?php if ($pegawai['gol_pegawai'] == 'IVb') {
                                                                                            echo "selected";
                                                                                        } ?>value="IVb">IVb</option>
                                                                                <option <?php if ($pegawai['gol_pegawai'] == 'IVc') {
                                                                                            echo "selected";
                                                                                        } ?> value="IVc">IVc</option>
                                                                                <option <?php if ($pegawai['gol_pegawai'] == 'IVd') {
                                                                                            echo "selected";
                                                                                        } ?> value="IVd">IVd</option>
                                                                                <option <?php if ($pegawai['gol_pegawai'] == 'IVe') {
                                                                                            echo "selected";
                                                                                        } ?> value="IVe">IVe</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="status_kawin">Status Kawin</label>
                                                                            <select class="form-control" name="status_kawin" id="status_kawin" required>
                                                                                <option value="">Pilih Status Kawin</option>
                                                                                <option <?php if ($pegawai['status_kawin'] == 'Kawin') {
                                                                                            echo "selected";
                                                                                        } ?> value="Kawin">Kawin</option>
                                                                                <option <?php if ($pegawai['status_kawin'] == 'Belum Kawin') {
                                                                                            echo "selected";
                                                                                        } ?> value="Belum Kawin">Belum Kawin</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="pangkat">Pangkat</label>
                                                                            <select class="form-control" name="pangkat" id="pangkat" required>
                                                                                <option value="">Pilih Pangkat</option>
                                                                                <option <?php if ($pegawai['pangkat'] == 'Juru Muda') {
                                                                                            echo "selected";
                                                                                        } ?> value="Juru Muda">Juru Muda</option>
                                                                                <option <?php if ($pegawai['pangkat'] == 'Juru Muda Tingkat I') {
                                                                                            echo "selected";
                                                                                        } ?> value="Juru Muda Tingkat I">Juru Muda Tingkat I</option>
                                                                                <option <?php if ($pegawai['pangkat'] == 'Juru') {
                                                                                            echo "selected";
                                                                                        } ?> value="Juru">Juru</option>
                                                                                <option <?php if ($pegawai['pangkat'] == 'Juru Tingkat I') {
                                                                                            echo "selected";
                                                                                        } ?> value="Juru Tingkat I">Juru Tingkat I</option>
                                                                                <option <?php if ($pegawai['pangkat'] == 'Pengatur Muda') {
                                                                                            echo "selected";
                                                                                        } ?> value="Pengatur Muda">Pengatur Muda</option>
                                                                                <option <?php if ($pegawai['pangkat'] == 'Pengatur Muda Tingkat I') {
                                                                                            echo "selected";
                                                                                        } ?> value="Pengatur Muda Tingkat I">Pengatur Muda Tingkat I</option>
                                                                                <option <?php if ($pegawai['pangkat'] == 'Pengatur') {
                                                                                            echo "selected";
                                                                                        } ?> value="Pengatur">Pengatur</option>
                                                                                <option <?php if ($pegawai['pangkat'] == 'Pengatur Tingkat I') {
                                                                                            echo "selected";
                                                                                        } ?> value="Pengatur Tingkat I">Pengatur Tingkat I</option>
                                                                                <option <?php if ($pegawai['pangkat'] == 'Penata Muda') {
                                                                                            echo "selected";
                                                                                        } ?> value="Penata Muda">Penata Muda</option>
                                                                                <option <?php if ($pegawai['pangkat'] == 'Penata Muda Tingkat I') {
                                                                                            echo "selected";
                                                                                        } ?> value="Penata Muda Tingkat I">Penata Muda Tingkat I</option>
                                                                                <option <?php if ($pegawai['pangkat'] == 'Penata') {
                                                                                            echo "selected";
                                                                                        } ?> value="Penata">Penata</option>
                                                                                <option <?php if ($pegawai['pangkat'] == 'Penata Tingkat I') {
                                                                                            echo "selected";
                                                                                        } ?> value="Penata Tingkat I">Penata Tingkat I</option>
                                                                                <option <?php if ($pegawai['pangkat'] == 'Pembina') {
                                                                                            echo "selected";
                                                                                        } ?> value="Pembina">Pembina</option>
                                                                                <option <?php if ($pegawai['pangkat'] == 'Pembina Tingkat I') {
                                                                                            echo "selected";
                                                                                        } ?> value="Pembina Tingkat I">Pembina Tingkat I</option>
                                                                                <option <?php if ($pegawai['pangkat'] == 'Pembina Utama Muda') {
                                                                                            echo "selected";
                                                                                        } ?> value="Pembina Utama Muda">Pembina Utama Muda</option>
                                                                                <option <?php if ($pegawai['pangkat'] == 'Pembina Utama Madya') {
                                                                                            echo "selected";
                                                                                        } ?> value="Pembina Utama Madya">Pembina Utama Madya</option>
                                                                                <option <?php if ($pegawai['pangkat'] == 'Pembina Utama') {
                                                                                            echo "selected";
                                                                                        } ?> value="Pembina Utama">Pembina Utama</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="jabatan">Jabatan</label>
                                                                            <input type="text" class="form-control" name="jabatan" id="jabatan" required value="<?php echo $pegawai['jabatan']; ?>">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="telepon">Telepon</label>
                                                                            <input type="number" class="form-control" name="telepon" id="telepon" required value="<?php echo $pegawai['telepon']; ?>">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <img src="foto_pegawai/<?php echo $pegawai['foto']; ?>" alt="" width="450" height="300">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="foto">Foto</label>
                                                                            <input type="file" class="form-control" name="foto" id="foto">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="email">Email</label>
                                                                            <input type="email" class="form-control" name="email" id="email" required value="<?php echo $pegawai['email']; ?>">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="status">Status Pegawai</label>
                                                                            <select class="form-control" name="status" id="status" required>
                                                                                <option value="">Pilih Status Pegawai</option>
                                                                                <option <?php if ($pegawai['status'] == 'Aktif') {
                                                                                            echo "selected";
                                                                                        } ?> value="Aktif">Aktif</option>
                                                                                <option <?php if ($pegawai['status'] == 'Tidak Aktif') {
                                                                                            echo "selected";
                                                                                        } ?> value="Tidak Aktif">Tidak Aktif</option>
                                                                            </select>
                                                                        </div>

                                                                </div>
                                                                <div class=" modal-footer">
                                                                    <button type="submit" class="btn btn-sm btn-primary" name="ubah">Ubah Data</button>
                                                                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Tutup</button>
                                                                </div>
                                                                </form>

                                                                <?php
                                                                if (isset($_POST['ubah'])) {
                                                                    $namafoto = $_FILES['foto']['name'];
                                                                    $lokasifoto = $_FILES['foto']['tmp_name'];

                                                                    // jika foto dirubah
                                                                    if (!empty($lokasifoto)) {
                                                                        move_uploaded_file($lokasifoto, "foto_pegawai/$namafoto");
                                                                        $sql = "UPDATE pegawai SET nama_pegawai = '$_POST[nama_pegawai]',nip = '$_POST[nip]',jk = '$_POST[jk]',tempat_lahir = '$_POST[tempat_lahir]',tgl_lahir = '$_POST[tgl_lahir]',alamat = '$_POST[alamat]',agama = '$_POST[agama]',pendidikan_terakhir = '$_POST[pendidikan_terakhir]',gol_pegawai = '$_POST[gol_pegawai]',status_kawin = '$_POST[status_kawin]',pangkat = '$_POST[pangkat]',jabatan = '$_POST[jabatan]',telepon = '$_POST[telepon]',foto = '$namafoto',email = '$_POST[email]', keterangan = '$_POST[keterangan]',status = '$_POST[status]' WHERE id_pegawai = '$_GET[id]'";
                                                                    } else {
                                                                        $sql = "UPDATE pegawai SET nama_pegawai = '$_POST[nama_pegawai]',nip = '$_POST[nip]',jk = '$_POST[jk]',tempat_lahir = '$_POST[tempat_lahir]',tgl_lahir = '$_POST[tgl_lahir]',alamat = '$_POST[alamat]',agama = '$_POST[agama]',pendidikan_terakhir = '$_POST[pendidikan_terakhir]',gol_pegawai = '$_POST[gol_pegawai]',status_kawin = '$_POST[status_kawin]',pangkat = '$_POST[pangkat]',jabatan = '$_POST[jabatan]',telepon = '$_POST[telepon]',email = '$_POST[email]',keterangan = '$_POST[keterangan]'status = '$_POST[status]' WHERE id_pegawai = '$_GET[id]'";
                                                                    }

                                                                    $koneksi->query($sql);
                                                                    if ($koneksi) {

                                                                        echo "<script>alert('Data Berhasil Diubah');</script>";
                                                                        echo "<script>location='daftarPegawai.php';</script>";
                                                                    } else {
                                                                        echo "<script>alert('Data Gagal Diubah');</script>";
                                                                        echo "<script>history.back();</script>";
                                                                    }
                                                                }
                                                                ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- END UBAH DATA -->

                                                    <?php $nomor++; ?>
                                                <?php } ?>
                                            </tbody>

                                            <!-- TAMBAH DATA -->
                                            <div class="modal fade" id="tambahPegawai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-primary">
                                                            <h5 class="modal-title" id="exampleModalLabel"><b>Tambah Data</b></h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span class="text-white" aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="POST" action="daftarPegawai.php" enctype="multipart/form-data">
                                                                <div class="form-group">
                                                                    <label for="nama_pegawai">Nama</label>
                                                                    <input type="text" class="form-control" name="nama_pegawai" id="nama_pegawai" required placeholder="Masukan Nama">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="nip">NIP</label>
                                                                    <input type="number" class="form-control" name="nip" id="nip" required placeholder="Masukan NIP">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="jk">Jenis Kelamin</label>
                                                                    <select class="form-control" name="jk" id="jk" required>
                                                                        <option value="">Pilih Jenis Kelamin</option>
                                                                        <option value="Laki - Laki">Laki - Laki</option>
                                                                        <option value="Perempuan">Perempuan</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="tempat_lahir">Tempat Lahir</label>
                                                                    <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" required placeholder="Masukan Tempat Lahir">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="tgl_lahir">Tanggal Lahir</label>
                                                                    <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="alamat">Alamat</label>
                                                                    <input type="text" class="form-control" name="alamat" id="alamat" required placeholder="Masukan Alamat">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="agama">Agama</label>
                                                                    <select class="form-control" name="agama" id="agama" required>
                                                                        <option value="">Pilih Agama</option>
                                                                        <option value="Kristen Protestan">Kristen Protestan</option>
                                                                        <option value="Katolik">Katolik</option>
                                                                        <option value="Islam">Islam</option>
                                                                        <option value="Hindu">Hindu</option>
                                                                        <option value="Budha">Budha</option>
                                                                        <option value="Konghucu">Konghucu</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="pendidikan_terakhir">Pendidikan Terakhir</label>
                                                                    <select class="form-control" name="pendidikan_terakhir" id="pendidikan_terakhir" required>
                                                                        <option value="">Pilih Pendidikan Terakhir</option>
                                                                        <option value="TAMAT SD / SEDERAJAT">
                                                                            TAMAT SD / SEDERAJAT</option>
                                                                        <option value="SLTP / SEDERAJAT">
                                                                            SLTP / SEDERAJAT</option>
                                                                        <option value="TIDAK / BELUM SEKOLAH">
                                                                            TIDAK / BELUM SEKOLAH</option>
                                                                        <option value="SLTA / SEDERAJAT">
                                                                            SLTA / SEDERAJAT</option>
                                                                        <option value="BELUM TAMAT SD / SEDERAJAT">BELUM TAMAT SD / SEDERAJAT</option>
                                                                        <option value="DIPLOMA IV / STRATA I">
                                                                            DIPLOMA IV / STRATA I</option>
                                                                        <option value="AKADEMI / DIPLOMA III / S. MUDA">AKADEMI / DIPLOMA III / S. MUDA</option>
                                                                        <option value="DIPLOMA I / II">
                                                                            DIPLOMA I / II</option>
                                                                        <option value="STRATA II">
                                                                            STRATA II</option>
                                                                        <option value="STRATA III">
                                                                            STRATA III</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="gol_pegawai">Golongan</label>
                                                                    <select class="form-control" name="gol_pegawai" id="gol_pegawai" required>
                                                                        <option value="">Pilih Golongan</option>
                                                                        <option value="Ia">Ia</option>
                                                                        <option value="Ib">Ib</option>
                                                                        <option value="Ic">Ic</option>
                                                                        <option value="Id">Id</option>
                                                                        <option value="IIa">IIa</option>
                                                                        <option value="IIb">IIb</option>
                                                                        <option value="IIc">IIc</option>
                                                                        <option value="IId">IId</option>
                                                                        <option value="IIIa">IIIa</option>
                                                                        <option value="IIIb">IIIb</option>
                                                                        <option value="IIIc">IIIc</option>
                                                                        <option value="IIId">IIId</option>
                                                                        <option value="IVa">IVa</option>
                                                                        <option value="IVb">IVb</option>
                                                                        <option value="IVc">IVc</option>
                                                                        <option value="IVd">IVd</option>
                                                                        <option value="IVe">IVe</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="status_kawin">Status Kawin</label>
                                                                    <select class="form-control" name="status_kawin" id="status_kawin" required>
                                                                        <option value="">Pilih Status Kawin</option>
                                                                        <option value="Kawin">Kawin</option>
                                                                        <option value="Belum Kawin">Belum Kawin</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="pangkat">Pangkat</label>
                                                                    <select class="form-control" name="pangkat" id="pangkat" required>
                                                                        <option value="">Pilih Pangkat</option>
                                                                        <option value="Juru Muda">Juru Muda</option>
                                                                        <option value="Juru Muda Tingkat I">Juru Muda Tingkat I</option>
                                                                        <option value="Juru">Juru</option>
                                                                        <option value="Juru Tingkat I">Juru Tingkat I</option>
                                                                        <option value="Pengatur Muda">Pengatur Muda</option>
                                                                        <option value="Pengatur Muda Tingkat I">Pengatur Muda Tingkat I</option>
                                                                        <option value="Pengatur">Pengatur</option>
                                                                        <option value="Pengatur Tingkat I">Pengatur Tingkat I</option>
                                                                        <option value="Penata Muda">Penata Muda</option>
                                                                        <option value="Penata Muda Tingkat I">Penata Muda Tingkat I</option>
                                                                        <option value="Penata">Penata</option>
                                                                        <option value="Penata Tingkat I">Penata Tingkat I</option>
                                                                        <option value="Pembina">Pembina</option>
                                                                        <option value="Pembina Tingkat I">Pembina Tingkat I</option>
                                                                        <option value="Pembina Utama Muda">Pembina Utama Muda</option>
                                                                        <option value="Pembina Utama Madya">Pembina Utama Madya</option>
                                                                        <option value="Pembina Utama">Pembina Utama</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="jabatan">Jabatan</label>
                                                                    <input type="text" class="form-control" name="jabatan" id="jabatan" required placeholder="Masukan Jabatan">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="telepon">Telepon</label>
                                                                    <input type="number" class="form-control" name="telepon" id="telepon" required placeholder="Masukan Telepon">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="foto">Foto</label>
                                                                    <input type="file" class="form-control" name="foto" id="foto" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="email">Email</label>
                                                                    <input type="email" class="form-control" name="email" id="email" required placeholder="Masukan Email">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="keterangan">Keterangan</label>
                                                                    <input type="keterangan" class="form-control" name="keterangan" id="keterangan" required placeholder="Keterangan">
                                                                </div>


                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-sm btn-primary" name="tambah">Tambah Data</button>
                                                            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Tutup</button>
                                                        </div>
                                                        </form>

                                                        <?php
                                                        if (isset($_POST['tambah'])) {
                                                            $nama = $_FILES['foto']['name'];
                                                            $lokasi = $_FILES['foto']['tmp_name'];
                                                            move_uploaded_file($lokasi, "foto_pegawai/" . $nama);
                                                            $koneksi->query("INSERT INTO pegawai
                                        (nama_pegawai,nip,jk,tempat_lahir,tgl_lahir,alamat,agama,pendidikan_terakhir,gol_pegawai,status_kawin,pangkat,jabatan,telepon,foto,email,keterangan) VALUES ('$_POST[nama_pegawai]','$_POST[nip]','$_POST[jk]','$_POST[tempat_lahir]','$_POST[tgl_lahir]','$_POST[alamat]','$_POST[agama]','$_POST[pendidikan_terakhir]','$_POST[gol_pegawai]','$_POST[status_kawin]','$_POST[pangkat]','$_POST[jabatan]','$_POST[telepon]','$nama','$_POST[email]',' $_POST[keterangan]'");

                                                            echo "<script>alert('Data Berhasil Ditambah');</script>";
                                                            echo "<script>location='daftarPegawai.php';</script>";
                                                        }
                                                        ?>

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END TAMBAH DATA -->

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- FOOTER -->
        <?php require 'footer.php'; ?>
        <!-- END FOOTER -->
    </div>

    <!-- Custom template | don't include it in your project! -->
    <div class="custom-template">
        <div class="title">Settings</div>
        <div class="custom-content">
            <div class="switcher">
                <div class="switch-block">
                    <h4>Logo Header</h4>
                    <div class="btnSwitch">
                        <button type="button" class="changeLogoHeaderColor" data-color="dark"></button>
                        <button type="button" class="selected changeLogoHeaderColor" data-color="blue"></button>
                        <button type="button" class="changeLogoHeaderColor" data-color="purple"></button>
                        <button type="button" class="changeLogoHeaderColor" data-color="light-blue"></button>
                        <button type="button" class="changeLogoHeaderColor" data-color="green"></button>
                        <button type="button" class="changeLogoHeaderColor" data-color="orange"></button>
                        <button type="button" class="changeLogoHeaderColor" data-color="red"></button>
                        <button type="button" class="changeLogoHeaderColor" data-color="white"></button>
                        <br />
                        <button type="button" class="changeLogoHeaderColor" data-color="dark2"></button>
                        <button type="button" class="changeLogoHeaderColor" data-color="blue2"></button>
                        <button type="button" class="changeLogoHeaderColor" data-color="purple2"></button>
                        <button type="button" class="changeLogoHeaderColor" data-color="light-blue2"></button>
                        <button type="button" class="changeLogoHeaderColor" data-color="green2"></button>
                        <button type="button" class="changeLogoHeaderColor" data-color="orange2"></button>
                        <button type="button" class="changeLogoHeaderColor" data-color="red2"></button>
                    </div>
                </div>
                <div class="switch-block">
                    <h4>Navbar Header</h4>
                    <div class="btnSwitch">
                        <button type="button" class="changeTopBarColor" data-color="dark"></button>
                        <button type="button" class="changeTopBarColor" data-color="blue"></button>
                        <button type="button" class="changeTopBarColor" data-color="purple"></button>
                        <button type="button" class="changeTopBarColor" data-color="light-blue"></button>
                        <button type="button" class="changeTopBarColor" data-color="green"></button>
                        <button type="button" class="changeTopBarColor" data-color="orange"></button>
                        <button type="button" class="changeTopBarColor" data-color="red"></button>
                        <button type="button" class="changeTopBarColor" data-color="white"></button>
                        <br />
                        <button type="button" class="changeTopBarColor" data-color="dark2"></button>
                        <button type="button" class="selected changeTopBarColor" data-color="blue2"></button>
                        <button type="button" class="changeTopBarColor" data-color="purple2"></button>
                        <button type="button" class="changeTopBarColor" data-color="light-blue2"></button>
                        <button type="button" class="changeTopBarColor" data-color="green2"></button>
                        <button type="button" class="changeTopBarColor" data-color="orange2"></button>
                        <button type="button" class="changeTopBarColor" data-color="red2"></button>
                    </div>
                </div>
                <div class="switch-block">
                    <h4>Sidebar</h4>
                    <div class="btnSwitch">
                        <button type="button" class="selected changeSideBarColor" data-color="white"></button>
                        <button type="button" class="changeSideBarColor" data-color="dark"></button>
                        <button type="button" class="changeSideBarColor" data-color="dark2"></button>
                    </div>
                </div>
                <div class="switch-block">
                    <h4>Background</h4>
                    <div class="btnSwitch">
                        <button type="button" class="changeBackgroundColor" data-color="bg2"></button>
                        <button type="button" class="changeBackgroundColor selected" data-color="bg1"></button>
                        <button type="button" class="changeBackgroundColor" data-color="bg3"></button>
                        <button type="button" class="changeBackgroundColor" data-color="dark"></button>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="custom-toggle">
                <i class="flaticon-settings"></i>
            </div> -->
    </div>
    <!-- End Custom template -->
    </div>
    <!--   Core JS Files   -->
    <script src="assets/js/core/jquery.3.2.1.min.js"></script>
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap.min.js"></script>

    <!-- jQuery UI -->
    <script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <script src="assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


    <!-- Chart JS -->
    <script src="assets/js/plugin/chart.js/chart.min.js"></script>

    <!-- jQuery Sparkline -->
    <script src="assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

    <!-- Chart Circle -->
    <script src="assets/js/plugin/chart-circle/circles.min.js"></script>

    <!-- Datatables -->
    <script src="assets/js/plugin/datatables/datatables.min.js"></script>

    <!-- Bootstrap Notify -->
    <script src="assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

    <!-- jQuery Vector Maps -->
    <script src="assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
    <script src="assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

    <!-- Sweet Alert -->
    <script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>

    <!-- Atlantis JS -->
    <script src="assets/js/atlantis.min.js"></script>

    <!-- Atlantis DEMO methods, don't include it in your project! -->
    <!-- <script src="assets/js/setting-demo.js"></script>
    <script src="assets/js/demo.js"></script> -->
    <script>
        Circles.create({
            id: 'circles-1',
            radius: 45,
            value: 60,
            maxValue: 100,
            width: 7,
            text: 5,
            colors: ['#f1f1f1', '#FF9E27'],
            duration: 400,
            wrpClass: 'circles-wrp',
            textClass: 'circles-text',
            styleWrapper: true,
            styleText: true
        })

        Circles.create({
            id: 'circles-2',
            radius: 45,
            value: 70,
            maxValue: 100,
            width: 7,
            text: 36,
            colors: ['#f1f1f1', '#2BB930'],
            duration: 400,
            wrpClass: 'circles-wrp',
            textClass: 'circles-text',
            styleWrapper: true,
            styleText: true
        })

        Circles.create({
            id: 'circles-3',
            radius: 45,
            value: 40,
            maxValue: 100,
            width: 7,
            text: 12,
            colors: ['#f1f1f1', '#F25961'],
            duration: 400,
            wrpClass: 'circles-wrp',
            textClass: 'circles-text',
            styleWrapper: true,
            styleText: true
        })

        var totalIncomeChart = document.getElementById('totalIncomeChart').getContext('2d');

        var mytotalIncomeChart = new Chart(totalIncomeChart, {
            type: 'bar',
            data: {
                labels: ["S", "M", "T", "W", "T", "F", "S", "S", "M", "T"],
                datasets: [{
                    label: "Total Income",
                    backgroundColor: '#ff9e27',
                    borderColor: 'rgb(23, 125, 255)',
                    data: [6, 4, 9, 5, 4, 6, 4, 3, 8, 10],
                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    display: false,
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            display: false //this will remove only the label
                        },
                        gridLines: {
                            drawBorder: false,
                            display: false
                        }
                    }],
                    xAxes: [{
                        gridLines: {
                            drawBorder: false,
                            display: false
                        }
                    }]
                },
            }
        });

        $('#lineChart').sparkline([105, 103, 123, 100, 95, 105, 115], {
            type: 'line',
            height: '70',
            width: '100%',
            lineWidth: '2',
            lineColor: '#ffa534',
            fillColor: 'rgba(255, 165, 52, .14)'
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#basic-datatables').DataTable({});

            $('#multi-filter-select').DataTable({
                "pageLength": 5,
                initComplete: function() {
                    this.api().columns().every(function() {
                        var column = this;
                        var select = $('<select class="form-control"><option value=""></option></select>')
                            .appendTo($(column.footer()).empty())
                            .on('change', function() {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                );

                                column
                                    .search(val ? '^' + val + '$' : '', true, false)
                                    .draw();
                            });

                        column.data().unique().sort().each(function(d, j) {
                            select.append('<option value="' + d + '">' + d + '</option>')
                        });
                    });
                }
            });

            // Add Row
            $('#add-row').DataTable({
                "pageLength": 5,
            });

            var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

            $('#addRowButton').click(function() {
                $('#add-row').dataTable().fnAddData([
                    $("#addName").val(),
                    $("#addPosition").val(),
                    $("#addOffice").val(),
                    action
                ]);
                $('#addRowModal').modal('hide');

            });
        });
    </script>
</body>

</html>