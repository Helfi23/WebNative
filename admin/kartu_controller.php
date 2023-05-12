<?php
include_once 'koneksi.php';
include_once 'models/Kartu.php';

//step pertama yaitu menangkap request form
$kode = $_POST['kode'];
$nama = $_POST['nama'];
$diskon = $_POST['diskon'];
$iuran = $_POST['iuran'];
//menangkapan form diatas dijadikan array
$data = [
    $kode,
    $nama,
    $diskon,
    $iuran
];
$model = new Kartu();
$tombol = $_REQUEST['proses'];
switch($tombol){
    case 'simpan':$model->simpan($data); break;
     case 'ubah':
        $data[] = $_POST['idx']; $model->ubah($data);break;
        case 'hapus':
            unset($data); $model->hapus($_POST['idx']);break;
    default:
    header('Location:index.php?url=kartu');
    break;
}
header('Location:index.php?url=kartu');

?>