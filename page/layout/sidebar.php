<?php
$profil = mysqli_query($koneksi, "SELECT * FROM tbl_user WHERE id_user='$_SESSION[id_user]'");
if (isset($_POST['ubah_profil'])) {
    if (upprofil($_POST) > 0) {
        $upprofil = true;
    } else {
        $upprofil = true;
    }
}
?>
<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>

        </div>
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div class="avatar avatar-xl">
                    <a href="" data-bs-toggle="modal" data-bs-target="#admin">
                        <img src="../public/template/dist/assets/images/faces/1.jpg" alt="Face">
                    </a>
                </div>
                <?php foreach ($profil as $prf) : ?>
                    <div class="ms-3 name">
                        <h5 class="font-bold">
                            <?php echo $prf['nama'] ?>
                        </h5>
                        <h6 class="text-muted mb-0">
                            <?php echo $prf['level'] ?>
                        </h6>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>
                <li class="sidebar-item active ">
                    <a href="index.php?halaman=dashboard" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Beranda</span>
                    </a>
                </li>
                <?php if ($_SESSION['level'] == "Admin") : ?>
                    <li class="sidebar-title">Data User</li>
                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="dripicons dripicons-user-group"></i>
                            <span>Data User</span>
                        </a>
                        <ul class="submenu ">
                            <li class="submenu-item ">
                                <a href="index.php?halaman=data-user">User</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-title">Data Master</li>
                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="dripicons dripicons-suitcase"></i>
                            <span>Data Master</span>
                        </a>
                        <ul class="submenu ">
                            <li class="submenu-item ">
                                <a href="index.php?halaman=data-meja">Meja</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="index.php?halaman=data-jenis">Jenis</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="index.php?halaman=data-menu">Menu</a>
                            </li>
                        </ul>
                    </li>
                    <!-- <li class="sidebar-title">Transaksi &amp; Pemesanan</li>
                    <li class="sidebar-item">
                        <a href="index.php?halaman=transaksi-pemesanan" class='sidebar-link'>
                            <i class="dripicons dripicons-wallet"></i>
                            <span>Transaksi</span>
                        </a>
                    </li> -->
                    <!-- <li class="sidebar-title">Laporan Transaksi</li>
                <li class="sidebar-item">
                    <a href="index.php?halaman=laporan/transaksi" class='sidebar-link'>
                        <i class="dripicons dripicons-blog"></i>
                        <span>Laporan</span>
                    </a>
                </li> -->

                <?php elseif ($_SESSION['level'] == "Waiter") : ?>

                    <li class="sidebar-title">Data Master</li>
                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="dripicons dripicons-suitcase"></i>
                            <span>Data Master</span>
                        </a>
                        <ul class="submenu ">
                            <!-- <li class="submenu-item ">
                                <a href="index.php?halaman=data-meja">Meja</a>
                            </li> -->
                            <li class="submenu-item ">
                                <a href="index.php?halaman=data-jenis">Jenis</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="index.php?halaman=data-menu">Menu</a>
                            </li>
                        </ul>
                    </li>
                    <!-- <li class="sidebar-title">Transaksi &amp; Pemesanan</li>
                    <li class="sidebar-item">
                        <a href="index.php?halaman=transaksi-pemesanan" class='sidebar-link'>
                            <i class="dripicons dripicons-wallet"></i>
                            <span>Transaksi</span>
                        </a>
                    </li> -->

                    <li class="sidebar-title">Order &amp; Pemesanan</li>
                    <li class="sidebar-item">
                        <a href="index.php?halaman=order-order" class='sidebar-link'>
                            <i class="dripicons dripicons-wallet"></i>
                            <span>Order</span>
                        </a>
                    </li>

                    <li class="sidebar-title">Laporan Transaksi</li>
                    <li class="sidebar-item">
                        <a href="index.php?halaman=laporan/transaksi" class='sidebar-link'>
                            <i class="dripicons dripicons-blog"></i>
                            <span>Laporan</span>
                        </a>
                    </li>

                <?php elseif ($_SESSION['level'] == "Kasir") : ?>
                    <!-- <li class="sidebar-title">Data Master</li>
                   <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="dripicons dripicons-suitcase"></i>
                            <span>Data Master</span>
                        </a>
                        <ul class="submenu ">
                            <li class="submenu-item ">
                                <a href="index.php?halaman=data-meja">Meja</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="index.php?halaman=data-jenis">Jenis</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="index.php?halaman=data-menu">Menu</a>
                            </li>
                        </ul>
                    </li> -->
                    <li class="sidebar-title">Transaksi &amp; Pemesanan</li>
                    <li class="sidebar-item">
                        <a href="index.php?halaman=transaksi-pemesanan" class='sidebar-link'>
                            <i class="dripicons dripicons-wallet"></i>
                            <span>Transaksi</span>
                        </a>
                    </li>

                    <li class="sidebar-title">Laporan Transaksi</li>
                    <li class="sidebar-item">
                        <a href="index.php?halaman=laporan/transaksi" class='sidebar-link'>
                            <i class="dripicons dripicons-blog"></i>
                            <span>Laporan</span>
                        </a>
                    </li>

                <?php else : ?>
                    <li class="sidebar-title">Laporan Transaksi</li>
                    <li class="sidebar-item">
                        <a href="index.php?halaman=laporan/transaksi" class='sidebar-link'>
                            <i class="dripicons dripicons-blog"></i>
                            <span>Laporan</span>
                        </a>
                    </li>
                <?php endif; ?>

                <li class="sidebar-title">Keluar</li>

                <li class="sidebar-item">
                    <a href="logout.php" class='sidebar-link'>
                        <i class="dripicons dripicons-exit"></i>
                        <span>Keluar</span>
                    </a>
                </li>

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
<div class="modal fade text-left" id="admin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel1">Ubah Profil</h5>
                <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form method="post">
                <div class="modal-body">
                    <?php foreach ($profil as $prf) : ?>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" required="" value="<?php echo $prf['nama'] ?>" class="form-control" name="nama">
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" required="" value="<?php echo $prf['username'] ?>" class="form-control" name="username">
                        </div>
                        <input type="hidden" value="<?php echo $prf['id_user'] ?>" name="id_user">
                        <div class="form-group">
                            <label>Password</label>
                            <input type="text" class="form-control" name="password">
                            <input type="hidden" class="form-control" value="<?php echo $prf['password'] ?>" name="passwordLama">
                        </div>
                    <?php endforeach ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button name="ubah_profil" class="btn btn-primary ml-1">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Accept</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>