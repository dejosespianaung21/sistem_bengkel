<?php
include('_koneksi.php');

// Inisialisasi variabel
$id_kendaraan = '';
$id_konsumen = '';
$merek = '';
$pesan = 'Kendaraan';
$aksi = 'success';

// Fungsi untuk membersihkan data input
function bersihkan_input($data) {
    global $conn;
    return mysqli_real_escape_string($conn, trim($data));
}

// Mengecek metode POST
if (isset($_POST['mode'])) {
    $id_kendaraan = bersihkan_input($_POST['id_kendaraan']); // Tambahkan pengambilan id_kendaraan
    $id_konsumen = bersihkan_input($_POST['id_konsumen']);
    $merek = bersihkan_input($_POST['merek']);

    // Menyiapkan query SQL
    if ($_POST['mode'] == 'tambah') {
        $sql = "INSERT INTO kendaraan (id_kendaraan, id_konsumen, merek) VALUES ('$id_kendaraan', '$id_konsumen', '$merek')";
        $pesan = "Tambah " . $pesan;
    } else if ($_POST['mode'] == 'edit') {
        $sql = "UPDATE kendaraan SET id_konsumen = '$id_konsumen', merek = '$merek' WHERE id_kendaraan = '$id_kendaraan'";
        $pesan = "Update " . $pesan;
    }
}

// Mengecek metode GET
if (isset($_GET['mode']) && $_GET['mode'] == 'hapus') {
    $sql = "DELETE FROM kendaraan";
    $pesan = "Hapus " . $pesan;
}

// Menjalankan query
if (isset($sql)) {
    if (mysqli_query($conn, $sql)) {
        $pesan = "Berhasil " . $pesan;
    } else {
        $pesan = "Gagal " . $pesan;
        $aksi = 'error';
    }
}

// Menutup koneksi
mysqli_close($conn);

// Redirect ke halaman kendaraan.php dengan pesan dan aksi
header('Location: kendaraan.php?aksi=' . $aksi . '&pesan=' . urlencode($pesan));
exit();
?>