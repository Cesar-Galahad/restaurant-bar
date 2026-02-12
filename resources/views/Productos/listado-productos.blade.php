@extends('/layouts/app')

@section('titulo','Listado Productos')

@section('contenido')

<div class="flex flex-wrap justify-center gap-6">

@forelse($productos as $producto)
    <div class="w-full max-w-sm bg-neutral-primary-soft p-6 border border-default rounded-base shadow-xs">
        
        <img class="rounded-base mb-6 w-full h-48 object-cover"
             src="{{ asset('storage/'.$producto->imagen) }}"
             alt="{{ $producto->nombre }}">

        <div>

            <div class="mb-3">
                <span class="text-sm font-semibold
                    {{ $producto->estado == 'Disponible' ? 'text-green-600' : 'text-red-600' }}">
                    {{ $producto->estado }}
                </span>
            </div>

            <h5 class="text-xl text-heading font-semibold tracking-tight">
                {{ $producto->nombre }}
            </h5>

            <p class="text-sm text-gray-600 mt-2">
                {{ $producto->descripcion }}
            </p>

            <div class="flex items-center justify-between mt-6">
                <span class="text-3xl font-extrabold text-heading">
                    ${{ number_format($producto->precio, 2) }}
                </span>

                <button type="button"
                        class="inline-flex items-center text-white bg-brand hover:bg-brand-strong 
                               box-border border border-transparent focus:ring-4 focus:ring-brand-medium 
                               shadow-xs font-medium leading-5 rounded-base text-sm px-3 py-2 focus:outline-none">
                    Agregar al carro
                </button>
            </div>

            <div class="mt-3 text-sm text-gray-500">
                Existencia: {{ $producto->existencia }}
            </div>

            {{-- BOTONES ADMIN --}}
            <div class="flex gap-2 mt-4">

                <!-- ACTUALIZAR -->
                <a href="{{ url('/producto/editar/'.$producto->id) }}"
                   class="px-3 py-2 text-sm text-white bg-yellow-500 hover:bg-yellow-600 rounded-base">
                    Actualizar
                </a>

                <!-- ELIMINAR -->
                <form action="{{ url('/producto/eliminar/'.$producto->id) }}" 
                      method="POST"
                      onsubmit="return confirm('¿Seguro que deseas eliminar este producto?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="px-3 py-2 text-sm text-white bg-red-600 hover:bg-red-700 rounded-base">
                        Eliminar
                    </button>
                </form>

            </div>

        </div>
    </div>

@empty
    <div class="text-center w-full">
        <p class="text-gray-500 text-lg">No hay productos registrados.</p>
    </div>
@endforelse

</div>

@endsection
