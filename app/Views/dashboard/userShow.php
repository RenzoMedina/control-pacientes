<?php require_once 'app/Views/layouts/header.php'; ?>
<?php require_once 'app/Views/dashboard/home.php'; ?>
<div class="p-4 sm:ml-64">
   <div class="p-4 border-2  rounded-lg mt-14">
    <div class="flex justify-end">
        <a href="/home/users" class=" flex items-center justify-around border-2 px-3 py-2 rounded-lg bg-yellow-700 border-yellow-700 text-white font-semibold text-md"> <svg class="w-6 h-6  text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12l4-4m-4 4 4 4"/>
</svg> Volver</a>
    </div>
    <div class="flex flex-col justify-center items-center">
         <p class="text-center font-extrabold text-4xl mb-6">Detalle de usuario</p>
<div class="w-full max-w  rounded-lg shadow-sm bg-gray-100 border-gray-100 flex flex-row">
    <div class="flex flex-col items-center pb-10">
        <img class="w-24 h-24 mb-3 mt-3 rounded-full shadow-lg" src="../../app/public/assets/image/avatar.png" alt="Bonnie image"/>
        <h5 class="mb-1 text-xl font-medium text-gray-900"><?php echo $userId['name']?></h5>
        <p>Información General</p>
        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6 px-8 mt-3">
            <div class="sm:col-span-2">
                  <label for="name" class="block  text-md font-medium text-gray-900 ">Apellido</label>
                  <input type="text" name="name" id="name" class=" border  text-white text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 bg-gray-400 border-gray-400   focus:ring-primary-500 focus:border-primary-500 text-md" disabled readonly value="<?php echo $userId['last_name']?>">
              </div>
              <div class="sm:col-span-2">
                  <label for="email" class="block text-md font-medium text-gray-900 ">Correo</label>
                  <input type="text" name="email" id="email"  class=" border  text-white text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 bg-gray-400 border-gray-400   focus:ring-primary-500 focus:border-primary-500 text-md"  disabled readonly value="<?php echo $userId['email']?>">
              </div>
                          <div class="w-full">
                  <label for="brand" class="block  text-sm font-medium text-gray-900 ">Cargo</label>
                  <input type="text" name="brand" id="brand" class=" border  text-white text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 bg-gray-400 border-gray-400   focus:ring-primary-500 focus:border-primary-500 text-md" value="<?php echo $userId['role']['type']?> " disabled readonly>
              </div>
             <div class="w-full">
                  <label for="brand" class="block  text-sm font-medium text-gray-900 ">R.U.N</label>
                  <input type="text" name="brand" id="brand" class=" border  text-white text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 bg-gray-400 border-gray-400   focus:ring-primary-500 focus:border-primary-500 text-md" value="<?php echo $userId['rut']?> " disabled readonly>
              </div>
               <div class="w-full">
                  <label for="brand" class="block text-sm font-medium text-gray-900 ">Estado</label>
                  <input type="text" name="brand" id="brand" class=" border  text-white text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 bg-gray-400 border-gray-400   focus:ring-primary-500 focus:border-primary-500 text-md" value="<?php if($userId['status']=="active"){
                    echo "Activo";}
                    else{
                        echo "Inactivo";
                    } ?>
                   " disabled readonly>
              </div>
        </div>
       
        <div class="flex mt-4 md:mt-6">
            <a href="#" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg  focus:ring-4 focus:outline-none   hover:bg-blue-700 focus:ring-blue-800">Actualizar</a>
            <a href="#" class="py-2 px-4 ms-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Message</a>
        </div>
    </div>
    <div class="flex flex-col items-center pb-10">
        <p class="mt-4 text-lg font-semibold">Detalles bancarios</p>
        <div class="grid gap-4 sm:grid-cols-2 sm:gap-3 px-8 mt-3">
            <div class="sm:col-span-2">
                  <label for="name" class="block  text-md font-medium text-gray-900 ">Apellido</label>
                  <p class=" border  text-white text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 bg-gray-400 border-gray-400   focus:ring-primary-500 focus:border-primary-500 text-md" ><?php echo $userId['last_name']?></p>
              </div>
              <div class="sm:col-span-2">
                  <label for="email" class="block text-md font-medium text-gray-900 ">Correo</label>
                  <input type="text" name="email" id="email"  class=" border  text-white text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 bg-gray-400 border-gray-400   focus:ring-primary-500 focus:border-primary-500 text-md"  disabled readonly value="<?php echo $userId['email']?>">
              </div>
                          <div class="w-full">
                  <label for="brand" class="block  text-sm font-medium text-gray-900 ">Cargo</label>
                  <input type="text" name="brand" id="brand" class=" border  text-white text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 bg-gray-400 border-gray-400   focus:ring-primary-500 focus:border-primary-500 text-md" value="<?php echo $userId['role']['type']?> " disabled readonly>
              </div>
             <div class="w-full">
                  <label for="brand" class="block  text-sm font-medium text-gray-900 ">R.U.N</label>
                  <input type="text" name="brand" id="brand" class=" border  text-white text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 bg-gray-400 border-gray-400   focus:ring-primary-500 focus:border-primary-500 text-md" value="<?php echo $userId['rut']?> " disabled readonly>
              </div>
               <div class="w-full">
                  <label for="brand" class="block text-sm font-medium text-gray-900 ">Estado</label>
                  <input type="text" name="brand" id="brand" class=" border  text-white text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 bg-gray-400 border-gray-400   focus:ring-primary-500 focus:border-primary-500 text-md" value="<?php if($userId['status']=="active"){
                    echo "Activo";}
                    else{
                        echo "Inactivo";
                    } ?>
                   " disabled readonly>
              </div>
        </div>
    
    </div>
</div>
    </div>
   </div>
</div>
<?php require_once 'app/Views/layouts/footer.php'; ?>