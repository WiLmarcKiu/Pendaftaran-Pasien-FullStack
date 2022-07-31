<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIMPEG</title>
    <!-- GOOGLE FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Koulen&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Montserrat&family=Pacifico&family=Poppins:wght@200&family=Staatliches&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="pegawai/style.css">

</head>

<body>
    <section>
        <div class="login-box">
            <form action="" method="POST" class="was-validated">
                <div class="logo">
                    <img src="pegawai/logo2.png" alt="">
                </div>
                <h1>login</h1>
                <div class="form-group">
                    <input type="email" name="email" id="" placeholder="Email" autocomplete="off" required>
                    <i class="fa-solid fa-user"></i>
                </div>
                <div class="form-group">
                    <input type="password" name="password" id="" placeholder="Password" autocomplete="off" required>
                    <i class="fa-solid fa-lock"></i>
                </div>
                <div class="form-group">
                    <input type="checkbox" name="remember" id="remember-me" placeholder="Password" required>
                    <label for="remember-me">Saya adalah pegawai</label>
                </div>
                <div class="form-group">
                    <input type="submit" name="login" value="Login">
                </div>
                <!-- <div class="form-group">
                    <a href="">new account</a>
                    <a href="">forget password</a>
                </div> -->
            </form>

            <?php
            // jika ada tombol login (tombol login ditekan)
            if (isset($_POST["login"])) {
                $email = $_POST["email"];
                $password = $_POST["password"];

                // lakukan query cek akun di tabel pegawai pada database
                $result = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE email = '$email' AND nip = 
			    '$password'");

                // hitung akun yang terresult
                $akunyangcocok = $result->num_rows;

                // jika 1 akun yang cocok maka diloginkan
                if ($akunyangcocok == 1) {
                    //anda sukses login
                    // mendapatkan akun dalam bentuk array
                    $akun = mysqli_fetch_assoc($result);

                    // simpan di session pegawai
                    $_SESSION["pegawai"] = $akun;
                    echo "<script>alert('Selamat Datang $akun[nama_pegawai]');</script>";
                    echo "<script>location='pegawai/index.php';</script>";
                } else {
                    // lakukan query cek akun di tabel admin pada database
                    $result = mysqli_query($koneksi, "SELECT * FROM admin WHERE email = '$email' AND password = 
			        '$password'");

                    // hitung akun yang terresult
                    $akunyangcocok = $result->num_rows;

                    // jika 1 akun yang cocok maka diloginkan
                    if ($akunyangcocok == 1) {
                        //anda sukses login
                        // mendapatkan akun dalam bentuk array
                        $akun = mysqli_fetch_assoc($result);

                        // simpan di session admin
                        $_SESSION["admin"] = $akun;
                        echo "<script>alert('Selamat Datang $akun[nama]');</script>";
                        echo "<script>location='indexAdmin.php';</script>";
                    } else {
                        // anda gagal login
                        echo "<script>alert('Anda Gagal Login Mohon Periksa Kembali Akun Anda');</script>";
                        echo "<script>location='index.php';</script>";
                    }
                }
            }
            ?>

        </div>
    </section>
    <script src="https://kit.fontawesome.com/943a58e089.js" crossorigin="anonymous"></script>
</body>

</html>