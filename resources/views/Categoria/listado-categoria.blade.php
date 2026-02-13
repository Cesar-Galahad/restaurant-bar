@extends('/layouts/app')

@section('titulo','Listado categorias')

@section('contenido')
<section class="bg-white dark:bg-gray-900">
  <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">

    <div class="mx-auto max-w-screen-sm text-center mb-8 lg:mb-16">
      <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">
        Nuestras Categorías
      </h2>
      <p class="font-light text-gray-500 sm:text-xl dark:text-gray-400">
        Explora todas las categorías disponibles en el sistema
      </p>
    </div>

    <div class="grid gap-8 mb-6 lg:mb-16 md:grid-cols-2">

      @forelse($categorias as $categoria)
        <div class="items-center bg-gray-50 rounded-lg shadow sm:flex dark:bg-gray-800 dark:border-gray-700">
          
          <img 
            class="w-full sm:w-48 h-48 object-cover rounded-lg sm:rounded-none sm:rounded-l-lg"
            src="{{ $categoria->imagen ? asset('storage/'.$categoria->imagen) : asset('img/no-image.png') }}"
            alt="Imagen categoría">

          <div class="p-5 w-full">
            <h3 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">
              {{ $categoria->nombre }}
            </h3>

            <span class="text-gray-500 dark:text-gray-400">
              Categoría ID: {{ $categoria->id }}
            </span>

            <p class="mt-3 mb-4 font-light text-gray-500 dark:text-gray-400">
              Gestiona esta categoría desde las opciones disponibles.
            </p>

            @auth('empleado')
            @if(auth()->guard('empleado')->user()->rol === 'Administrador')
            <div class="flex gap-4">
              <a href="/categoria/{{ $categoria->id }}/actualizar"
                class="text-sm font-medium text-blue-600 hover:underline">
                Editar
              </a>

              <form action="/categoria/{{ $categoria->id }}/eliminar" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="text-sm font-medium text-red-600 hover:underline">
                  Eliminar
                </button>
              </form>
            </div>
            @endif
            @endauth

          </div>

        </div>
      @empty
        <div class="col-span-2 text-center">
          <p class="text-gray-500 dark:text-gray-400">
            No hay categorías registradas.
          </p>
        </div>
      @endforelse

    </div>
  </div>
</section>
@endsection
