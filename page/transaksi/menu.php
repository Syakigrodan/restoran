<?php  
$menu=mysqli_query($koneksi,"SELECT * FROM tbl_menu INNER JOIN tbl_jenis ON tbl_menu.id_jenis=tbl_jenis.id_jenis");
$transaksi=mysqli_query($koneksi,"SELECT * FROM tbl_transaksi INNER JOIN tbl_user ON tbl_transaksi.user_id=tbl_user.id_user WHERE tbl_transaksi.no_transaksi='$_GET[keyword]'");
$data=mysqli_query($koneksi,"SELECT * FROM tbl_transaksi INNER JOIN tbl_detailtransaksi ON tbl_transaksi.no_transaksi=tbl_detailtransaksi.no_transaksi JOIN tbl_menu ON tbl_menu.id_menu=tbl_detailtransaksi.id_menu WHERE tbl_detailtransaksi.no_transaksi='$_GET[keyword]'");
$sub=mysqli_query($koneksi,"SELECT * FROM tbl_transaksi INNER JOIN tbl_detailtransaksi ON tbl_transaksi.no_transaksi=tbl_detailtransaksi.no_transaksi JOIN tbl_menu ON tbl_menu.id_menu=tbl_detailtransaksi.id_menu WHERE tbl_detailtransaksi.no_transaksi='$_GET[keyword]' LIMIT 1");
?>

