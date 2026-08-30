<?php
include 'db.php';

if (isset($_POST['submit'])) {
    $nama = sanitize($_POST['name']);
    $email = sanitize($_POST['email']);
    $username = sanitize($_POST['username']);
    $pass = $_POST['password'];

    // Cek data duplikat
    $stmt = $db->prepare("SELECT * FROM `user` WHERE username = ? OR email = ?");
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $cek_data = $stmt->get_result();
    $stmt->close();

    if ($cek_data->num_rows > 0) {
        $_SESSION['error'] = "Email Atau Username Sudah Terdaftar";
        redirect("../public/pages/signup.php");
    } else {
        $stmt = $db->prepare("INSERT INTO `user`(`nama`, `email`, `username`, `password`) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nama, $email, $username, $pass);
        $regis = $stmt->execute();
        $stmt->close();

        if ($regis) {
            redirect("../public/pages/login.php");
        } else {
            $_SESSION['error'] = "Registrasi gagal, silakan coba lagi";
            redirect("../public/pages/signup.php");
        }
    }
}
?>
