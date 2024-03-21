<?php if (isset($addjenis)): ?>
	<script>
		Swal.fire({title: 'Tambah Data Success!',text: 'Data Jenis Berhasil di Tambahkan',icon: 'success',confirmButtonText: 'OK'
	}).then((result) => {
		if (result.value) {
			window.location = 'index.php?halaman=data-jenis';
		}})
	</script>
<?php endif ?>
<?php if (isset($upjenis)): ?>
	<script>
		Swal.fire({title: 'Update Data Success!',text: 'Data Jenis Berhasil di Ubah',icon: 'success',confirmButtonText: 'OK'
	}).then((result) => {
		if (result.value) {
			window.location = 'index.php?halaman=data-jenis';
		}})
	</script>
<?php endif ?>
<?php if (isset($deljenis)): ?>
	<script>
		Swal.fire({
			icon: 'success',
			title: 'Success Delete Data',
			showConfirmButton: false,
			timer: 1000,
		}).then((result) => {
			window.location = 'index.php?halaman=data-jenis';
		})
	</script>
<?php endif ?>

<?php if (isset($addmenu)): ?>
	<script>
		Swal.fire({title: 'Tambah Data Success!',text: 'Data Menu Berhasil di Tambahkan',icon: 'success',confirmButtonText: 'OK'
	}).then((result) => {
		if (result.value) {
			window.location = 'index.php?halaman=data-menu';
		}})
	</script>
<?php endif ?>
<?php if (isset($upmenu)): ?>
	<script>
		Swal.fire({title: 'Update Data Success!',text: 'Data Menu Berhasil di Ubah',icon: 'success',confirmButtonText: 'OK'
	}).then((result) => {
		if (result.value) {
			window.location = 'index.php?halaman=data-menu';
		}})
	</script>
<?php endif ?>
<?php if (isset($delmenu)): ?>
	<script>
		Swal.fire({
			icon: 'success',
			title: 'Success Delete Data',
			showConfirmButton: false,
			timer: 1000,
		}).then((result) => {
			window.location = 'index.php?halaman=data-menu';
		})
	</script>
<?php endif ?>
<?php if (isset($addtransaksi)): ?>
	<script>
		Swal.fire({title: 'Tambah Data Success!',text: 'Transaksi Pemesanan di Tambahkan',icon: 'success',confirmButtonText: 'OK'
	}).then((result) => {
		if (result.value) {
			window.location = 'index.php?halaman=transaksi-pemesanan';
		}})
	</script>
<?php endif ?>
<?php if (isset($uptransaksi)): ?>
	<script>
		Swal.fire({title: 'Ubah Data Success!',text: 'Transaksi Pemesanan di Ubah',icon: 'success',confirmButtonText: 'OK'
	}).then((result) => {
		if (result.value) {
			window.location = 'index.php?halaman=transaksi-pemesanan';
		}})
	</script>
<?php endif ?>
<?php if (isset($deltransaksi)): ?>
	<script>
		Swal.fire({
			icon: 'success',
			title: 'Success Delete Data',
			showConfirmButton: false,
			timer: 1000,
		}).then((result) => {
			window.location = 'index.php?halaman=transaksi-pemesanan';
		})
	</script>
<?php endif ?>
<?php if (isset($adduser)): ?>
	<script>
		Swal.fire({title: 'Tambah Data Success!',text: 'Data User Berhasil di Tambahkan',icon: 'success',confirmButtonText: 'OK'
	}).then((result) => {
		if (result.value) {
			window.location = 'index.php?halaman=data-user';
		}})
	</script>
<?php endif ?>
<?php if (isset($upuser)): ?>
	<script>
		Swal.fire({title: 'Ubah Data Success!',text: 'Data User Berhasil di Ubah',icon: 'success',confirmButtonText: 'OK'
	}).then((result) => {
		if (result.value) {
			window.location = 'index.php?halaman=data-user';
		}})
	</script>
<?php endif ?>
<?php if (isset($deluser)): ?>
	<script>
		Swal.fire({
			icon: 'success',
			title: 'Berhasil Hapus Data User',
			showConfirmButton: false,
			timer: 1000,
		}).then((result) => {
			window.location = 'index.php?halaman=data-user';
		})
	</script>
<?php endif ?>

<?php if (isset($centang)): ?>
	<script>
		Swal.fire({
			icon: 'warning',
			title: 'Pilih minimal 1 Menu',
			showConfirmButton: false,
			timer: 1000,
		}).then((result) => {
			window.location = 'index.php?halaman=transaksi-pemesanan/list-menu&keyword=<?php echo $_POST['no_transaksi'] ?>';
		})
	</script>
<?php endif ?>
<?php if (isset($addbayar)): ?>
	<script>
		Swal.fire({
			icon: 'success',
			title: 'Pembayaran Berhasil',
			showConfirmButton: false,
			timer: 1000,
		}).then((result) => {
			window.location = 'index.php?halaman=transaksi-pemesanan/list-menu&keyword=<?php echo $_POST['no_transaksi'] ?>';
		})
	</script>
<?php endif ?>

<?php if (isset($upprofil)): ?>
	<script>
		Swal.fire({
			icon: 'success',
			title: 'Success Ubah Profil',
			showConfirmButton: false,
			timer: 1000,
		}).then((result) => {
			window.location = 'index.php?halaman=<?php echo $_GET['halaman'] ?>';
		})
	</script>
<?php endif ?>
<?php if (isset($addmeja)): ?>
	<script>
		Swal.fire({
			icon: 'success',
			title: 'Data Meja di Tambahkan',
			showConfirmButton: false,
			timer: 800,
		}).then((result) => {
			window.location = 'index.php?halaman=<?php echo $_GET['halaman'] ?>';
		})
	</script>
	<?php endif ?>
	<?php if (isset($delmeja)): ?>
	<script>
		Swal.fire({
			icon: 'success',
			title: 'Data Meja di Hapus',
			showConfirmButton: false,
			timer: 500,
		}).then((result) => {
			window.location = 'index.php?halaman=<?php echo $_GET['halaman'] ?>';
		})
	</script>
	<?php endif ?>