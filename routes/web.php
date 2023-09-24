<?php

use App\Http\Controllers\ChartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentsController;
use Illuminate\Support\Facades\Route;
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
    return view('welcome');
});

Route::get('/dashboard', [ChartController::class, 'showCharts'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// useless routes
// Just to demo sidebar dropdown links active states.


Route::get('/buttons/text', [ChartController::class, 'showCharts1'])
    ->middleware(['auth'])->name('buttons.text');

Route::middleware(['auth'])->group(function () {
    Route::delete('/students/{id}', [StudentsController::class, 'destroy'])->name('buttons.icon');

    Route::get('/buttons/icon', [StudentsController::class, 'index'])->name('buttons.icon');
    Route::resource('students', StudentsController::class);
    // Rute untuk menampilkan formulir edit data
    Route::get('/students/{student}/edit', [StudentsController::class, 'edit'])->name('students.edit');

    // Rute untuk mengupdate data setelah edit
    Route::put('/students/{student}', [StudentsController::class, 'update'])->name('students.update');

    // Rute untuk mengupdate data setelah edit
    Route::delete('/students/{student}', [StudentsController::class, 'destroy'])->name('students.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/buttons/text-icon', [StudentsController::class, 'showForm'])->name('buttons.text-icon');
    Route::resource('students', StudentsController::class);
    Route::post('/buttons/text-icon', [StudentsController::class, 'store'])->name('students.store');
});




require __DIR__ . '/auth.php';
