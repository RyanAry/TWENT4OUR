<?php
include '../../inc/dashboard/admin/inc_main.php';
include '../../../conf/admin/admin_partner.php';
?>
<div class="p-4 sm:ml-64">
    <div class="main py-10">
        <div class="header pt-10 sm:pt-0">
            <h1 class="font-bold text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-3xl  font-gatwick uppercase">Daftar Admin Partner</h1>
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
                                <th class="py-3 px-4 text-left">Akomodasi</th>
                                <th class="py-3 px-4 text-left">Nama</th>
                                <th class="py-3 px-4 text-left">Email</th>
                                <th class="py-3 px-4 text-left">Role</th>
                                <th class="py-3 px-4 text-left">Action</th>
                            </tr>
                        </thead>
                        <tbody class="font-montserrat">
                            <?php
                            while ($data_partner_admin = mysqli_fetch_assoc($select_partner_admin)) {
                            ?>
                                <tr class="border-b border-blue-gray-200 hover:bg-gray-100">
                                    <td class="py-3 px-4">
                                        <?php
                                        $data_partner_admin['id_akomodasi'];
                                        $query_select_partner = "SELECT * FROM `partner` WHERE id_partner = '$data_partner_admin[id_akomodasi]'";
                                        $select_partner = mysqli_query($db, $query_select_partner);

                                        $data_partner = mysqli_fetch_assoc($select_partner);
                                        echo $data_partner['nama_akomodasi'];
                                        ?>
                                    </td>
                                    <td class="py-3 px-4"><?php echo $data_partner_admin['nama'] ?></td>
                                    <td class="py-3 px-4">
                                    <a class="text-blue-500 hover:underline" href="mailto:<?php echo $data_partner_admin['email'] ?>"><?php echo $data_partner_admin['email'] ?></a>
                                    <td class="py-3 px-4"><?php echo $data_partner_admin['role'] ?></td>
                                    <td>
                                        <div class="flex justify-center space-x-2">
                                            <a href="mailto:<?php echo $data['email_perusahaan']; ?>">
                                                <button type="button" class="block text-white bg-yellow-500 hover:bg-yellow-700 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                                                    </svg>
                                                </button>
                                            </a>
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
include '../../inc/dashboard/inc_footer.php';
?>