<?php
$mode = 'tambah';
$cap = 'Tambah';
$id_servis = '';
$id_kendaraan = '';
$tanggal_servis = '';
$deskripsi = '';
$biaya_servis = '';

if (isset($_GET['mode']) && $_GET['mode'] == 'edit') {
    include('_koneksi.php');
    $mode = 'edit';
    $cap = 'Update';
    $sql = "SELECT * FROM servis";
    $query = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($query);

    $id_servis = $data['id_servis'];
    $id_kendaraan = $data['id_kendaraan'];
    $tanggal_servis = $data['tanggal_servis'];
    $deskripsi = $data['deskripsi'];
    $biaya_servis = $data['biaya_servis'];
}
?>
<form action="servis_proses.php" method="POST">
    <div class="modal-header">
        <h4 class="modal-title"><?php echo $cap; ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
    <div class="form-group">
            <label>Id Servis</label>
            <input type="int" class="form-control" value="<?php echo $id_servis; ?>" name="id_servis" placeholder="IdServis" readonly>
    </div>
    <div class="modal-body">
    <div class="form-group">
            <label>Id Kendaraan</label>
            <input type="int" class="form-control" value="<?php echo $id_kendaraan; ?>" name="id_kendaraan" placeholder="IdKendaraan" readonly>
    </div>
    <div class="form-group">
            <label>Tanggal Servis<label>
            <input type="date" class="form-control" value="<?php echo $tanggal_servis; ?>" name="tanggal_servis" placeholder="TanggalServis">
    </div>
    <div class="form-group">
            <label>Deskripsi<label>
            <input type="varchar" class="form-control" value="<?php echo $deskripsi; ?>" name="deskripsi" placeholder="Deskripsi">
    </div>
    <div class="form-group">
            <label>Biaya Servis<label>
            <input type="varchar" class="form-control" value="<?php echo $biaya_servis; ?>" name="biaya_servis" placeholder="BiayaServis">
    </div>
    <div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary"><?php echo $cap; ?></button>
        <input type="hidden" name="mode" value="<?php echo $mode; ?>" />
    </div>
</form>