<?php require_once 'app/Views/layouts/header.php'; ?>
<?php require_once 'app/Views/dashboard/home.php';?>
<div class="p-4 sm:ml-64">
   <div class="p-4 mt-14">
      <div class="flex flex-col gap-3 justify-center items-center">
         <h3 class="text-4xl font-extrabold">Crear Ficha Clínica</h3>
         <p class="font-light text-gray-700">Registrar nueva ficha clínica del paciente</p>
      </div>
      <div class="border-2 rounded-lg border-gray-100 mt-5 shadow-lg">
          <?php var_dump($id_report)?>
      </div>
   </div>
</div>
<?php require_once 'app/Views/layouts/footer.php'; ?>