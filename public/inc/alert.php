<?php
if (isset($_SESSION['status']) && $_SESSION['status'] == 'Success') {
?>
    <div id="modal" class="fixed inset-0 flex items-center justify-center">
        <div class="body-alert">
            <div class="bg-white p-8 rounded shadow-lg">
                <div class="text-green-600">
                    <svg class="w-24 h-24 mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                </div>
                <div class="text my-4 text-center">
                    <h1 class="font-poppins font-bold text-2xl uppercase">Success</h1>
                    <p class="text-lg font-montserrat"><?php echo htmlspecialchars($_SESSION['succes_msg'], ENT_QUOTES, 'UTF-8'); ?></p>
                </div>
                <div class="text-center mt-4 font-poppins">
                    <button id="closeModalBtn" class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
<?php
} else if (isset($_SESSION['status']) && $_SESSION['status'] == 'Error') {
?>
    <div id="modal" class="fixed inset-0 flex items-center justify-center">
        <div class="body-alert">
            <div class="bg-white p-8 rounded shadow-lg">
                <div class="text-red-600">
                    <svg class="w-24 h-24 mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                    </svg>
                </div>
                <div class="text my-4 text-center">
                    <h1 class="font-poppins font-bold text-2xl uppercase">Error</h1>
                    <p class="text-lg font-montserrat"><?php echo htmlspecialchars($_SESSION['error_msg'], ENT_QUOTES, 'UTF-8'); ?></p>
                </div>
                <div class="text-center mt-4 font-poppins">
                    <button id="closeModalBtn" class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
<?php
}
unset($_SESSION['status']);
?>

<script>
    // JavaScript to handle the modal functionality
    const closeModalBtn = document.getElementById('closeModalBtn');
    const modal = document.getElementById('modal');

    if (closeModalBtn && modal) {
        closeModalBtn.addEventListener('click', () => {
            modal.classList.add('hidden');
        });
    }
</script>