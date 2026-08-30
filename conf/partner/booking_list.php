<?php
include '../../../conf/db.php';

if (isset($_POST['approve'])) {
    $id = intval($_POST['id']);

    $stmt = $db->prepare("UPDATE `booking` SET status = 'diterima' WHERE id_booking = ?");
    $stmt->bind_param("i", $id);
    $update = $stmt->execute();
    $stmt->close();

    if ($update) {
        // Get booking data untuk update room status
        $stmt = $db->prepare("SELECT * FROM `booking` WHERE id_booking = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $data_booking = $stmt->get_result()->fetch_assoc();
        $stmt->close();

        $stmt = $db->prepare("UPDATE `room` SET `status`='tidak_tersedia' WHERE id_room = ?");
        $stmt->bind_param("i", $data_booking['id_room']);
        $stmt->execute();
        $stmt->close();

        setAlert('Success', 'Berhasil Approve');
    } else {
        setAlert('Error', 'Gagal Approve');
    }
} else if (isset($_POST['reject'])) {
    $id = intval($_POST['id']);
    $alasan = sanitize($_POST['alasan']);

    $stmt = $db->prepare("UPDATE `booking` SET status = 'ditolak', `alasan` = ? WHERE id_booking = ?");
    $stmt->bind_param("si", $alasan, $id);
    $update = $stmt->execute();
    $stmt->close();

    if ($update) {
        setAlert('Success', 'Berhasil Reject');
    } else {
        setAlert('Error', 'Gagal Reject');
    }
} else if (isset($_POST['delete'])) {
    $id = intval($_POST['id']);

    // Get booking data untuk update room status
    $stmt = $db->prepare("SELECT * FROM `booking` WHERE id_booking = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $data_booking = $stmt->get_result()->fetch_assoc();
    $stmt->close();

    // Set room kembali tersedia
    $stmt = $db->prepare("UPDATE `room` SET `status`='tersedia' WHERE id_room = ?");
    $stmt->bind_param("i", $data_booking['id_room']);
    $stmt->execute();
    $stmt->close();

    // Delete booking
    $stmt = $db->prepare("DELETE FROM `booking` WHERE id_booking = ?");
    $stmt->bind_param("i", $id);
    $delete = $stmt->execute();
    $stmt->close();

    if ($delete) {
        setAlert('Success', 'Berhasil Delete');
    } else {
        setAlert('Error', 'Gagal Delete');
    }
}

$email = $_SESSION['email'];

$stmt = $db->prepare("SELECT * FROM `partner_admin` WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$data_user = $stmt->get_result()->fetch_assoc();
$stmt->close();

$stmt = $db->prepare("SELECT * FROM `booking` WHERE id_akomodasi = ?");
$stmt->bind_param("i", $data_user['id_akomodasi']);
$stmt->execute();
$select_booking = $stmt->get_result();
$stmt->close();
?>