<?php
$id = $_REQUEST['id'];
$model = new Pesanan();
$pesanan = $model->getPesanan($id);

?>

<div>
    <h3><?= $pesanan['total'] ?> </h3>
</div>