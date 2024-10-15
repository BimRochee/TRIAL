<?php

namespace App\Http\Controllers;

use App\Services\FirebaseService;
use Kreait\Firebase\Firestore;

class BatchController extends Controller
{
    protected $firebaseService;

    public function __construct(FirebaseService $firebaseService)
    {
        $this->firebaseService = $firebaseService;
    }

    public function index()
    {
        // Get the data where final_batch is true from Firestore
        $batches = $this->firebaseService->getFinalBatches();

        return view('admin.batch', compact('batches'));
    }
}
