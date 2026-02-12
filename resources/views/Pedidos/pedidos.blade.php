@extends('/layouts/app')

@section('titulo','Pedidos')

@section('contenido')
<section class="bg-gray-50 dark:bg-gray-900 py-8">
  <div class="max-w-screen-lg mx-auto px-4">

    <div class="mb-6">
      <h2 class="text-2xl font-extrabold text-gray-900 dark:text-white">
        Pedidos
      </h2>
      <p class="text-gray-500 dark:text-gray-400">
        Consulta los pedidos realizados y revisa sus detalles.
      </p>
    </div>
    <div class="relative overflow-x-auto shadow-sm sm:rounded-lg">
      <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-800 dark:text-gray-300">
          <tr>
            <th scope="col" class="px-6 py-3">
              Pedido
            </th>
            <th scope="col" class="px-6 py-3">
              Cantidad de artículos
            </th>
            <th scope="col" class="px-6 py-3 text-right">
              Acción
            </th>
          </tr>
        </thead>
        <tbody>
          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
            <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
              Pedido #65
            </td>
            <td class="px-6 py-4">
              3
            </td>
            <td class="px-6 py-4 text-right">
              <a href="#" class="font-medium text-primary-600 hover:underline dark:text-primary-500">
                Ver detalles
              </a>
            </td>
          </tr>
          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
            <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
              Pedido #66
            </td>
            <td class="px-6 py-4">
              5
            </td>
            <td class="px-6 py-4 text-right">
              <a href="#" class="font-medium text-primary-600 hover:underline dark:text-primary-500">
                Ver detalles
              </a>
            </td>
          </tr>

        </tbody>
      </table>
    </div>

  </div>
</section>
@endsection