<?php
$mode = 'tambah';
$cap = 'Tambah';

$id = '';
$nama = '';
$harga = '';
$jumlah = '';
$total = '';



if (isset($_GET['mode']) && $_GET['mode'] == 'edit') {
    include('_koneksi.php');
    $mode = 'edit';
    $cap = 'Update';
    $id = $_GET['id'];
    $sql = "SELECT * FROM spare_part WHERE id =" . $id;
    $query = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($query);

    $nama = $data['nama'];
    $harga = $data['harga'];
    $jumlah = $data['jumlah'];
    $total = $harga * $jumlah;
    
    //$total_harga = $harga * $jumlah;
}
?>
<form action="spare_part_proses.php" method="POST">
    <div class="modal-header">
        <h4 class="modal-title"><?php echo $cap; ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label>ID</label>
            <input type="number" class="form-control" value="<?php echo $id; ?>" name="id" placeholder="ID" readonly>
        </div>
        <div class="form-group">
            <label>Nama</label>
            <input type="text" class="form-control" value="<?php echo $nama; ?>" name="nama" placeholder="Nama">
        </div>
        <div class="form-group">
            <label>Harga</label>
            <input type="varchar" class="form-control" value="<?php echo $harga; ?>" name="harga" placeholder="Harga">
        </div>
        <div class="form-group">
            <label>Jumlah</label>
            <input type="number" class="form-control" value="<?php echo $jumlah; ?>" name="jumlah" placeholder="Jumlah">
        </div>
        <div class="form-group">
            <label>Total</label>
            <input type="varchar" class="form-control" value="<?php echo $total; ?>" name="total" placeholder="Total" readonly>
        </div>
        </div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary"><?php echo $cap; ?></button>
        <input type="hidden" name="mode" value="<?php echo $mode; ?>" />
    </div>
</form>