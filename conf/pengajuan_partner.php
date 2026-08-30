<?php
include 'db.php';

if (isset($_POST['submit'])) {
    $akomodasi = sanitize($_POST['akomodasi']);
    $nama_akomodasi = sanitize($_POST['nama_akomodasi']);
    $email_perusahaan = sanitize($_POST['email']);
    $alamat = sanitize($_POST['alamat']);
    $provinsi = sanitize($_POST['provinsi']);
    $kota = sanitize($_POST['kota']);

    // Cek duplikat di pengajuan_partner
    $stmt = $db->prepare("SELECT * FROM `pengajuan_partner` WHERE nama_akomodasi = ? OR email_perusahaan = ?");
    $stmt->bind_param("ss", $nama_akomodasi, $email_perusahaan);
    $stmt->execute();
    $cek_data = $stmt->get_result();
    $stmt->close();

    // Cek duplikat di partner
    $stmt = $db->prepare("SELECT * FROM `partner` WHERE nama_akomodasi = ? OR email_perusahaan = ?");
    $stmt->bind_param("ss", $nama_akomodasi, $email_perusahaan);
    $stmt->execute();
    $cek_data_partner = $stmt->get_result();
    $stmt->close();

    if ($cek_data->num_rows > 0 || $cek_data_partner->num_rows > 0) {
        setAlert('Error', 'Akomodasi Sudah Terdaftar');
        redirect("../public/pages/pengajuan_partner.php");
    } else {
        $stmt = $db->prepare("INSERT INTO `pengajuan_partner`(`akomodasi`, `nama_akomodasi`, `email_perusahaan`, `alamat`, `provinsi`, `kota`) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $akomodasi, $nama_akomodasi, $email_perusahaan, $alamat, $provinsi, $kota);
        $insert = $stmt->execute();
        $stmt->close();

        if ($insert) {
            setAlert('Success', 'Akomodasi Berhasil Di Daftarkan');
        } else {
            setAlert('Error', 'Pendaftaran gagal, silakan coba lagi');
        }
        redirect("../public/pages/pengajuan_partner.php");
    }
}
?>
