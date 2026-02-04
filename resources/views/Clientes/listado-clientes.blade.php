@extends('/layouts/app')

@section('titulo','Listado Clientes')

@section('contenido')
<section class="bg-gray-50 dark:bg-gray-900 py-8">
  <div class="max-w-screen-xl mx-auto px-4">

    
    <div class="mb-6">
      <h2 class="text-2xl font-extrabold text-gray-900 dark:text-white">
        Clientes
      </h2>
      <p class="text-gray-500 dark:text-gray-400">
        Listado de clientes registrados en el sistema.
      </p>
    </div>

    
    <div class="relative overflow-x-auto shadow-sm sm:rounded-lg">
      <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-800 dark:text-gray-300">
          <tr>
            <th class="px-6 py-3">Cliente</th>
            <th class="px-6 py-3">Correo electrónico</th>
            <th class="px-6 py-3">Estado</th>
            <th class="px-6 py-3 text-right">Acción</th>
          </tr>
        </thead>

        <tbody>
          @forelse($clientes as $cliente)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
              <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                {{ $cliente->nombre }} {{ $cliente->apellido }}
              </td>

              <td class="px-6 py-4">
                {{ $cliente->correo }}
              </td>

              <td class="px-6 py-4">
                <span class="px-2 py-1 rounded text-xs
                  {{ $cliente->estado === 'Activo'
                      ? 'bg-green-100 text-green-800'
                      : 'bg-red-100 text-red-800' }}">
                  {{ $cliente->estado }}
                </span>
              </td>

              <td class="px-6 py-4 text-right">
                <a href="/cliente/{{ $cliente->id }}/actualizar"
                   class="font-medium text-primary-600 hover:underline dark:text-primary-500">
                  Ver perfil
                </a>
              </td>

              <td>
                <form action="/cliente/{{ $cliente->id }}/eliminar" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="text-red-600 hover:text-red-800">Eliminar</button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                No hay clientes registrados.
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

  </div>
</section>
@endsection
