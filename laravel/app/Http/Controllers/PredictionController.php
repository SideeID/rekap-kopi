<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class PredictionController extends Controller
{
    public function upload(Request $request)
    {
        $image = $request->file('image');

        if ($image) {
            $client = new Client();

            try {
                $response = $client->post('http://localhost:5000/predict', [
                    'multipart' => [
                        [
                            'name' => 'image',
                            'contents' => fopen($image->getRealPath(), 'r'),
                            'filename' => $image->getClientOriginalName()
                        ]
                    ]
                ]);

                $prediction = json_decode($response->getBody(), true)['prediction'];

                return view('prediksi', ['prediction' => $prediction]);

            } catch (\Exception $e) {
                return response()->json(['error' => 'Error communicating with Flask API'], 500);
            }
        }

        return response()->json(['error' => 'Image not provided'], 400);
    }
}
