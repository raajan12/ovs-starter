<?php

use App\Http\Controllers\Backend\AdminCandidateController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\AdminElectionController;
use App\Http\Controllers\Backend\AdminPositionController;
use App\Http\Controllers\Frontend\HomeController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/results', [HomeController::class, 'results']);
Route::middleware('auth')->group(function () {
    Route::get('/election/{election}', [HomeController::class, 'showElection'])->name('showElection');
    Route::post('/voteByUser', [HomeController::class, 'voteByUser'])->name('voteByUser');
    Route::get('/myvotes', [HomeController::class, 'myvotes']);
});

Route::middleware('admin')->prefix('/admin')->name('admin.')->group(function () {
    Route::resource('elections', AdminElectionController::class);
    Route::resource('positions', AdminPositionController::class);
    Route::resource('candidates', AdminCandidateController::class);
    Route::get('/', [AdminController::class, 'index']);
});
