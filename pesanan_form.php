<br>
<?php
error_reporting(0);
$obj_pesanan = new Pesanan();
$data_pesanan = $obj_pesanan->dataPesanan();

$idedit = $_REQUEST['idedit'];
$pes = !empty($idedit) ? $obj_pesanan->getPesanan($idedit) : array();


?>
<form action="pesanan_controller.php" method="POST">
      <div class="form-group row">
        <label for="text1" class="col-4 col-form-label">Tanggal</label> 
        <div class="col-8">
          <input id="tanggal" name="tanggal" type="date" class="form-control" value="<?= $pes['tanggal']?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="text" class="col-4 col-form-label">Total</label> 
        <div class="col-8">
          <input id="total" name="total" type="double" class="form-control" value="<?= $pes['total']?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="text2" class="col-4 col-form-label">Pelanggan ID</label> 
        <div class="col-8">
          <input id="pelanggan_id" name="pelanggan_id" type="text" class="form-control" value="<?= $pes['pelanggan_id']?>">
        </div>
      </div>
      <div class="form-group row">
        <div class="offset-4 col-8">
        <?php
          if (empty($idedit)){
        ?>
          <button name="proses" type="submit" value="simpan" class="btn btn-primary">Submit</button>
        <?php
          }
        else 
          {
        ?>
          <button name="proses" type="submit" value="ubah" class="btn btn-primary">Update</button>
          <input type="hidden" name="idx" value="<?= $idedit?>">
        <?php
          }
        ?>
        <button name="proses" type="submit" value="batal" class="btn btn-primary">Cancel</button>
        </div>
      </div>
    </form>