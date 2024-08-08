<?php
include('_koneksi.php');

// Inisialisasi variabel
$id_konsumen = '';
$nama = '';
$alamat = '';
$telepon = '';
$pesan = 'Konsumen';
$aksi = 'success';

// Fungsi untuk membersihkan data input
function bersihkan_input($data) {
    global $conn;
    return mysqli_real_escape_string($conn, trim($data));
}

// Mengecek metode POST
if (isset($_POST['mode'])) {
    $id_konsumen = bersihkan_input($_POST['id_konsumen']); // Tambahkan pengambilan id_konsumen
    $nama = bersihkan_input($_POST['nama']);
    $alamat = bersihkan_input($_POST['alamat']);
    $telepon = bersihkan_input($_POST['telepon']);

    // Menyiapkan query SQL
    if ($_POST['mode'] == 'tambah') {
        $sql = "INSERT INTO konsumen (id_konsumen, nama, alamat, telepon) VALUES ('$id_konsumen', '$nama', '$alamat', '$telepon')";
        $pesan = "Tambah " . $pesan;
    } else if ($_POST['mode'] == 'edit') {
        $sql = "UPDATE konsumen SET nama= '$nama', alamat = '$alamat', telepon = '$telepon' WHERE id_konsumen = '$id_konsumen'";
        $pesan = "Update " . $pesan;
    }
}

// Mengecek metode GET
if (isset($_GET['mode']) && $_GET['mode'] == 'hapus') {
    $sql = "DELETE FROM konsumen";
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

// Redirect ke halaman konsumen.php dengan pesan dan aksi
header('Location: konsumen.php?aksi=' . $aksi . '&pesan=' . urlencode($pesan));
exit();
?>