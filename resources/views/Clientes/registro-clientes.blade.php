@extends('/layouts/app')

@section('titulo','Registro clientes')

@section('contenido')
<section class="bg-gray-50 dark:bg-gray-900">
  <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">

      <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
          <img class="w-8 h-8 mr-2" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/logo.svg" alt="logo">
          Flowbite
      </a>

      <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
          <div class="p-6 space-y-4 md:space-y-6 sm:p-8">

              <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                  Crear una cuenta
              </h1>

              <form class="space-y-4 md:space-y-6" action="/cliente/store" method="POST">
                @csrf
                  <div>
                      <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                          Nombre
                      </label>
                      <input type="text" name="nombre" required
                          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                  </div>
                  <div>
                      <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                          Apellido
                      </label>
                      <input type="text" name="apellido" required
                          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                  </div>
                  <div>
                      <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                          Tu correo electrónico
                      </label>
                      <input type="email" name="correo" required
                          placeholder="nombre@ejemplo.com"
                          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                  </div>
                  <div>
                      <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                          Contraseña
                      </label>
                      <input type="password" name="contrasena" required
                          placeholder="••••••••"
                          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                  </div>
                  <div>
                      <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                          Confirmar contraseña
                      </label>
                      <input type="password" name="confirmar_contrasena" required
                          placeholder="••••••••"
                          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                  </div>
                  <input type="hidden" name="estado" value="Activo">

                  <div class="flex items-start">
                      <div class="flex items-center h-5">
                        <input id="terms" type="checkbox" required
                          class="w-4 h-4 border border-gray-300 rounded bg-gray-50">
                      </div>
                      <div class="ml-3 text-sm">
                        <label for="terms" class="font-light text-gray-500 dark:text-gray-300">
                          Acepto los
                          <a class="font-medium text-primary-600 hover:underline" href="#">
                            Términos y condiciones
                          </a>
                        </label>
                      </div>
                  </div>

                  <button type="submit"
                      class="w-full text-white bg-primary-600 hover:bg-primary-700 font-medium rounded-lg text-sm px-5 py-2.5">
                      Guardar
                  </button>

                  <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                      ¿Ya tienes una cuenta?
                      <a href="#" class="font-medium text-primary-600 hover:underline">
                          Inicia sesión aquí
                      </a>
                  </p>

              </form>
          </div>
      </div>
  </div>
</section>
@endsection
