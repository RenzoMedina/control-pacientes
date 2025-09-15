<?php require_once 'app/Views/layouts/header.php'; ?>
<?php require_once 'app/Views/dashboard/home.php'; ?>
<div class="p-4 sm:ml-64">
   <div class="p-4  rounded-lg dark:border-gray-700 mt-14">

<div class="mb-4 border-b border-gray-700">
    <ul class="flex flex-wrap -mb-px text-lg flex-row-reverse font-medium text-center" id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
        <li class="me-2" role="presentation">
            <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Roles</button>
        </li>
        <li class="me-2" role="presentation">
            <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="false">Preferencias</button>
        </li>
        <li class="me-2" role="presentation">
            <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="settings-tab" data-tabs-target="#settings" type="button" role="tab" aria-controls="settings" aria-selected="false">Settings</button>
        </li>
        <li role="presentation">
            <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="contacts-tab" data-tabs-target="#contacts" type="button" role="tab" aria-controls="contacts" aria-selected="false">Contacts</button>
        </li>
    </ul>
</div>
<!---Body-->
<!-----view profile---->
<div id="default-tab-content">
    <div class="hidden p-4 rounded-lg" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <div class="relative overflow-x-auto float-right mb-4">
            <button type="button" data-modal-target="crud-modal" data-modal-toggle="crud-modal"  class="text-white inline-flex items-center bg-green-700 hover:bg-green-800 focus:ring-4 font-medium rounded-lg text-md px-5 py-2.5 text-center"> Agregar Rol
                </button>
        </div>

    <table class="w-full text-sm text-left rtl:text-right text-gray-400 ">
        <thead class="text-xs  uppercase  bg-gray-700 text-gray-400 ">
            <tr>
                <th scope="col" class="px-6 py-3 text-lg text-center">
                    Id
                </th>
                <th scope="col" class="px-6 py-3 text-center text-lg">
                    Cargo
                </th>
                <th scope="col" class="px-6 py-3 text-center text-lg">
                    Estado
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Edit</span>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($role as $r): ?>
            <tr class=" border-b bg-gray-800 border-gray-700 ">
                <th scope="row" class="px-6 py-4 font-medium  whitespace-nowrap text-white text-lg text-center">
                    <?php echo $r['id'] ?>
                </th>
                <td class="px-6 py-4 text-white text-lg text-center">
                    <?php echo $r['type'] ?>
                </td>
                <td class="px-6 py-4 text-white text-lg text-center">
                    <?php if ($r['status']== 'active'){
                        echo "Activo";
                    } else {
                        echo "Inactivo";
                    }?>
                </td>
                <td class="px-6 py-4 text-right">
                    <button type="button" data-modal-target="static-modal" data-modal-toggle="static-modal" ><svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M11.32 6.176H5c-1.105 0-2 .949-2 2.118v10.588C3 20.052 3.895 21 5 21h11c1.105 0 2-.948 2-2.118v-7.75l-3.914 4.144A2.46 2.46 0 0 1 12.81 16l-2.681.568c-1.75.37-3.292-1.263-2.942-3.115l.536-2.839c.097-.512.335-.983.684-1.352l2.914-3.086Z" clip-rule="evenodd"/>
                    <path fill-rule="evenodd" d="M19.846 4.318a2.148 2.148 0 0 0-.437-.692 2.014 2.014 0 0 0-.654-.463 1.92 1.92 0 0 0-1.544 0 2.014 2.014 0 0 0-.654.463l-.546.578 2.852 3.02.546-.579a2.14 2.14 0 0 0 .437-.692 2.244 2.244 0 0 0 0-1.635ZM17.45 8.721 14.597 5.7 9.82 10.76a.54.54 0 0 0-.137.27l-.536 2.84c-.07.37.239.696.588.622l2.682-.567a.492.492 0 0 0 .255-.145l4.778-5.06Z" clip-rule="evenodd"/>
                    </svg>
                    </button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<!-- Main modal edit -->
<div id="static-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full bg-slate-100 bg-opacity-30">
    <div class="relative p-4 ml-44 mt-32 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative  rounded-lg shadow-sm bg-gray-700">
            <!-- Modal header -->
            <div
                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                <h3 class="text-xl font-semibold text-white">
                    Editar Rol
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent  rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center hover:bg-gray-600 hover:text-white"
                    data-modal-hide="static-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5" method="POST" action="#">
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="w-full">
                        <label for="type" class="block mb-2 text-sm font-medium text-white">Cargo</label>
                        <input type="text" name="type" id="type"
                            class="block p-2.5 w-full text-md  rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 bg-gray-600 dark:border-gray-500 placeholder-gray-400 text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            >
                    </div>
                    <div class="w-full">
                        <label for="status" class="block mb-2 text-sm font-medium text-white">Estado</label>
                        <input type="text" name="status" id="status"
                            class="block p-2.5 w-full text-md  rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 bg-gray-600 dark:border-gray-500 placeholder-gray-400 text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                </div>
                <button type="submit"
                    class="text-white inline-flex items-center bg-orange-700 hover:bg-orange-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Actualizar
                </button>
            </form>
        </div>
    </div>
</div>
<!-- Main modal add -->
<div id="crud-modal"  tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full bg-slate-100 bg-opacity-30">
    <div class="relative p-4 ml-44 mt-32 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative  rounded-lg shadow-sm bg-gray-700">
            <!-- Modal header -->
            <div
                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                <h3 class="text-xl font-semibold text-white">
                    Creacion nuevo cargo
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent  rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center hover:bg-gray-600 hover:text-white"
                    data-modal-hide="crud-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5" method="POST" action="/home/settings/role">
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="sm:col-span-2">
                        <label for="type" class="block mb-2 text-sm font-medium text-white text-md">Cargo</label>
                        <input type="text" name="type" id="type"
                            class=" p-2.5 w-full text-md  rounded-lg border  bg-gray-600 border-gray-500 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                            >
                    </div>
                </div>
                <button type="submit"
                    class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Guardar
                </button>
            </form>
        </div>
    </div>
</div>
<!-----End view profile-------->
    </div>
    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
        <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">Dashboard tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
    </div>
    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="settings" role="tabpanel" aria-labelledby="settings-tab">
        <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">Settings tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
    </div>
    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="contacts" role="tabpanel" aria-labelledby="contacts-tab">
        <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">Contacts tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
    </div>
</div>

   </div>
</div>
<?php require_once 'app/Views/layouts/footer.php'; ?>