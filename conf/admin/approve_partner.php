<?php
include '../../../conf/db.php';

if (isset($_POST['approve'])) {
    $id = intval($_POST['id']);

    // Get data partner dari pengajuan
    $stmt = $db->prepare("SELECT * FROM `pengajuan_partner` WHERE `id_pengajuan` = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $data_partner = $stmt->get_result()->fetch_assoc();
    $stmt->close();

    if (!$data_partner) {
        setAlert('Error', 'Data pengajuan tidak ditemukan');
        redirect("approve_partner.php");
    }

    $akomodasi = $data_partner['akomodasi'];
    $nama_akomodasi = $data_partner['nama_akomodasi'];
    $email_perusahaan = $data_partner['email_perusahaan'];
    $alamat = $data_partner['alamat'];
    $provinsi = $data_partner['provinsi'];
    $kota = $data_partner['kota'];

    // Cek duplikat di tabel partner
    $stmt = $db->prepare("SELECT * FROM `partner` WHERE `nama_akomodasi` = ? OR `email_perusahaan` = ?");
    $stmt->bind_param("ss", $nama_akomodasi, $email_perusahaan);
    $stmt->execute();
    $cek_partner = $stmt->get_result();
    $stmt->close();

    if ($cek_partner->num_rows > 0) {
        setAlert('Error', 'Data sudah ada');
        redirect("approve_partner.php");
    } else {
        // Insert ke tabel partner
        $stmt = $db->prepare("INSERT INTO `partner` (`akomodasi`, `nama_akomodasi`, `email_perusahaan`, `alamat`, `provinsi`, `kota`) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $akomodasi, $nama_akomodasi, $email_perusahaan, $alamat, $provinsi, $kota);
        $insert_partner = $stmt->execute();
        $stmt->close();

        // Delete dari pengajuan
        $stmt = $db->prepare("DELETE FROM `pengajuan_partner` WHERE `id_pengajuan` = ?");
        $stmt->bind_param("i", $id);
        $delete = $stmt->execute();
        $stmt->close();

        if ($insert_partner && $delete) {
            setAlert('Success', 'Data berhasil diapprove');
        } else {
            setAlert('Error', 'Data gagal diapprove');
        }
        redirect("approve_partner.php");
    }
} else if (isset($_POST['delete'])) {
    $id = intval($_POST['id']);

    $stmt = $db->prepare("DELETE FROM `pengajuan_partner` WHERE `id_pengajuan` = ?");
    $stmt->bind_param("i", $id);
    $delete = $stmt->execute();
    $stmt->close();

    if ($delete) {
        setAlert('Success', 'Data berhasil dihapus');
    } else {
        setAlert('Error', 'Data gagal dihapus');
    }
    redirect("approve_partner.php");
}

$query_select = "SELECT * FROM `pengajuan_partner`";
$select = $db->query($query_select);
?>