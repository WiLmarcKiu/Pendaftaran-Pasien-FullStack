<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <?php
                // mendapatkan id_admin yang login
                $id_admin = $_SESSION["admin"]["id_admin"];

                $ambil = $koneksi->query("SELECT * FROM admin WHERE id_admin ='$id_admin'");
                $pecah = $ambil->fetch_assoc();
                ?>
                <div class="avatar-sm float-left mr-2">
                    <img src="foto_admin/<?php echo $pecah["foto"]; ?>" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a href="dataAdmin.php">
                        <span>
                            <?php echo $_SESSION['admin']['nama']; ?>
                            <span class="user-level">Administrator</span>
                        </span>
                    </a>
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-item active">
                    <a href="indexAdmin.php" class="collapsed">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Daftar Menu</h4>
                </li>
                <li class="nav-item">
                    <a href="daftarPegawai.php">
                        <i class="fas fa-user-tie"></i>
                        <p>Pegawai</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="daftarPangkat.php">
                        <i class="fas fa-medal"></i>
                        <p>Pangkat Pegawai</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="daftarPensiun.php">
                        <i class="fas fa-user-slash"></i>
                        <p>Pensiun</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="daftarGaji.php">
                        <i class="fas fa-dollar-sign"></i>
                        <p>Gaji</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="daftarMutasi.php">
                        <i class="fas fa-recycle"></i>
                        <p>Mutasi</p>
                    </a>
                </li>
                <li class="nav-item">
                    <!-- <a href="#base">
                                <i class="fas fa-layer-group"></i>
                                <p>Base</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="base">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="components/avatars.html">
                                            <span class="sub-item">Avatars</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components/buttons.html">
                                            <span class="sub-item">Buttons</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components/gridsystem.html">
                                            <span class="sub-item">Grid System</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components/panels.html">
                                            <span class="sub-item">Panels</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components/notifications.html">
                                            <span class="sub-item">Notifications</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components/sweetalert.html">
                                            <span class="sub-item">Sweet Alert</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components/font-awesome-icons.html">
                                            <span class="sub-item">Font Awesome Icons</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components/simple-line-icons.html">
                                            <span class="sub-item">Simple Line Icons</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components/flaticons.html">
                                            <span class="sub-item">Flaticons</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components/typography.html">
                                            <span class="sub-item">Typography</span>
                                        </a>
                                    </li>
                                </ul>
                            </div> -->
                </li>
            </ul>
        </div>
    </div>
</div>