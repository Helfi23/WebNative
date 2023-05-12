<?php
    // include_once 'top.php';
    // include_once 'menu.php';
 

    $model = new Pesanan();
    $data_pesanan = $model->dataPesanan();

    // foreach($data_produk as $produk) {
    //     echo $produk['kode'] . ' - ' . $produk['nama'] . ' - ' . $produk['harga_jual'] . '<br>';
    // }
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
                                <a href="index.php?url=pesanan_form" class="btn btn-primary btn-sm"> Tambah</a>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Nomor</th>
                                            <th>Tanggal Pesan</th>
                                            <th>Total Pemesanan</th>
                                            <th>Nomor Pelanggan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                         <tr>
                                            <th>Nomor</th>
                                            <th>Tanggal Pesan</th>
                                            <th>Total Pemesanan</th>
                                            <th>Nomor Pelanggan</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            $no =1;
                                            foreach($data_pesanan as $pesanan)
                                            {
                                                ?><tr>
                                                <th><?= $no ?></th>
                                                <th><?= $pesanan['tanggal']?></th>
                                                <th><?= $pesanan['total']?></th>
                                                <th><?= $pesanan['pelanggan_id']?></th>
                                                <th>
                                                <form action="pesanan_controller.php" method="POST">
                                                    <a class="btn btn-info btn-sm" href="index.php?url=pesanan_detail&id=<?= $pesanan ['id'] ?>">Detail</a>
                                                    <a class="btn btn-warning btn-sm" href="index.php?url=pesanan_form&idedit=<?= $pesanan['id']?>">Ubah</a>
                                                   <button class="btn btn-danger btn-sm" type="submit" name="proses"  value="hapus" 
                                                    onclick="return confirm('Apakah yakin di hapus')">Hapus</button>

                                                    <input type="hidden" name="idx" value="<?= $pesanan['id']?>">
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
    include_once 'buttom.php';
?>
