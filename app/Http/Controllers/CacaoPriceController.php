<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Carbon\Carbon;

class CacaoPriceController extends Controller
{
    protected $database;

    public function __construct()
    {
        $serviceAccountPath = base_path('resources/credentials/firebase_credentials.json');
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccountPath)
            ->withDatabaseUri('https://cacaotrace-f69ac-default-rtdb.asia-southeast1.firebasedatabase.app/');
        $this->database = $firebase->createDatabase();
    }

    public function adminDashboardData(Request $request)
{
    // Fetch cacao price
    $cacaoPriceSnapshot = $this->database->getReference('CacaoPrice/WetBeans/price')->getSnapshot();
    $cacaoPrice = $cacaoPriceSnapshot->getValue();
    $cacaoPrice = number_format((float) $cacaoPrice, 2, '.', '');

    // Fetch users data
    $usersRef = $this->database->getReference('Users');
    $users = $usersRef->getValue();

    $onboardedCount = 0;

    if (is_array($users)) {
        foreach ($users as $user) {
            if (isset($user['Onboarding']['onboarding_done']) && $user['Onboarding']['onboarding_done'] == true) {
                $onboardedCount++;
            }
        }
    }

    // Fetch transactions data
    $transactionsData = $this->fetchTransactions();

    // Fetch announcement description
    $announcementsRef = $this->database->getReference('Announcement');
    $announcements = $announcementsRef->getValue();
    $announcement = isset($announcements['description']) ? $announcements['description'] : 'No announcement found';

    // Fetch pending consolidator requests
    $pendingRequests = $this->fetchPendingConsolidatorRequests();

    // Fetch total farmers and consolidators
    $farmerAndConsoCounts = $this->fetchTotalFarmersAndConso();
    $numFarmers = $farmerAndConsoCounts['totalFarmers'];
    $numConso = $farmerAndConsoCounts['totalConsolidators'];
    $total = $farmerAndConsoCounts['total'];

    return view('admin.admin-dashboard', [
        'cacaoPrice' => $cacaoPrice,
        'totalMembers' => $onboardedCount,
        'transactionsData' => $transactionsData,
        'announcement' => $announcement,
        'pendingRequests' => $pendingRequests,
        'numFarmers' => $numFarmers,
        'numConso' => $numConso,
        'total' => $total,
    ]);
}

    public function showCacaoPrice(Request $request)
    {
        // Fetch data from the CacaoPrice node
        $cacaoPriceSnapshot = $this->database->getReference('CacaoPrice/WetBeans/price')->getSnapshot();

        // Get the value of cacaoprice
        $cacaoPrice = $cacaoPriceSnapshot->getValue();

        // Format the value to always have two decimal places
        $cacaoPrice = number_format((float) $cacaoPrice, 2, '.', '');

        return view('admin.admin-dashboard', compact('cacaoPrice'));
    }

    public function updateCacaoPrice(Request $request)
    {
        // Validate the input
        $request->validate([
            'price' => 'required|numeric',
        ]);

        // Get the new price from the request
        $newPrice = $request->input('price');

        // Update the price in the Firebase database at the correct path
        $this->database->getReference('CacaoPrice/WetBeans/price')->set($newPrice);

        // Redirect back to the dashboard with a success message
        return redirect()->route('admin.dashboard')->with('status', 'Cacao price updated successfully!');
    }


    //Announcement

    // Update announcement
    public function updateAnnouncement(Request $request)
    {
        // Validate the input
        $request->validate([
            'description' => 'required|string|max:255',
        ]);

        // Get the new announcement content from the request
        $newDescription = $request->input('description');

        // Update the announcement description in Firebase
        $this->database->getReference('Announcement/description')->set($newDescription);

        // Redirect back to the dashboard with a success message
        return redirect()->route('admin.dashboard')->with('status');
    }

    //List of transactions
    public function fetchTransactions()
    {
        // Fetch users from the 'Users' parent node in Firebase
        $usersRef = $this->database->getReference('Users');
        $users = $usersRef->getValue();

        $transactionsData = [];

        // Ensure the 'Users' node has data
        if (is_array($users)) {
            foreach ($users as $userId => $user) {
                // Check if the user has a 'UserProfile' subnode and 'employeeType' set to 'admin'
                if (isset($user['UserProfile']['employeeType']) && $user['UserProfile']['employeeType'] == 'admin') {
                    // Check if the user has a 'TransactionList' subnode
                    if (isset($user['TransactionList'])) {
                        $transactions = $user['TransactionList'];

                        // Loop through each transaction
                        foreach ($transactions as $transactionId => $transaction) {
                            // Ensure required fields exist in the transaction
                            if (isset($transaction['createdAt'], $transaction['batch_num'], $transaction['sold_to'], $transaction['cacaoCloneName'], $transaction['pricepk'], $transaction['weight'], $transaction['totalprice'])) {
                                $transactionsData[] = [
                                    'createdAt' => $transaction['createdAt'],
                                    'batch_num' => $transaction['batch_num'],
                                    'cacaoCloneName' => $transaction['cacaoCloneName'],
                                    'pricepk' => $transaction['pricepk'],
                                    'weight' => $transaction['weight'],
                                    'totalprice' => $transaction['totalprice'],
                                    'sold_to' => $transaction['sold_to']
                                ];
                            }
                        }
                    }
                }
            }
        }

        return $transactionsData;
    }

    // Fetch total number of farmers and consolidators
    public function fetchTotalFarmersAndConso()
    {
        // Fetch users from the 'Barbco_Farmers' node in Firebase
        $usersRef = $this->database->getReference('Barbco_Farmers');
        $users = $usersRef->getValue();

        $numFarmers = 0;
        $numConso = 0;

        // Ensure the 'Barbco_Farmers' node has data
        if (is_array($users)) {
            foreach ($users as $userId => $user) {
                // Count farmers
                if (isset($user['employeeType']) && $user['employeeType'] === 'farmer') {
                    $numFarmers++;
                }

                // Count consolidators with approval
                if (isset($user['employeeType']) && $user['employeeType'] === 'consolidator' && isset($user['Conso_Approval']) && $user['Conso_Approval'] === true) {
                    $numConso++;
                }
            }
        }

        // Return the total count of both farmers and consolidators
        return [
            'totalFarmers' => $numFarmers,
            'totalConsolidators' => $numConso,
            'total' => $numFarmers + $numConso, // Total of both farmers and consolidators
        ];
    }




    //manage-request-consolidator
    public function fetchPendingConsolidatorRequests()
    {
        // Fetch users from the 'Barbco_Farmers' node in Firebase
        $usersRef = $this->database->getReference('Barbco_Farmers');
        $users = $usersRef->getValue();

        $pendingRequests = [];

        // Ensure the 'Users' node has data
        if (is_array($users)) {
            foreach ($users as $userId => $user) {
                // Check if the approval is pending
                if (isset($user['Conso_Approval']) && $user['Conso_Approval'] == false) {

                    // Add this user to the pending requests list
                    $pendingRequests[] = [
                        'first_name' => $user['fname'] ?? 'N/A',
                        'last_name' => $user['lname'] ?? 'N/A',
                        'location' => $user['address'] ?? 'N/A',
                        'date_registered' => $user['UserProfile']['date_registered'] ?? 'N/A',
                        'status' => 'Pending',
                    ];
                }
            }
        }
        return $pendingRequests;
    }

    public function approveRequest(Request $request)
    {
        // Get the user ID from the request
        $userId = $request->input('userId');

        // Fetch the user from Firebase
        $userRef = $this->database->getReference('Barbco_Farmers/' . $userId);
        $user = $userRef->getValue();

        if ($user) {
            // Update the 'Conso_Approval' to true
            $userRef->update([
                'Conso_Approval' => true,
            ]);

            return response()->json(['success' => 'User approved successfully']);
        }

        return response()->json(['error' => 'User not found'], 404);
    }
}
