<?php  
if (isset($_POST['awal'])) {
    $data=mysqli_query($koneksi,"SELECT * FROM tbl_transaksi INNER JOIN tbl_user ON tbl_transaksi.user_id=tbl_user.id_user JOIN tbl_detailtransaksi ON tbl_detailtransaksi.no_transaksi=tbl_transaksi.no_transaksi JOIN tbl_menu ON tbl_menu.id_menu=tbl_detailtransaksi.id_menu JOIN tbl_jenis ON tbl_jenis.id_jenis=tbl_menu.id_jenis WHERE tbl_transaksi.tanggal BETWEEN '$_POST[awal]' AND '$_POST[akhir]'");
    $sub=mysqli_query($koneksi,"SELECT * FROM tbl_transaksi INNER JOIN tbl_user ON tbl_transaksi.user_id=tbl_user.id_user JOIN tbl_detailtransaksi ON tbl_detailtransaksi.no_transaksi=tbl_transaksi.no_transaksi JOIN tbl_menu ON tbl_menu.id_menu=tbl_detailtransaksi.id_menu JOIN tbl_jenis ON tbl_jenis.id_jenis=tbl_menu.id_jenis WHERE tbl_transaksi.tanggal BETWEEN '$_POST[awal]' AND '$_POST[akhir]' LIMIT 1");
}else{
    $data=mysqli_query($koneksi,"SELECT * FROM tbl_transaksi INNER JOIN tbl_user ON tbl_transaksi.user_id=tbl_user.id_user JOIN tbl_detailtransaksi ON tbl_detailtransaksi.no_transaksi=tbl_transaksi.no_transaksi JOIN tbl_menu ON tbl_menu.id_menu=tbl_detailtransaksi.id_menu JOIN tbl_jenis ON tbl_jenis.id_jenis=tbl_menu.id_jenis");
    $sub=mysqli_query($koneksi,"SELECT * FROM tbl_transaksi INNER JOIN tbl_user ON tbl_transaksi.user_id=tbl_user.id_user JOIN tbl_detailtransaksi ON tbl_detailtransaksi.no_transaksi=tbl_transaksi.no_transaksi JOIN tbl_menu ON tbl_menu.id_menu=tbl_detailtransaksi.id_menu JOIN tbl_jenis ON tbl_jenis.id_jenis=tbl_menu.id_jenis LIMIT 1");
}
?>
<div class="page-heading">
    <section class="section">
        <div class="card">
            <div class="card-header">
                <form method="post">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Tanggal Awal</label>
                                <input type="date" required="" class="form-control" name="awal">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Tanggal Akhir</label>
                                <input type="date" required="" class="form-control" name="akhir"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-1">
                                <button name="cari" class="btn btn-sm btn-success">Search</button>
                            </div>
                            <?php if (isset($_POST['awal'])): ?>
                                <div class="col-lg-1">
                                    <a href="laporan/print.php?awal=<?php echo $_POST['awal'] ?>&akhir=<?php echo $_POST['akhir'] ?>" target="_blank" class="btn btn-sm btn-primary"><i class="dripicons dripicons-print"></i></a>
                                </div>
                            <?php endif ?>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>Nama Pelayan</th>
                                <th>Tanggal</th>
                                <th>Nama Menu</th>
                                <th>Harga</th>
                                <th>Qty</th>
                                <th>PPN</th>
                                <th>Diskon</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $prev_kode = " "; ?>
                            <?php $nul=0; ?>
                            <?php $no=1; ?>
                            <?php foreach ($data as $dt): ?> 
                                <?php  
                                $total=$dt['harga']*$dt['qty']+$dt['ppn']-$dt['total_diskon'];
                                $subtotal = $nul+=$total;
                                ?>                       
                                <tr>
                                   <?php if ($prev_kode != $dt['nama']): ?>                 
                                    <td><?php echo $dt['nama'] ?></td>
                                    <?php $no++ ?>
                                    <?php else: ?>
                                        <td></td>
                                    <?php endif; ?>
                                    <td><?php echo $dt['tanggal'] ?></td>
                                    <td><?php echo $dt['nama_menu'] ?> - <?php echo $dt['jenis'] ?></td>
                                    <td>Rp <?php echo number_format($dt['harga'],0,",",".") ?></td>
                                    <td><?php echo $dt['qty'] ?>x</td>
                                    <td>Rp <?php echo number_format($dt['ppn'],0,",",".") ?></td>
                                    <td>Rp <?php echo number_format($dt['total_diskon'],0,",",".") ?></td>
                                    <td align="center">Rp. <?php echo number_format($total,0,",",".") ?></td>
                                </tr>
                                <?php $prev_kode = $dt['nama'];  ?>
                            <?php endforeach ?>
                            <?php foreach ($sub as $sb): ?>
                                <tr>
                                    <th colspan="7">Subtotal : </th>
                                    <td align="center"><b>Rp. <?php echo number_format($subtotal,0,",",".") ?></b></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>
    <?php include 'transaksi/tambah.php'; ?>