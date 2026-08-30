<?php
include '../../inc/dashboard/partner/inc_main.php';
include '../../../conf/partner/about.php';
?>


<div class="p-4 sm:ml-64">
    <div class="main py-10">
        <div class="text-header">
            <h1 class="font-gatwick text-black font-bold text-4xl">About</h1>
            <p class="font-montserrat text-black font-semibold">Hotel</p>
        </div>
        <div class="form py-8">
            <?php
            $row_partner = mysqli_fetch_assoc($select_partner);
            ?>
            <form action="" method="post" enctype="multipart/form-data">
                <input type="text" name="id" value="<?php echo $row_partner['id_partner'] ?>" hidden>
                <label for="nama">Nama</label>
                <input type="text" name="nama" value="<?php echo $row_partner['nama_akomodasi'] ?>" class="w-full px-4 py-2 mb-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-300 focus:outline-none">
                <label for="email">Email</label>
                <input type="email" name="email" value="<?php echo $row_partner['email_perusahaan'] ?>" class="w-full px-4 py-2 mb-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-300 focus:outline-none">
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" value="<?php echo $row_partner['alamat'] ?>" class="w-full px-4 py-2 mb-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-300 focus:outline-none">
                <label for="provinsi">Provinsi</label>
                <input type="text" name="provinsi" value="<?php echo $row_partner['provinsi'] ?>" class="w-full px-4 py-2 mb-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-300 focus:outline-none">
                <label for="kota">Kota</label>
                <input type="text" name="kota" value="<?php echo $row_partner['kota'] ?>" class="w-full px-4 py-2 mb-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-300 focus:outline-none">
                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" class="w-full border border-gray-300 p-2 rounded-md focus:ring-blue-500 focus:border-blue-500"><?php echo $row_partner['deskripsi'];?></textarea>
                <label for="img">Gambar</label>
                <input type="file" name="gambar" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                <button type="submit" name="submit" class="w-full text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mt-4">OK</button>
            </form>
        </div>
    </div>
</div>
<?php
include '../../inc/alert.php';
include '../../inc/dashboard/inc_footer.php';
?>