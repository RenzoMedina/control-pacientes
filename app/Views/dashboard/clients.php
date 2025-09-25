<?php require_once 'app/Views/layouts/header.php'; ?>
<?php require_once 'app/Views/dashboard/home.php';?>
<div class="p-4 sm:ml-64">
   <div class="p-4 mt-14">
      <div class="flex flex-col gap-3 justify-center items-center">
         <h3 class="text-4xl font-extrabold">Crear nuevo paciente</h3>
         <p class="font-light text-gray-700">Ingrese los datos del paciente según su RUT, nombre, edad, peso y estatura</p>
      </div>
      <div class="border-2 rounded-lg border-gray-100 mt-5 shadow-lg">
         <div class="flex flex-col justify-start items-start px-5 py-5 gap-2">
            <p class="text-3xl font-semibold">Formulario de registro</p>
            <p class="text-md font-light text-gray-500">Complete todos los campos requeridos</p>
         </div>
         <form action="/home/clients" method="post" class="px-5 py-5 gap-2">
            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
            <div class="w-full">
               <label for="rut" class="block mb-2 text-sm font-medium text-gray-900">RUT</label>
               <input type="text" name="rut" id="rut" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="12.345.768-9" required>
            </div>
            <div class="w-full">
               <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nombre</label>
               <input type="text" name="rut" id="rut" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Ejm: Maria José" required>
            </div>
            <div class="sm:col-span-2">
               <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900">Apellido</label>
               <input type="text" name="last_name" id="last_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"  placeholder="Ejm: Peréz Villanueva" required>
            </div>
            <div class="flex flex-row justify-between items-center gap-4 sm:gap-6 sm:col-span-2">
               <div class="w-full">
                  <label for="age" class="block mb-2 text-sm font-medium text-gray-900">Edad</label>
                  <input type="number" name="age" id="age" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"  required>
               </div>
               <div class="w-full">
                  <label for="weight" class="block mb-2 text-sm font-medium text-gray-900">Peso (kg)</label>
                  <input type="number" name="weight" id="weight" step="0.01" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"  required>
               </div>
               <div class="w-full">
                  <label for="size" class="block mb-2 text-sm font-medium text-gray-900">Estatura (cm)</label>
                  <input type="number" name="size" id="size" step="0.01" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"  required>
               </div>
            </div>
            <div class="flex justify-end items-center gap-4 sm:gap-6 sm:col-span-2 ">
               <button type="reset" class="bg-gray-400 px-4 py-2 rounded-md font-semibold" >Limpiar</button>
               <button type="submit" class="bg-green-800 px-4 py-2 rounded-md font-semibold text-white">Guardar</button>
            </div>
            </div>
         </form>
      </div>
   </div>
</div>
<?php require_once 'app/Views/layouts/footer.php'; ?>