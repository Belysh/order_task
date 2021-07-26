<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Service\ServiceController;

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

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/services', [ServiceController::class, 'index'])->middleware(['auth'])->name('services');
Route::get('/services/add', [ServiceController::class, 'create'])->middleware(['auth'])->name('services/add');
Route::get('services/edit/{id}', [ServiceController::class, 'edit'])->middleware(['auth'])->name('services/edit');
Route::get('services/delete/{id}', [ServiceController::class, 'destroy'])->middleware(['auth'])->name('services/delete');
Route::get('services/upgrade/{id}', [ServiceController::class, 'showUpgrade'])->middleware(['auth'])->name('services/upgrade');
Route::get('services/downgrade/{id}', [ServiceController::class, 'showDowngrade'])->middleware(['auth'])->name('services/downgrade');

Route::post('/services/store', [ServiceController::class, 'store'])->middleware(['auth'])->name('services/store');
Route::post('/services/upgrade/{id}/{product_id}', [ServiceController::class, 'upgrade'])->middleware(['auth']);
Route::post('/services/downgrade/{id}/{product_id}', [ServiceController::class, 'downgrade'])->middleware(['auth']);

Route::put('/services/update/{id}', [ServiceController::class, 'update'])->middleware(['auth'])->name('services/update');



require __DIR__.'/auth.php';
