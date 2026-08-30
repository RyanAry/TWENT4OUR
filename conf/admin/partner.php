<?php
include '../../../conf/db.php';

if (isset($_POST['add'])) {
    $id_akomodasi = intval($_POST['id']);
    $email = sanitize($_POST['email']);
    $name = sanitize($_POST['nama']);
    $username = sanitize($_POST['username']);
    $password = $_POST['password'];

    // Cek duplikat
    $stmt = $db->prepare("SELECT * FROM `partner_admin` WHERE username = ? AND id_akomodasi = ?");
    $stmt->bind_param("si", $username, $id_akomodasi);
    $stmt->execute();
    $data_admin_partner = $stmt->get_result();
    $stmt->close();

    if ($data_admin_partner->num_rows > 0) {
        setAlert('Error', 'Email atau username sudah terdaftar');
    } else {
        $stmt = $db->prepare("INSERT INTO `partner_admin`(`id_akomodasi`, `nama`, `username`, `password`, `email`) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("issss", $id_akomodasi, $name, $username, $password, $email);
        $insert = $stmt->execute();
        $stmt->close();

        if ($insert) {
            setAlert('Success', 'Data berhasil ditambahkan');
        } else {
            setAlert('Error', 'Data gagal ditambahkan');
        }
    }
} else if (isset($_POST['delete'])) {
    $id = intval($_POST['id']);

    // Delete partner
    $stmt = $db->prepare("DELETE FROM `partner` WHERE id_partner = ?");
    $stmt->bind_param("i", $id);
    $delete_partner = $stmt->execute();
    $stmt->close();

    // Delete partner_admin
    $stmt = $db->prepare("DELETE FROM `partner_admin` WHERE id_akomodasi = ?");
    $stmt->bind_param("i", $id);
    $delete_admin = $stmt->execute();
    $stmt->close();

    if ($delete_partner && $delete_admin) {
        setAlert('Success', 'Data berhasil dihapus');
    } else {
        setAlert('Error', 'Data gagal dihapus');
    }
}

$query_select = "SELECT * FROM `partner`";
$select = $db->query($query_select);
?>