<?php
include '../../../conf/db.php';

$stmt = $db->prepare("SELECT * FROM `partner_admin` WHERE `role` = 'admin'");
$stmt->execute();
$select_partner_admin = $stmt->get_result();
$stmt->close();
?>