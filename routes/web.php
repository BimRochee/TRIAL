<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FirebaseUserController;
use App\Http\Controllers\FarmerDashboardController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminRequestController;
use App\Http\Controllers\AdminRegistrationController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\CacaoPriceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\BatchController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Login route
Route::get('/', function () {
    return view('auth.login');
})->name('login');

// Auth routes (login, register, etc.) outside the auth middleware
Auth::routes();

// Group routes that require authentication
Route::middleware(['auth'])->group(function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('user', 'fireauth');
    Route::get('/email/verify', [App\Http\Controllers\Auth\ResetController::class, 'verify_email'])->name('verify')->middleware('fireauth');
    Route::post('login/{provider}/callback', 'Auth\LoginController@handleCallback');

    //--------------------------REGISTRATION-------------------------//

    // Farmer registration steps
    Route::get('/register/step-1', [RegistrationController::class, 'showStep1'])->name('register.step1');
    Route::post('/register/step-1', [RegistrationController::class, 'handleStep1'])->name('register.handleStep1');
    Route::get('/register/step-2', [RegistrationController::class, 'showStep2'])->name('register.step2');
    Route::post('/register/step-2', [RegistrationController::class, 'handleStep2'])->name('register.handleStep2');
    Route::get('/register/step-3', [RegistrationController::class, 'showStep3'])->name('register.step3');
    Route::post('/register/step-3', [RegistrationController::class, 'handleStep3'])->name('register.handleStep3');

    // Profile management
    Route::get('/home/profile', [App\Http\Controllers\Auth\ProfileController::class, 'index'])->name('profile.index')->middleware('user', 'fireauth');
    Route::patch('/home/profile/update/{profile}', [App\Http\Controllers\Auth\ProfileController::class, 'update'])->name('profile.update')->middleware('user', 'fireauth');
    Route::delete('/home/profile/delete/{profile}', [App\Http\Controllers\Auth\ProfileController::class, 'destroy'])->name('profile.destroy')->middleware('user', 'fireauth');

    //----------------------------DASHBOARD---------------------------//

    // Super Admin and Admin dashboards
    Route::get('/super-admin/super_admin-dashboard', [SuperAdminController::class, 'dashboard'])->name('super_admin.dashboard');
    Route::get('/admin/admin-dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    //-------------------REGISTRATION AND REQUESTS------------------//

    // Admin registration steps
    Route::get('register/admin', [AdminRegistrationController::class, 'showStep1'])->name('admin.register.step1');
    Route::post('register/admin', [AdminRegistrationController::class, 'handleStep1']);
    Route::get('register/admin/step2', [AdminRegistrationController::class, 'showStep2'])->name('admin.register.step2');
    Route::post('register/admin/step2', [AdminRegistrationController::class, 'handleStep2']);
    Route::get('register/admin/complete', [AdminRegistrationController::class, 'showComplete'])->name('admin.register.complete');

    // Admin requests
    Route::get('admin/requests', [AdminRequestController::class, 'showRequests'])->name('admin.requests');
    Route::post('admin/requests/approve/{id}', [AdminRequestController::class, 'approveRequest'])->name('admin.requests.approve');
    Route::post('admin/requests/deny/{id}', [AdminRequestController::class, 'denyRequest'])->name('admin.requests.deny');

    //----------------------------TRANSACTIONS------------------------//

    Route::get('/admin/transactions', [AdminController::class, 'transactions'])->name('admin.transactions');

    //-------------------------------LIST-----------------------------//

    // Admins list
    Route::get('list/admins', [AdminController::class, 'index'])->name('admins.index');

    // Farmers list
    Route::get('/farmers-data', [ListController::class, 'showFarmersData']);
    Route::get('/farmers', [ListController::class, 'showFarmers']);
    Route::get('/admin/farmers', [ListController::class, 'showFarmers'])->name('admin.farmers');
    Route::get('/admin/list/farmers', [ListController::class, 'showFarmers'])->name('farmers.list');

    // Add farmer steps
    Route::get('/add-farmer', [ListController::class, 'showAddFarmerForm'])->name('add.farmer.form');
    Route::post('/add-farmer-step1', [ListController::class, 'addFarmer'])->name('add.farmer.step1');
    Route::get('/add-farmer-step2/{userId}', [ListController::class, 'showAddFarmerStep2'])->name('add.farmer.step2');
    Route::post('/update-location-profile/{userId}', [ListController::class, 'updateLocationProfile'])->name('update.location.profile');

    // Route to show the farmer registration form
    Route::get('/register/farmer', [ListController::class, 'showForm'])->name('farmer.register.form');

    // Route to handle the submission of the registration form
    Route::post('/register/farmer', [ListController::class, 'store'])->name('add-farmer');
    // Consolidators list
    Route::get('/admin/list/consolidators', [ListController::class, 'showConsolidators'])->name('consolidators.list');

    // Users management
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::post('/users/update/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/delete/{id}', [UserController::class, 'delete'])->name('users.delete');
    Route::post('/users/activate/{id}', [UserController::class, 'activate'])->name('users.activate');
    Route::post('/users/deactivate/{id}', [UserController::class, 'deactivate'])->name('users.deactivate');

    // Create user
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');

    //-------------------------CACAO PRICE MANAGEMENT-------------------------//

    Route::get('/admin/admin-dashboard', [CacaoPriceController::class, 'adminDashboardData'])->name('admin.dashboard');
    Route::post('/update-cacao-price', [CacaoPriceController::class, 'updateCacaoPrice'])->name('update.cacao.price');
    Route::post('/total-bean-sold-bar-chart', [CacaoPriceController::class, 'totalBeanSold'])->name('total.bean.sold');
    Route::post('/admin/announcement/update', [CacaoPriceController::class, 'updateAnnouncement'])->name('admin.announcement.update');

    //----------------------------BATCH---------------------------//
    Route::get('/batch', [App\Http\Controllers\BatchController::class, 'index'])->name('batch.index');
    Route::get('/admin/batches', [BatchController::class, 'index'])->name('admin.batches');

});