<?php
// include_once 'top.php';

// include_once 'menu.php';
$model = new Produk();
$data_produk = $model->dataProduk();

// foreach ($data_produk as $row){
//     print $row['kode'];
// }
$sesi = $_SESSION['MEMBER'];
if(isset($sesi)){
    $allowedRoles = ['admin'];
    if(in_array($sesi['role'], $allowedRoles)){
        $canModify = true;
    } else {
        $canModify = false;
    }
?>
    <h1 class="mt-4">Tables</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item active">Tables</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">
            DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
            <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
            .
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <?php   
            if($canModify){
            ?>
                <a href="index.php?url=product_form" class="btn btn-primary btn-sm">Tambah</a>
            <?php
            }
            ?>
        </div>

        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Harga Beli</th>
                        <th>Harga Jual</th>
                        <th>Stok</th>
                        <th>Minimal Stok</th>
                        <th>Jenis Produk </th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Harga Beli</th>
                        <th>Harga Jual</th>
                        <th>Stok</th>
                        <th>Minimal Stok</th>
                        <th>Jenis Produk </th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    $no = 1;
                    foreach($data_produk as $produk){
                    ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $produk['kode']?></td>
                            <td><?= $produk['nama']?></td>
                            <td><?= $produk['harga_beli']?></td>
                            <td><?= $produk['harga_jual']?></td>
                            <td><?= $produk['stok']?></td>
                            <td><?= $produk['min_stok']?></td>
                            <td><?= $produk['jenis_produk_id']?></td>
                            <td>
                                <form action="produk_controller.php" method="POST">
                                    <a class="btn btn-info btn-sm" href="index.php?url=product_detail&id=<?= $produk['id'] ?>">Detail</a>
                                    <?php   
                                    if($canModify){
                                    ?>
                                        <a class="btn btn-warning btn-sm" href="index.php?url=product_form&idedit=<?= $produk['id']?>">Ubah</a>
                                        <button class="btn btn-danger btn-sm" type="submit" name="proses"  value="hapus" 
                                                    onclick="return confirm('Apakah yakin di hapus')">Hapus</button>
                                    <?php
                                    }
                                    ?>
                                    <input type="hidden" name="idx" value="<?= $produk['id']?>">
                                </form>
                            </td>
                        </tr>
                    <?php
                    $no++; 
                    } 
                    ?>
                </tbody>
            </table>
        </div>
    </div>
<?php
} else {
    echo '<script> alert("Anda dilarang masuk"); history.back();</script>';
}
include_once 'bottom.php';
?>
