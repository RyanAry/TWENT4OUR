<?php
include '../../inc/dashboard/partner/inc_main.php';
?>
<div class="p-4 sm:ml-64">
    <div class="main py-10">
        <div class="header pt-10 sm:pt-0">
            <h1 class="font-bold text-2xl sm:text-3xl md:text-xl lg:text-2xl xl:text-3xl  font-gatwick uppercase">Create Rooms</h1>
            <p class="font-semibold font-montserrat">Partner</p>
            <hr class="mb-4 border-t-4">
        </div>
        <form action="../../../conf/partner/create_room.php" method="POST" enctype="multipart/form-data">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="space-y-4">
                    <input type="text" name="id_akomodasi" value="<?php echo $data_admin['id_akomodasi']?>" hidden>
                    <div>
                        <label for="nama" class="block text-sm font-semibold font-montserrat text-gray-700">Room Name</label>
                        <input type="text" name="nama" id="nama" class="w-full border border-gray-300 p-2 rounded-md focus:ring-blue-500 focus:border-blue-500" required>
                    </div>
                    <div>
                        <label for="tipe" class="block text-sm font-semibold font-montserrat text-gray-700">Room Type</label>
                        <input type="text" name="tipe" id="tipe" class="w-full border border-gray-300 p-2 rounded-md focus:ring-blue-500 focus:border-blue-500" required>
                    </div>
                    <div>
                        <label for="harga" class="block text-sm font-semibold font-montserrat text-gray-700">Room Price</label>
                        <input type="number" name="harga" id="harga" class="w-full border border-gray-300 p-2 rounded-md focus:ring-blue-500 focus:border-blue-500" required>
                    </div>
                    <div>
                        <label for="deskripsi" class="block text-sm font-semibold font-montserrat text-gray-700">Room Description</label>
                        <textarea name="deskripsi" id="deskripsi" class="w-full border border-gray-300 p-2 rounded-md focus:ring-blue-500 focus:border-blue-500" required></textarea>
                    </div>
                    <div>
                        <label for="gambar" class="block text-sm font-semibold font-montserrat text-gray-700 pb-2">Room Image</label>
                        <input name="gambar" id="gambar" type="file" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                    </div>
                    <div>
                        <button type="submit" name="create" class="w-full bg-blue-500 text-white p-2 rounded-md hover:bg-blue-600 focus:ring-4 focus:ring-blue-300">Create Room</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php
include '../../inc/alert.php';
include '../../inc/dashboard/inc_footer.php';
?>