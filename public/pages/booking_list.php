<?php
include '../inc/inc_header.php';
include '../../conf/booking_list.php';
?>
<!-- hero -->
<section class="container-fluid relative">
    <div class="hero h-96">
        <img src="../img/hero.jpg" alt="" class="img-fluid w-full h-full object-cover">
        <!-- Dark overlay panel -->
        <div class="absolute top-0 left-0 w-full h-full bg-black opacity-75"></div>
        <div class="absolute top-0 left-0 w-full h-full flex flex-col items-center justify-center font-poppins text-white">
            <h1 class="text-5xl font-bold mb-4">WELCOME TRAVELLERS</h1>
            <p>Let's discover the world and find yourself on a journey without limits, we will always be there for you.</p>
        </div>
    </div>
</section>
<!-- end hero -->
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">
                                    Room Name
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">
                                    Room Type
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">
                                    Check In
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">
                                    Check Out
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-black uppercase tracking-wider">
                                    View
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <?php
                            while ($data_booking = mysqli_fetch_assoc($select_booking)) {
                            ?>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">
                                                    <?php echo $data_booking['nama_kamar'] ?>
                                                </div>
                                                <div class="text-sm text-gray-500">
                                                    <?php echo $data_booking['nama_tamu'] ?>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900"><?php echo $data_booking['tipe_kamar'] ?></div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            <?php echo $data_booking['check_in'] ?>
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            <?php echo $data_booking['check_out'] ?>
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <?php if ($data_booking['status'] == 'pending') { ?>
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                Pending
                                            </span>
                                        <?php } else if ($data_booking['status'] == 'ditolak') { ?>
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                Ditolak
                                            </span>
                                        <?php } else { ?>
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                Success
                                            </span>
                                        <?php } ?>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <?php if ($data_booking['alasan'] == 'null') {
                                        ?>
                                        <?php
                                        } else {
                                        ?>
                                            <button data-modal-target="popup-modal-bukti<?php echo $data_booking['id_booking'] ?>" data-modal-toggle="popup-modal-bukti<?php echo $data_booking['id_booking'] ?>" class="w-full block text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-2" type="button">
                                                View Alasan
                                            </button>
                                        <?php
                                        } ?>
                                    </td>
                                </tr>
                                <!-- modal bukti -->
                                <div id="popup-modal-bukti<?php echo $data_booking['id_booking'] ?>" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative p-4 w-full max-w-md max-h-full">
                                        <div class="relative bg-white rounded-lg shadow">
                                            <div class="p-4">
                                                <div class="flex justify-between items-center">
                                                    <h3 class="text-lg font-medium text-gray-900">Alasan</h3>
                                                    <button data-modal-toggle="popup-modal-bukti<?php echo $data_booking['id_booking'] ?>" class="focus:outline-none">
                                                        <svg class="h-6 w-6 text-gray-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                        </svg>
                                                    </button>
                                                </div>
                                                <div class="mt-4">
                                                    <textarea disabled class="w-full h-96 p-2.5 bg-gray-100 border border-gray-300 rounded-lg text-gray-700"><?php echo htmlspecialchars($data_booking['alasan'], ENT_QUOTES, 'UTF-8'); ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include '../inc/inc_footer.php';
?>