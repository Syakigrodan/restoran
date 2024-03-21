<?php  
$data=mysqli_query($koneksi,"SELECT * FROM tbl_meja");

if (isset($_POST['tambah'])) {
    if (addmeja($_POST)>0) {
        $addmeja=true;
    }else{
        $addmeja=true;
    }
}
if (isset($_POST['hapus'])) {
    $query=mysqli_query($koneksi,"DELETE FROM tbl_meja WHERE id_meja='$_POST[id_meja]'");
    if ($query) {
        $delmeja=true;   
    }
}
$query = mysqli_query($koneksi, "SELECT max(nomor_meja) as kodeTerbesar FROM tbl_meja");
$kode = mysqli_fetch_array($query);
$kodeBarang = $kode['kodeTerbesar'];

// mengambil angka dari kode barang terbesar, menggunakan fungsi substr
// dan diubah ke integer dengan (int)
$urutan = (int) substr($kodeBarang, 2, 2);

// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$urutan++;

// membentuk kode barang baru
// perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
// misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
// angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
$kodeBarang = sprintf("%03s", $urutan);
?>
<div class="page-heading">
    <section class="section">
        <div class="card">
            <div class="card-header">
                Table With Data Meja
                <a href="" data-bs-toggle="modal" data-bs-target="#tambah" style="float: right;" class="btn btn-sm btn-primary">
                    Tambah Meja
                </a>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No. </th>
                            <th>Nomor Meja</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; ?>
                        <?php foreach ($data as $dt): ?>                        
                            <tr>
                                <td><?php echo $no ?>. </td>
                                <td><?php echo $dt['nomor_meja'] ?></td>
                                <td align="center">
                                    <form method="post">
                                        <input type="hidden" value="<?php echo $dt['id_meja'] ?>" name="id_meja">
                                        <button onclick="return confirm('Yakin Hapus Data <?php echo $dt['nomor_meja'] ?>?')" name="hapus" class="btn btn-sm btn-danger rounded-pill"><i class="dripicons dripicons-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            <?php $no++ ?>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>
<?php include 'meja/tambah.php'; ?>