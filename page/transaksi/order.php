<?php
$data = mysqli_query($koneksi, "SELECT * FROM tbl_transaksi INNER JOIN tbl_user ON tbl_transaksi.user_id=tbl_user.id_user");

if (isset($_POST['tambah'])) {
    if (addtransaksi($_POST) > 0) {
        $addtransaksi = true;
    } else {
        $addtransaksi = true;
    }
}
if (isset($_POST['ubah'])) {
    if (uptransaksi($_POST) > 0) {
        $uptransaksi = true;
    } else {
        $uptransaksi = true;
    }
}
if (isset($_POST['hapus'])) {
    $query = mysqli_query($koneksi, "DELETE FROM tbl_transaksi WHERE no_transaksi='$_POST[no_transaksi]'");
    if ($query) {
        $deltransaksi = true;
    }
}
?>
<div class="page-heading">
    <section class="section">
        <div class="card">
            <div class="card-header">
                Table With Data Order
                <a href="" data-bs-toggle="modal" data-bs-target="#tambah" style="float: right;"
                    class="btn btn-sm btn-primary">
                    Tambah Order
                </a>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No Transaksi</th>
                            <th>Tanggal</th>
                            <th>Nama Customer</th>
                            <th>ID Meja</th>
                            <th>Status</th>
                            <th>Nama Pelayan</th>

                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $dt) : ?>
                        <?php $meja = mysqli_query($koneksi, "SELECT * FROM tbl_meja INNER JOIN tbl_transaksi ON tbl_transaksi.id_meja=tbl_meja.id_meja WHERE tbl_transaksi.no_transaksi='$dt[no_transaksi]'"); ?>
                        <tr>
                            <td><?php echo $dt['no_transaksi'] ?> </td>
                            <td><?php echo $dt['tanggal'] ?></td>
                            <td><?php echo $dt['nama_customer'] ?></td>
                            <td>
                                <?php foreach ($meja as $mj) : ?>
                                <?php echo $mj['nomor_meja'] ?>
                                <?php endforeach ?>
                            </td>
                            <td>
                                <?php if ($dt['bayar'] == NULL) : ?>
                                <span class="badge bg-danger">Belum di Bayar</span>
                                <?php else : ?>
                                <span class="badge bg-success">Sudah di Bayar</span>
                                <?php endif ?>
                            </td>
                            <td><?php echo $dt['nama'] ?></td>

                            <td align="center">
                                <form method="post">
                                    <a href="" data-bs-toggle="modal"
                                        data-bs-target="#ubah<?php echo $dt['no_transaksi'] ?>"
                                        class="btn btn-sm rounded-pill btn-success">
                                        <i class="dripicons dripicons-document-edit"></i></a>
                                    <input type="hidden" value="<?php echo $dt['no_transaksi'] ?>" name="no_transaksi">
                                    <button
                                        onclick="return confirm('Yakin Hapus Data <?php echo $dt['no_transaksi'] ?>?')"
                                        name="hapus" class="btn btn-sm btn-danger rounded-pill"><i
                                            class="dripicons dripicons-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        <?php include 'transaksi/ubah.php'; ?>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>
<?php include 'transaksi/tambah.php'; ?>