<?php require_once 'app/Views/layouts/header.php'; ?>
<?php require_once 'app/Views/dashboard/home.php';?>
<div class="p-4 sm:ml-64">
   <div class="p-4 mt-14">
      <div class="flex flex-col gap-3 justify-center items-center">
         <h3 class="text-4xl font-extrabold">Ficha clínica</h3>
         <p class="font-light text-gray-700">Registrar datos clínicos del paciente</p>
         
      </div>
      <form action="reportsclinical/detailsClinical" method="POST">
         <input type="text" name="id" hidden value="<?php echo $id_report?>">
         <div class="border-2 rounded-lg border-gray-100 mt-5 shadow-lg">
            <fieldset class="p-4 mt-3">
              <legend class="text-xl font-bold">Detalles clínicos</legend>
              <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
               <div class="flex flex-row justify-between items-center gap-4 sm:gap-6 sm:col-span-2">
               <div class="w-full">
                  <label for="date" class="block mb-2 text-sm font-medium text-gray-900">Fecha:</label>
                  <input type="text" name="detailmedic[date]" id="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm text-center rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"  value="<?php echo date('d-m-Y'); ?>" readonly>
               </div>
               <div class="w-full">
                  <label for="gtt" class="block mb-2 text-sm font-medium text-gray-900">GTT:</label>
                  <input type="text" name="detailmedic[gtt]" id="gtt"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 text-center"  required>
               </div>
               <div class="w-full">
                  <label for="sng" class="block mb-2 text-sm font-medium text-gray-900">SNG:</label>
                  <input type="text" name="detailmedic[sng]" id="sng" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 text-center"  required>
               </div>
               <div class="w-full">
                  <label for="s_folley" class="block mb-2 text-sm font-medium text-gray-900">S. FOLLEY:</label>
                  <input type="text" name="detailmedic[s_folley]" id="s_folley" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 text-center" required>
               </div>
               <div class="w-full">
                  <label for="ctt" class="block mb-2 text-sm font-medium text-gray-900">CTT:</label>
                  <input type="text" name="detailmedic[ctt]" id="ctt" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 text-center" required>
               </div>
            </div>
            </div>
            </fieldset>
         </div>
         <div class="border-2 rounded-lg border-gray-100 mt-5 shadow-lg">
            <fieldset class="p-4 mt-3">
              <legend class="text-xl font-bold">Control de signos vitales</legend>
              <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
               <div class="flex flex-row justify-between items-center gap-4 sm:gap-6 sm:col-span-2">
                  <div class="w-full">
                     <label for="vitals-date" class="block mb-2 text-sm font-medium text-gray-900">Horario:</label>
                     <input type="time" name="vitals[date]" id="vitals-date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm text-center rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" >
                  </div>
                  <div class="w-full">
                     <label for="vitals-arterial" class="block mb-2 text-sm font-medium text-gray-900">P. Arterial:</label>
                     <input type="text" name="vitals[arterial]" id="vitals-arterial"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 text-center"  required>
                  </div>
                  <div class="w-full">
                     <label for="vitals-respiratoria" class="block mb-2 text-sm font-medium text-gray-900">F. Respiratoria:</label>
                     <input type="number" name="vitals[respiratoria]" id="vitals-respiratoria" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 text-center" step="0.01"  required>
                  </div>
               </div>
               <div class="flex flex-row justify-between items-center gap-4 sm:gap-6 sm:col-span-2">
                  <div class="w-full">
                     <label for="vitals-cardiaca" class="block mb-2 text-sm font-medium text-gray-900">F. Cardiaca:</label>
                     <input type="number" name="vitals[cardiaca]" id="vitals-cardiaca" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm text-center rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required  step="0.01" max="150">
                  </div>
                  <div class="w-full">
                     <label for="vitals-saturacion" class="block mb-2 text-sm font-medium text-gray-900">Saturación:</label>
                     <input type="number" name="vitals[saturacion]" id="vitals-saturacion"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 text-center"  required  step="0.01" max="200">
                  </div>
                  <div class="w-full">
                     <label for="vitals-temperatura" class="block mb-2 text-sm font-medium text-gray-900">Temperatura:</label>
                     <input type="number" name="vitals[temperatura]" id="vitals-temperatura" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 text-center"  required  step="0.01" max="70">
                  </div>
                  <div class="w-full">
                     <label for="vitals-flacc" class="block mb-2 text-sm font-medium text-gray-900">EVA/FLACC:</label>
                     <div class="flex  flex-row-reverse"> 
                        <span class="inline-flex items-center px-3 text-sm border font-bold border-e-0 rounded-r-lg bg-gray-600 text-gray-100 border-gray-600">
                           /10
                        </span>
                     <input type="number" name="vitals[saturacion]" id="vitals-saturacion"  class="bg-gray-50 border border-gray-300  text-gray-900 text-sm rounded-l-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 text-center"  required  step="0.01" max="200">
                     </div>
                  </div>
               </div>
            </div>
            </fieldset>
         </div>
          <div class="border-2 rounded-lg border-gray-100 mt-5 shadow-lg">
            <fieldset class="p-4 mt-3">
              <legend class="text-xl font-bold">Control de ingesta</legend>
              <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
               <div class="flex flex-row justify-between items-center gap-4 sm:gap-6 sm:col-span-2">
                  <div class="w-full">
                     <label for="ingesta-date" class="block mb-2 text-sm font-medium text-gray-900">Horario</label>
                     <input type="time" name="ingesta[date]" id="ingesta-date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm text-center rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" >
                  </div>
                  <div class="w-full">
                     <label for="ingesta-alimento" class="block mb-2 text-sm font-medium text-gray-900">Tipo de alimentación/líquidos</label>
                     <input type="text" name="ingesta[alimento]" id="ingesta-alimento"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 text-center"  required>
                  </div>
                  <div class="w-full">
                     <label for="ingesta-tolerancia" class="block mb-2 text-sm font-medium text-gray-900">Tolerancia</label>
                     <input type="text" name="ingesta[tolerancia]" id="ingesta-tolerancia" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 text-center">
                  </div>
               </div>
            </div>
            </fieldset>
         </div>
         <div class="border-2 rounded-lg border-gray-100 mt-5 shadow-lg">
            <fieldset class="p-4 mt-3">
              <legend class="text-xl font-bold">Control de egresos</legend>
              <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
               <div class="flex flex-row justify-between items-center gap-4 sm:gap-6 sm:col-span-2">
                  <div class="w-full">
                     <label for="egreso-date" class="block mb-2 text-sm font-medium text-gray-900">Horario:</label>
                     <input type="time" name="egreso[date]" id="egreso-date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm text-center rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" >
                  </div>
                  <div class="w-full">
                     <label for="egreso-orina" class="block mb-2 text-sm font-medium text-gray-900">Orina:</label>
                     <select  name="egreso[orina]" id="egreso-orina" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 text-center">
                        <option value="1">Sí</option>
                        <option value="0">No</option>
                     </select>
                  </div>
                  <div class="w-full">
                     <label for="egreso-deposicion" class="block mb-2 text-sm font-medium text-gray-900">Deposición:</label>
                     <select name="egreso[deposicion]" id="egreso-deposicion" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 text-center">
                        <option value="1">Sí</option>
                        <option value="0">No</option>
                     </select>
                  </div>
                   <div class="w-full">
                     <label for="egreso-otros" class="block mb-2 text-sm font-medium text-gray-900">Otros:</label>
                     <input type="text" name="egreso[otros]" id="egreso-otros"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 text-center" >
                  </div>
               </div>
            </div>
            </fieldset>
         </div>
          <div class="border-2 rounded-lg border-gray-100 mt-5 shadow-lg">
            <fieldset class="p-4 mt-3">
              <legend class="text-xl font-bold">Otras indicaciones</legend>
              <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
               <div class="flex flex-row justify-between items-center gap-4 sm:gap-6 sm:col-span-2">
                  <div class="w-full">
                     <label for="indicaciones-date" class="block mb-2 text-sm font-medium text-gray-900">Horario:</label>
                     <input type="time" name="indicaciones[date]" id="indicaciones-date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm text-center rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" >
                  </div>
                   <div class="w-full">
                     <label for="indicaciones-frecuencia" class="block mb-2 text-sm font-medium text-gray-900">Frecuencia:</label>
                     <input type="text" name="indicaciones[frecuencia]" id="indicaciones-frecuencia"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 text-center" >
                  </div>
               </div>
               <div class="sm:col-span-2">
               <label for="indicaciones_observaciones" class="block mb-2 text-sm font-medium text-gray-900">Otras observaciones:</label>
               <textarea name="indicaciones[observaciones]" id="indicaciones_observaciones" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"></textarea>
            </div>
            </div>
            </fieldset>
         </div>
         <div class="flex justify-end items-center gap-4 sm:gap-6 sm:col-span-2 mt-5">
            <button type="submit" class="bg-green-800 px-4 py-2 rounded-md font-semibold text-white">Guardar</button>
         </div>
      </form>
      
   </div>
</div>
<?php require_once 'app/Views/layouts/footer.php'; ?>