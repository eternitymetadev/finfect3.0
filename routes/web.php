<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PfuController;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('dashboard.dashboard');
// });




Auth::routes();

Route::get('/', function () {
    return view('auth.login');
});


Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/login', [LoginController::class, 'login']);

Route::middleware(['auth.check'])->group(function () {

    Route::post('/save-pfu', [PfuController::class, 'storePfu']);
    Route::post('/update-pfu', [PfuController::class, 'updatePfu']);
    Route::get('pfu-list', [PfuController::class, 'pfuList']);

    Route::get('/my-bank-balance', function () {
        return view('my-bank-balance.my-bank-balance');
    });

    Route::get('/my-ledger-sheet', function () {
        return view('ledger-sheet.my-ledger-sheet');
    });

    Route::get('/emp-ledger-sheet', function () {
        return view('ledger-sheet.emp-ledger-sheet');
    });
    Route::get('/invoice-dues', function () {
        return view('invoice-dues.invoice-dues');
    });
    Route::get('/transaction-sheet', function () {
        return view('transaction-sheet.transaction-sheet');
    });



    Route::get('/user-list', function () {
        return view('admin.users.users');
    });
    Route::get('/all-payments', function () {
        return view('admin.payments.all-payments');
    });
    Route::get('/vendors', function () {
        return view('admin.vendor.vendors');
    });

    Route::resources([
        'roles' => RoleController::class,
        'users' => UserController::class,
        'products' => ProductController::class,
    ]);
});
