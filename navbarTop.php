<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">

    <div class="container-fluid">
        <div class="collapse" id="search-nav">
            <!-- <form class="navbar-left navbar-form nav-search mr-md-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <button type="submit" class="btn btn-search pr-1">
                            <i class="fa fa-search search-icon"></i>
                        </button>
                    </div>
                    <input type="text" placeholder="Search ..." class="form-control">
                </div>
            </form> -->
        </div>
        <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
            <li class="nav-item toggle-nav-search hidden-caret">
                <a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
                    <i class="fa fa-search"></i>
                </a>
            </li>

            <li class="nav-item dropdown hidden-caret">
                <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                    <?php
                    // mendapatkan id_admin yang login
                    $id_admin = $_SESSION["admin"]["id_admin"];

                    $ambil = $koneksi->query("SELECT * FROM tb_admin WHERE id_admin ='$id_admin'");
                    $pecah = $ambil->fetch_assoc();
                    ?>
                    <div class="avatar-sm">
                        <img src="img_admin/<?php echo $pecah["foto"]; ?>" alt="..." class="avatar-img rounded-circle">
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-user animated fadeIn">
                    <div class="dropdown-user-scroll scrollbar-outer">
                        <li>
                            <div class="user-box">
                                <div class="avatar-lg"><img src="img_admin/<?php echo $pecah["foto"]; ?>" alt="image profile" class="avatar-img rounded"></div>
                                <div class="u-text">
                                    <h4><?php echo $_SESSION['admin']['nama_lengkap']; ?></h4>
                                    <p class="text-muted"><?php echo $_SESSION['admin']['email']; ?> <br> Administrator</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="dataAdmin.php">Pengaturan Akun</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="logout.php">Keluar</a>
                        </li>
                    </div>
                </ul>
            </li>
        </ul>
    </div>
</nav>