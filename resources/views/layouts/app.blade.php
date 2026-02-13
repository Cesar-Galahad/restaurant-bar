<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido al Bar - @yield('titulo')</title>
    @vite('resources/css/app.css', 'resources/js/app.js')
</head>
<body>
    <!-- contenido estatico -->
    @if (!isset($noNavbar))
    <header class="fixed w-full z-20 top-0 start-0">
        <nav class="bg-neutral-primary">
            <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-4">
                <a href="https://flowbite.com" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="https://flowbite.com/docs/images/logo.svg" class="h-7" alt="Flowbite Logo" />
                    <span class="self-center text-xl text-heading font-semibold whitespace-nowrap">La lonja</span>
                </a>
                <div class="flex items-center space-x-6 rtl:space-x-reverse">
                    <a href="tel:5541251234" class="text-sm  text-body hover:underline">(555) 412-1234</a>
                                        @auth('empleado')
                    <form method="POST" action="{{ route('empleado.logout') }}">
                        @csrf
                        <button 
                            type="submit"
                            class="text-sm font-medium px-4 py-2 rounded-lg bg-red-600 text-white hover:bg-red-700 transition duration-200"
                        >
                            Cerrar sesión
                        </button>
                    </form>
                    @endauth

                    @guest('empleado')
                    <a href="/ingresar" class="text-sm font-medium text-fg-brand hover:underline">
                        Ingresar
                    </a>
                    @endguest

                </div>
            </div>
        </nav>
        <nav class="bg-neutral-secondary-soft border-y border-default border-default">
            <div class="max-w-screen-xl px-4 py-3 mx-auto">
                <div class="flex items-center">
                    <ul class="flex flex-row font-medium mt-0 space-x-8 rtl:space-x-reverse text-sm">
                        <li>
                            <a href="/inicio" class="text-heading hover:underline" aria-current="page">Inicio</a>
                        </li>
                        <li class="relative group">
                            <!-- Botón -->
                            <div class="flex items-center gap-1 cursor-pointer text-heading hover:underline">
                                Empleados
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>

                            <!-- Dropdown -->
                            <div class="absolute left-0 top-full hidden group-hover:block pt-2">
                                <ul class="bg-white shadow-lg rounded-md w-48 border">
                                    <li>
                                        <a href="/empleado/listado"
                                        class="block px-4 py-2 hover:bg-neutral-secondary-soft">
                                            Listado
                                        </a>
                                    </li>
                                    @auth('empleado')
                                    @if(auth()->guard('empleado')->user()->rol === 'Administrador')
                                    <li>
                                        <a href="/empleado/registro"
                                        class="block px-4 py-2 hover:bg-neutral-secondary-soft">
                                            Registrar
                                        </a>
                                    </li>
                                    @endif
                                    @endauth
                                </ul>
                            </div>
                        </li>
                        <li class="relative group">
                            <div class="flex items-center gap-1 cursor-pointer text-heading hover:underline">
                                Categorías
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>

                            <div class="absolute left-0 top-full hidden group-hover:block pt-2">
                                <ul class="bg-white shadow-lg rounded-md w-48 border">
                                    <li>
                                        <a href="/categoria/listado"
                                        class="block px-4 py-2 hover:bg-neutral-secondary-soft">
                                            Listado
                                        </a>
                                    </li>
                                    @auth('empleado')
                                    @if(auth()->guard('empleado')->user()->rol === 'Administrador')
                                    <li>
                                        <a href="/categoria/registro"
                                        class="block px-4 py-2 hover:bg-neutral-secondary-soft">
                                            Registrar
                                        </a>
                                    </li>
                                    @endif
                                    @endauth
                                </ul>
                            </div>
                        </li>

                        <li class="relative group">
                            <!-- Botón -->
                            <div class="flex items-center gap-1 cursor-pointer text-heading hover:underline">
                                Productos
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>

                            <!-- Dropdown -->
                            <div class="absolute left-0 top-full hidden group-hover:block pt-2">
                                <ul class="bg-white shadow-lg rounded-md w-48 border">
                                    <li>
                                        <a href="/producto/listado"
                                        class="block px-4 py-2 hover:bg-neutral-secondary-soft">
                                            Listado
                                        </a>
                                    </li>
                                    @auth('empleado')
                                    @if(auth()->guard('empleado')->user()->rol === 'Administrador')
                                    <li>
                                        <a href="/producto/registro"
                                        class="block px-4 py-2 hover:bg-neutral-secondary-soft">
                                            Registrar
                                        </a>
                                    </li>
                                    @endif
                                    @endauth
                                </ul>
                            </div>
                        </li>
                        <li class="relative group">
                            <div class="flex items-center gap-1 cursor-pointer text-heading hover:underline">
                                Clientes
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>

                            <div class="absolute left-0 top-full hidden group-hover:block pt-2">
                                <ul class="bg-white shadow-lg rounded-md w-48 border">
                                    <li>
                                        <a href="/cliente/listado"
                                        class="block px-4 py-2 hover:bg-neutral-secondary-soft">
                                            Listado
                                        </a>
                                    </li>
                                    @auth('empleado')
                                    @if(auth()->guard('empleado')->user()->rol === 'Administrador')
                                    <li>
                                        <a href="/cliente/registro"
                                        class="block px-4 py-2 hover:bg-neutral-secondary-soft">
                                            Registrar
                                        </a>
                                    </li>
                                    @endif
                                    @endauth
                                </ul>
                            </div>
                        </li>

                        <li>
                            <a href="/pedido" class="text-heading hover:underline">Pedidos</a>
                        </li>
                        <li>
                            <a href="/geolocalizacion" class="text-heading hover:underline">Localizacion</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
     @endif
    <!-- contenido dinamico -->
    <main class="{{ isset($noNavbar) ? '' : 'pt-32' }}">
        @yield('contenido')
    </main>

</body>
</html>