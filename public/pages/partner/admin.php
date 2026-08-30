<?php
include '../../inc/dashboard/partner/inc_main.php';
include '../../../conf/partner/admin.php';
?>
<div class="p-4 sm:ml-64">
    <div class="main py-10">
        <div class="header pt-10 sm:pt-0">
            <h1 class="font-bold text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-3xl font-gatwick uppercase">Daftar Admin</h1>
            <p class="font-semibold font-montserrat">Partner</p>
            <hr class="mb-4 border-t-4">
        </div>
        <div class="content">
            <!-- component -->
            <div class="flex items-center justify-center">
                <div class="overflow-x-auto">
                    <!-- add admin -->
                    <div class="add-admin py-2">
                        <button data-modal-target="popup-modal-add_admin" data-modal-toggle="popup-modal-add_admin" class="block text-white bg-green-500 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ml-auto" type="button">
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                            </svg>
                        </button>
                    </div>
                    <table class="min-w-full bg-white shadow-md rounded-xl">
                        <thead class="font-poppins">
                            <tr class="bg-blue-gray-100 text-gray-700">
                                <th class="py-3 px-4 text-left">Nama</th>
                                <th class="py-3 px-4 text-left">Username</th>
                                <th class="py-3 px-4 text-left">Email</th>
                                <th class="py-3 px-4 text-left">Role</th>
                                <th class="py-3 px-4 text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody class="font-montserrat">
                            <?php while ($admin = mysqli_fetch_array($select_admin)) { ?>
                                <tr>
                                    <td class="border-b border-gray-200 py-3 px-4"><?php echo $admin['nama'] ?></td>
                                    <td class="border-b border-gray-200 py-3 px-4"><?php echo $admin['username'] ?></td>
                                    <td class="border-b border-gray-200 py-3 px-4 text-blue-500">
                                        <a href="mailto:<?php echo $admin['email'] ?>"><?php echo $admin['email'] ?></a>
                                    </td>
                                    <td class="border-b border-gray-200 py-3 px-4"><?php echo $admin['role'] ?></td>
                                    <td>
                                        <div class="flex justify-center space-x-2">
                                            <button data-modal-target="popup-modal-edit<?php echo $admin['id_admin']; ?>" data-modal-toggle="popup-modal-edit<?php echo $admin['id_admin']; ?>" class="block text-white bg-green-500 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button">
                                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                                </svg>
                                            </button>
                                            <button data-modal-target="popup-modal-delete<?php echo $admin['id_admin'] ?>" data-modal-toggle="popup-modal-delete<?php echo $admin['id_admin'] ?>" class="block text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button">
                                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                </svg>
                                            </button>
                                            <a href="mailto:<?php echo $admin['email']; ?>">
                                                <button type="button" class="block text-white bg-yellow-500 hover:bg-yellow-700 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                                                    </svg>
                                                </button>
                                            </a>
                                        </div>
                                    </td>
                                    <!-- modal delete -->
                                    <div id="popup-modal-delete<?php echo $admin['id_admin'] ?>" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative p-4 w-full max-w-md max-h-full">
                                            <div class="relative bg-white rounded-lg shadow">
                                                <div class="p-8 md:p-5 text-center">
                                                    <svg class="mx-auto mb-4 text-gray-700 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                    </svg>
                                                    <h3 class="mb-5 text-lg font-montserrat text-black">Anda yakin ingin menghapus Admin ini?</h3>
                                                    <form action="" method="post">
                                                        <input type="text" name="id" value="<?php echo $admin['id_admin'] ?>" hidden>
                                                        <button name="delete" data-modal-hide="popup-modal-delete<?php echo $admin['id_admin'] ?>" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                            Yes
                                                        </button>
                                                        <button data-modal-hide="popup-modal-delete<?php echo $admin['id_admin'] ?>" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-700 hover:border-gray-200 hover:bg-gray-200 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Cancel</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- modal Edit -->
                                    <div id="popup-modal-edit<?php echo $admin['id_admin']; ?>" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative p-4 w-full max-w-md max-h-full">
                                            <!-- Modal content -->
                                            <div class="relative bg-white rounded-lg shadow">
                                                <!-- Modal header -->
                                                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                                                    <h3 class="text-xl font-semibold text-gray-900">
                                                        Edit Admin
                                                    </h3>
                                                    <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="popup-modal-edit<?php echo $admin['id_admin']; ?>">
                                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1l6 6m0 0l6 6M7 7l6-6M7 7l-6 6" />
                                                        </svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                </div>
                                                <!-- Modal body -->
                                                <div class="p-4 md:p-5">
                                                    <form class="space-y-4" action="" method="post">
                                                        <input type="hidden" name="id" value="<?php echo $admin['id_admin']; ?>">
                                                        <div>
                                                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                                                            <input type="email" name="email" id="email" value="<?php echo $admin['email']; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
                                                        </div>
                                                        <div>
                                                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama</label>
                                                            <input type="text" name="nama" id="nama" value="<?php echo $admin['nama']; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
                                                        </div>
                                                        <div>
                                                            <label for="username" class="block mb-2 text-sm font-medium text-gray-900">Username</label>
                                                            <input type="text" name="username" id="username" value="<?php echo $admin['username']; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
                                                        </div>
                                                        <div>
                                                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                                                            <input type="password" name="password" id="password" value="<?php echo $admin['password']; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
                                                        </div>
                                                        <div>
                                                            <label for="role" class="block mb-2 text-sm font-medium text-gray-900">Role</label>
                                                            <select name="role" class="block w-full mb-2 text-sm font-medium text-gray-900 bg-white border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5" name="" id="">
                                                                <option value="admin">Admin</option>
                                                                <option value="petugas">Petugas</option>
                                                            </select>
                                                        </div>
                                                        <button type="submit" name="edit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">OK</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                                <!-- Modal add_admin -->
                                <div id="popup-modal-add_admin" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative p-4 w-full max-w-md max-h-full">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded-lg shadow">
                                            <!-- Modal header -->
                                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                                                <h3 class="text-xl font-semibold text-gray-900">
                                                    Add Admin
                                                </h3>
                                                <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="popup-modal-add_admin">
                                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1l6 6m0 0l6 6M7 7l6-6M7 7l-6 6" />
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="p-4 md:p-5">
                                                <form class="space-y-4" action="" method="post">
                                                <input type="hidden" name="id_akomodasi" value="<?php echo $admin['id_akomodasi']?>">
                                                    <div>
                                                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                                                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
                                                    </div>
                                                    <div>
                                                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama</label>
                                                        <input type="text" name="nama" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
                                                    </div>
                                                    <div>
                                                        <label for="username" class="block mb-2 text-sm font-medium text-gray-900">Username</label>
                                                        <input type="text" name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
                                                    </div>
                                                    <div>
                                                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                                                        <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
                                                    </div>
                                                    <div>
                                                        <label for="role" class="block mb-2 text-sm font-medium text-gray-900">Role</label>
                                                        <select name="role" class="block w-full mb-2 text-sm font-medium text-gray-900 bg-white border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5" id="role" required> <!-- Fix: Added `required` attribute to ensure a value is selected -->
                                                            <option value="admin">Admin</option>
                                                            <option value="petugas">Petugas</option>
                                                        </select>
                                                    </div>
                                                    <button type="submit" name="add" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">OK</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include '../../inc/alert.php';
include '../../inc/dashboard/inc_footer.php';
?>