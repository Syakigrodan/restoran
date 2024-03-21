<div class="modal fade text-left" id="bayar<?php echo $tr['no_transaksi'] ?>" tabindex="-1" role="dialog"
  aria-labelledby="myModalLabel1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel1">Pembayaran</h5>
        <button type="button" class="close rounded-pill"
        data-bs-dismiss="modal" aria-label="Close">
        <i data-feather="x"></i>
      </button>
    </div>
    <form method="post" name="autoSumForm" enctype="multipart/form-data">
      <div class="modal-body">
        <div class="form-group">
         <label>PPN</label>
         <input type="number" class="form-control" value="<?php echo $tr['ppn'] ?>" onFocus="startCalc();" onBlur="stopCalc();" name="ppn">
       </div> 
       <div class="form-group">
         <label>Diskon</label>
         <input type="number" class="form-control" value="<?php echo $tr['total_diskon'] ?>" onFocus="startCalc();" onBlur="stopCalc();" name="total_diskon">
       </div>
       <div class="form-group">
         <label>Di Bayar</label>
         <input type="number" class="form-control" min="{{$subtotaltrue}}" onFocus="startCalc();" onBlur="stopCalc();" value="<?php echo $tr['bayar'] ?>" name="bayar">
       </div>
       <div class="form-group">
         <label>Rp. SUBTOTAL</label>
         <input type="hidden" value="<?php echo $subtotaltrue ?>" name="sub">
         <input type="number" class="form-control" value="<?php echo $subtotaltrue ?>" readonly="" name="subtotal">
       </div>
       <hr>
       <div class="form-group">
         <label>ID MEJA</label>
         <select class="form-control" name="id_meja">
           <?php foreach ($meja as $mj): ?>
            <option value="<?php echo $mj['id_meja'] ?>"><?php echo $mj['nomor_meja'] ?></option>
          <?php endforeach ?>
        </select>
        <?php foreach ($data as $dt): ?>
          <input type="hidden" value="<?php echo $dt['qty'] ?>" name="qty[]">
          <input type="hidden" value="<?php echo $dt['id_menu'] ?>" name="id_menu[]">
          <input type="hidden" value="<?php echo $dt['nama_menu'] ?>" name="nama_menu[]">
        <?php endforeach ?>
        <input type="hidden" class="form-control" value="<?php echo $tr['no_transaksi'] ?>" required name="no_transaksi">
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn" data-bs-dismiss="modal">
        <i class="bx bx-x d-block d-sm-none"></i>
        <span class="d-none d-sm-block">Close</span>
      </button>
      <?php if ($tr['bayar']==NULL): ?>
        <button name="bayaryuk" class="btn btn-primary ml-1">
          <i class="bx bx-check d-block d-sm-none"></i>
          <span class="d-none d-sm-block">Accept</span>
        </button>
      <?php endif ?>
    </div>
  </form>
</div>
</div>
</div>
<script>

  function startCalc(){

    interval = setInterval("calc()",1);}

    function calc(){

      one = document.autoSumForm.ppn.value;

      two = document.autoSumForm.total_diskon.value;

      three = document.autoSumForm.bayar.value;

      four = document.autoSumForm.sub.value;


      document.autoSumForm.subtotal.value = (four * 1) + (one * 1) - (two * 1);}

      function stopCalc(){

        clearInterval(interval);}

      </script>