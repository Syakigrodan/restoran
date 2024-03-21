<?php
session_start();
require 'config/koneksi.php';

if (isset($_POST['login'])) {
    $password = md5($_POST['password']);
    $query = mysqli_query($koneksi, "SELECT * FROM tbl_user WHERE username='$_POST[username]' AND password='$password'");
    $num = mysqli_num_rows($query);

    if ($num) {
        $data = mysqli_fetch_assoc($query);
        $_SESSION['id_user'] = $data['id_user'];
        $_SESSION['username'] = $data['username'];
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['level'] = $data['level'];
        if ($data['level'] == "Kasir") {
            $kasir = true;
        } elseif ($data['level'] == "Manajer") {
            $manajer = true;
        } else {
            $admin = true;
        }
    } else {
        $salah = true;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:image" content="public/logo.jpg">
    <title>LOGIN</title>
    <link rel="shortcut icon" type="image/x-generic" href="public/logo.jpg">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="public/template/dist/assets/css/bootstrap.css">
    <link rel="stylesheet" href="public/template/dist/assets/vendors/sweetalert2/sweetalert2.min.css">

    <link rel="stylesheet" href="public/template/dist/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="public/template/dist/assets/css/app.css">
    <link rel="stylesheet" href="public/template/dist/assets/css/pages/auth.css">
</head>

<body>
    <div itemprop="image" itemscope="itemscope" itemtype="http://schema.org/ImageObject">
        <meta content="public/logo.jpg" itemprop="url" />
    </div>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <!--  <div class="auth-logo">
                        <a href=""><img src="assets/images/logo/logo.png" alt="Logo"></a>
                    </div> -->
                    <h1 class="auth-title">Log in.</h1>
                    <p class="auth-subtitle mb-5">Restoran Five Star</p>

                    <form method="post">
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl" required="" autofocus=""
                                name="username" placeholder="Username">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl" required="" name="password"
                                placeholder="Password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <div class="form-check form-check-lg d-flex align-items-end">
                            <input class="form-check-input me-2" checked="" type="checkbox" value=""
                                id="flexCheckDefault">
                            <label class="form-check-label text-gray-600" for="flexCheckDefault">
                                buat saya tetap masuk
                            </label>
                        </div>
                        <button name="login" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
        </div>

    </div>
</body>
<script src="public/template/dist/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="public/template/dist/assets/js/bootstrap.bundle.min.js"></script>

<script src="public/template/dist/assets/js/extensions/sweetalert2.js"></script>
<script src="public/template/dist/assets/vendors/sweetalert2/sweetalert2.all.min.js"></script>

<script src="public/template/dist/assets/js/main.js"></script>
<?php if (isset($manajer)) : ?>
<script>
Swal.fire({
    title: 'Login Berhasil',
    text: 'Hi, <?php echo $data['username'] ?>',
    icon: 'success',
    confirmButtonText: 'OK'
}).then((result) => {
    if (result.value) {
        window.location = 'page/index.php?halaman=laporan/transaksi';
    }
})
</script>
<?php endif ?>
<?php if (isset($kasir)) : ?>
<script>
Swal.fire({
    title: 'Login Berhasil',
    text: 'Hi, <?php echo $data['username'] ?>',
    icon: 'success',
    confirmButtonText: 'OK'
}).then((result) => {
    if (result.value) {
        window.location = 'page/index.php?halaman=transaksi-pemesanan';
    }
})
</script>
<?php endif ?>
<?php if (isset($admin)) : ?>
<script>
Swal.fire({
    title: 'Login Berhasil',
    text: 'Hi, <?php echo $data['username'] ?>',
    icon: 'success',
    confirmButtonText: 'OK'
}).then((result) => {
    if (result.value) {
        window.location = 'page/index.php?halaman=data-user';
    }
})
</script>
<?php endif ?>
<?php if (isset($salah)) : ?>
<script>
Swal.fire({
    title: 'Login Gagal',
    text: 'Username dan Password tidak sesuai',
    icon: 'error',
    confirmButtonText: 'OK'
}).then((result) => {
    if (result.value) {
        window.location = 'index.php';
    }
})
</script>
<?php endif ?>

</html>