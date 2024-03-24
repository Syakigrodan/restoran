<?php
include 'config/koneksi.php';
$query_user = mysqli_query($koneksi, "SELECT COUNT(*) AS total_user FROM tbl_user");
$row_user = mysqli_fetch_assoc($query_user);
$total_user = $row_user['total_user'];

$query_menu = mysqli_query($koneksi, "SELECT COUNT(*) AS total_menu FROM tbl_menu");
$row_menu = mysqli_fetch_assoc($query_menu);
$total_menu = $row_menu['total_menu'];

$query_transaksi = mysqli_query($koneksi, "SELECT COUNT(*) AS total_transaksi FROM tbl_transaksi");
$row_transaksi = mysqli_fetch_assoc($query_transaksi);
$total_transaksi = $row_transaksi['total_transaksi'];
?>

<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-12">
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon purple">
                                        <i class="dripicons dripicons-user-group"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Data User</h6>
                                    <h6 class="font-extrabold mb-0"><?php echo $total_user ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon blue">
                                        <i class="dripicons dripicons-suitcase"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Data Menu</h6>
                                    <h6 class="font-extrabold mb-0"><?php echo $total_menu ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon green">
                                        <i class="dripicons dripicons-wallet"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Data Transaksi</h6>
                                    <h6 class="font-extrabold mb-0"><?php echo $total_transaksi ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon red">
                                        <i class="iconly-boldBookmark"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Laporan</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>