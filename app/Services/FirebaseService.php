<?php

namespace App\Services;

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class FirebaseService
{
    protected $database;
    protected $firestore;

    public function __construct()
    {
        // Fetch the service account credentials from config
        $serviceAccount = config('services.firebase.credentials');

        // Debug the service account file path to ensure it's correct
        ($serviceAccount);  // Use dd() to output the file path

        // Firebase Initialization
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount);

        // Realtime Database
        $this->database = $firebase->createDatabase();

        // Firestore
        $this->firestore = $firebase->createFirestore()->database();
    }

    // Realtime Database methods
    public function getDatabase()
    {
        return $this->database;
    }

    public function getUsers()
    {
        return $this->database->getReference('users')->getValue();
    }

    public function createUser(array $data)
    {
        $this->database->getReference('users')->push($data);
    }

    public function updateUser($id, array $data)
    {
        $this->database->getReference('users/' . $id)->update($data);
    }

    public function deleteUser($id)
    {
        $this->database->getReference('users/' . $id)->remove();
    }

    // Firestore methods
    public function getFinalBatches()
    {
        // Query Firestore collection for final_batch = true
        $collection = $this->firestore->collection('admin_batch');
        $query = $collection->where('final_batch', '=', true);
        return $query->documents();
    }
}
