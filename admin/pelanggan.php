<?php
    $model = new Pelanggan();
    $data_pelanggan = $model->dataPelanggan();

    $sesi = $_SESSION['MEMBER'];
if(isset($sesi)){
    $allowedRoles = ['admin'];
    if(in_array($sesi['role'], $allowedRoles)){
        $canModify = true;
    } else {
        $canModify = false;
    }
?>
    <h
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
                                <!-- <i class="fas fa-table me-1"></i>
                                DataTable Example -->
                                <!-- membuat tombol mengarahkan ke file produk_form.php -->
                                <?php   
            if($canModify){
            ?>
                                <a href="index.php?url=pelanggan_form" class="btn btn-primary btn-sm"> Tambah</a>
                                  <?php
            }
            ?>
                            </div>

                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                           <th>Nomor</th>
                                            <th>kode</th>
                                            <th>Nama Pelanggan</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Tempat Lahir</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Email</th>
                                            <th>Kartu ID</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nomor</th>
                                            <th>kode</th>
                                            <th>Nama Pelanggan</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Tempat Lahir</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Email</th>
                                            <th>Kartu ID</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            $no =1;
                                            foreach($data_pelanggan as $pelanggan)
                                            {
                                                ?><tr>
                                                <th><?= $no ?></th>
                                                <th><?= $pelanggan['kode']?></th>
                                                <th><?= $pelanggan['nama']?></th>
                                                <th><?= $pelanggan['jk']?></th>
                                                <th><?= $pelanggan['tmp_lahir']?></th>
                                                <th><?= $pelanggan['tgl_lahir']?></th>
                                                <th><?= $pelanggan['email']?></th>
                                                <th><?= $pelanggan['kartu_id']?></th>
                                                <th>
                                                 <form action="pelanggan_controller.php" method="POST">
                                                    <a class="btn btn-info btn-sm" href="index.php?url=pelanggan_detail&id=<?= $pelanggan ['id'] ?>">Detail</a>
                                                     <?php   
                                    if($canModify){
                                    ?>
                                                    <a class="btn btn-warning btn-sm" href="index.php?url=pelanggan_form&idedit=<?= $pelanggan['id']?>">Ubah</a>
                                                    <button class="btn btn-danger btn-sm" type="submit" name="proses" value="hapus" 
                                                    onclick="return confirm('Apakah yakin di hapus')">Hapus</button>
<?php
                                    }
                                    ?>
                                                    <input type="hidden" name="idx" value="<?= $pelanggan['id']?>">
                                                </form>
                                            </th>
                                                        
                                            <?php
                                            $no++;  
                                            }
                                            ?>
                                            </tr>
                                    </tbody>
                                </table>
                            </div>

</div>
</div>
                        <?php
                        } else {
    echo '<script> alert("Anda dilarang masuk"); history.back();</script>';
}
    include_once 'buttom.php';
?>

