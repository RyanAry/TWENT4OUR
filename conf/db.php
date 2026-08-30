<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Include helper functions
include_once __DIR__ . '/functions.php';

$host = "localhost";
$username = "root";
$pass = "";
$database = "traveloka_clone";

$db = new mysqli($host, $username, $pass, $database);

if ($db->connect_error) {
    die("Koneksi database gagal: " . $db->connect_error);
}

// Set charset untuk keamanan
$db->set_charset("utf8mb4");
?>