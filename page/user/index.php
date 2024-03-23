<?php
$data = mysqli_query($koneksi, "SELECT * FROM tbl_user WHERE id_user!='$_SESSION[id_user]'");

if (isset($_POST['tambah'])) {
    if (adduser($_POST) > 0) {
        $adduser = true;
    } else {
        $adduser = true;
    }
}
if (isset($_POST['ubah'])) {
    if (upuser($_POST) > 0) {
        $upuser = true;
    } else {
        $upuser = true;
    }
}
if (isset($_POST['hapus'])) {
    $query = mysqli_query($koneksi, "DELETE FROM tbl_user WHERE id_user='$_POST[id_user]'");
    if ($query) {
        $deluser = true;
    }
}
?>
<div class="page-heading">
    <section class="section">
        <div class="card">
            <div class="card-header">
                Table Data User
                <a href="" data-bs-toggle="modal" data-bs-target="#tambah" style="float: right;" class="btn btn-sm btn-primary">
                    Tambah User
                </a>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No. </th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Level</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($data as $dt) : ?>
                            <tr>
                                <td><?php echo $no ?>. </td>
                                <td><?php echo $dt['nama'] ?></td>
                                <td><?php echo $dt['username'] ?></td>
                                <td><span class="badge bg-primary"><?php echo $dt['level'] ?></span></td>
                                <td align="center">
                                    <form method="post">
                                        <a href="" data-bs-toggle="modal" data-bs-target="#ubah<?php echo $dt['id_user'] ?>" class="btn btn-sm rounded-pill btn-success">
                                            <i class="dripicons dripicons-document-edit"></i></a>
                                        <input type="hidden" value="<?php echo $dt['id_user'] ?>" name="id_user">
                                        <button onclick="return confirm('Yakin Hapus Data <?php echo $dt['nama'] ?>?')" name="hapus" class="btn btn-sm btn-danger rounded-pill"><i class="dripicons dripicons-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            <?php $no++ ?>
                            <?php include 'user/ubah.php'; ?>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>
<?php include 'user/tambah.php'; ?>