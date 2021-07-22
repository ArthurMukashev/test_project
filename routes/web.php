<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;

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
    return view('layouts.add-client');
})->name('home');

Route::post('/submit-form',
    [FormController::class, 'Submit']
)->name('submit');

Route::get('/list-client', function () {
    return view('layouts.list-client');
})->name('list-client');

Route::get('/list-client-submit',
    [FormController::class, 'Search']
)->name('list-search');

Route::get('/clients-export',
    [FormController::class, 'export']
)->name('client-export');
