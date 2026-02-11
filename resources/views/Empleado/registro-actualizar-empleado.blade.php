@extends('/layouts/app')

@section('titulo','Actualizar empleado')

@section('contenido')

<form class="max-w-md mx-auto"
      method="POST"
      action="/empleado/{{ $empleados->id }}/actualizar"
      enctype="multipart/form-data">
@csrf

    <div class="relative z-0 w-full mb-5 group">
        <input type="email" name="correo" id="correo"
            class="block py-2.5 px-0 w-full text-sm text-heading bg-transparent border-0 border-b-2 border-default-medium appearance-none focus:outline-none focus:ring-0 focus:border-brand peer"
            placeholder=" " required value="{{$empleados->correo}}" />
        <label for="correo"
            class="absolute text-sm text-body duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0]
                   peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0
                   peer-focus:scale-75 peer-focus:-translate-y-6">
            Correo
        </label>
    </div>

    <div class="relative z-0 w-full mb-5 group">
        <input type="password" name="contrasena" id="contrasena"
            class="block py-2.5 px-0 w-full text-sm text-heading bg-transparent border-0 border-b-2 border-default-medium appearance-none focus:outline-none focus:ring-0 focus:border-brand peer"
            placeholder=" " required value="{{$empleados->contrasena}}" />
        <label class="absolute text-sm text-body duration-300 transform -translate-y-6 scale-75 top-3 -z-10">
            Contraseña
        </label>
    </div>

    <div class="relative z-0 w-full mb-5 group">
        <input type="password" name="confirmar_contrasena" id="confirmar_contrasena"
            class="block py-2.5 px-0 w-full text-sm text-heading bg-transparent border-0 border-b-2 border-default-medium appearance-none focus:outline-none focus:ring-0 focus:border-brand peer"
            placeholder=" " required value="{{$empleados->contrasena}}" />
        <label class="absolute text-sm text-body duration-300 transform -translate-y-6 scale-75 top-3 -z-10">
            Confirmar contraseña
        </label>
    </div>

    <div class="grid md:grid-cols-2 md:gap-6">
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="nombre"
                class="block py-2.5 px-0 w-full text-sm text-heading bg-transparent border-0 border-b-2 border-default-medium focus:outline-none focus:ring-0 focus:border-brand"
                required value="{{$empleados->nombre}}" />
            <label class="absolute text-sm text-body duration-300 transform -translate-y-6 scale-75 top-3 -z-10">
                Nombre
            </label>
        </div>

        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="apellido"
                class="block py-2.5 px-0 w-full text-sm text-heading bg-transparent border-0 border-b-2 border-default-medium focus:outline-none focus:ring-0 focus:border-brand"
                required value="{{$empleados->apellido}}" />
            <label class="absolute text-sm text-body duration-300 transform -translate-y-6 scale-75 top-3 -z-10">
                Apellido
            </label>
        </div>
    </div>

    <div class="relative z-0 w-full mb-5 group">
        <input type="text" name="usuario"
            class="block py-2.5 px-0 w-full text-sm text-heading bg-transparent border-0 border-b-2 border-default-medium focus:outline-none focus:ring-0 focus:border-brand"
            required value="{{$empleados->usuario}}" />
        <label class="absolute text-sm text-body duration-300 transform -translate-y-6 scale-75 top-3 -z-10">
            Usuario
        </label>
    </div>

    <div class="mb-5">
        <label class="block text-sm mb-2">Imagen del empleado</label>

        @if($empleados->imagen)
            <img src="{{ asset($empleados->imagen) }}" class="w-24 h-24 object-cover mb-2 rounded">
        @endif

        <input type="file" name="imagen"
            class="block w-full text-sm border border-default-medium rounded-base cursor-pointer">
    </div>

    <div class="relative z-0 w-full mb-5 group">
        <select name="rol"
            class="block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 border-default-medium focus:outline-none focus:ring-0 focus:border-brand">
            <option value="Administrador" {{$empleados->rol == 'Administrador' ? 'selected' : ''}}>Administrador</option>
            <option value="Cajero" {{$empleados->rol == 'Cajero' ? 'selected' : ''}}>Cajero</option>
            <option value="Empleado" {{$empleados->rol == 'Empleado' ? 'selected' : ''}}>Empleado</option>
        </select>
    </div>

    <select name="estado"
        class="block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 border-default-medium focus:outline-none focus:ring-0 focus:border-brand mb-5">
        <option value="Activo" {{$empleados->estado == 'Activo' ? 'selected' : ''}}>Activo</option>
        <option value="Inactivo" {{$empleados->estado == 'Inactivo' ? 'selected' : ''}}>Inactivo</option>
    </select>

    <button type="submit"
        class="text-white bg-brand hover:bg-brand-strong shadow-xs font-medium rounded-base text-sm px-4 py-2.5">
        Actualizar
    </button>
</form>

@endsection
