@extends('/layouts/app')

@section('titulo','Listado categorias')

@section('contenido')
<section class="bg-gray-50 py-8 antialiased dark:bg-gray-900 md:py-16">
  <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">

    <div class="mb-4 flex items-center justify-between gap-4 md:mb-8">
      <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">
        Explora nuestra experiencia
      </h2>

      <a href="#" class="flex items-center text-base font-medium text-primary-700 hover:underline dark:text-primary-500">
        Ver menú completo
        <svg class="ms-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
          <path stroke="currentColor" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4"/>
        </svg>
      </a>
    </div>

    <div class="grid gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3">

      @forelse($categorias as $categoria)
        <a href="#"
           class="flex items-center rounded-lg border border-gray-200 bg-white px-4 py-3 hover:bg-gray-50
                  dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
          <span class="text-sm font-medium text-gray-900 dark:text-white">
            {{ $categoria->nombre }}
          </span>
        </a>
      @empty
        <p class="text-gray-500 dark:text-gray-400">
          No hay categorías registradas.
        </p>
      @endforelse

    </div>
  </div>
</section>

@endsection
