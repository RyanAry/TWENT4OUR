<?php
include 'db.php';

$query_select_akomodasi = "SELECT * FROM `partner`";
$select_akomodasi = $db->query($query_select_akomodasi);
?>