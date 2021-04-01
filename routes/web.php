<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaporController;
use App\Http\Controllers\UserController;
use App\Models\Laporan;
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
//     return view('welcome');
// });

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {

    $laporans = new Laporan;
         $laporans = $laporans->where('status', 'false')->get();
    return Inertia\Inertia::render('Dashboard', ['laporans' => $laporans]);
})->name('dashboard');

Route::get('/', [LaporController::class, 'index'])->name('lapor');

Route::get('/lapor2', function () {
    return Inertia\Inertia::render('Lapor');
})->name('lapor2');

Route::post('/laporan', [LaporController::class, 'store'])->name('lapor.store');
Route::post('/jawaban', [UserController::class, 'jawaban'])->middleware('auth')->name('jawaban.store');

Route::get('/laporanslapor', [LaporController::class, 'getLaporan'])->name('getLaporanLapor');
Route::get('/laporans', [UserController::class, 'getLaporan'])->name('getLaporan');
//User Controller
Route::get('/login2', [UserController::class, 'login'])->name('loginuser');