<?php foreach ($transaksi as $tr): ?>
    <?php  
    function tgl_indo($tanggal){
      $bulan = array (
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
      $pecahkan = explode('-', $tanggal);

      return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
  }
  if (isset($_POST['tambah'])) {
      if (empty($_POST['pilih'])) {
          $centang=true;
      }else{
          $pilih=$_POST['pilih'];
          foreach ($_POST['nama_menu'] as $key => $value) {
              if (in_array($_POST['nama_menu'][$key], $pilih)) {
                $id_menu=$_POST['id_menu'][$key];
                $qty=$_POST['qty'][$key];
                $query=mysqli_query($koneksi,"INSERT INTO tbl_detailtransaksi (no_transaksi,id_menu,qty) VALUES ('$_POST[no_transaksi]','$id_menu','$qty')");
                if ($query) {
                  echo "<script>
                  document.location.href = 'index.php?halaman=transaksi-pemesanan/list-menu&keyword=$_POST[no_transaksi]'
                  </script>";
              }
          }
      }
  }
}
if (isset($_POST['hapus'])) {
    $query=mysqli_query($koneksi,"DELETE FROM tbl_detailtransaksi WHERE id_detail='$_POST[id_detail]'");
    if ($query) {
        echo "<script>
        document.location.href = 'index.php?halaman=transaksi-pemesanan/list-menu&keyword=$_GET[keyword]'
        </script>";  
    }
}
if (isset($_POST['bayaryuk'])) {
    $no_transaksi=$_POST['no_transaksi'];
    $ppn=$_POST['ppn'];
    $total_diskon=$_POST['total_diskon'];
    $id_meja=$_POST['id_meja'];
    $bayar=$_POST['bayar'];
    $subtotal=$_POST['subtotal'];
    if ($bayar<$subtotal) {
        echo "<script>alert('Pembayaran Kurang dari Subtotal.')
        document.location.href='index.php?halaman=transaksi-pemesanan/list-menu&keyword=$no_transaksi'
        </script>";
    }else{
        $query=mysqli_query($koneksi,"UPDATE tbl_transaksi SET ppn='$ppn',total_diskon='$total_diskon',id_meja='$id_meja',bayar='$bayar' WHERE no_transaksi='$no_transaksi'");
        $query.=mysqli_query($koneksi,"UPDATE tbl_meja SET status_meja='T' WHERE id_meja='$id_meja'");
        foreach ($_POST['nama_menu'] as $key => $value) {
            $id_menu=$_POST['id_menu'][$key];
            $qty=$_POST['qty'][$key];
            $query.=mysqli_query($koneksi,"UPDATE tbl_menu SET stok=stok-'$qty' WHERE id_menu='$id_menu'");
        }
        if ($query) {
            $addbayar=true;
        }
    }
}
$meja=mysqli_query($koneksi,"SELECT * FROM tbl_meja WHERE status_meja='F'");
?>
<div class="page-heading">
    <div class="row">
        <section class="section col-lg-7">
            <div class="card">
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data">
                        <input type="hidden" value="<?php echo $tr['no_transaksi'] ?>" name="no_transaksi">
                        <table class="table table-striped table-responsive" id="table1">
                            <thead>
                                <tr>
                                    <th>List. </th>
                                    <th>Jumlah</th>
                                    <th>Stok</th>
                                    <th>Nama produk</th>
                                    <th>Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($menu as $mn): ?>
                                    <?php  
                                    $cek=mysqli_query($koneksi,"SELECT * FROM tbl_transaksi INNER JOIN tbl_detailtransaksi ON tbl_transaksi.no_transaksi=tbl_detailtransaksi.no_transaksi JOIN tbl_menu ON tbl_menu.id_menu=tbl_detailtransaksi.id_menu WHERE tbl_detailtransaksi.no_transaksi='$_GET[keyword]' AND tbl_detailtransaksi.id_menu='$mn[id_menu]'");
                                    $cektwo=mysqli_num_rows($cek);
                                    ?>
                                    <tr>
                                        <td>
                                            <?php if ($cektwo=='1'): ?>
                                                <input type="checkbox" disabled="" checked="" class="form-check-input">
                                                <?php else: ?>
                                                    <input type="checkbox" class="form-check-input" value="<?php echo $mn['nama_menu'] ?>" name="pilih[]">
                                                <?php endif ?>
                                            </td>
                                            <td><input type="number" value="1" max="<?php echo $mn['stok'] ?>" class="form-control" name="qty[]"></td>
                                            <td><?php echo $mn['stok'] ?></td>
                                            <td><?php echo $mn['nama_menu'] ?><input type="hidden" value="<?php echo $mn['nama_menu'] ?>" name="nama_menu[]"></td>
                                            <td>Rp <?php echo number_format($mn['harga'],0,",","."); ?><input type="hidden" value="<?php echo $mn['id_menu'] ?>" name="id_menu[]"></td>
                                        </tr>
                                    <?php endforeach ?>
                                    <tr>
                                        <td>
                                            <button name="tambah" class="btn btn-sm btn-primary rounded-pill">
                                                <i class="dripicons dripicons-plus"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>

            </section>
            <section class="col-md-5 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><?php echo $tr['nama_customer'] ?>
                        <span style="float: right;"><?php echo tgl_indo(date($tr['tanggal'])) ?></span>
                    </h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="form-body">
                            <div class="row">
                                <?php  
                                $nul=0;
                                ?>
                                <?php foreach ($data as $dt): ?>
                                    <?php  
                                    $total=$dt['harga']*$dt['qty'];
                                    $subtotal=$nul+=$total;
                                    $subtotaltrue=$subtotal+$tr['ppn']-$tr['total_diskon'];
                                    ?>                             
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <label>
                                                <?php echo $dt['nama_menu']; ?>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <form method="post">
                                            <div class="form-group">
                                                <span><?php echo number_format($dt['harga'],0,",","."); ?><sup>x<?php echo $dt['qty'] ?></sup></span>
                                                <input type="hidden" value="<?php echo $dt['id_detail'] ?>" name="id_detail">
                                                <?php if ($tr['bayar']==NULL): ?>
                                                    <button name="hapus" class="btn btn-sm btn-danger rounded-pill"><i class="dripicons dripicons-trash"></i></button>
                                                <?php endif ?>
                                            </div>
                                        </form>
                                    </div>
                                <?php endforeach ?>
                                <hr>
                                <div class="col-lg-4"><b>PPN</b></div>
                                <div class="col-lg-8" style="text-align: right;"><b>Rp <?php echo number_format($tr['ppn'],0,",",".") ?></b></div>
                                <div class="col-lg-4"><b>Diskon</b></div>
                                <div class="col-lg-8" style="text-align: right;"><b>Rp <?php echo number_format($tr['total_diskon'],0,",",".") ?></b></div>
                                <hr>
                                <?php foreach ($sub as $sb): ?>
                                    <div class="col-md-4"><b>TOTAL</b></div>
                                    <div class="col-lg-8" style="text-align: right;"><b>Rp <?php echo number_format($subtotaltrue,0,",",".")?></b></div>
                                    <div class="col-md-4"><b>DIBAYAR</b></div>
                                    <div class="col-lg-8" style="text-align: right;"><b>Rp <?php echo number_format($tr['bayar'],0,",",".")?></b></div>
                                    <?php if ($tr['bayar']!==NULL): ?>
                                        <div class="col-md-4"><b>KEMBALI</b></div>
                                        <div class="col-lg-8" style="text-align: right;"><b>Rp <?php echo number_format($tr['bayar']-$subtotaltrue,0,",",".")?></b></div>
                                    <?php endif ?>
                                    <div class="col-md-4">
                                        <?php if ($tr['bayar']==NULL): ?>
                                            <span class="badge bg-danger">Belum di Bayar</span>
                                            <?php else: ?>
                                                <span class="badge bg-success">Sudah di Bayar</span>
                                            <?php endif ?>
                                        </div>
                                        <?php if ($tr['bayar']==NULL): ?>
                                            <div class="col-xl-12 mt-1">
                                                <button type="button" data-bs-toggle="modal"
                                                data-bs-target="#bayar<?php echo $tr['no_transaksi'] ?>" class="btn btn-primary me-1 mb-1 form-control btn-sm">Bayar</button>
                                            </div>
                                        <?php endif; ?>
                                        <div class="col-xl-12 mt-1">
                                            <a href="transaksi/cetak.php?keyword=<?php echo $tr['no_transaksi'] ?>" target="_blank" class="btn btn-success me-1 mb-1 form-control btn-sm"><i class="dripicons dripicons-print"></i></a>
                                        </div>
                                        <?php include 'transaksi/bayar.php'; ?>
                                    <?php endforeach ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
<?php endforeach ?>
