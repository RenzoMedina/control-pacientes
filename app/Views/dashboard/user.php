<?php require_once 'app/Views/layouts/header.php'; ?>
<?php require_once 'app/Views/dashboard/home.php'; ?>
<div class="p-4 sm:ml-64">
    <div class="p-4 mt-10">
        <p class="px-10 text-4xl font-extrabold mb-2">Usuarios</p>
        <div class="mx-auto max-w-screen-xl px-4 lg:px-10">
            <!-- Start coding here -->
            <div class="bg-white relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="flex flex-col md:flex-row justify-end space-y-3 md:space-y-0 md:space-x-4 p-4 ">
                    <button type="button" data-modal-target="static-modal" data-modal-toggle="static-modal"
                        class="flex items-center justify-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2   focus:outline-none ">
                        <svg class="w-5 h-5 text-white " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M9 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H7Zm8-1a1 1 0 0 1 1-1h1v-1a1 1 0 1 1 2 0v1h1a1 1 0 1 1 0 2h-1v1a1 1 0 1 1-2 0v-1h-1a1 1 0 0 1-1-1Z"
                                clip-rule="evenodd" />
                        </svg>
                        Agregar Usuario
                    </button>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 ">
                        <thead class="text-xs text-gray-100 uppercase bg-gray-700 ">
                            <tr>
                                <th scope="col" class="px-4 py-3">Rut</th>
                                <th scope="col" class="px-4 py-3">Nombre</th>
                                <th scope="col" class="px-4 py-3">Apellido</th>
                                <th scope="col" class="px-4 py-3">Correo</th>
                                <th scope="col" class="px-4 py-3">Cargo</th>
                                <th scope="col" class="px-4 py-3">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php foreach($users as $usuario): ?>

                            <tr class="border-b border-gray-700">
                                <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap "><?php echo $usuario['rut']?></th>
                                <td class="px-4 py-3"><?php echo $usuario['name']?></td>
                                <td class="px-4 py-3"><?php echo $usuario['last_name']?></td>
                                <td class="px-4 py-3"><?php echo $usuario['email']?></td>
                                <td class="px-4 py-3"><?php echo $usuario['role']['type']?></td>
                                <td class="px-4 py-3 flex items-center justify-end">
                                    <button id="apple-imac-27-dropdown-button"
                                        data-dropdown-toggle="apple-imac-27-dropdown"
                                        class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100"
                                        type="button">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                        </svg>
                                    </button>
                                    <div id="apple-imac-27-dropdown"
                                        class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                            aria-labelledby="apple-imac-27-dropdown-button">
                                            <li>
                                                <a href="#"
                                                    class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Ver
                                                    Detalle</a>
                                            </li>
                                            <li>
                                                <a href="#"
                                                    class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Editar</a>
                                            </li>
                                        </ul>
                                        <div class="py-1">
                                            <a href="#"
                                                class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Eliminar</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4"
                    aria-label="Table navigation">
                    <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                        Showing
                        <span class="font-semibold text-gray-900 ">1-10</span>
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
</div>
<!-- Main modal -->
<div id="static-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full bg-slate-100 bg-opacity-30">
    <div class="relative p-4 ml-44 mt-32 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative  rounded-lg shadow-sm bg-gray-700">
            <!-- Modal header -->
            <div
                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                <h3 class="text-xl font-semibold text-white">
                    Creación nuevo colaborador
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
            <form class="p-4 md:p-5" method="POST" action="/home/users">
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="w-full">
                        <label for="brand" class="block mb-2 text-sm font-medium text-white">R.U.N</label>
                        <input type="text" name="rut" id="brand"
                            class="block p-2.5 w-full text-md  rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 bg-gray-600 dark:border-gray-500 placeholder-gray-400 text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 "
                            placeholder="11.111.111-1" required="">
                    </div>
                    <div class="w-full">
                        <label for="name" class="block mb-2 text-sm font-medium text-white">Nombres</label>
                        <input type="text" name="name" id="name"
                            class="block p-2.5 w-full text-md  rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 bg-gray-600 dark:border-gray-500 placeholder-gray-400 text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Ej: Juan Miguel" required="">
                    </div>
                    <div class="w-full">
                        <label for="last_name" class="block mb-2 text-sm font-medium text-white">Apellidos</label>
                        <input type="text" name="last_name" id="last_name"
                            class="block p-2.5 w-full text-md  rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 bg-gray-600 dark:border-gray-500 placeholder-gray-400 text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Ej: Pérez Lopez" required="">
                    </div>
                    <div class="w-full">
                        <label for="email" class="block mb-2 text-sm font-medium text-white">Correo</label>
                        <input type="email" name="email" id="email"
                            class="block p-2.5 w-full text-md  rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 bg-gray-600 dark:border-gray-500 placeholder-gray-400 text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="@sysadminclinical.com">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="category" class="block mb-2 text-sm font-medium text-white">Cargo</label>
                        <select id="category" name="role"
                            class="block p-2.5 w-full text-sm  rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 bg-gray-600 dark:border-gray-500 placeholder-gray-400 text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <?php foreach($role as $roles): ?>
                            <option value="<?php echo $roles['type']; ?>"><?php echo $roles['type']; ?></option>
                             <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="w-full">
                        <label for="password" class="block mb-2 text-sm font-medium text-white">Contraseña</label>
                        <input type="password" name="password" id="password"
                            class="block p-2.5 w-full text-md  rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 bg-gray-600 dark:border-gray-500 placeholder-gray-400 text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                </div>
                <button type="submit"
                    class="text-white inline-flex items-center bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Guardar
                </button>
            </form>
        </div>
    </div>
</div>
<?php require_once 'app/Views/layouts/footer.php'; ?>