<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GeolocalizacionController extends Controller
{
    public function index(Request $request)
    {
        $ip = '187.212.205.215'; // IP pública de prueba

        $response = Http::get('http://api.ipstack.com/' . $ip, [
            'access_key' => env('IPSTACK_API_KEY'),
        ]);

        $location = $response->json();

        return view('geolocalizacion', compact('location'));
    }
}


