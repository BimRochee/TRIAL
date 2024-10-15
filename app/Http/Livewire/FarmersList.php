<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Database;
use App\Models\Item;

class FarmersList extends Component
{
    use WithPagination;
    protected $database;
    public $farmers;
    public $item;
    public $confirmingItemAdd = false;

    public function __construct()
    {
        $serviceAccountPath = base_path('resources/credentials/firebase_credentials.json');
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccountPath)
            ->withDatabaseUri('https://cacaotrace-f69ac-default-rtdb.asia-southeast1.firebasedatabase.app/');
        $this->database = $firebase->createDatabase();

        // Fetch farmers once during initialization
        $this->fetchFarmers();
    }

    private function fetchFarmers()
    {
        $farmersRef = $this->database->getReference('Barbco_Farmers');
        $rawFarmers = $farmersRef->getValue();
        $this->farmers = collect($rawFarmers)->map(function ($farmer) {
            return (object) $farmer; // Convert arrays to objects for easier property access
        });
    }

    public function render()
    {
        $paginatedFarmers = $this->farmers->forPage($this->page, 10);

        return view('list.farmers-list', [
            'farmers' => $paginatedFarmers,
        ]);
    }

    public function viewProfile(Item $item)
    {
        $this->item = $item;
        $this->confirmingItemAdd = true;
    }
}
