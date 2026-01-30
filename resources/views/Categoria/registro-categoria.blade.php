@extends('/layouts/app')

@section('titulo','Registro categorias')

@section('contenido')
<section class="bg-white dark:bg-gray-900">
  <div class="py-8 lg:py-16 px-4 mx-auto max-w-screen-md">

      <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-center text-gray-900 dark:text-white">
        Categorías
      </h2>

      <p class="mb-8 lg:mb-16 font-light text-center text-gray-500 dark:text-gray-400 sm:text-xl">
        Ingresa los datos para crear una nueva categoría
      </p>

      <form action="/categoria/store" method="POST" enctype="multipart/form-data" class="space-y-8">
          @csrf
          <div>
              <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                Nombre
              </label>
              <input
                type="text"
                name="nombre"
                required
                placeholder="Ejemplo: Bebidas"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5
                       dark:bg-gray-700 dark:border-gray-600 dark:text-white">
          </div>
          <div>
              <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                Imagen
              </label>
              <input
                type="file"
                name="imagen"
                accept="image/*"
                required
                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer
                       bg-gray-50 dark:text-white dark:bg-gray-700 dark:border-gray-600">
          </div>
          <button
            type="submit"
            class="py-3 px-5 text-sm font-medium text-center text-white rounded-lg bg-primary-700
                   hover:bg-primary-800 focus:ring-4 focus:ring-primary-300">
            Crear categoría
          </button>

      </form>

  </div>
</section>
@endsection
