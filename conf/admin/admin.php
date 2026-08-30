<?php
include '../../../conf/db.php';

if (isset($_POST['edit'])) {
    $id = intval($_POST['id']);
    $nama = sanitize($_POST['nama']);
    $username = sanitize($_POST['username']);
    $password = $_POST['password'];
    $email = sanitize($_POST['email']);
    $role = sanitize($_POST['role']);

    // Cek duplikat email (kecuali milik sendiri)
    $stmt = $db->prepare("SELECT * FROM `app_admin` WHERE `email` = ? AND `id` != ?");
    $stmt->bind_param("si", $email, $id);
    $stmt->execute();
    $cek = $stmt->get_result();
    $stmt->close();

    if ($cek->num_rows > 0) {
        setAlert('Error', 'Data email atau username sudah ada');
    } else {
        $stmt = $db->prepare("UPDATE `app_admin` SET `nama`=?, `username`=?, `password`=?, `email`=?, `role`=? WHERE `id`=?");
        $stmt->bind_param("sssssi", $nama, $username, $password, $email, $role, $id);
        $edit = $stmt->execute();
        $stmt->close();

        if ($edit) {
            setAlert('Success', 'Data berhasil diubah');
        } else {
            setAlert('Error', 'Data gagal diubah');
        }
    }
} else if (isset($_POST['delete'])) {
    $id = intval($_POST['id']);

    $stmt = $db->prepare("DELETE FROM `app_admin` WHERE `id` = ?");
    $stmt->bind_param("i", $id);
    $delete = $stmt->execute();
    $stmt->close();

    if ($delete) {
        setAlert('Success', 'Data berhasil dihapus');
    } else {
        setAlert('Error', 'Data gagal dihapus');
    }
} else if (isset($_POST['add'])) {
    $nama = sanitize($_POST['nama']);
    $username = sanitize($_POST['username']);
    $password = $_POST['password'];
    $email = sanitize($_POST['email']);
    $role = sanitize($_POST['role']);

    // Cek duplikat
    $stmt = $db->prepare("SELECT * FROM `app_admin` WHERE `username` = ? OR `email` = ?");
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $cek = $stmt->get_result();
    $stmt->close();

    if ($cek->num_rows > 0) {
        setAlert('Error', 'Data email atau username sudah ada');
    } else {
        $stmt = $db->prepare("INSERT INTO `app_admin`(`nama`, `username`, `password`, `email`, `role`) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $nama, $username, $password, $email, $role);
        $add = $stmt->execute();
        $stmt->close();

        if ($add) {
            setAlert('Success', 'Data berhasil ditambahkan');
        } else {
            setAlert('Error', 'Data gagal ditambahkan');
        }
    }
}

$query_admin = "SELECT * FROM `app_admin`";
$select_admin = $db->query($query_admin);
?>