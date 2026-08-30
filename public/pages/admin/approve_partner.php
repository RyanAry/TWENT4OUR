<?php
include '../../../conf/admin/approve_partner.php';
include '../../inc/dashboard/admin/inc_main.php';
?>
<div class="p-4 sm:ml-64">
    <div class="main py-10">
        <div class="header pt-10 sm:pt-0">
            <h1 class="font-bold text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-4xl font-gatwick uppercase">Pengajuan Partner</h1>
            <p class="font-semibold font-montserrat">Partner</p>
            <hr class="mb-4 border-t-4">
        </div>
        <div class="content">
            <!-- component -->
            <div class="flex items-center justify-center">
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white shadow-md rounded-xl">
                        <thead class="font-poppins">
                            <tr class="bg-blue-gray-100 text-gray-700">
                                <th class="py-3 px-4 text-left">Tipe Akomodasi</th>
                                <th class="py-3 px-4 text-left">Nama</th>
                                <th class="py-3 px-4 text-left">Email</th>
                                <th class="py-3 px-4 text-left">Alamat</th>
                                <th class="py-3 px-4 text-left">Provinsi</th>
                                <th class="py-3 px-4 text-left">Kota</th>
                                <th class="py-3 px-4 text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody class="font-montserrat">
                            <?php while ($data = mysqli_fetch_array($select)) { ?>
                                <tr class="border-b border-blue-gray-200 hover:bg-gray-100">
                                    <td class="py-3 px-4"><?php echo $data['akomodasi'] ?></td>
                                    <td class="py-3 px-4"><?php echo $data['nama_akomodasi'] ?></td>
                                    <td class="py-3 px-4">
                                        <a class="text-blue-500 hover:underline" href="mailto:<?php echo $data['email_perusahaan'] ?>"><?php echo $data['email_perusahaan'] ?></a>
                                    </td>
                                    <td class="py-3 px-4"><?php echo $data['alamat'] ?></td>
                                    <td class="py-3 px-4"><?php echo $data['provinsi'] ?></td>
                                    <td class="py-3 px-4"><?php echo $data['kota'] ?></td>
                                    <td>
                                        <div class="flex justify-center space-x-2">
                                            <button data-modal-target="popup-modal-approve<?php echo $data['id_pengajuan'] ?>" data-modal-toggle="popup-modal-approve<?php echo $data['id_pengajuan'] ?>" class="block text-white bg-green-500 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button">
                                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                                </svg>
                                            </button>
                                            <button data-modal-target="popup-modal-delete<?php echo $data['id_pengajuan'] ?>" data-modal-toggle="popup-modal-delete<?php echo $data['id_pengajuan'] ?>" class="block text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button">
                                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                </svg>
                                            </button>
                                            <a href="mailto:<?php echo $data['email_perusahaan']; ?>">
                                                <button type="button" class="block text-white bg-yellow-500 hover:bg-yellow-700 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                                                    </svg>
                                                </button>
                                            </a>
                                        </div>

                                        <!-- modal delete -->
                                        <div id="popup-modal-delete<?php echo $data['id_pengajuan'] ?>" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                            <div class="relative p-4 w-full max-w-md max-h-full">
                                                <div class="relative bg-white rounded-lg shadow">
                                                    <div class="p-8 md:p-5 text-center">
                                                        <svg class="mx-auto mb-4 text-gray-700 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                        </svg>
                                                        <h3 class="mb-5 text-lg font-montserrat text-black">Anda yakin ingin menghapus partner ini?</h3>
                                                        <form action="" method="post">
                                                            <input type="text" name="id" value="<?php echo $data['id_pengajuan'] ?>" hidden>
                                                            <button name="delete" data-modal-hide="popup-modal-delete<?php echo $data['id_pengajuan'] ?>" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                                Yes
                                                            </button>
                                                            <button data-modal-hide="popup-modal-delete<?php echo $data['id_pengajuan'] ?>" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-700 hover:border-gray-200 hover:bg-gray-200 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Cancel</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- modal approve -->
                                        <div id="popup-modal-approve<?php echo $data['id_pengajuan'] ?>" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                            <div class="relative p-4 w-full max-w-md max-h-full">
                                                <div class="relative bg-white rounded-lg shadow">
                                                    <div class="p-8 md:p-5 text-center">
                                                        <svg class="mx-auto mb-4 text-gray-700 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                        </svg>
                                                        <h3 class="mb-5 text-lg font-montserrat text-black">Anda yakin ingin approve partner ini?</h3>
                                                        <form action="" method="post">
                                                            <input type="text" name="id" value="<?php echo $data['id_pengajuan'] ?>" hidden>
                                                            <button name="approve" data-modal-hide="popup-modal-approve<?php echo $data['id_pengajuan'] ?>" type="submit" class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                                Yes
                                                            </button>
                                                            <button data-modal-hide="popup-modal-approve<?php echo $data['id_pengajuan'] ?>" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-700 hover:border-gray-200 hover:bg-gray-200 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Cancel</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
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