<?php
include '../../conf/db.php';
error_reporting(0);

$email = $_SESSION['email'];
$username = $_SESSION['username'];

$stmt = $db->prepare("SELECT * FROM user WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$user = $stmt->get_result();
$data_admin = $user->fetch_assoc();
$stmt->close();

if ($email == "" || $user->num_rows == 0) {
    $_SESSION['status'] = 'Error';
    $_SESSION['error_msg'] = 'Anda harus login terlebih dahulu sebelum melakukan booking';
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <!-- alpinejs -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- flowbite -->
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css"  rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>

    <!-- sweet aleart -->
    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>TWENT4OUR</title>
</head>

<body class="h-screen bg-gray-100">
    <div class="app">
        <header>
            <div class="min-h-full">
                <nav class="bg-primary" x-data="{ isOpen: false }">
                    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                        <div class="flex h-16 items-center justify-between">
                            <div class="flex items-center">
                                <a href="index.php">
                                    <div class="flex flex-shrink-0 gap-3">
                                        <img class="h-9 w-auto" src="../img/notext_logo.png" alt="Your Company">
                                        <p class="font-poppins text-white pt-1 text-2xl font-bold">TWENT4OUR</p>
                                    </div>
                                </a>
                                <div class="hidden md:block">
                                    <div class="ml-10 flex items-baseline space-x-4">
                                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                                        <a href="hotel.php" class="px-3 py-2 text-sm font-medium text-white">Hotel</a>
                                    </div>
                                </div>
                            </div>
                            <div class="hidden md:block">
                                <div class="ml-4 flex items-center md:ml-6">
                                    <!-- Profile dropdown -->
                                    <div class="relative ml-3">
                                        <div>
                                            <?php if (isset($_SESSION['username'])) {
                                                echo '<button @click="isOpen = !isOpen" type="button" class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                                <span class="absolute -inset-1.5"></span>
                                                <span class="sr-only">Open user menu</span>
                                                <svg class="w-8 h-8 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="24" height="24" style="display: block;">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                </svg>
                                                </button>';
                                            } else {
                                                echo '<a href="login.php" class="px-4 py-2 text-white">Sign In</a>';
                                                echo '<a href="signup.php" class="px-6 py-3 bg-transparent border-2 text-white hover:bg-white hover:text-primary transition duration-300 ease-in-out rounded-md">Sign Up</a>';
                                            } ?>
                                        </div>
                                        <div x-show="isOpen" x-transition:enter="transition ease-out duration-100 transform" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-75 transform" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                                            <!-- Active: "bg-gray-100", Not Active: "" -->
                                            <h1 class="block px-4 pt-2 text-sm text-gray-700 font-bold font-poppins"><?php echo $_SESSION['nama'] ?></h1>
                                            <p class="px-4 pb-3 text-sm text-gray-700 font-montserrat"><?php echo $_SESSION['email'] ?></p>
                                            <hr class="">
                                            <a href="pengajuan_partner.php" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Join Partner</a>
                                            <a href="booking_list.php" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">My Booking List</a>
                                            <a href="../../conf/logout.php" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="-mr-2 flex md:hidden">
                                <!-- Mobile menu button -->
                                <button @click="isOpen = !isOpen" type="button" class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" aria-controls="mobile-menu" aria-expanded="false">
                                    <span class="absolute -inset-0.5"></span>
                                    <span class="sr-only">Open main menu</span>
                                    <!-- Menu open: "hidden", Menu closed: "block" -->
                                    <svg :class="{'hidden': isOpen, 'block': !isOpen }" class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                                    </svg>
                                    <!-- Menu open: "block", Menu closed: "hidden" -->
                                    <svg :class="{'block': isOpen, 'hidden': !isOpen }" class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Mobile menu, show/hide based on menu state. -->
                    <div x-show="isOpen" class="md:hidden" id="mobile-menu">
                        <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
                            <a href="#" class="block px-3 py-2 text-base font-medium text-white">Hotel</a>
                        </div>
                        <div class="border-t border-gray-700 pb-3 pt-4">
                            <div class="flex items-center px-5">
                                <div class="flex-shrink-0">
                                    <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                </div>
                                <div class="ml-3">
                                    <div class="text-base font-medium leading-none text-white"><?php echo $_SESSION['nama'] ?></div>
                                    <div class="text-sm font-medium leading-none text-gray-400"><?php echo $_SESSION['email'] ?></div>
                                </div>
                            </div>
                            <div class="mt-3 space-y-1 px-2">
                                <a href="pengajuan_partner.php" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Join Partner</a>
                                <a href="booking_list.php" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">My Booking List</a>
                                <a href="../../conf/logout.php" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Sign out</a>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
    </div>
