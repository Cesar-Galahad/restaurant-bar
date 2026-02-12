@extends('/layouts/app')

@section('titulo','Actualizar Producto')

@section('contenido')
<section class="bg-white dark:bg-gray-900">
  <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
      
      <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">
          Actualizar producto
      </h2>

      <form action="{{ url('/producto/actualizar/'.$producto->id) }}" 
            method="POST" 
            enctype="multipart/form-data">
          
          @csrf
          @method('PUT')

          <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">

              <div class="sm:col-span-2">
                  <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                      Nombre del producto
                  </label>
                  <input type="text" name="nombre"
                      value="{{ $producto->nombre }}"
                      class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5"
                      required>
              </div>

              <div class="w-full">
                  <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                      Precio
                  </label>
                  <input type="number" step="0.01" name="precio"
                      value="{{ $producto->precio }}"
                      class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5"
                      required>
              </div>
              <div class="w-full">
                  <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                      Existencia
                  </label>
                  <input type="number" name="existencia"
                      value="{{ $producto->existencia }}"
                      class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5"
                      required>
              </div>
              <div>
                  <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                      Estado
                  </label>
                  <select name="estado"
                      class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5">

                      <option value="Disponible"
                          {{ $producto->estado == 'Disponible' ? 'selected' : '' }}>
                          Disponible
                      </option>

                      <option value="No disponible"
                          {{ $producto->estado == 'No disponible' ? 'selected' : '' }}>
                          No disponible
                      </option>
                  </select>
              </div>

              <div>
                  <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                      Categoría
                  </label>
                  <select name="categoria_id"
                      class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5"
                      required>

                      @foreach($categorias as $categoria)
                          <option value="{{ $categoria->id }}"
                              {{ $producto->categoria_id == $categoria->id ? 'selected' : '' }}>
                              {{ $categoria->nombre }}
                          </option>
                      @endforeach

                  </select>
              </div>

              <div class="sm:col-span-2">
                  <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                      Imagen actual
                  </label>

                  @if($producto->imagen)
                      <img src="{{ asset('storage/'.$producto->imagen) }}" 
                           class="w-32 mb-3 rounded">
                  @endif

                  <input type="file" name="imagen"
                      class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50">
              </div>
              <div class="sm:col-span-2">
                  <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                      Descripción
                  </label>
                  <textarea name="descripcion" rows="4"
                      class="block p-2.5 w-full text-sm bg-gray-50 rounded-lg border border-gray-300"
                      required>{{ $producto->descripcion }}</textarea>
              </div>

          </div>

          <button type="submit"
              class="inline-flex items-center px-5 py-2.5 mt-6 text-sm font-medium text-white bg-yellow-600 rounded-lg hover:bg-yellow-700">
              Actualizar producto
          </button>

      </form>
  </div>
</section>
@endsection
