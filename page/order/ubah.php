<div class="modal fade text-left" id="ubah<?php echo $dt['no_transaksi'] ?>" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel1">Ubah Transaksi</h5>
                <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Customer</label>
                        <input type="text" required="" class="form-control" value="<?php echo $dt['nama_customer'] ?>"
                            name="nama_customer">
                    </div>
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="hidden" value="<?php echo $dt['no_transaksi'] ?>" name="no_transaksi">
                        <input type="date" required="" class="form-control" value="<?php echo $dt['tanggal'] ?>"
                            name="tanggal">
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