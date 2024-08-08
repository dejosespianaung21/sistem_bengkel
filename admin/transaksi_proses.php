<?php
include('_koneksi.php');

$sql = "";

$id = '';
$konsumen = '';
$tanggal = '';
$jumlah = '';
$harga = '';
$total = '';

$pesan = 'transaksi';
$aksi = 'success';

if (isset($_POST['mode'])) {
    $id = intval($_POST['id']);  // Pastikan ID adalah integer
    $konsumen = mysqli_real_escape_string($conn, $_POST['konsumen']);
    $tanggal = mysqli_real_escape_string($conn, $_POST['tanggal']);
    $jumlah = intval($_POST['jumlah']);  // Pastikan jumlah adalah integer
    $harga = floatval($_POST['harga']); // Pastikan harga adalah float
    $total = $harga * $jumlah;

    if ($_POST['mode'] == 'tambah') {
        $sql = "INSERT INTO transaksi (
                    konsumen,
                    tanggal,
                    jumlah,
                    harga,
                    total)
                VALUES (
                    '$konsumen',
                    '$tanggal',
                    '$jumlah',
                    '$harga',
                    '$total')";
        $pesan = "Tambah " . $pesan;
    } else if ($_POST['mode'] == 'edit') {
        $sql = "UPDATE transaksi SET 
                    konsumen = '$konsumen', 
                    tanggal = '$tanggal', 
                    jumlah = '$jumlah',
                    harga = '$harga', 
                    total = '$total' 
                WHERE id = $id";
        $pesan = "Update " . $pesan;
    }
} else if (isset($_GET['mode']) && $_GET['mode'] == 'hapus') {
    $id = intval($_GET['id']);  // Pastikan ID adalah integer
    $sql = "DELETE FROM transaksi WHERE id = $id";
    $pesan = "Hapus " . $pesan;
}

if ($sql && mysqli_query($conn, $sql)) {
    $pesan = "Berhasil " . $pesan;
} else {
    $pesan = "Gagal " . $pesan;
    $aksi = 'error';
}

header('Location: transaksi.php?aksi=' . $aksi . '&pesan=' . urlencode($pesan));
exit();
?>
