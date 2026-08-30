<?php
include 'db.php';

if (isset($_POST['submit'])) {
    $email = sanitize($_POST['email']);
    $password = $_POST['password'];

    // Cek database user
    $stmt = $db->prepare("SELECT * FROM `user` WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $user = $stmt->get_result();
    $data = $user->fetch_assoc();
    $stmt->close();

    // Cek database admin app
    $stmt = $db->prepare("SELECT * FROM `app_admin` WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $admin_app = $stmt->get_result();
    $data_admin_app = $admin_app->fetch_assoc();
    $stmt->close();

    // Cek database admin partner
    $stmt = $db->prepare("SELECT * FROM `partner_admin` WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $partner_admin = $stmt->get_result();
    $data_partner = $partner_admin->fetch_assoc();
    $stmt->close();

    if ($user->num_rows > 0) {
        $_SESSION['username'] = $data['username'];
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['email'] = $email;
        redirect("../public/pages/index.php");
    } else if ($admin_app->num_rows > 0) {
        $_SESSION['username'] = $data_admin_app['username'];
        $_SESSION['nama'] = $data_admin_app['nama'];
        $_SESSION['email'] = $email;
        redirect("../public/pages/admin/index.php");
    } else if ($partner_admin->num_rows > 0) {
        $_SESSION['username'] = $data_partner['username'];
        $_SESSION['nama'] = $data_partner['nama'];
        $_SESSION['email'] = $email;
        redirect("../public/pages/partner/index.php");
    } else {
        $_SESSION['error'] = "Username or Password is incorrect";
        redirect("../public/pages/login.php");
    }
}
?>