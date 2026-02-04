@extends('/layouts/app')

@section('titulo','Actualizar empleado')

@section('contenido')

<form class="max-w-md mx-auto"
      method="POST"
      action="/empleado/{{ $empleados->id }}/actualizar">
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
        <label for="contrasena" class="absolute text-sm text-body duration-300 transform -translate-y-6 scale-75 top-3 -z-10">
            Contraseña
        </label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input type="password" name="confirmar_contrasena" id="confirmar_contrasena"
            class="block py-2.5 px-0 w-full text-sm text-heading bg-transparent border-0 border-b-2 border-default-medium appearance-none focus:outline-none focus:ring-0 focus:border-brand peer"
            placeholder=" " required value="{{$empleados->contrasena}}" />
        <label for="confirmar_contrasena" class="absolute text-sm text-body duration-300 transform -translate-y-6 scale-75 top-3 -z-10">
            Confirmar contraseña
        </label>
    </div>
    <div class="grid md:grid-cols-2 md:gap-6">
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="nombre" id="nombre"
                class="block py-2.5 px-0 w-full text-sm text-heading bg-transparent border-0 border-b-2 border-default-medium appearance-none focus:outline-none focus:ring-0 focus:border-brand peer"
                placeholder=" " required value="{{$empleados->nombre}}" />
            <label for="nombre" class="absolute text-sm text-body duration-300 transform -translate-y-6 scale-75 top-3 -z-10">
                Nombre
            </label>
        </div>

        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="apellido" id="apellido"
                class="block py-2.5 px-0 w-full text-sm text-heading bg-transparent border-0 border-b-2 border-default-medium appearance-none focus:outline-none focus:ring-0 focus:border-brand peer"
                placeholder=" " required value="{{$empleados->apellido}}" />
            <label for="apellido" class="absolute text-sm text-body duration-300 transform -translate-y-6 scale-75 top-3 -z-10">
                Apellido
            </label>
        </div>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input type="text" name="usuario" id="usuario"
            class="block py-2.5 px-0 w-full text-sm text-heading bg-transparent border-0 border-b-2 border-default-medium appearance-none focus:outline-none focus:ring-0 focus:border-brand peer"
            placeholder=" " required value="{{$empleados->usuario}}" />
        <label for="usuario" class="absolute text-sm text-body duration-300 transform -translate-y-6 scale-75 top-3 -z-10">
            Usuario
        </label>
    </div>

    <div class="relative z-0 w-full mb-5 group">
        <select name="rol"
            class="block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 border-default-medium focus:outline-none focus:ring-0 focus:border-brand">
            <option value="Administrador" {{$empleados->rol == 'Administrador'}}>Administrador</option>
            <option value="Cajero" {{$empleados->rol == 'Cajero'}}>Cajero</option>
            <option value="Empleado" {{$empleados->rol == 'Empleado'}}>Empleado</option>
        </select>
    </div>

    <select name="estado" id="estado" class="block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 border-default-medium focus:outline-none focus:ring-0 focus:border-brand">
        <option value="Activo" {{$empleados->estado == 'Activo'}}>Activo</option>
        <option value="Inactivo" {{$empleados->estado == 'Inactivo'}}>Inactivo</option>
    </select>

    <button type="submit"
        class="text-white bg-brand hover:bg-brand-strong shadow-xs font-medium rounded-base text-sm px-4 py-2.5">
        Actualizar
    </button>
</form>

@endsection
