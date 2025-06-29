<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PredictionController extends Controller
{
    public function predict(Request $request)
    {
        // Konversi gambar ke base64
        $imageBase64 = base64_encode(file_get_contents($request->file('image')));

        // Kirim request ke Flask
        $response = Http::post('http://127.0.0.1:5000/predict', [
            'image' => $imageBase64
        ]);

        // Ambil hasil dari Flask
        $result = $response->json();

        return view('hasil-prediksi', [
            'prediction' => $result['label'],
            'confidence' => $result['confidence'],
            'recipe' => $result['recipe']
        ]);
    }
}
