<?php
include '../../inc/dashboard/partner/inc_main.php';
include '../../../conf/partner/room.php';
?>

<div class="p-4 sm:ml-64">
    <div class="main py-10">
        <div class="head-text">
            <h1 class="text-4xl font-gatwick font-semibold">Room</h1>
            <p class="text-xl">Hotel</p>
        </div>
        <div class="mt-5">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                <?php
                while ($row = mysqli_fetch_assoc($select_room)) {
                ?>
                    <div class="card">
                        <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow">
                            <img src="../../../asset/room/<?php echo $row['gambar'] ?>" alt="">
                            <div class="py-3 flex justify-between">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900"><?php echo $row['nama'] ?></h5>
                                <?php
                                if ($row['status'] == 'tersedia') {
                                ?>
                                    <p class="text-green-500 font-semibold">Tersedia</p>
                                <?php
                                } else {
                                ?>
                                    <p class="text-red-500 font-semibold">Tidak Tersedia</p>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="flex justify-between">
                                <div class="text-body">
                                    <p class="mb-3 font-normal text-gray-700"><?php echo $row['deskripsi']; ?></p>
                                </div>
                                <div class="text-body">
                                    <p class="mb-3 font-normal text-gray-700">Rp.<?php echo $row['harga']; ?></p>
                                </div>
                            </div>
                            <div class="button">
                                <button data-modal-target="popup-modal-edit<?php echo $row['id_room'] ?>" data-modal-toggle="popup-modal-edit<?php echo $row['id_room'] ?>" class="w-full block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-2" type="button">
                                    <div class="flex justify-center items-center">
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                        </svg>
                                    </div>
                                </button>
                                <button data-modal-target="popup-modal-delete<?php echo $row['id_room'] ?>" data-modal-toggle="popup-modal-delete<?php echo $row['id_room'] ?>" class="w-full block text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-2" type="button">
                                    <div class="flex justify-center items-center">
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- modal delete -->
                    <div id="popup-modal-delete<?php echo $row['id_room'] ?>" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-md max-h-full">
                            <div class="relative bg-white rounded-lg shadow">
                                <div class="p-8 md:p-5 text-center">
                                    <svg class="mx-auto mb-4 text-gray-700 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                    <h3 class="mb-5 text-lg font-montserrat text-black">Anda yakin ingin menghapus Room ini?</h3>
                                    <form action="" method="post">
                                        <!-- Fixed hidden input field and button types -->
                                        <input type="hidden" name="id" value="<?php echo $row['id_room'] ?>"> <!-- Fixed hidden input field here -->
                                        <button name="delete" data-modal-hide="popup-modal-delete<?php echo $row['id_room'] ?>" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                            Yes
                                        </button>
                                        <button data-modal-hide="popup-modal-delete<?php echo $row['id_room'] ?>" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-700 hover:border-gray-200 hover:bg-gray-200 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Cancel</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- modal Edit -->
                    <div id="popup-modal-edit<?php echo $row['id_room'] ?>" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-md max-h-full">
                            <div class="relative bg-white rounded-lg shadow">
                                <h1 class="text-center font-poppins pt-8">Edit Room</h1>
                                <form action="" method="post" class="p-8 md:p-5">
                                    <!-- Fixed hidden input field and button types -->
                                    <input type="hidden" name="id" value="<?php echo $row['id_room'] ?>">
                                    <label for="nama">Nama</label>
                                    <input type="text" name="nama" id="nama" value="<?php echo $row['nama'] ?>" class="w-full px-4 py-2 mb-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-300 focus:outline-none">
                                    <label for="nama">Tipe</label>
                                    <input type="text" name="tipe" id="tipe" value="<?php echo $row['tipe'] ?>" class="w-full px-4 py-2 mb-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-300 focus:outline-none">
                                    <label for="nama">Harga</label>
                                    <input type="number" name="harga" id="harga" value="<?php echo $row['harga'] ?>" class="w-full px-4 py-2 mb-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-300 focus:outline-none">
                                    <label for="nama">Deskripsi</label>
                                    <textarea name="deskripsi" id="deskripsi" class="w-full border border-gray-300 p-2 rounded-md focus:ring-blue-500 focus:border-blue-500"><?php echo $row['deskripsi']; ?></textarea>
                                    <div class="p-8 md:p-5 text-center">
                                        <button name="edit" data-modal-hide="popup-modal-edit<?php echo $row['id_room'] ?>" type="submit" class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                            OK
                                        </button>
                                        <button data-modal-hide="popup-modal-edit<?php echo $row['id_room'] ?>" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-700 hover:border-gray-200 hover:bg-gray-200 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php
include '../../inc/alert.php';
include '../../inc/dashboard/inc_footer.php';
?>