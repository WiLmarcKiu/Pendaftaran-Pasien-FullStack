<?php
require '../koneksi.php';

if (!isset($_SESSION["pegawai"])) {
    echo "<script>alert('Silahkan Login terlebih dahulu');</script>";
    echo "<script>location='../index.php';</script>";
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIMPEG</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- theme stylesheet-->
    <!-- CSS Files -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/atlantis.min.css">
</head>
<style>
    html {
        min-height: 100%;
    }

    .breadcrumb {
        display: flex;
        flex-wrap: wrap;
        padding: 20px 30px;
        margin-bottom: 1rem;
        list-style: none;
        margin: 30px;
        background-color: rgba(255, 255, 255, 0.13);
        box-shadow: 0 0 40px rgba(8, 7, 16, 0.6);
    }

    .breadcrumb li a {
        text-decoration: none;
        color: #FFF;
        font-weight: 600;
    }

    .content {
        padding: 40px 30px;
    }

    .content .card {
        padding: 20px;
    }

    .content .card {
        background-color: rgba(255, 255, 255, 0.13);
        box-shadow: 0 0 40px rgba(8, 7, 16, 0.6);
    }

    .kirim {
        margin: 10px auto 20px;
        width: 140px;
        outline: none;
        padding: 10px 0;
        border: 2px solid #FFF;
        cursor: pointer;
        background: transparent;
        color: #FFF;
        font-size: 17px;
        font-weight: 600;
        letter-spacing: 5px;
        border-radius: 7px;
        display: block;
        float: right;
    }

    .tambah {
        margin: auto auto 20px;
        width: 130px;
        padding: 6px 0;
        outline: none;
        border: 2px solid #FFF;
        cursor: pointer;
        background: transparent;
        color: #FFF;
        font-size: 14px;
        font-weight: 600;
        letter-spacing: 1px;
        border-radius: 7px;
        display: block;
        float: left;
    }

    button[type="button"]:hover {
        border: 2px solid #35DA6C;
        background: #35DA6C;
        color: #fff;
        transition: all 0.3s ease;
    }

    button[type="submit"]:hover {
        border: 2px solid transparent;
        background: rgba(0, 0, 0, .3);
        color: #fff;
        transition: all 0.3s ease;
    }
</style>

<body style="background: rgb(69,63,255);
background: linear-gradient(225deg, rgba(69,63,255,1) 19%, rgba(5,148,247,1) 34%, rgba(208,218,226,1) 62%, rgba(198,198,198,1) 68%, rgba(196,192,192,1) 71%, rgba(195,186,186,1) 73%, rgba(184,184,184,1) 75%, rgba(177,176,176,1) 79%, rgba(171,161,161,1) 87%, rgba(142,130,130,1) 97%);">
    <div class="container">
        <div class="content">
            <div class="card" style="width: 100%;">
                <div class="card-body">
                    <ul class="nav nav-pills nav-primary" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active text-white" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Detail Profil</a>
                        </li>
                        <li class="nav-item">
                            <a href="logout.php" class="nav-link text-white" aria-selected="false">Logout</a>
                        </li>
                    </ul>
                    <div class="tab-content mt-2" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <?php
                            $id_pegawai = $_SESSION['pegawai']['id_pegawai'];
                            $ambil = $koneksi->query("SELECT * FROM pegawai INNER JOIN pangkat ON pegawai.id_pegawai=pangkat.id_pegawai INNER JOIN gaji ON pegawai.id_pegawai=pangkat.id_pegawai WHERE pegawai.id_pegawai = '$id_pegawai'");
                            $pecah = $ambil->fetch_assoc()
                            ?>

                            <div class="home">
                                <div class="row justify-content-center">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4 mt-4">
                                        <img src="../foto_pegawai/<?php echo $pecah['foto']; ?>" class="rounded-circle" style="width: 100%; height: 45vh;" alt="">
                                    </div>
                                    <div class="col-md-4"></div>
                                </div>
                                <div class="row justify-content-center">
                                    <h2 class="text-center text-white mt-4 efek-ketik" style="letter-spacing: 1px;"></h2>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div class="row mt-4">
                                <div class="col-lg-4">
                                    <img src="../foto_pegawai/<?php echo $pecah['foto']; ?>" style="width: 100%; height: 60vh; vertical-align: middle;" alt="">
                                </div>
                                <div class="col-lg-8">
                                    <table class="table noborder table-hover text-white">
                                        <tbody>
                                            <tr></tr>
                                            <tr>
                                                <td>Nama Pegawai</td>
                                                <td>:</td>
                                                <td><?php echo $pecah['nama_pegawai']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>NIP</td>
                                                <td>:</td>
                                                <td><?php echo $pecah['nip']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Jenis Kelamin</td>
                                                <td>:</td>
                                                <td><?php echo $pecah['jk']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Tempat / Tanggal Lahir</td>
                                                <td>:</td>
                                                <td><?php echo $pecah['tempat_lahir']; ?>, <?php echo date("d F Y", strtotime($pecah['tgl_lahir'])) ?></td>
                                            </tr>
                                            <tr>
                                                <td>Alamat</td>
                                                <td>:</td>
                                                <td><?php echo $pecah['alamat']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Agama</td>
                                                <td>:</td>
                                                <td><?php echo $pecah['agama']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Pendidikan Terakhir</td>
                                                <td>:</td>
                                                <td><?php echo $pecah['pendidikan_terakhir']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Golongan / Pangkat</td>
                                                <td>:</td>
                                                <td><?php echo $pecah['gol_pegawai']; ?> / <?php echo $pecah['pangkat']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Status Kawin</td>
                                                <td>:</td>
                                                <td><?php echo $pecah['status_kawin']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Jabatan</td>
                                                <td>:</td>
                                                <td><?php echo $pecah['jabatan']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Telepon</td>
                                                <td>:</td>
                                                <td><?php echo $pecah['telepon']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td>:</td>
                                                <td><?php echo $pecah['email']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Tanggal Terima Gaji</td>
                                                <td>:</td>
                                                <td><?php echo date("d F Y", strtotime($pecah['tgl_terima'])) ?></td>
                                            </tr>
                                            <tr>
                                                <td>Gaji Pokok</td>
                                                <td>:</td>
                                                <td>Rp. <?php echo number_format($pecah['gaji_pokok']); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Masa Kerja</td>
                                                <td>:</td>
                                                <td><?php echo $pecah['masa_kerja']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>File SK Pangkat Terakhir</td>
                                                <td>:</td>
                                                <td>
                                                    <?php if (empty($pecah['sk_pangkat_terakhir'])) : ?>

                                                        <button class="btn btn-sm btn-danger">File SK Kosong</button>

                                                    <?php else : ?>

                                                        <a href="../unduhSKPangkatTerakhir.php?filename=<?php echo $pecah['sk_pangkat_terakhir']; ?>" class="btn btn-sm btn-primary">Unduh File SK</a>

                                                    <?php endif ?>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Status</td>
                                                <td>:</td>
                                                <td><?php echo $pecah['status']; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!--   Core JS Files   -->
    <script src="../assets/js/core/jquery.3.2.1.min.js"></script>
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>

    <!-- jQuery UI -->
    <script src="../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <script src="../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


    <!-- Chart JS -->
    <script src="../assets/js/plugin/chart.js/chart.min.js"></script>

    <!-- jQuery Sparkline -->
    <script src="../assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

    <!-- Chart Circle -->
    <script src="../assets/js/plugin/chart-circle/circles.min.js"></script>

    <!-- Datatables -->
    <script src="../assets/js/plugin/datatables/datatables.min.js"></script>

    <!-- Bootstrap Notify -->
    <script src="../assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

    <!-- jQuery Vector Maps -->
    <script src="../assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
    <script src="../assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

    <!-- Sweet Alert -->
    <script src="../assets/js/plugin/sweetalert/sweetalert.min.js"></script>

    <!-- Atlantis JS -->
    <!-- <script src="../assets/js/atlantis.min.js"></script> -->

    <!-- Atlantis DEMO methods, don't include it in your project! -->
    <!-- <script src="../assets/js/setting-demo.js"></script>
    <script src="../assets/js/demo.js"></script> -->
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

    <script>
        // efek ketik
        const txtElement = ['Selamat Datang <?php echo $pecah['nama_pegawai']; ?>'];
        let count = 0;
        let txtIndex = 0;
        let currentTxt = '';
        let words = '';

        (function ketik() {

            if (count == txtElement.length) {
                count = 0;
            }

            currentTxt = txtElement[count];

            words = currentTxt.slice(0, ++txtIndex);
            document.querySelector('.efek-ketik').textContent = words;

            if (words.length == currentTxt.length) {
                count++;
                txtIndex = 0;
            }

            setTimeout(ketik, 180);

        })();
    </script>
</body>

</html>