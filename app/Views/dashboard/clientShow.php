<?php require_once 'app/Views/layouts/header.php'; ?>
<?php require_once 'app/Views/dashboard/home.php';?>
<div class="p-4 sm:ml-64">
   <div class="p-4 mt-14">
      <div class="flex flex-col gap-3 justify-center items-center mb-6">
         <h3 class="text-4xl font-extrabold">Lista de Pacientes</h3>
      </div>
    
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right  text-white">
        <thead class="text-xs  uppercase  bg-gray-700 text-white">
            <tr>
                
                <th scope="col" class="px-6 py-3">
                    RUT
                </th>
                <th scope="col" class="px-6 py-3">
                    Nombre
                </th>
                <th scope="col" class="px-6 py-3">
                    Apellido
                </th>
                <th scope="col" class="px-6 py-3">
                    Edad
                </th>
                 <th scope="col" class="px-6 py-3">
                    Peso (kg)
                </th>
                 <th scope="col" class="px-6 py-3">
                    Estatura (cm)
                </th>
                <th scope="col" class="px-6 py-3">
                Acción
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($client as $clients):?>
            <tr class="border-b bg-gray-100 border-gray-700 text-gray-900  ">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    <?php echo $clients['rut']; ?>
                </th>
                <td class="px-6 py-4">
                   <?php echo $clients['name']; ?>
                </td>
                <td class="px-6 py-4">
                    <?php echo $clients['last_name']; ?>
                </td>
                <td class="px-6 py-4">
                    <?php echo $clients['age']; ?>
                </td>
                <td class="px-6 py-4">
                    <?php echo $clients['weight']." kg"; ?>
                </td>
                <td class="px-6 py-4">
                    <?php echo $clients['size']." cm"; ?>
                </td>
                <td class="px-6 py-4">
                    <div class="flex">
                        <a href="#" title="Ver detalle">
                            <svg   data-tooltip-style="light" class="w-6 h-6 text-green-800 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/>
                        <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                        </svg>
                        </a>
                        <a href="#" title="Contacto">
                            <svg class="w-6 h-6 text-blue-800 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M7 2a2 2 0 0 0-2 2v1a1 1 0 0 0 0 2v1a1 1 0 0 0 0 2v1a1 1 0 1 0 0 2v1a1 1 0 1 0 0 2v1a1 1 0 1 0 0 2v1a2 2 0 0 0 2 2h11a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H7Zm3 8a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm-1 7a3 3 0 0 1 3-3h2a3 3 0 0 1 3 3 1 1 0 0 1-1 1h-6a1 1 0 0 1-1-1Z" clip-rule="evenodd"/>
                        </svg>
                        </a>
                    </div>
                </td>
            </tr>
            <div id="tooltip-light" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg shadow-xs opacity-0 tooltip">
    Tooltip content
    <div class="tooltip-arrow" data-popper-arrow></div>
</div>
            <?php endforeach; ?>
        </tbody>
    </table>
   <nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4"
                    aria-label="Table navigation">
                    <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                        Showing
                        <span class="font-semibold text-gray-900 ">1-5</span>
                        of
                        <span class="font-semibold text-gray-900">1000</span>
                    </span>
                    <ul class="inline-flex items-stretch -space-x-px">
                        <li>
                            <a href="#"
                                class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-l-lg border   border-gray-700  hover:bg-gray-700 hover:text-white">
                                <span class="sr-only">Previous</span>
                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300   dark:border-gray-700  hover:bg-gray-700 hover:text-white">1</a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300   dark:border-gray-700  hover:bg-gray-700 hover:text-white">2</a>
                        </li>
                        <li>
                            <a href="#" aria-current="page"
                                class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300   dark:border-gray-700  hover:bg-gray-700 hover:text-white">3</a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300   dark:border-gray-700  hover:bg-gray-700 hover:text-white">...</a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300   dark:border-gray-700  hover:bg-gray-700 hover:text-white">100</a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center justify-center h-full py-1.5 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border     border-gray-700  hover:bg-gray-700 hover:text-white">
                                <span class="sr-only">Next</span>
                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </li>
                    </ul>
    </nav>
</div>

   </div>
</div>
<?php require_once 'app/Views/layouts/footer.php'; ?>