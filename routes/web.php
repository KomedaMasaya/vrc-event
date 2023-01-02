<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/event', \App\Http\Controllers\Event\IndexController::class)->name('event.index');
Route::get('/event/{eventId}', \App\Http\Controllers\Event\IndexController::class)->name('event.page');

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/event/create', \App\Http\Controllers\Event\Create\IndexController::class)->name('event.create');
    Route::post('/event/create', \App\Http\Controllers\Event\Create\CreateController::class)->name('event.post');
    Route::get('/event/update/{eventId}', \App\Http\Controllers\Event\Update\IndexController::class)->name('event.update.index');
    Route::put('/event/update/{eventId}', \App\Http\Controllers\Event\Update\PutController::class)->name('event.update.put');
    Route::delete('/event/delete/{eventId}',\App\Http\Controllers\Event\DeleteController::class)->name('event.delete');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


