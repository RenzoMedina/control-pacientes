<?php require_once 'app/Views/layouts/header.php'; ?>
<?php require_once 'app/Views/dashboard/home.php';?>
<div class="p-4 sm:ml-64">
   <div class="p-4 mt-14">
      <div class="flex flex-col gap-3 justify-center items-center mb-6">
         <h3 class="text-4xl font-extrabold">Lista de fichas clínicas</h3>
      </div>
    
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right  text-white">
        <thead class="text-xs  uppercase  bg-gray-700 text-white">
            <tr><th scope="col" class="px-6 py-3">
                    N°
                </th>
                
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
                    Cuidadora
                </th>
                <th scope="col" class="px-6 py-3">
                Acción
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($client as $clients):?>
                 <?php
                    $isAdminOrSupervisor = in_array($user->rol, ['Administrador', 'Supervisora']);
                    $isOwner = $user->id == $clients['id_user'];
                    if ($isAdminOrSupervisor || $isOwner):
            ?>
            <tr class="border-b bg-gray-100 border-gray-700 text-gray-900  ">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    <?php echo $clients['id']; ?>
                </th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    <?php echo $clients['patient_rut']; ?>
                </th>
                <td class="px-6 py-4">
                   <?php echo $clients['patient_name']; ?>
                </td>
                <td class="px-6 py-4">
                    <?php echo $clients['patient_last_name']; ?>
                </td>
                <td class="px-6 py-4">
                    <?php echo $clients['user_name']; ?>
                </td>
                <?php if ($clients['status'] == "pending") :?>
                    <td class="px-6 py-4">
                    <div class="flex">
                        <button title="Evaluar detalle" data-modal-target="modal-<?= $clients['id'] ?>" data-modal-toggle="modal-<?= $clients['id'] ?>">
                           <svg class="w-6 h-6 text-blue-800 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M9 7V2.221a2 2 0 0 0-.5.365L4.586 6.5a2 2 0 0 0-.365.5H9Zm2 0V2h7a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Zm-1 9a1 1 0 1 0-2 0v2a1 1 0 1 0 2 0v-2Zm2-5a1 1 0 0 1 1 1v6a1 1 0 1 1-2 0v-6a1 1 0 0 1 1-1Zm4 4a1 1 0 1 0-2 0v3a1 1 0 1 0 2 0v-3Z" clip-rule="evenodd"/>
                        </svg>
                        </button>
                        <button title="Editar detalle">
                           <svg class="w-6 h-6 text-green-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M11.32 6.176H5c-1.105 0-2 .949-2 2.118v10.588C3 20.052 3.895 21 5 21h11c1.105 0 2-.948 2-2.118v-7.75l-3.914 4.144A2.46 2.46 0 0 1 12.81 16l-2.681.568c-1.75.37-3.292-1.263-2.942-3.115l.536-2.839c.097-.512.335-.983.684-1.352l2.914-3.086Z" clip-rule="evenodd"/>
                            <path fill-rule="evenodd" d="M19.846 4.318a2.148 2.148 0 0 0-.437-.692 2.014 2.014 0 0 0-.654-.463 1.92 1.92 0 0 0-1.544 0 2.014 2.014 0 0 0-.654.463l-.546.578 2.852 3.02.546-.579a2.14 2.14 0 0 0 .437-.692 2.244 2.244 0 0 0 0-1.635ZM17.45 8.721 14.597 5.7 9.82 10.76a.54.54 0 0 0-.137.27l-.536 2.84c-.07.37.239.696.588.622l2.682-.567a.492.492 0 0 0 .255-.145l4.778-5.06Z" clip-rule="evenodd"/>
                            </svg>

                        </button>
                    </div>
                </td>
                <?php else: ?>
                    <td class="px-6 py-4">
                    <div class="flex">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 3v4a1 1 0 0 1-1 1H5m4 6 2 2 4-4m4-8v16a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1Z"/>
                        </svg>

                    </div>
                </td>
                <?php endif; ?>
            </tr>
            
        <?php endif; ?>

