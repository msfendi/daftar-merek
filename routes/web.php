<?php

use App\Http\Controllers\Guest\BlogPagesController;
use App\Http\Controllers\guest\DashboardController;
use App\Http\Controllers\Guest\PostPagesController;
use App\Http\Controllers\Pemohon\PermohonanController;
use App\Http\Controllers\ProfileController;
use App\Livewire\Guest\Dashboard;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/pengumuman', [BlogPagesController::class, 'index'])->name('pengumuman');
Route::get('/pengumuman/{slug}', [PostPagesController::class, 'show']);


// Route::group([
//     'prefix' => 'blog',
//     "as" => "blog."
// ], function () {
//     Route::get('/', function () {
//         return view('guest.blogPages.index');
//     });
// });

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
