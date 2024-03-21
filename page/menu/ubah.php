<div class="modal fade text-left" id="ubah<?php echo $dt['id_menu'] ?>" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel1">Ubah Data Menu</h5>
                <button type="button" class="close rounded-pill"
                data-bs-dismiss="modal" aria-label="Close">
                <i data-feather="x"></i>
            </button>
        </div>
        <form method="post" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="form-group">
                    <label>Nama Menu</label>
                    <input type="text" required="" value="<?php echo $dt['nama_menu'] ?>" class="form-control" name="nama_menu">
                </div>
                <input type="hidden" value="<?php echo $dt['id_menu'] ?>" name="id_menu">
                <div class="form-group">
                    <label>Jenis</label>
                    <select class="form-control" name="id_jenis">
                        <?php foreach ($jenis as $jns): ?>
                            <option <?php if($jns['id_jenis']==$dt['id_jenis']){echo "selected";} ?> value="<?php echo $jns['id_jenis'] ?>"><?php echo $jns['jenis'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Harga</label>
                    <input type="number" required="" value="<?php echo $dt['harga'] ?>" class="form-control" name="harga">
                </div>
                <div class="form-group">
                    <label>Stok</label>
                    <input type="number" required="" class="form-control" value="<?php echo $dt['stok'] ?>" name="stok" min="1">
                </div>
                <div class="form-group">
                    <label>Gambar</label>
                    <input type="file" class="form-control" name="gambar">
                    <input type="hidden" required="" class="form-control" value="<?php echo $dt['gambar'] ?>" name="gambarLama">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn" data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                </button>
                <button name="ubah" class="btn btn-primary ml-1">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Accept</span>
                </button>
            </div>
        </form>
    </div>
</div>
</div>