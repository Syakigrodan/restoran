<?php  
$data=mysqli_query($koneksi,"SELECT * FROM tbl_jenis");

if (isset($_POST['tambah'])) {
    if (addjenis($_POST)>0) {
        $addjenis=true;
    }else{
        $addjenis=true;
    }
}
if (isset($_POST['ubah'])) {
    if (upjenis($_POST)>0) {
        $upjenis=true;
    }else{
        $upjenis=true;
    }
}
if (isset($_POST['hapus'])) {
    $query=mysqli_query($koneksi,"DELETE FROM tbl_jenis WHERE id_jenis='$_POST[id_jenis]'");
    if ($query) {
        $deljenis=true;   
    }
}
?>
<div class="page-heading">
    <section class="section">
        <div class="card">
            <div class="card-header">
                Table With Data Jenis
                <a href="" data-bs-toggle="modal" data-bs-target="#tambah" style="float: right;" class="btn btn-sm btn-primary">
                    Tambah Jenis
                </a>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No. </th>
                            <th>Nama Jenis</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; ?>
                        <?php foreach ($data as $dt): ?>                        
                            <tr>
                                <td><?php echo $no ?>. </td>
                                <td><?php echo $dt['jenis'] ?></td>
                                <td align="center">
                                    <form method="post">
                                        <a href="" data-bs-toggle="modal" data-bs-target="#ubah<?php echo $dt['id_jenis'] ?>" class="btn btn-sm rounded-pill btn-success">
                                            <i class="dripicons dripicons-document-edit"></i></a>
                                            <input type="hidden" value="<?php echo $dt['id_jenis'] ?>" name="id_jenis">
                                            <button onclick="return confirm('Yakin Hapus Data <?php echo $dt['jenis'] ?>?')" name="hapus" class="btn btn-sm btn-danger rounded-pill"><i class="dripicons dripicons-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                <?php $no++ ?>
                                <?php include 'jenis/ubah.php'; ?>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>
    <?php include 'jenis/tambah.php'; ?>