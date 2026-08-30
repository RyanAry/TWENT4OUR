<?php
include '../../../conf/db.php';

if (isset($_POST['submit'])) {
    $id = intval($_POST['id']);
    $nama = sanitize($_POST['nama']);
    $email = sanitize($_POST['email']);
    $alamat = sanitize($_POST['alamat']);
    $provinsi = sanitize($_POST['provinsi']);
    $kota = sanitize($_POST['kota']);
    $deskripsi = sanitize($_POST['deskripsi']);

    // Upload gambar hotel
    $new_name = uploadFile($_FILES['gambar'], "../../../asset/hotel/");

    if ($new_name !== false) {
        // Update dengan gambar baru
        $stmt = $db->prepare("UPDATE `partner` SET `nama_akomodasi` = ?, `email_perusahaan` = ?, `alamat` = ?, `provinsi` = ?, `kota` = ?, `deskripsi` = ?, `gambar` = ? WHERE `id_partner` = ?");
        $stmt->bind_param("sssssssi", $nama, $email, $alamat, $provinsi, $kota, $deskripsi, $new_name, $id);
    } else {
        // Update tanpa gambar (jika tidak upload gambar baru)
        $stmt = $db->prepare("UPDATE `partner` SET `nama_akomodasi` = ?, `email_perusahaan` = ?, `alamat` = ?, `provinsi` = ?, `kota` = ?, `deskripsi` = ? WHERE `id_partner` = ?");
        $stmt->bind_param("ssssssi", $nama, $email, $alamat, $provinsi, $kota, $deskripsi, $id);
    }

    $update = $stmt->execute();
    $stmt->close();

    if ($update) {
        setAlert('Success', 'Data berhasil diubah');
    } else {
        setAlert('Error', 'Data gagal diubah');
    }
}

$email = $_SESSION['email'];

$stmt = $db->prepare("SELECT * FROM `partner_admin` WHERE `email` = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$row_akomodasi = $stmt->get_result()->fetch_assoc();
$stmt->close();

$stmt = $db->prepare("SELECT * FROM `partner` WHERE `id_partner` = ?");
$stmt->bind_param("i", $row_akomodasi['id_akomodasi']);
$stmt->execute();
$select_partner = $stmt->get_result();
$stmt->close();
?>
