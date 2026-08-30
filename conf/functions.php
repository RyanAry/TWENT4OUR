<?php

/**
 * Sanitasi input user
 */
function sanitize($input)
{
    return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
}

/**
 * Set session alert (Success / Error)
 */
function setAlert($status, $msg)
{
    $_SESSION['status'] = $status;
    if ($status === 'Success') {
        $_SESSION['succes_msg'] = $msg;
    } else {
        $_SESSION['error_msg'] = $msg;
    }
}

/**
 * Redirect dan exit
 */
function redirect($url)
{
    header("Location: $url");
    exit();
}

/**
 * Cek apakah user sudah login
 */
function isLoggedIn()
{
    return isset($_SESSION['username']) && !empty($_SESSION['username']);
}

/**
 * Require login — redirect ke login jika belum
 */
function requireLogin($redirectUrl = '../../public/pages/login.php')
{
    if (!isLoggedIn()) {
        $_SESSION['error'] = 'Anda harus login terlebih dahulu';
        redirect($redirectUrl);
    }
}

/**
 * Upload file dengan validasi
 * @return string|false nama file baru jika berhasil, false jika gagal
 */
function uploadFile($file, $targetDir, $allowedExt = ['jpg', 'jpeg', 'png', 'gif', 'webp'])
{
    if (!isset($file['name']) || empty($file['name'])) {
        return false;
    }

    $fileName = $file['name'];
    $tmpName = $file['tmp_name'];
    $fileSize = $file['size'];

    // Validasi ukuran (max 5MB)
    if ($fileSize > 5 * 1024 * 1024) {
        return false;
    }

    // Validasi ekstensi
    $ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    if (!in_array($ext, $allowedExt)) {
        return false;
    }

    // Generate nama unik
    $newName = uniqid() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '', $fileName);
    $path = $targetDir . $newName;

    // Buat direktori jika belum ada
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0755, true);
    }

    if (move_uploaded_file($tmpName, $path)) {
        return $newName;
    }

    return false;
}
?>
