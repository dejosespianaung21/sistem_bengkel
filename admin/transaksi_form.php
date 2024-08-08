<?php
$mode = 'tambah';
$cap = 'Tambah';

$id = '';
$konsumen = '';
$tanggal = '';
$jumlah = '';
$harga = '';
$total = '';

if (isset($_GET['mode']) && $_GET['mode'] == 'edit') {
    include('_koneksi.php');
    $mode = 'edit';
    $cap = 'Update';
    $id = intval($_GET['id']);  // Pastikan id adalah integer
    $sql = "SELECT * FROM transaksi WHERE id = " . $id;
    $query = mysqli_query($conn, $sql);
    
    if (!$query) {
        die('Query Error: ' . mysqli_error($conn));
    }
    
    $data = mysqli_fetch_assoc($query);
    
    if ($data) {
        $konsumen = $data['konsumen'];
        $tanggal = $data['tanggal'];
        $jumlah = $data['jumlah'];
        $harga = $data['harga'];
        $total = $harga * $jumlah;
    } else {
        die('Data tidak ditemukan.');
    }
}
?>
<form action="transaksi_proses.php" method="POST">
    <div class="modal-header">
        <h4 class="modal-title"><?php echo htmlspecialchars($cap); ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label>ID</label>
            <input type="number" class="form-control" value="<?php echo htmlspecialchars($id); ?>" name="id" placeholder="ID" readonly>
        </div>
        <div class="form-group">
            <label>Konsumen</label>
            <input type="text" class="form-control" value="<?php echo htmlspecialchars($konsumen); ?>" name="konsumen" placeholder="Konsumen">
        </div>
        <div class="form-group">
            <label>Tanggal</label>
            <input type="date" class="form-control" value="<?php echo htmlspecialchars($tanggal); ?>" name="tanggal" placeholder="Tanggal">
        </div>
        <div class="form-group">
            <label>Jumlah</label>
            <input type="number" class="form-control" value="<?php echo htmlspecialchars($jumlah); ?>" name="jumlah" placeholder="Jumlah">
        </div>
        <div class="form-group">
            <label>Harga</label>
            <input type="varchar" class="form-control" value="<?php echo htmlspecialchars($harga); ?>" name="harga" placeholder="Harga">
        </div>
        <div class="form-group">
            <label>Total</label>
            <input type="text" class="form-control" value="<?php echo htmlspecialchars($total); ?>" name="total" placeholder="Total" readonly>
        </div>
    </div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary"><?php echo htmlspecialchars($cap); ?></button>
        <input type="hidden" name="mode" value="<?php echo htmlspecialchars($mode); ?>" />
    </div>
</form>
