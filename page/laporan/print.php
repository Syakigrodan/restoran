<?php  
require '../../config/koneksi.php';
$data=mysqli_query($koneksi,"SELECT * FROM tbl_transaksi INNER JOIN tbl_user ON tbl_transaksi.user_id=tbl_user.id_user JOIN tbl_detailtransaksi ON tbl_detailtransaksi.no_transaksi=tbl_transaksi.no_transaksi JOIN tbl_menu ON tbl_menu.id_menu=tbl_detailtransaksi.id_menu JOIN tbl_jenis ON tbl_jenis.id_jenis=tbl_menu.id_jenis WHERE tbl_transaksi.tanggal BETWEEN '$_GET[awal]' AND '$_GET[akhir]'");
$sub=mysqli_query($koneksi,"SELECT * FROM tbl_transaksi INNER JOIN tbl_user ON tbl_transaksi.user_id=tbl_user.id_user JOIN tbl_detailtransaksi ON tbl_detailtransaksi.no_transaksi=tbl_transaksi.no_transaksi JOIN tbl_menu ON tbl_menu.id_menu=tbl_detailtransaksi.id_menu JOIN tbl_jenis ON tbl_jenis.id_jenis=tbl_menu.id_jenis WHERE tbl_transaksi.tanggal BETWEEN '$_GET[awal]' AND '$_GET[akhir]' LIMIT 1");
?>
<!DOCTYPE html>
<html>

<head>
    <title>Cetak Laporan</title>
    <link rel="stylesheet" href="../../public/template/print/table.css">
</head>

<body>
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
	?>
    <h4 class="text text-center">Laporan Transaksi <?php echo tgl_indo(date($_GET['awal'])); ?> -
        <?php echo tgl_indo(date($_GET['akhir'])); ?></h4>
    <table class="table table-bordered" id="table1">
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
</body>
<script type="text/javascript">
window.print();
</script>

</html>