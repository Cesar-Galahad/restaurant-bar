@extends('/layouts/app')

@section('titulo','Registro Producto')

@section('contenido')
<section class="bg-white dark:bg-gray-900">
  <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
      
      <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">
          Agregar un nuevo producto
      </h2>

      @if ($errors->any())
          <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif

      <form action="/producto/store" 
            method="POST" 
            enctype="multipart/form-data">
          
          @csrf

          <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">

                    
              <div class="sm:col-span-2">
                  <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                      Nombre del producto
                  </label>
                  <input type="text" name="nombre"
                      value="{{ old('nombre') }}"
                      class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5"
                      required>
              </div>
              <div class="w-full">
                  <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                      Precio
                  </label>
                  <input type="number" step="0.01" name="precio"
                      value="{{ old('precio') }}"
                      class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5"
                      required>
              </div>

              <div class="w-full">
                  <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                      Existencia
                  </label>
                  <input type="number" name="existencia"
                      value="{{ old('existencia') }}"
                      class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5"
                      required>
              </div>
              <div>
                  <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                      Estado
                  </label>
                  <select name="estado"
                      class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5"
                      required>
                      <option value="Disponible">Disponible</option>
                      <option value="No disponible">No disponible</option>
                  </select>
              </div>

              <div>
                  <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                      Categoría
                  </label>
                  <select name="categoria_id"
                      class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5"
                      required>
                      <option value="">Seleccione una categoría</option>
                      @foreach($categorias as $categoria)
                          <option value="{{ $categoria->id }}">
                              {{ $categoria->nombre }}
                          </option>
                      @endforeach
                  </select>
              </div>

              <div class="sm:col-span-2">
                  <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                      Imagen
                  </label>
                  <input type="file" name="imagen"
                      class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50"
                      required>
              </div>

              <div class="sm:col-span-2">
                  <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                      Descripción
                  </label>
                  <textarea name="descripcion" rows="4"
                      class="block p-2.5 w-full text-sm bg-gray-50 rounded-lg border border-gray-300"
                      required>{{ old('descripcion') }}</textarea>
              </div>

          </div>

          <button type="submit"
              class="inline-flex items-center px-5 py-2.5 mt-6 text-sm font-medium text-white bg-primary-700 rounded-lg hover:bg-primary-800">
              Agregar producto
          </button>

      </form>
  </div>
</section>
@endsection