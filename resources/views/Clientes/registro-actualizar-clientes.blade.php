@extends('/layouts/app')

@section('titulo','Actualizar cliente')

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
                    Actualizar cuenta
              </h1>

              <form class="space-y-4 md:space-y-6" action="/cliente/{{ $clientes->id }}/actualizar" method="POST">
                @csrf
                  <div>
                      <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                          Nombre
                      </label>
                      <input type="text" name="nombre" required value="{{$clientes->nombre}}"
                          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                  </div>
                  <div>
                      <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                          Apellido
                      </label>
                      <input type="text" name="apellido" required value="{{$clientes->apellido}}"
                          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                  </div>
                  <div>
                      <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                          correo electrónico
                      </label>
                      <input type="email" name="correo" required value="{{$clientes->correo}}"
                          placeholder="nombre@ejemplo.com"
                          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                  </div>
                  <div>
                      <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                          Contraseña
                      </label>
                      <input type="password" name="contrasena" required value="{{$clientes->contrasena}}"
                          placeholder="••••••••"
                          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                  </div>
                  <div>
                      <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                          Confirmar contraseña
                      </label>
                      <input type="password" name="confirmar_contrasena" required value="{{$clientes->contrasena}}"
                          placeholder="••••••••"
                          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                  </div>
                  <select name="estado" id="estado" class="block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 border-default-medium focus:outline-none focus:ring-0 focus:border-brand">
                      <option value="Activo" {{$clientes->estado == 'Activo'}}>Activo</option>
                      <option value="Inactivo" {{$clientes->estado == 'Inactivo'}}>Inactivo</option>
                    </select>

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
