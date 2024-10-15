<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Firebase as FirebaseStorage;
use Illuminate\Support\Facades\Log;



class ListController extends Controller
{

    protected $database;
    protected $storage;

    public function __construct()
    {
        $serviceAccountPath = base_path('resources/credentials/firebase_credentials.json');
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccountPath)
            ->withDatabaseUri('https://cacaotrace-f69ac-default-rtdb.asia-southeast1.firebasedatabase.app/');
        $this->database = $firebase->createDatabase();

    }

    public function showFarmers(Request $request)
    {
        // Fetch 'Barbco_Farmers' node
        $barbco_farmers = $this->database->getReference('Barbco_Farmers')->getValue();
    
        // Ensure that $barbco_farmers is an array
        if (!is_array($barbco_farmers)) {
            $barbco_farmers = [];
        }
    
        // Initialize a combined farmers array
        $all_farmers = [];
    
        // Add the 'Barbco_Farmers' data to the farmers array
        foreach ($barbco_farmers as $farmer) {
            $all_farmers[] = $farmer;
        }
    
        // Pagination setup
        $perPage = 10; // Number of records per page
        $currentPage = $request->input('page', 1); // Get the current page or default to 1
    
        // Calculate the offset for the current page
        $offset = ($currentPage - 1) * $perPage;
    
        // Slice the array for the current page
        $itemsForCurrentPage = array_slice($all_farmers, $offset, $perPage);
    
        // Get the total number of items
        $totalItems = count($all_farmers);
    
        // Create a paginator instance
        $paginator = new LengthAwarePaginator(
            $itemsForCurrentPage,
            $totalItems,
            $perPage,
            $currentPage,
            [
                'path' => $request->url(),
                'query' => $request->query(),
            ]
        );
    
        // Return the view with the paginated data
        return view('list.farmers-list', compact('paginator'));
    }
    

    public function showConsolidators(Request $request)
    {
        $users = $this->database->getReference('Barbco_Farmers')->getValue();

        if (!is_array($users)) {
            $users = [];
        }

        $consolidators = [];

        foreach ($users as $user) {
            if (isset($user['employeeType']) && $user['employeeType'] === 'consolidator') {
                $consolidators[] = $user;
            }
        }

        return view('list.conso-list', compact('consolidators'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'fname' => 'required|string|max:50',
            'lname' => 'required|string|max:30',
            'province' => 'required|string|max:100',
            'city' => 'required|string|max:100',
            'brgy' => 'required|string|max:100',
            'others' => 'required|string|max:100',
            'phone_num' => 'required|string|max:11|min:11',
            'cacao_op' => 'required|in:Private Owned,Government Owned|max:16',
            'farm_ha' => 'required|numeric',
            'cacao_ha' => 'required|numeric',
            'beans_sold' => 'required|array',
            'beans_sold.*' => 'in:Wet Beans,Dry Unfermented Beans,Dry Fermented Beans',
            'cacao_var' => 'required|array',
            'cacao_var.*' => 'in:UF18,BR25,W10,BRAZIL,PBC123,K1,MIRACLES',
            'techniques' => 'required|array',
            'techniques.*' => 'in:Farm Diversification,Plant Renewal,Integrated Pest Management,Disease Management,Pruning,Soil-Related Fertility,Conservation,Harvesting',
            'technologies' => 'required|array',
            'technologies.*' => 'in:Pod Storage,Pod Breaking & Beans Removal,Fermentation,Drying,Sorting,Dry Bean Storage,Bean Grading',
        ]);
    
        // Prepare the data for Firebase
        try {
            // Generate a unique ID for the farmer (uid)
            $uid = uniqid();
    
            // Prepare the farmer data for Firebase
            $farmerData = [
                'fname' => ucfirst($validatedData['fname']), 
                'lname' => ucfirst($validatedData['lname']), 
                'name' => ucfirst($validatedData['lname']) . ', ' . ucfirst($validatedData['fname']), 
                'address' => $validatedData['others'] . ', ' . $validatedData['brgy'] . ', ' . ',' . $validatedData['city'] . ', ' . $validatedData['province'] ,
                'province' => $validatedData['province'],
                'city' => $validatedData['city'],
                'brgy' => $validatedData['brgy'],
                'contact' => $validatedData['phone_num'], 
                'cacao_op' => $validatedData['cacao_op'], 
                'ttl_landArea' => $validatedData['farm_ha'], 
                'hectare' => $validatedData['cacao_ha'], 
                'typeBeans' => $validatedData['beans_sold'], 
                'variety' => $validatedData['cacao_var'], 
                'cacaoTech' => $validatedData['techniques'], 
                'postHarvest' => $validatedData['technologies'], 
                'validID' => uniqid(), // This is placeholder, change to actual Firebase Storage URL if needed
                'status' => 'created', 
                'employeeType' => 'farmer', 
                'created_at' => now()->format('Y-m-d'), 
                'barbcoMember' => false, 
                'uid' => $uid, 
                'searchkey' => strtolower($validatedData['lname']) . ' /farmer', 
                'searchkey2' => strtolower($validatedData['lname']) . ' /' . $uid,
            ];
    
            // Push the data to Firebase under the Barbco_Farmers node
            $this->database->getReference('Barbco_Farmers')->push($farmerData);
    
            // Log success
            logger('Farmer added successfully to Firebase.', ['uid' => $uid]);
            Log::info('Farmer added successfully to Firebase.', ['uid' => $uid]);
            session()->flash('success', 'Operation completed successfully.');
            // Redirect back with a success message
            return redirect()->back()->with('success', 'Farmer added successfully!');
        } catch (\Exception $e) {
            logger('Error adding farmer: '. $e->getMessage(), ['trace' => $e->getTraceAsString()]);
            Log::error('Error adding farmer: '. $e->getMessage(), ['trace' => $e->getTraceAsString()]);
            session()->flash('error', 'An error occurred: '. $e->getMessage());
            return redirect()->back()->withErrors('Failed to add farmer. Please try again.');
        }
    }
}
