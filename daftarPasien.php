<?php
session_start();
date_default_timezone_set("Asia/Singapore");
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
    <title>SIRPAS</title>
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
                        <p class="navbar-brand text-align-center" style="font-size: 20px; font-style: italic; color: #FFF; letter-spacing: 3px; ">SIRPAS</p>
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
                        <h4 class="page-title">Daftar Pasien</h4>
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
                                <a href="daftarPasien.php">Daftar Pasien</a>
                            </li>
                        </ul>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h6>
                                        <a href="" class="btn btn-sm btn-primary" title="Tambah Data Baru" data-toggle="modal" data-target="#tambahPasien">
                                            <i class="fas fa-plus"></i>
                                        </a>
                                        <a href="pdfPasien.php" class="btn btn-sm btn-primary" title="Unduh Pdf" target="_blank">
                                            <i class="fas fa-download"></i>
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
                                                    <th>No. Registrasi</th>
                                                    <th>Operator</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Aksi</th>
                                                    <th>Nama</th>
                                                    <th>No. Registrasi</th>
                                                    <th>Operator</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <?php $nomor = 1; ?>
                                                <?php $dataPasien = $koneksi->query("SELECT * FROM tb_daftar_pasien"); ?>
                                                <?php while ($pasien = $dataPasien->fetch_assoc()) { ?>
                                                    <tr>
                                                        <td><?php echo $nomor; ?></td>
                                                        <td>
                                                            <center>
                                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                                    <?php if ($pasien['status_diagnosa'] == 'Kosong') : ?>
                                                                        <a href="tambahDiagnosa.php?id=<?php echo $pasien['id_pasien']; ?>" class="btn btn-sm btn-primary" title="Tambah Diagnosa">
                                                                            <i class="fas fa-plus"></i>
                                                                        </a>
                                                                    <?php endif ?>
                                                                    <a href="detailPasien.php?id=<?php echo $pasien['id_pasien']; ?>" class="btn btn-sm btn-info" title="Detail">
                                                                        <i class="fas fa-eye"></i>
                                                                    </a>
                                                                    <a href="" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#ubahPasien<?php echo $pasien['id_pasien']; ?>" title="Ubah">
                                                                        <i class="fas fa-pencil-alt"></i>
                                                                    </a>
                                                                    <a href="hapusPasien.php?id=<?php echo $pasien['id_pasien']; ?>" onclick="return confirm('Anda yakin ingin menghapus data ini?')" class="btn btn-sm btn-danger" title="Hapus">
                                                                        <i class="fas fa-trash"></i>
                                                                    </a>
                                                                </div>
                                                            </center>
                                                        </td>
                                                        <td><?php echo $pasien['nama']; ?></td>
                                                        <td><?php echo $pasien['no_registrasi']; ?></td>
                                                        <td><?php echo $pasien['nama_operator']; ?></td>
                                                    </tr>


                                                    <!-- UBAH DATA -->
                                                    <div class="modal fade" id="ubahPasien<?php echo $pasien['id_pasien']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-primary">
                                                                    <h5 class="modal-title" id="exampleModalLabel"><b>Ubah Data</b></h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span class="text-white" aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form method="POST" enctype="multipart/form-data" action="daftarpasien.php?id=<?php echo $pasien['id_pasien']; ?>" enctype="multipart/form-data">
                                                                        <div class="form-group">
                                                                            <label for="nama_pasien">Nama Pasien</label>
                                                                            <input type="text" class="form-control" name="nama_pasien" id="nama_pasien" required value="<?php echo $pasien['nama']; ?>">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="no_registrasi">No. Registrasi</label>
                                                                            <input type="text" class="form-control" name="no_registrasi" id="no_registrasi" required value="<?php echo $pasien['no_registrasi']; ?>">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="nama_operator">Nama Operator</label>
                                                                            <input type="text" class="form-control" name="nama_operator" id="nama_operator" required value="<?php echo $pasien['nama_operator']; ?>">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="umur">Umur</label>
                                                                            <input type="text" class="form-control" name="umur" id="umur" required value="<?php echo $pasien['umur']; ?>">
                                                                        </div>
                                                                        <div class=" form-group">
                                                                            <label for="alamat">Alamat</label>
                                                                            <input type="text" class="form-control" name="alamat" id="alamat" required value="<?php echo $pasien['alamat']; ?>">
                                                                        </div>
                                                                        <div class=" form-group">
                                                                            <label for="jk">Jenis Kelamin</label>
                                                                            <select class="form-control" name="jk" id="jk" required>
                                                                                <option value="">Pilih Jenis Kelamin</option>
                                                                                <option <?php if ($pasien['jk'] == 'Laki - Laki') {
                                                                                            echo "selected";
                                                                                        } ?> value="Laki - Laki">Laki - Laki</option>
                                                                                <option <?php if ($pasien['jk'] == 'Perempuan') {
                                                                                            echo "selected";
                                                                                        } ?> value="Perempuan">Perempuan</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class=" form-group">
                                                                            <select class="form-control" name="pekerjaan" required>
                                                                                <option value="">Pilih Pekerjaan</option>
                                                                                <option <?php if ($pasien['pekerjaan'] == 'BELUM / TIDAK BEKERJA') {
                                                                                            echo "selected";
                                                                                        } ?> value='BELUM / TIDAK BEKERJA'>BELUM / TIDAK BEKERJA
                                                                                </option>
                                                                                <option <?php if ($pasien['pekerjaan'] == 'MENGURUS RUMAH TANGGA') {
                                                                                            echo "selected";
                                                                                        } ?> value='MENGURUS RUMAH TANGGA'>MENGURUS RUMAH TANGGA
                                                                                </option>
                                                                                <option <?php if ($pasien['pekerjaan'] == 'PELAJAR / MAHASISWA') {
                                                                                            echo "selected";
                                                                                        } ?> value='PELAJAR / MAHASISWA'>PELAJAR / MAHASISWA
                                                                                </option>
                                                                                <option <?php if ($pasien['pekerjaan'] == 'PENSIUNAN') {
                                                                                            echo "selected";
                                                                                        } ?> value='PENSIUNAN'>PENSIUNAN
                                                                                </option>
                                                                                <option <?php if ($pasien['pekerjaan'] == 'PEGAWAI NEGERI SIPIL') {
                                                                                            echo "selected";
                                                                                        } ?> value='PEGAWAI NEGERI SIPIL'>PEGAWAI NEGERI SIPIL
                                                                                </option>
                                                                                <option <?php if ($pasien['pekerjaan'] == 'PETANI / PEKEBUN') {
                                                                                            echo "selected";
                                                                                        } ?> value='PETANI / PEKEBUN'>PETANI / PEKEBUN
                                                                                </option>
                                                                                <option <?php if ($pasien['pekerjaan'] == 'PETERNAK') {
                                                                                            echo "selected";
                                                                                        } ?> value='PETERNAK'>PETERNAK
                                                                                </option>
                                                                                <option <?php if ($pasien['pekerjaan'] == 'NELAYAN / PERIKANAN') {
                                                                                            echo "selected";
                                                                                        } ?> value='NELAYAN / PERIKANAN'>NELAYAN / PERIKANAN
                                                                                </option>
                                                                                <option <?php if ($pasien['pekerjaan'] == 'KARYAWAN SWASTA') {
                                                                                            echo "selected";
                                                                                        } ?> value='KARYAWAN SWASTA'>KARYAWAN SWASTA
                                                                                </option>
                                                                                <option <?php if ($pasien['pekerjaan'] == 'KARYAWAN BUMN') {
                                                                                            echo "selected";
                                                                                        } ?> value='KARYAWAN BUMN'>KARYAWAN BUMN
                                                                                </option>
                                                                                <option <?php if ($pasien['pekerjaan'] == 'KARYAWAN BUMD') {
                                                                                            echo "selected";
                                                                                        } ?> value='KARYAWAN BUMD'>KARYAWAN BUMD
                                                                                </option>
                                                                                <option <?php if ($pasien['pekerjaan'] == 'WIRASWASTA') {
                                                                                            echo "selected";
                                                                                        } ?> value='WIRASWASTA'>WIRASWASTA
                                                                                </option>
                                                                                <option <?php if ($pasien['pekerjaan'] == 'TUKANG') {
                                                                                            echo "selected";
                                                                                        } ?> value='TUKANG'>TUKANG
                                                                                </option>
                                                                                <option <?php if ($pasien['pekerjaan'] == 'PEDAGANG') {
                                                                                            echo "selected";
                                                                                        } ?> value='PEDAGANG'>PEDAGANG
                                                                                </option>
                                                                                <option <?php if ($pasien['pekerjaan'] == 'LAINNYA') {
                                                                                            echo "selected";
                                                                                        } ?> value='LAINNYA'>LAINNYA
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="no_hp">No. Hp</label>
                                                                            <input type="tel" class="form-control" name="no_hp" id="no_hp" required value="<?php echo $pasien['no_hp']; ?>">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="nama_ortu">Nama Orang Tua</label>
                                                                            <input type="text" class="form-control" name="nama_ortu" id="nama_ortu" value="<?php echo $pasien['nama_ortu']; ?>">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="tgl_daftar">Tanggal Daftar</label>
                                                                            <input type="text" class="form-control" name="tgl_daftar" id="tgl_daftar" value="<?php echo date("d F Y", strtotime($pasien['tgl_daftar'])) ?>" readonly>
                                                                        </div>

                                                                </div>
                                                                <div class=" modal-footer">
                                                                    <button type="submit" class="btn btn-sm btn-primary" name="ubah">Ubah Data</button>
                                                                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Tutup</button>
                                                                </div>
                                                                </form>

                                                                <?php
                                                                if (isset($_POST['ubah'])) {

                                                                    $sql = "UPDATE tb_daftar_pasien SET nama = '$_POST[nama_pasien]',no_registrasi = '$_POST[no_registrasi]',nama_operator = '$_POST[nama_operator]',umur = '$_POST[umur]',alamat = '$_POST[alamat]',jk = '$_POST[jk]',pekerjaan = '$_POST[pekerjaan]',no_hp = '$_POST[no_hp]',nama_ortu = '$_POST[nama_ortu]' WHERE id_pasien = '$_GET[id]'";

                                                                    $koneksi->query($sql);
                                                                    if ($koneksi) {

                                                                        echo "<script>alert('Data Berhasil Diubah');</script>";
                                                                        echo "<script>location='daftarPasien.php';</script>";
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
                                            <div class="modal fade" id="tambahPasien" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-primary">
                                                            <h5 class="modal-title" id="exampleModalLabel"><b>Tambah Data</b></h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span class="text-white" aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="POST" action="" enctype="multipart/form-data">
                                                                <div class="form-group">
                                                                    <label for="nama_pasien">Nama Pasien</label>
                                                                    <input type="text" class="form-control" name="nama" id="nama_pasien" required placeholder="Masukan Nama Pasien">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="no_registrasi">No. Registrasi</label>
                                                                    <input type="text" class="form-control" name="no_registrasi" id="no_registrasi" required placeholder="Masukan No. Registrasi">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="nama_operator">Operator</label>
                                                                    <input type="text" class="form-control" name="nama_operator" id="nama_operator" required placeholder="Masukan Nama Operator">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="umur">Umur</label>
                                                                    <input type="text" class="form-control" name="umur" id="umur" required placeholder="Masukan Umur">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="alamat">Alamat</label>
                                                                    <textarea type="text" class="form-control" name="alamat" id="alamat" required placeholder="Masukan Alamat" rows="2"></textarea>
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
                                                                    <label for="pekerjaan">Pekerjaan</label>
                                                                    <select class="form-control" name="pekerjaan" id="pekerjaan" required>
                                                                        <option value="">Pilih Pekerjaan</option>
                                                                        <option value="BELUM / TIDAK BEKERJA">
                                                                            BELUM / TIDAK BEKERJA</option>
                                                                        <option value="MENGURUS RUMAH TANGGA">
                                                                            MENGURUS RUMAH TANGGA</option>
                                                                        <option value="PELAJAR / MAHASISWA">
                                                                            PELAJAR / MAHASISWA</option>
                                                                        <option value="PENSIUNAN">
                                                                            PENSIUNAN</option>
                                                                        <option value="PEGAWAI NEGERI SIPIL">
                                                                            PEGAWAI NEGERI SIPIL</option>
                                                                        <option value="PETANI / PEKEBUN">
                                                                            PETANI / PEKEBUN</option>
                                                                        <option value="PETERNAK">
                                                                            PETERNAK</option>
                                                                        <option value="NELAYAN / PERIKANAN">
                                                                            NELAYAN / PERIKANAN</option>
                                                                        <option value="KARYAWAN SWASTA">
                                                                            KARYAWAN SWASTA</option>
                                                                        <option value="KARYAWAN BUMN">
                                                                            KARYAWAN BUMN</option>
                                                                        <option value="KARYAWAN BUMD">
                                                                            KARYAWAN BUMD</option>
                                                                        <option value="WIRASWASTA">
                                                                            WIRASWASTA</option>
                                                                        <option value="TUKANG">TUKANG</option>
                                                                        <option value="PEDAGANG">PEDAGANG</option>
                                                                        <option value="LAINNYA">LAINNYA</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="no_hp">No. Hp</label>
                                                                    <input type="tel" class="form-control" name="no_hp" id="no_hp" pattern="^(0)8[1-9][0-9]{6,9}$" required placeholder="Masukan No. Hp">
                                                                    <p><em>Contoh</em> : 085123456789 <span style="color: red;"> Tanpa Spasi !</span></p>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="nama_ortu">Nama Orang Tua (jika pasien anak)</label>
                                                                    <input type="text" class="form-control" name="nama_ortu" id="nama_ortu" placeholder="Masukan Nama Orang Tua">
                                                                </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-sm btn-primary" name="tambah">Tambah Data</button>
                                                            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Tutup</button>
                                                        </div>
                                                        </form>

                                                        <?php
                                                        if (isset($_POST['tambah'])) {
                                                            $nama = $_POST['nama'];
                                                            $tgl_daftar = date("Y-m-d");

                                                            // lakukan query cek akun di tabel daftar_pasien pada database
                                                            $result = mysqli_query($koneksi, "SELECT * FROM tb_daftar_pasien WHERE nama = '$nama' AND tgl_daftar = '$tgl_daftar'");

                                                            // hitung akun yang terresult
                                                            $PasienYangSama = $result->num_rows;

                                                            // jika tidak ada kesamaan data maka tambahkan pasien ke database
                                                            if ($PasienYangSama == 1) {
                                                                // pasien sudah terdaftar hari ini
                                                                echo "<script>alert('Paisen ini sudah terdaftar sebelumnya pada hari ini');</script>";
                                                                echo "<script>history.back();</script>";
                                                            } else {
                                                                $sql = mysqli_query($koneksi, "INSERT INTO tb_daftar_pasien
                                        (nama,no_registrasi,nama_operator,umur,alamat,jk,pekerjaan,no_hp,nama_ortu,tgl_daftar) VALUES ('$nama','$_POST[no_registrasi]','$_POST[nama_operator]','$_POST[umur]','$_POST[alamat]','$_POST[jk]','$_POST[pekerjaan]','$_POST[no_hp]','$_POST[nama_ortu]','$tgl_daftar')");
                                                            }

                                                            if ($sql) {
                                                                echo "<script>alert('Data Berhasil Ditambah');</script>";
                                                                echo "<script>location='daftarPasien.php';</script>";
                                                            } else {
                                                                echo "<script>alert('Data Gagal Ditambah');</script>";
                                                                echo "<script>history.back();</script>";
                                                            }
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