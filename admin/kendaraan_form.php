<?php
$mode = 'tambah';
$cap = 'Tambah';
$id_kendaraan = '';
$id_konsumen = '';
$merek = '';

if (isset($_GET['mode']) && $_GET['mode'] == 'edit') {
    include('_koneksi.php');
    $mode = 'edit';
    $cap = 'Update';
    $sql = "SELECT * FROM kendaraan";
    $query = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($query);

    $id_kendaraan = $data['id_kendaraan'];
    $id_konsumen = $data['id_konsumen'];
    $merek = $data['merek'];
}
?>
<form action="kendaraan_proses.php" method="POST">
    <div class="modal-header">
        <h4 class="modal-title"><?php echo $cap; ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
    <div class="form-group">
            <label>Id Kendaraan</label>
            <input type="int" class="form-control" value="<?php echo $id_kendaraan; ?>" name="id_kendaraan" placeholder="IdKendaraan" readonly>
        </div>
    <div class="modal-body">
    <div class="form-group">
            <label>Id Konsumen</label>
            <input type="int" class="form-control" value="<?php echo $id_konsumen; ?>" name="id_konsumen" placeholder="IdKonsumen" readonly>
        </div>
    <div class="form-group">
            <label>Merek<label>
            <input type="varchar" class="form-control" value="<?php echo $merek; ?>" name="merek" placeholder="Merek">
        </div>
    <div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary"><?php echo $cap; ?></button>
        <input type="hidden" name="mode" value="<?php echo $mode; ?>" />
    </div>
</form>