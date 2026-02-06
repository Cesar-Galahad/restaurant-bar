<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GeolocalizacionController extends Controller
{
    public function index(Request $request)
    {
        $ip = '187.212.205.215'; // mientras estés en local

        try {
            $response = Http::timeout(5)->get(
                'http://api.ipstack.com/' . $ip,
                ['access_key' => env('IPSTACK_API_KEY')]
            );

            if ($response->failed()) {
                $location = null;
            } else {
                $location = $response->json();
            }
        } catch (\Exception $e) {
            $location = null;
        }

        return view('geolocalizacion', compact('location'));
    }
}


