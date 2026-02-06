@extends('layouts.app')

@section('titulo', 'Geolocalización')

@section('contenido')
<section class="bg-gray-50 dark:bg-gray-900 py-8 md:py-16">
    <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">

        <!-- Título -->
        <div class="mb-6">
            <h2 class="text-2xl font-semibold text-gray-900 dark:text-white">
                Información de localización
            </h2>
            <p class="text-sm text-gray-600 dark:text-gray-400">
                Datos obtenidos automáticamente según tu IP
            </p>
        </div>

        <!-- Grid -->
        <div class="grid gap-6 md:grid-cols-2">

            <!-- Card datos -->
            <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm
                        dark:border-gray-700 dark:bg-gray-800">

                @if($location && is_array($location))
                    <ul class="space-y-3 text-sm text-gray-700 dark:text-gray-300">
                        <li><strong>IP:</strong> {{ $location['ip'] ?? 'N/A' }}</li>
                        <li><strong>País:</strong> {{ $location['country_name'] ?? 'N/A' }}</li>
                        <li><strong>Región:</strong> {{ $location['region_name'] ?? 'N/A' }}</li>
                        <li><strong>Ciudad:</strong> {{ $location['city'] ?? 'N/A' }}</li>
                        <li><strong>Código postal:</strong> {{ $location['zip'] ?? 'N/A' }}</li>
                        <li><strong>Latitud:</strong> {{ $location['latitude'] ?? 'N/A' }}</li>
                        <li><strong>Longitud:</strong> {{ $location['longitude'] ?? 'N/A' }}</li>
                    </ul>
                @else
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        No se pudo obtener la información de localización.
                    </p>
                @endif

            </div>

            <!-- Mapa -->
            <div class="rounded-lg border border-gray-200 bg-white p-4 shadow-sm
                        dark:border-gray-700 dark:bg-gray-800">

                @if($location && !empty($location['latitude']) && !empty($location['longitude']))
                    <div id="map" class="h-80 w-full rounded-md"></div>
                @else
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        Mapa no disponible sin coordenadas válidas.
                    </p>
                @endif

            </div>
        </div>
    </div>
</section>

<!-- Leaflet -->
<link
  rel="stylesheet"
  href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
/>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

@if($location && !empty($location['latitude']) && !empty($location['longitude']))
<script>
    const lat = {{ $location['latitude'] }};
    const lng = {{ $location['longitude'] }};

    const map = L.map('map').setView([lat, lng], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    L.marker([lat, lng]).addTo(map)
        .bindPopup('Tu ubicación aproximada')
        .openPopup();
</script>
@endif
@endsection


