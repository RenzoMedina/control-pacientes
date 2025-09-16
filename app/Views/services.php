<?php require_once 'layouts/header.php'; ?>
<?php include_once 'components/navbar.php'; ?>
      <div class="container mx-auto">
         <div class="row">
            <?php include_once 'components/navbar.php'; ?>
         </div>
         <div class="flex flex-col justify-center items-center gap-10 my-32 md:flex md:flex-row md:justify-center md:items-center md:gap-10 md:my-40 w-">
               <div class="content">
                  <!-- Main heading -->
            <div class="mb-8 float">
                <h1 class="text-6xl md:text-8xl font-black text-transparent bg-clip-text bg-gradient-to-r from-blue-400 via-purple-400 to-pink-400 mb-4">
                    Próximamente sección de Servicios
                </h1>
                <div class="h-1 w-32 bg-gradient-to-r from-blue-500 to-purple-500 mx-auto rounded-full"></div>
            </div>

            <!-- Subtitle -->
            <p class="text-xl md:text-2xl text-gray-300 mb-8 leading-relaxed">
                Estamos trabajando arduamente para traerte algo
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-orange-400 font-semibold">increíble</span>
            </p>

            <!-- Description -->
            <div class="bg-white/10 backdrop-blur-md rounded-2xl p-8 mb-8 border border-white/20">
                <h2 class="text-2xl font-bold text-gray-600 mb-4">🚧 En Construcción</h2>
                <p class="text-gray-600 text-lg leading-relaxed">
                    Nuestro equipo está dando los toques finales a esta nueva sección. 
                    Muy pronto podrás disfrutar de una experiencia completamente renovada 
                    con nuevas funcionalidades y un diseño espectacular.
                </p>
            </div>

            <!-- Progress bar -->
            <div class="mb-8">
                <div class="flex justify-between text-sm text-gray-600 mb-2">
                    <span>Progreso del desarrollo</span>
                    <span>75%</span>
                </div>
                <div class="w-full bg-gray-700 rounded-full h-3 overflow-hidden">
                    <div class="bg-gradient-to-r from-green-400 to-blue-500 h-3 rounded-full transition-all duration-1000 ease-out" style="width: 75%"></div>
                </div>
            </div>

               </div>
         </div> 
      </div>
<?php require_once 'layouts/footer.php'; ?>