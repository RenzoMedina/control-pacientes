<?php require_once 'layouts/header.php'; ?>
    <div class="container mx-auto">
        <div class="row">
         <?php include_once 'components/navbar.php'; ?>
        </div>
        <div class="flex flex-col justify-center items-center gap-10 my-32 md:flex md:flex-row md:justify-center md:items-center md:gap-10 md:my-40">
            <img src="app/public/assets/image/404.png" alt="404">
            <div class="content">
                <p class="text-blue-700 font-bold">Uh oh..</p>
                <p class="text-4xl font-bold">Algo salió mal</p>
                <p class="text-sm font-light">Parece que esta página no existe o fue eliminada.</p>
                <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-2.5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 flex justify-center items-center gap-1">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m4 12 8-8 8 8M6 10.5V19a1 1 0 0 0 1 1h3v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h3a1 1 0 0 0 1-1v-8.5"/>
</svg>

                <a href="/" >Volver al Inicio</a>
                </button>
            </div>
        </div>
        <div class="flex justify-evenly items-center">
            <div class="">
                <p class="text-sm font-light">© <?php echo date('Y') ?></p>
            </div>
            <div class="flex justify-center items-center">
                <a href="www.facebook.com"><svg class="w-6 h-6 text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
  <path fill-rule="evenodd" d="M13.135 6H15V3h-1.865a4.147 4.147 0 0 0-4.142 4.142V9H7v3h2v9.938h3V12h2.021l.592-3H12V6.591A.6.6 0 0 1 12.592 6h.543Z" clip-rule="evenodd"/>
</svg></a>
<a href="www.instagram.com">
    <svg class="w-6 h-6 text-gray-600 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
  <path fill="currentColor" fill-rule="evenodd" d="M3 8a5 5 0 0 1 5-5h8a5 5 0 0 1 5 5v8a5 5 0 0 1-5 5H8a5 5 0 0 1-5-5V8Zm5-3a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V8a3 3 0 0 0-3-3H8Zm7.597 2.214a1 1 0 0 1 1-1h.01a1 1 0 1 1 0 2h-.01a1 1 0 0 1-1-1ZM12 9a3 3 0 1 0 0 6 3 3 0 0 0 0-6Zm-5 3a5 5 0 1 1 10 0 5 5 0 0 1-10 0Z" clip-rule="evenodd"/>
</svg>
</a>

            </div>
        </div>
    </div>
<?php require_once 'layouts/footer.php'; ?>