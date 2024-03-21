<?php  
require '../../config/koneksi.php';
$transaksi=mysqli_query($koneksi,"SELECT * FROM tbl_transaksi INNER JOIN tbl_user ON tbl_transaksi.user_id=tbl_user.id_user WHERE tbl_transaksi.no_transaksi='$_GET[keyword]'");
$data=mysqli_query($koneksi,"SELECT * FROM tbl_transaksi INNER JOIN tbl_detailtransaksi ON tbl_transaksi.no_transaksi=tbl_detailtransaksi.no_transaksi JOIN tbl_menu ON tbl_menu.id_menu=tbl_detailtransaksi.id_menu WHERE tbl_detailtransaksi.no_transaksi='$_GET[keyword]'");
$sub=mysqli_query($koneksi,"SELECT * FROM tbl_transaksi INNER JOIN tbl_detailtransaksi ON tbl_transaksi.no_transaksi=tbl_detailtransaksi.no_transaksi JOIN tbl_menu ON tbl_menu.id_menu=tbl_detailtransaksi.id_menu WHERE tbl_detailtransaksi.no_transaksi='$_GET[keyword]' LIMIT 1");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cetak Invoice</title>
	<!-- <link rel="stylesheet" href="../../public/template/print/table.css"> -->

</head>
<style type="text/css">
.atas{
	border: 0;
	height: 1px;
	background-image: linear-gradient(to right, rgba(0,0,0,0),rgba(0,0,0,0.75),rgba(0,0,0,0))
}
.bawah{
	border: 0;
	border-top: 1px solid dashed #8c8c8c;
	text-align: center;
}
.bawah:after{
	content: '\002702';
	display: inline-block;
	position: relative;
	top: -13px;
	padding: 0 3px;
	background: #fff;
	columns: #8c8c8c;
	font-size: 18px;
	}@page {
		/* Keyword values for scalable size */
		/*size: auto;*/
		size: 0;
		size: 0;
		size: 400;
		size: 850;
		size: portrait;

	}
</style>
<body>
	<?php foreach ($transaksi as $tr): ?>
		<center>
			<b><strong>Cafe D'coklat</strong></b>
		</center>
		<hr class="atas">
		<b><strong>Struk Pembayaran</strong></b>
		<br>
		<table style="width: 100%;">
			<tbody>
				<tr>
					<td>No Transaksi</td>
					<td> : <?php echo $tr['no_transaksi'] ?></td>
				</tr>
				<tr>
					<td>Nama Pelanggan</td>
					<td> : <?php echo $tr['nama_customer'] ?></td>
				</tr>
				<tr>
					<td>Tanggal</td>
					<td> : <?php echo $tr['tanggal'] ?></td>
				</tr>
				<tr>
					<td>Nama Pelayanan</td>
					<td> : <?php echo $tr['nama'] ?></td>
				</tr>
				<tr>
					<td colspan="2"><hr></td>
				</tr>
				<tr>
					<td>PPN</td>
					<td> : <?php echo number_format($tr['ppn'],0,",",".") ?></td>
				</tr>
				<tr>
					<td>Diskon</td>
					<td> : <?php echo number_format($tr['total_diskon'],0,",",".") ?></td>
				</tr>
			</tbody>
		</table>
		<hr>
		<table class="table" style="width: 100%;">
			<thead>
				<tr>
					<td>Nama Menu</td>
					<td>Qty</td>
					<td>Harga</td>
					<td>Total</td>
				</tr>
			</thead>
			<tbody>
				<?php $nul=0; ?>
				<?php foreach ($data as $dt): ?>
					<?php  
					$total=$dt['harga']*$dt['qty'];
					$subtotal=$nul+=$total;
					$subtotaltrue=$subtotal+$tr['ppn']-$tr['total_diskon'];
					?>
					<tr>
						<td><?php echo $dt['nama_menu'] ?></td>
						<td><?php echo $dt['qty'] ?>x</td>
						<td><?php echo number_format($dt['harga'],0,",",".") ?></td>
						<td><?php echo number_format($total,0,",",".") ?></td>
					</tr>
				<?php endforeach ?>
				<?php foreach ($sub as $sb): ?>
					<tr>
						<td colspan="3">Subtotal</td>
						<td><?php echo number_format($subtotaltrue,0,",",".") ?></td>
					</tr>
					<tr>
						<td colspan="3">Dibayar</td>
						<td><?php echo number_format($tr['bayar'],0,",",".") ?></td>
					</tr>
					<tr>
						<td colspan="3">Kembali</td>
						<td><?php echo number_format($tr['bayar']-$subtotaltrue,0,",",".") ?></td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
		<br>
		<span>Tanda Terima ini adalah sah dan harap disimpan sebagai bukti pembayaran</span>
		<p></p>
		<hr class="bawah">
		<center>~~~ Terima Kasih ~~~</center>
	<?php endforeach ?>
</body>
<script type="text/javascript">
	window.print();
</script>
</html>