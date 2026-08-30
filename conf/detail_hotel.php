<?php
include '../../conf/db.php';

$id = intval($_GET['id']);

$stmt = $db->prepare("SELECT * FROM `partner` WHERE id_partner = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$select = $stmt->get_result();
$stmt->close();

$stmt = $db->prepare("SELECT * FROM `room` WHERE id_akomodasi = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$select_room = $stmt->get_result();
$stmt->close();
?>