<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;

class ProfileController extends Controller
{
    protected $database;

    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function showFarmers()
    {
        // Fetch all farmers from Firebase
        $farmers = $this->database->getReference('Users')->getValue();

        // Pass the data to the view
        return view('list.farmers-lists', ['Users' => $farmers]);
    }

    public function getFarmerData(Request $request, $id)
    {
        $serviceAccountPath = base_path('resources/credentials/firebase_credentials.json');
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccountPath)
            ->withDatabaseUri('https://cacaotrace-f69ac-default-rtdb.asia-southeast1.firebasedatabase.app/');
        $this->database = $firebase->createDatabase();

        try {
            $farmer = $this->database->getReference('Users/' . $id)->getValue();
            if (!$farmer) {
                throw new \Exception('Farmer not found');
            }

            $data = [
                'success' => true,
                'data' => $farmer['LocationProfile'] ?? [],
                'profile' => $farmer['UserProfile'] ?? []
            ];

            return response()->json($data);
        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 404);
        }
    }

}
