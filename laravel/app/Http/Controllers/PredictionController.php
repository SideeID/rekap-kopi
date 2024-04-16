<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use GuzzleHttp\Client;

// class PredictionController extends Controller
// {
//     public function upload(Request $request)
//     {
//         $image = $request->file('image');

//         if ($image) {
//             $client = new Client();

//             try {
//                 $response = $client->post('http://localhost:5000/predict', [
//                     'multipart' => [
//                         [
//                             'name' => 'image',
//                             'contents' => fopen($image->getRealPath(), 'r'),
//                             'filename' => $image->getClientOriginalName()
//                         ]
//                     ]
//                 ]);

//                 $prediction = json_decode($response->getBody(), true)['prediction'];

//                 return view('prediksi', ['prediction' => $prediction]);

//             } catch (\Exception $e) {
//                 return response()->json(['error' => 'Error communicating with Flask API'], 500);
//             }
//         }

//         return response()->json(['error' => 'Image not provided'], 400);
//     }
// }

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class PredictionController extends Controller
{
    /**
     * @var array
     */
    protected $priceMapping = [
        'light' => 220000,
        'dark' => 260000,
        'green' => 180000,
        'medium' => 200000
    ];

    /**
     * Handles the image upload and makes a prediction request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse
     */
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

                $body = json_decode($response->getBody(), true);
                $prediction = $body['prediction'];

                // Determine the price based on the predicted coffee type
                $predictedPrice = $this->priceMapping[strtolower($prediction)] ?? null;

                if ($predictedPrice === null) {
                    return response()->json(['error' => 'Invalid coffee type predicted'], 400);
                }
                // Format harga rupiah
                $formattedPrice = 'Rp ' . number_format($predictedPrice, 0, ',', '.');

                return view('prediksi', [
                    'prediction' => $prediction,
                    'predictedPrice' => $formattedPrice
                ]);

            } catch (\Exception $e) {
                return response()->json(['error' => 'Error communicating with Flask API: ' . $e->getMessage()], 500);
            }
        }

        return response()->json(['error' => 'Image not provided'], 400);
    }
}