<!---- Modal evaluation --------------->
<div id="modal-<?= $clients['id'] ?>" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full bg-slate-100 bg-opacity-30 p-4">
    <div class="relative w-full max-w-lg max-h-full">
        <!-- Modal content -->
        <div class="relative rounded-lg shadow-sm bg-gray-700 left-32">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-600 ">
                <h3 class="text-xl font-medium text-white">
                    Evaluación Detallada
                </h3>
                <button type="button" class="text-gray-400 bg-transparent   rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center hover:bg-gray-600 hover:text-white" data-modal-hide="modal-<?= $clients['id'] ?>">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
            <form>
                <div class="mb-5">
                    <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha</label>
                         <input type="text" aria-label="disabled input 2" class="border text-sm rounded-lg  block w-full p-2.5 cursor-not-allowed bg-gray-700 border-gray-600 placeholder-gray-400 text-gray-100 font-bold focus:ring-blue-500 focus:border-blue-500" value="<?php echo date('Y-m-d')?>" disabled readonly>
                </div>
                <label for="message" class="block mb-2 text-md font-medium text-white">Comentario</label>
                <textarea id="message" name="observations" rows="4" class="block p-2.5 w-full text-md font-semibold rounded-lg border bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" placeholder=""></textarea>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-4 md:p-5 border-t  rounded-b border-gray-600">
                <button data-modal-hide="medium-modal" type="submit" class="text-white bg-blue-700  focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">Aceptar y enviar</button>
                <button data-modal-hide="medium-modal" type="reset" class="py-2.5 px-5 ms-3 text-sm font-medium focus:outline-none rounded-lg border  focus:z-10 focus:ring-4  focus:ring-gray-700 bg-gray-800 text-gray-400 border-gray-600 hover:text-white hover:bg-gray-700">Borrar</button>
            </div>
            </form>
        </div>
    </div>
</div>



<?php endforeach; ?>
        </tbody>
    </table>
    
    <nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4"
            aria-label="Table navigation">
            <span class="text-sm font-normal text-gray-400">
                Mostrando
                <span class="font-semibold text-gray-900">
                    <?= $pagination['offset'] + 1 ?> -
                    <?= min($pagination['offset'] + $pagination['limit'],  $pagination['total']) ?>
                </span>
                de
                <span class="font-semibold text-gray-900"><?= $pagination['total'] ?></span>
            </span>

        <ul class="inline-flex items-stretch -space-x-px">
            <li>
                <a href="<?= $pagination['prev_url'] ?? '#' ?>"
                class="flex items-center justify-center h-full py-1.5 px-3 ml-0 border border-gray-700 rounded-l-lg
                        <?= $pagination['prev_url'] ? 'text-gray-500  hover:bg-gray-700 hover:text-white' : 'text-gray-400 bg-gray-200 cursor-not-allowed' ?>"
                <?= $pagination['prev_url'] ? '' : 'aria-disabled="true" tabindex="-1"' ?>>
                    <span class="sr-only">Previous</span>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                            clip-rule="evenodd"/>
                    </svg>
                </a>
            </li>

            <?php for ($i = 1; $i <= $pagination['last_page']; $i++): ?>
                <?php
                    $pageOffset = ($i - 1) * $pagination['limit'];
                    $pageUrl = "/home/reportsclinical/list?limit={$pagination['limit']}&offset={$pageOffset}";
                    $isCurrent = $pagination['offset'] === $pageOffset;
                ?>
                <li>
                    <a href="<?= $pageUrl ?>"
                    class="flex items-center justify-center text-sm py-2 px-3 leading-tight <?= $isCurrent ? 'bg-gray-700 text-white' : 'text-gray-500 bg-white' ?> border  border-gray-700 hover:bg-gray-700 hover:text-white">
                        <?= $i ?>
                    </a>
                </li>
            <?php endfor; ?>

        <li>
                <a href="<?= $pagination['next_url'] ?? '#' ?>"
                class="flex items-center justify-center h-full py-1.5 px-3 border border-gray-700 rounded-r-lg
                        <?= $pagination['next_url'] ? 'text-gray-500  hover:bg-gray-700 hover:text-white' : 'text-gray-400 bg-gray-200 cursor-not-allowed' ?>"
                <?= $pagination['next_url'] ? '' : 'aria-disabled="true" tabindex="-1"' ?>>
                    <span class="sr-only">Next</span>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd"/>
                    </svg>
                </a>
            </li>

        </ul>
    </nav>
</div>
   </div>
</div>



<?php require_once 'app/Views/layouts/footer.php'; ?>