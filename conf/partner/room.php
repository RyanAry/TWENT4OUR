<?php
include '../../../conf/db.php';

if (isset($_POST['delete'])) {
    $id = intval($_POST['id']);

    $stmt = $db->prepare("DELETE FROM `room` WHERE `id_room` = ?");
    $stmt->bind_param("i", $id);
    $delete = $stmt->execute();
    $stmt->close();

    if ($delete) {
        setAlert('Success', 'Room berhasil dihapus');
    } else {
        setAlert('Error', 'Room gagal dihapus');
    }
} else if (isset($_POST['edit'])) {
    $id = intval($_POST['id']);
    $nama = sanitize($_POST['nama']);
    $tipe = sanitize($_POST['tipe']);
    $harga = intval($_POST['harga']);
    $deskripsi = sanitize($_POST['deskripsi']);

    $stmt = $db->prepare("UPDATE `room` SET `nama` = ?, `tipe` = ?, `harga` = ?, `deskripsi` = ? WHERE `id_room` = ?");
    $stmt->bind_param("ssisi", $nama, $tipe, $harga, $deskripsi, $id);
    $edit = $stmt->execute();
    $stmt->close();

    if ($edit) {
        setAlert('Success', 'Room berhasil diubah');
    } else {
        setAlert('Error', 'Room gagal diubah');
    }
}

$email = $_SESSION['email'];

$stmt = $db->prepare("SELECT * FROM `partner_admin` WHERE `email` = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$row_akomodasi = $stmt->get_result()->fetch_assoc();
$stmt->close();

$stmt = $db->prepare("SELECT * FROM `room` WHERE `id_akomodasi` = ?");
$stmt->bind_param("i", $row_akomodasi['id_akomodasi']);
$stmt->execute();
$select_room = $stmt->get_result();
$stmt->close();
?>