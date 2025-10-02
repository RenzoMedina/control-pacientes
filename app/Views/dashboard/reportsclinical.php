<?php require_once 'app/Views/layouts/header.php'; ?>
<?php require_once 'app/Views/dashboard/home.php';?>
<div class="p-4 sm:ml-64">
   <div class="p-4 mt-14">
      <div class="flex flex-col gap-3 justify-center items-center">
         <h3 class="text-4xl font-extrabold">Crear Ficha Clínica</h3>
         <p class="font-light text-gray-700">Registrar nueva ficha clínica del paciente</p>
      </div>
      <div class="border-2 rounded-lg border-gray-100 mt-5 shadow-lg">
          <form action="/home/reportsclinical" method="post" class="px-5 py-5 gap-2">
            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
            <div class="sm:col-span-2">
               <label for="last_name" class="block mb-2 text-md font-medium text-gray-900">Paciente</label>
               <select name="id_patient" class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                  <option>Selección al paciente</option>
               <?php foreach($client as $cl): ?>
                  <option value="<?php echo $cl['id']?>"><?php echo $cl['name']." ". $cl['last_name'] ?></option>
               <?php endforeach; ?>
               </select>
               <input type="text" name="id_user" value="<?php echo $user->id ?>" hidden>
            </div>
            <div class="flex justify-end items-center gap-4 sm:gap-6 sm:col-span-2 ">
               <button type="submit" class="bg-green-800 px-4 py-2 rounded-md font-semibold text-white">Agregar</button>
            </div>
            </div>
         </form>
      </div>
   </div>
</div>
<?php require_once 'app/Views/layouts/footer.php'; ?>