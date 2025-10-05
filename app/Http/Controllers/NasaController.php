<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class NasaController extends Controller
{
    public function feed()
    {
        // Usa tu API Key guardada en .env
        $key = env('NASA_API_KEY', '3hfOk8BaLvLnnzP2ArAyVL3Wo2rTr7q4NbrSB9sg');

        // Rango de fechas (3 días desde hoy)
        $start = now()->toDateString();
        $end   = now()->addDays(3)->toDateString();

        // Llamada a la API de la NASA (NeoWs)
        $response = Http::get('https://api.nasa.gov/neo/rest/v1/feed', [
            'start_date' => $start,
            'end_date'   => $end,
            'api_key'    => $key,
        ]);

        $data = $response->json();

        // Si hay error
        if (!isset($data['near_earth_objects'])) {
            return response()->json(['error' => 'No se pudo conectar a la NASA API'], 500);
        }

        // Filtramos la información útil
        $asteroids = [];
        foreach ($data['near_earth_objects'] as $date => $list) {
            foreach ($list as $a) {
                $cad = $a['close_approach_data'][0] ?? [];
                $asteroids[] = [
                    'name'      => $a['name'],
                    'diameter'  => round($a['estimated_diameter']['meters']['estimated_diameter_max'] ?? 0, 2),
                    'velocity'  => round($cad['relative_velocity']['kilometers_per_second'] ?? 0, 2),
                    'distance'  => round(($cad['miss_distance']['kilometers'] ?? 0) / 1000000, 3),
                    'date'      => $cad['close_approach_date'] ?? $date,
                ];
            }
        }

        // Devolvemos JSON
        return response()->json($asteroids);
    }
}
