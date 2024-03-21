<?php  
$data=mysqli_query($koneksi,"SELECT * FROM tbl_menu INNER JOIN tbl_jenis ON tbl_menu.id_jenis=tbl_jenis.id_jenis");
$jenis=mysqli_query($koneksi,"SELECT * FROM tbl_jenis");

if (isset($_POST['tambah'])) {
    if (addmenu($_POST)>0) {
        $addmenu=true;
    }else{
        $addmenu=true;
    }
}
if (isset($_POST['ubah'])) {
    if (upmenu($_POST)>0) {
        $upmenu=true;
    }else{
        $upmenu=true;
    }
}
if (isset($_POST['hapus'])) {
    $query=mysqli_query($koneksi,"DELETE FROM tbl_menu WHERE id_menu='$_POST[id_menu]'");
    if ($query) {
        $delmenu=true;   
    }
}
?>
<div class="page-heading">
    <section class="section">
        <div class="card">
            <div class="card-header">
                Table With Data Menu
                <a href="" data-bs-toggle="modal" data-bs-target="#tambah" style="float: right;" class="btn btn-sm btn-primary">
                    Tambah Menu
                </a>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No. </th>
                            <th>Nama Menu</th>
                            <th>Jenis</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Gambar</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; ?>
                        <?php foreach ($data as $dt): ?>                        
                            <tr>
                                <td><?php echo $no ?>. </td>
                                <td><?php echo $dt['nama_menu'] ?></td>
                                <td><?php echo $dt['jenis'] ?></td>
                                <td>Rp <?php echo number_format($dt['harga'],0,",",".") ?></td>
                                <td><?php echo $dt['stok'] ?>
                                <?php if ($dt['stok']=='0'): ?>
                                    <span class="badge bg-danger">Habis</span>
                                <?php endif ?>
                            </td>
                            <td><img src="gambar/<?php echo $dt['gambar'] ?>" width="60"></td>
                            <td align="center">
                                <form method="post">
                                    <a href="" data-bs-toggle="modal" data-bs-target="#ubah<?php echo $dt['id_menu'] ?>" class="btn btn-sm rounded-pill btn-success">
                                        <i class="dripicons dripicons-document-edit"></i></a>
                                        <input type="hidden" value="<?php echo $dt['id_menu'] ?>" name="id_menu">
                                        <button onclick="return confirm('Yakin Hapus Data <?php echo $dt['nama_menu'] ?>?')" name="hapus" class="btn btn-sm btn-danger rounded-pill"><i class="dripicons dripicons-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            <?php $no++ ?>
                            <?php include 'menu/ubah.php'; ?>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>
<?php include 'menu/tambah.php'; ?>