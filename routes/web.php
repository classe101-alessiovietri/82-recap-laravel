<?php

use Illuminate\Support\Facades\Route;

// Controllers
// Guest
use App\Http\Controllers\MainController;
use App\Http\Controllers\Admin\MainController as AdminMainController;

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

Route::get('/', [MainController::class, 'index'])->name('home');

Route::get('/admin/dashboard', [AdminMainController::class, 'dashboard'])
        ->middleware(['auth', 'verified'])
        ->name('admin.dashboard');

require __DIR__.'/auth.php';
