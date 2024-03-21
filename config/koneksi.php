<?php
$koneksi = mysqli_connect("localhost", "root", "", "restoran12");

function addjenis($data)
{
	global $koneksi;

	$jenis = $data['jenis'];
	$query = mysqli_query($koneksi, "INSERT INTO tbl_jenis (jenis) VALUES ('$jenis')");
	return mysqli_affected_rows($koneksi);
}
function upjenis($data)
{
	global $koneksi;

	$jenis = $data['jenis'];
	$id_jenis = $data['id_jenis'];
	$query = mysqli_query($koneksi, "UPDATE tbl_jenis SET jenis='$jenis' WHERE id_jenis='$id_jenis'");
	return mysqli_affected_rows($koneksi);
}

function upload()
{

	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));

	if ($ukuranFile > 10000000000) {
		echo "<script>
		alert('Kapasitas Poster terlalu besar!');
		</script>";
		return false;
	}

	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, 'gambar/' . $namaFileBaru);

	return $namaFileBaru;
}

function addmenu($data)
{
	global $koneksi;

	$nama_menu = $data['nama_menu'];
	$id_jenis = $data['id_jenis'];
	$harga = $data['harga'];
	$stok = $data['stok'];
	$gambar = upload();

	$query = mysqli_query($koneksi, "INSERT INTO tbl_menu (nama_menu,id_jenis,harga,stok,gambar) VALUES ('$nama_menu','$id_jenis','$harga','$stok','$gambar')");
	return mysqli_affected_rows($koneksi);
}
function upmenu($data)
{
	global $koneksi;

	$nama_menu = $data['nama_menu'];
	$id_jenis = $data['id_jenis'];
	$harga = $data['harga'];
	$id_menu = $data['id_menu'];
	$stok = $data['stok'];
	$gambarLama = $data['gambarLama'];
	if ($_FILES['gambar']['error'] === 4) {
		$gambar = $gambarLama;
	} else {
		$gambar = upload();
	}

	$query = mysqli_query($koneksi, "UPDATE tbl_menu SET nama_menu='$nama_menu', id_jenis='$id_jenis', harga='$harga',stok='$stok',gambar='$gambar' WHERE id_menu='$id_menu'");
	return mysqli_affected_rows($koneksi);
}

function addtransaksi($data)
{
	global $koneksi;

	$karakter = '0123456789';
	$shuffle  = substr(str_shuffle($karakter), 0, 12);
	$nama_customer = $data['nama_customer'];
	$tanggal = $data['tanggal'];
	$id_user = $data['id_user'];

	$query = mysqli_query($koneksi, "INSERT INTO tbl_transaksi (no_transaksi,nama_customer,tanggal,user_id) VALUES ('$shuffle','$nama_customer','$tanggal','$id_user')");
	return mysqli_affected_rows($koneksi);
}
function uptransaksi($data)
{
	global $koneksi;

	$nama_customer = $data['nama_customer'];
	$tanggal = $data['tanggal'];
	$no_transaksi = $data['no_transaksi'];
	$id_meja = $data['id_meja'];
	if ($id_meja == "") {
		$query = mysqli_query($koneksi, "UPDATE tbl_transaksi SET nama_customer='$nama_customer',tanggal='$tanggal' WHERE no_transaksi='$no_transaksi'");
	} else {
		$query = mysqli_query($koneksi, "UPDATE tbl_transaksi SET nama_customer='$nama_customer',tanggal='$tanggal' WHERE no_transaksi='$no_transaksi'");
		$querymeja = mysqli_query($koneksi, "UPDATE tbl_meja SET status_meja='F' WHERE id_meja='$id_meja'");
	}
	return mysqli_affected_rows($koneksi);
}

function adduser($data)
{
	global $koneksi;

	$nama = $data['nama'];
	$username = $data['username'];
	$password = md5($data['password']);
	$level = $data['level'];
	$cek = mysqli_query($koneksi, "SELECT * FROM tbl_user WHERE username='$username'");
	if (mysqli_fetch_assoc($cek)) {
		echo "<script>alert('Username telah terdaftar')
		document.location.href='index.php?halaman=data-user'
		</script>";
		return false;
	}

	$query = mysqli_query($koneksi, "INSERT INTO tbl_user (nama,username,password,level) VALUES ('$nama','$username','$password','$level')");
	return mysqli_affected_rows($koneksi);
}
function upuser($data)
{
	global $koneksi;
	$nama = $data['nama'];
	$username = $data['username'];
	$password = $data['password'];
	$passwordLama = $data['passwordLama'];
	$level = $data['level'];
	$id_user = $data['id_user'];
	if ($password == "") {
		$password = $passwordLama;
	} else {
		$password = md5($password);
	}
	$query = mysqli_query($koneksi, "UPDATE tbl_user SET nama='$nama',username='$username', password='$password',level='$level' WHERE id_user='$id_user'");
	return mysqli_affected_rows($koneksi);
}

function upprofil($data)
{
	global $koneksi;
	$nama = $data['nama'];
	$username = $data['username'];
	$passwordLama = $data['passwordLama'];
	$password = $data['password'];
	$id_user = $data['id_user'];
	if ($password == "") {
		$password = $passwordLama;
	} else {
		$password = md5($password);
	}
	$query = mysqli_query($koneksi, "UPDATE tbl_user SET nama='$nama',username='$username', password='$password' WHERE id_user='$id_user'");
	return mysqli_affected_rows($koneksi);
}

function addmeja($data)
{
	global $koneksi;

	$nomor_meja = $data['nomor_meja'];
	$query = mysqli_query($koneksi, "INSERT INTO tbl_meja (nomor_meja,status_meja) VALUES ('$nomor_meja','F')");
	return mysqli_affected_rows($koneksi);
}
