<?php
$mode = 'tambah';
$cap = 'Tambah';
$id_konsumen = '';
$nama = '';
$alamat = '';
$telepon = '';

if (isset($_GET['mode']) && $_GET['mode'] == 'edit') {
    include('_koneksi.php');
    $mode = 'edit';
    $cap = 'Update';
    $sql = "SELECT * FROM konsumen";
    $query = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($query);

    $id_konsumen = $data['id_konsumen'];
    $nama = $data['nama'];
    $alamat = $data['alamat'];
    $telepon = $data['telepon'];
}
?>
<form action="konsumen_proses.php" method="POST">
    <div class="modal-header">
        <h4 class="modal-title"><?php echo $cap; ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
    <div class="form-group">
            <label>Id Konsumen</label>
            <input type="int" class="form-control" value="<?php echo $id_konsumen; ?>" name="id_konsumen" placeholder="IdKonsumen" readonly>
        </div>
    <div class="form-group">
            <label>Nama<label>
            <input type="varchar" class="form-control" value="<?php echo $nama; ?>" name="nama" placeholder="Nama">
        </div>
    <div class="form-group">
            <label>Alamat<label>
            <input type="varchar" class="form-control" value="<?php echo $alamat; ?>" name="alamat" placeholder="Alamat">
        </div>
    <div class="form-group">
            <label>Telepon<label>
            <input type="varchar" class="form-control" value="<?php echo $telepon; ?>" name="telepon" placeholder="Telepon">
        </div>
    <div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary"><?php echo $cap; ?></button>
        <input type="hidden" name="mode" value="<?php echo $mode; ?>" />
    </div>
</form>