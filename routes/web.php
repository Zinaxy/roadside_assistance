<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\FeedbackController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [BackendController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('requests',RequestController::class);
    Route::resource('vehicles',VehicleController::class);
    Route::resource('messages',MessageController::class);
    Route::resource('users',UserController::class);
    Route::resource('feedbacks',FeedbackController::class);
    Route::resource('reply',ReplyController::class);
    Route::get('/customers',[BackendController::class, 'customer'])->name('customers');
    Route::get('/mechanics',[BackendController::class, 'mechanic'])->name('mechanics');
    Route::get('/admins',[BackendController::class, 'admin'])->name('admins');
});

require __DIR__.'/auth.php';
