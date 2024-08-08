<?php
include('_koneksi.php');

// Inisialisasi variabel
$id_servis = '';
$id_kendaraan = '';
$tanggal_servis = '';
$deskripsi = '';
$biaya_servis = '';
$pesan = 'Servis';
$aksi = 'success';

// Fungsi untuk membersihkan data input
function bersihkan_input($data) {
    global $conn;
    return mysqli_real_escape_string($conn, trim($data));
}

// Mengecek metode POST
if (isset($_POST['mode'])) {
    $id_servis = bersihkan_input($_POST['id_servis']); // Tambahkan pengambilan id_servis
    $id_kendaraan = bersihkan_input($_POST['id_kendaraan']);
    $tanggal_servis = bersihkan_input($_POST['tanggal_servis']);
    $deskripsi = bersihkan_input($_POST['deskripsi']);
    $biaya_servis = bersihkan_input($_POST['biaya_servis']);

    // Menyiapkan query SQL
    if ($_POST['mode'] == 'tambah') {
        $sql = "INSERT INTO servis (id_servis, id_kendaraan, tanggal_servis, deskripsi, biaya_servis) VALUES ('$id_servis', '$id_kendaraan', '$tanggal_servis', '$deskripsi', '$biaya_servis')";
        $pesan = "Tambah " . $pesan;
    } else if ($_POST['mode'] == 'edit') {
        $sql = "UPDATE servis SET id_kendaraan = '$id_kendaraan', tanggal_servis = '$tanggal_servis', deskripsi = '$deskripsi', biaya_servis = '$biaya_servis' WHERE id_servis = '$id_servis'";
        $pesan = "Update " . $pesan;
    }
}

// Mengecek metode GET
if (isset($_GET['mode']) && $_GET['mode'] == 'hapus') {
    $sql = "DELETE FROM servis";
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

// Redirect ke halaman servis.php dengan pesan dan aksi
header('Location: servis.php?aksi=' . $aksi . '&pesan=' . urlencode($pesan));
exit();
?>