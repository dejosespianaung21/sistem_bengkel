<?php
include('_koneksi.php');

$sql = "";

$id = '';
$nama = '';
$harga = '';
$jumlah = '';
$total = '';

$pesan = 'spare_part';
$aksi = 'success';
if (isset($_POST['mode'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $jumlah = $_POST['jumlah'];
    //$total = $_POST['total'];
    $total = $harga * $jumlah;
    
    if ($_POST['mode'] == 'tambah') {
        $sql = "INSERT INTO spare_part(
                    nama,
                    harga,
                    jumlah,
                    total)
                VALUES(
                    '" . $nama . "',
                    " . $harga . ",
                    '" . $jumlah . "',
                    '" . $total. "')";
        $pesan = "Tambah " . $pesan;
    } else if ($_POST['mode'] == 'edit') {
        $sql = "UPDATE spare_part SET 
                    nama = '" . $nama . "', 
                     harga = " . $harga . ", 
                    jumlah = '" . $jumlah . "', 
                    total = '" . $total . "' 
                WHERE id = " . $id;
        $pesan = "Update " . $pesan;
    }
}
if (isset($_GET['mode']) && $_GET['mode'] == 'hapus') {
    $id = $_GET['id'];
    $sql = "DELETE FROM spare_part WHERE id=" . $id;
    $pesan = "Hapus " . $pesan;
}
if (mysqli_query($conn, $sql)) {
    $pesan = "Berhasi " . $pesan;
} else {
    $pesan = "Gagal " . $pesan;
    $aksi = 'error';
}

header('location:spare_part.php?aksi=' . $aksi . '&pesan=' . $pesan);
