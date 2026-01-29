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
    <header class="fixed w-full z-20 top-0 start-0">
        <nav class="bg-neutral-primary">
            <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-4">
                <a href="https://flowbite.com" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="https://flowbite.com/docs/images/logo.svg" class="h-7" alt="Flowbite Logo" />
                    <span class="self-center text-xl text-heading font-semibold whitespace-nowrap">La lonja</span>
                </a>
                <div class="flex items-center space-x-6 rtl:space-x-reverse">
                    <a href="tel:5541251234" class="text-sm  text-body hover:underline">(555) 412-1234</a>
                    <a href="#" class="text-sm font-medium text-fg-brand hover:underline">Ingresar</a>
                </div>
            </div>
        </nav>
        <nav class="bg-neutral-secondary-soft border-y border-default border-default">
            <div class="max-w-screen-xl px-4 py-3 mx-auto">
                <div class="flex items-center">
                    <ul class="flex flex-row font-medium mt-0 space-x-8 rtl:space-x-reverse text-sm">
                        <li>
                            <a href="/hero/inicio" class="text-heading hover:underline" aria-current="page">Inicio</a>
                        </li>
                        <li>
                            <a href="/admins/listado" class="text-heading hover:underline">Administradores</a>
                        </li>
                        <li>
                            <a href="/categorias/registro-categoria" class="text-heading hover:underline">Categorias</a>
                        </li>
                        <li>
                            <a href="/productos/listado-producto" class="text-heading hover:underline">Productos</a>
                        </li>
                        <li>
                            <a href="/clientes/registro-cliente" class="text-heading hover:underline">Clientes</a>
                        </li>
                        <li>
                            <a href="/pedido" class="text-heading hover:underline">Pedidos</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- contenido dinamico -->
    <main class="pt-32">
        @yield('contenido')
    </main>

</body>
</html>