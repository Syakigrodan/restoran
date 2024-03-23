<?php
error_reporting(0);
session_start();
if (!isset($_SESSION['id_user'])) {
    header("location:../index.php");
}
require '../config/koneksi.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasir Resto - Resto Bagus Aliefya</title>
    <link rel="shortcut icon" type="image/x-generic" href="../public/logo.jpg">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../public/template/dist/assets/css/bootstrap.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../public/template/dist/assets/vendors/choices.js/choices.min.css" />
    <link rel="stylesheet" href="../public/template/dist/assets/vendors/iconly/bold.css">
    <link rel="stylesheet" href="../public/template/dist/assets/vendors/simple-datatables/style.css">
    <link rel="stylesheet" href="../public/template/dist/assets/vendors/simple-datatables/style.css">
    <link rel="stylesheet" href="../public/template/dist/assets/vendors/dripicons/webfont.css">
    <link rel="stylesheet" href="../public/template/dist/assets/css/pages/dripicons.css">

    <link rel="stylesheet" href="../public/template/dist/assets/vendors/toastify/toastify.css">
    <link rel="stylesheet" href="../public/template/dist/assets/vendors/sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="../public/template/dist/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="../public/template/dist/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="../public/template/dist/assets/css/app.css">
    <link rel="shortcut icon" href="../public/template/dist/assets/images/favicon.svg" type="image/x-icon">
</head>

<body>
    <div id="app">
        <?php
        include 'layout/sidebar.php';
        ?>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            <?php if (isset($_SESSION['id_user'])) : ?>
                <?php if ($_GET['halaman'] == "dashboard") : ?>
                    <?php include 'home/index.php'; ?>
                <?php endif ?>
                <?php if ($_GET['halaman'] == "data-meja") : ?>
                    <?php include 'meja/index.php'; ?>
                <?php endif ?>
                <?php if ($_GET['halaman'] == "data-jenis") : ?>
                    <?php include 'jenis/index.php'; ?>
                <?php endif ?>
                <?php if ($_GET['halaman'] == "data-menu") : ?>
                    <?php include 'menu/index.php'; ?>
                <?php endif ?>
                <?php if ($_GET['halaman'] == "transaksi-pemesanan") : ?>
                    <?php include 'transaksi/index.php'; ?>
                <?php endif ?>
                <?php if ($_GET['halaman'] == "transaksi-order") : ?>
                    <?php include 'transaksi/order.php'; ?>
                <?php endif ?>
                <?php if ($_GET['halaman'] == "transaksi-pemesanan/list-menu") : ?>
                    <?php include 'transaksi/menu.php'; ?>
                <?php endif ?>
                <?php if ($_GET['halaman'] == "laporan/transaksi") : ?>
                    <?php include 'laporan/transaksi.php'; ?>
                <?php endif ?>
                <?php if ($_GET['halaman'] == "data-user") : ?>
                    <?php include 'user/index.php'; ?>
                <?php endif ?>
            <?php endif ?>

        </div>
    </div>

    <script src="../public/template/dist/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../public/template/dist/assets/js/bootstrap.bundle.min.js"></script>
    <script src="../public/template/dist/assets/vendors/simple-datatables/simple-datatables.js"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="../public/template/dist/assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="../public/template/dist/assets/js/pages/dashboard.js"></script>
    <script src="../public/template/dist/assets/js/main.js"></script>
    <script src="../public/template/dist/assets/vendors/toastify/toastify.js"></script>
    <script src="../public/template/dist/assets/js/extensions/toastify.js"></script>
    <script src="../public/template/dist/assets/js/extensions/sweetalert2.js"></script>
    <script src="../public/template/dist/assets/vendors/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="../public/template/multiple.js"></script>
    <script src="../public/template/dist/assets/vendors/choices.js/choices.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#copy").hide();
            $("#add-more").click(function() {
                var html = $("#copy").html();
                $("#after-add-more").after(html);
            });

            // saat tombol remove dklik control group akan dihapus 
            $("body").on("click", "#remove", function() {
                $(this).parents("#control-group").remove();
            });
        });
    </script>
    <script src="../public/template/dist/assets/vendors/sweetalert2/sweetalert2.all.min.js"></script>
    </script>
</body>
<?php include 'layout/notif.php'; ?>

</html>