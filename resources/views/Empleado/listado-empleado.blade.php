@extends('/layouts/app')

@section('titulo','Mostrar empleados')

@section('contenido')

<section class="bg-white dark:bg-gray-900">
  <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-6">

    <div class="mx-auto mb-8 max-w-screen-sm lg:mb-16">
      <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">
        Nuestro equipo
      </h2>
      <p class="font-light text-gray-500 sm:text-xl dark:text-gray-400">
        Conoce al equipo que hace posible la experiencia de nuestro restaurante bar.
      </p>
    </div>

    <div class="grid gap-8 lg:gap-16 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">

      @forelse($empleados as $empleado)
        <div class="text-center text-gray-500 dark:text-gray-400">

          
          <img
            class="mx-auto mb-4 w-36 h-36 rounded-full"
            src="https://ui-avatars.com/api/?name={{ urlencode($empleado->nombre.' '.$empleado->apellido) }}&background=0D8ABC&color=fff"
            alt="Avatar">

         
          <h3 class="mb-1 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
            {{ $empleado->nombre }} {{ $empleado->apellido }}
          </h3>

          
          <p class="mb-2">
            {{ $empleado->estado }}
          </p>

          
          <div class="mt-3">
            <a href="#"
               class="inline-block px-4 py-2 text-sm font-medium text-white bg-primary-600 rounded hover:bg-primary-700">
              Ver perfil
            </a>
          </div>

        </div>
      @empty
        <p class="col-span-4 text-gray-500">
          No hay empleados registrados.
        </p>
      @endforelse

    </div>
  </div>
</section>

@endsection
