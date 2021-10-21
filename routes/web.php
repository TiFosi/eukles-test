<?php

use App\Http\Controllers\ClientController;
use App\Models\Client;
use App\Models\Materiel;
use Illuminate\Http\Request;
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

use Illuminate\Support\Facades\DB;

Route::get('/', [ClientController::class, 'index'])->name('question-1');
Route::get('/question-2', function () {
    return view('question-2', [
        'clients' => Client::all(),
        'materiels' => Materiel::all(),
    ]);
})->name('question-2');

Route::post('/question-2', [ClientController::class, 'store']);
Route::get('/question-3', [ClientController::class, 'list'])->name('question-3');
