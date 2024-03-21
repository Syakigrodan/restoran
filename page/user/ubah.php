<div class="modal fade text-left" id="ubah<?php echo $dt['id_user'] ?>" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel1">Ubah Data User</h5>
                <button type="button" class="close rounded-pill"
                data-bs-dismiss="modal" aria-label="Close">
                <i data-feather="x"></i>
            </button>
        </div>
        <form method="post">
            <div class="modal-body">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" required="" value="<?php echo $dt['nama'] ?>" class="form-control" name="nama">
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" required="" value="<?php echo $dt['username'] ?>" class="form-control" name="username">
                </div>
                <input type="hidden" value="<?php echo $dt['id_user'] ?>" name="id_user">
                <div class="form-group">
                    <label>Password</label>
                    <input type="text" class="form-control" name="password">
                    <input type="hidden" class="form-control" value="<?php echo $dt['password'] ?>" name="passwordLama">
                </div>
                <div class="form-group">
                    <label>Level</label>
                    <select class="form-control" name="level">
                        <option <?php if($dt['level']=="Kasir"){echo "selected";} ?> value="Kasir">Kasir</option>
                        <option <?php if($dt['level']=="Admin"){echo "selected";} ?> value="Admin">Admin</option>
                        <option <?php if($dt['level']=="Owner"){echo "selected";} ?> value="Owner">Owner</option>
                    </select>
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