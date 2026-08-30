<?php
include '../../conf/db.php';

requireLogin();

$id_room = intval($_GET['id']);
$username = $_SESSION['username'];

// Data user
$stmt = $db->prepare("SELECT * FROM user WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$data_user = $stmt->get_result()->fetch_assoc();
$stmt->close();

// Data room
$stmt = $db->prepare("SELECT * FROM `room` WHERE id_room = ?");
$stmt->bind_param("i", $id_room);
$stmt->execute();
$data_room = $stmt->get_result()->fetch_assoc();
$stmt->close();

// Data partner
$stmt = $db->prepare("SELECT * FROM `partner` WHERE id_partner = ?");
$stmt->bind_param("i", $data_room['id_akomodasi']);
$stmt->execute();
$data_partner = $stmt->get_result()->fetch_assoc();
$stmt->close();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $checkin = sanitize($_POST['checkin']);
    $checkout = sanitize($_POST['checkout']);

    $checkinDate = new DateTime($checkin);
    $checkoutDate = new DateTime($checkout);
    $interval = $checkinDate->diff($checkoutDate);
    $daysDifference = $interval->days;
    $totalhargaroom = $daysDifference * $data_room['harga'];
}

if (isset($_POST['book'])) {
    $nama = sanitize($_POST['nama']);
    $email = sanitize($_POST['email']);
    $phone = sanitize($_POST['phone']);
    $checkin = sanitize($_POST['checkin']);
    $checkout = sanitize($_POST['checkout']);

    // Upload bukti bayar
    $new_name = uploadFile($_FILES['gambar'], "../../asset/bukti/");

    if ($new_name === false) {
        setAlert('Error', 'Gagal upload bukti pembayaran. Pastikan file berupa gambar (max 5MB).');
    } else {
        $stmt = $db->prepare("INSERT INTO `booking`(`id_akomodasi`, `id_room`, `id_user`, `nama_kamar`, `tipe_kamar`, `nama_tamu`, `email`, `no_tlp`, `check_in`, `check_out`, `bukti_bayar`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param(
            "iiissssssss",
            $data_room['id_akomodasi'],
            $data_room['id_room'],
            $data_user['id_user'],
            $data_room['nama'],
            $data_room['tipe'],
            $nama,
            $email,
            $phone,
            $checkin,
            $checkout,
            $new_name
        );
        $insert = $stmt->execute();
        $stmt->close();

        if ($insert) {
            setAlert('Success', 'Booking Success!');
        } else {
            setAlert('Error', 'Booking Failed!');
        }
    }
}
?>
