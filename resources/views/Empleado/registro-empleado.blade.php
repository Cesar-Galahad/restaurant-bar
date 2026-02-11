@extends('/layouts/app')

@section('titulo','Crear empleado')

@section('contenido')

<form class="max-w-md mx-auto"
      method="POST"
      action="/empleado/store"
      enctype="multipart/form-data">
@csrf

    <div class="relative z-0 w-full mb-5 group">
        <input type="email" name="correo"
            class="block py-2.5 px-0 w-full text-sm text-heading bg-transparent border-0 border-b-2 border-default-medium focus:outline-none focus:ring-0 focus:border-brand peer"
            placeholder=" " required />
        <label class="absolute text-sm text-body duration-300 transform -translate-y-6 scale-75 top-3 -z-10">
            Correo
        </label>
    </div>

    <div class="relative z-0 w-full mb-5 group">
        <input type="password" name="contrasena"
            class="block py-2.5 px-0 w-full text-sm text-heading bg-transparent border-0 border-b-2 border-default-medium focus:outline-none focus:ring-0 focus:border-brand peer"
            placeholder=" " required />
        <label class="absolute text-sm text-body duration-300 transform -translate-y-6 scale-75 top-3 -z-10">
            Contraseña
        </label>
    </div>

    <div class="relative z-0 w-full mb-5 group">
        <input type="password" name="confirmar_contrasena"
            class="block py-2.5 px-0 w-full text-sm text-heading bg-transparent border-0 border-b-2 border-default-medium focus:outline-none focus:ring-0 focus:border-brand peer"
            placeholder=" " required />
        <label class="absolute text-sm text-body duration-300 transform -translate-y-6 scale-75 top-3 -z-10">
            Confirmar contraseña
        </label>
    </div>

    <div class="grid md:grid-cols-2 md:gap-6">
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="nombre"
                class="block py-2.5 px-0 w-full text-sm text-heading bg-transparent border-0 border-b-2 border-default-medium focus:outline-none focus:ring-0 focus:border-brand"
                required />
            <label class="absolute text-sm text-body duration-300 transform -translate-y-6 scale-75 top-3 -z-10">
                Nombre
            </label>
        </div>

        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="apellido"
                class="block py-2.5 px-0 w-full text-sm text-heading bg-transparent border-0 border-b-2 border-default-medium focus:outline-none focus:ring-0 focus:border-brand"
                required />
            <label class="absolute text-sm text-body duration-300 transform -translate-y-6 scale-75 top-3 -z-10">
                Apellido
            </label>
        </div>
    </div>

    <div class="relative z-0 w-full mb-5 group">
        <input type="text" name="usuario"
            class="block py-2.5 px-0 w-full text-sm text-heading bg-transparent border-0 border-b-2 border-default-medium focus:outline-none focus:ring-0 focus:border-brand"
            required />
        <label class="absolute text-sm text-body duration-300 transform -translate-y-6 scale-75 top-3 -z-10">
            Usuario
        </label>
    </div>

    {{-- 🔥 INPUT IMAGEN NUEVO --}}
    <div class="mb-5">
        <label class="block text-sm mb-2">Imagen del empleado</label>
        <input type="file" name="imagen"
            class="block w-full text-sm border border-default-medium rounded-base cursor-pointer">
    </div>

    <div class="relative z-0 w-full mb-5 group">
        <select name="rol"
            class="block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 border-default-medium focus:outline-none focus:ring-0 focus:border-brand">
            <option value="Administrador">Administrador</option>
            <option value="Cajero">Cajero</option>
            <option value="Empleado">Empleado</option>
        </select>
    </div>

    <input type="hidden" name="estado" value="Activo">

    <button type="submit"
        class="text-white bg-brand hover:bg-brand-strong shadow-xs font-medium rounded-base text-sm px-4 py-2.5">
        Registrar
    </button>
</form>

@endsection
