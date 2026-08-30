<?php
include '../../conf/db.php';

requireLogin();

$username = $_SESSION['username'];

$stmt = $db->prepare("SELECT * FROM user WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$data_user = $stmt->get_result()->fetch_assoc();
$stmt->close();

$stmt = $db->prepare("SELECT * FROM `booking` WHERE id_user = ?");
$stmt->bind_param("i", $data_user['id_user']);
$stmt->execute();
$select_booking = $stmt->get_result();
$stmt->close();
?>