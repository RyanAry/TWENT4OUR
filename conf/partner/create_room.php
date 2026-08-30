<?php
include '../db.php';

if (isset($_POST['create'])) {
    $id_akomodasi = intval($_POST['id_akomodasi']);
    $nama = sanitize($_POST['nama']);
    $tipe = sanitize($_POST['tipe']);
    $harga = intval($_POST['harga']);
    $deskripsi = sanitize($_POST['deskripsi']);

    // Upload gambar room
    $new_name = uploadFile($_FILES['gambar'], "../../asset/room/");

    if ($new_name === false) {
        setAlert('Error', 'Gagal upload gambar. Pastikan file berupa gambar (max 5MB).');
        redirect('../../public/pages/partner/create_room.php');
    }

    $stmt = $db->prepare("INSERT INTO room (id_akomodasi, nama, tipe, harga, deskripsi, gambar) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ississ", $id_akomodasi, $nama, $tipe, $harga, $deskripsi, $new_name);
    $insert = $stmt->execute();
    $stmt->close();

    if ($insert) {
        setAlert('Success', 'Room created successfully');
    } else {
        setAlert('Error', 'Failed to create room');
    }
    redirect('../../public/pages/partner/create_room.php');
}
?>