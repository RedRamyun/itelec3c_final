<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register-voter', function () {
    return view('create-voter');
})->name('register.voter');

Route::post('/register-voter', [UserController::class, 'register'])->name('register.voter');

Route::get('/voters', [UserController::class, 'index'])->name('voters.list');

Route::get('/display-votes', [UserController::class, 'DisplayVotes'])->name('votes.display');

Route::get('/display-candidates', [UserController::class, 'CandidatesDisplay'])->name('display.candidates');

Route::get('/display-vote-counts', [UserController::class, 'VoteCountsDisplay'])->name('display.vote.counts');

// Active Positions
Route::get('/display-positions', [UserController::class, 'PositionsDisplay'])->name('display.positions');

// Trashed Positions
Route::get('/display-archived-positions', [UserController::class, 'ArchivedPositionsDisplay'])->name('display.archived.positions');

// Soft Delete Position
Route::post('delete/{id}', [UserController::class, 'delete'])->name('delete');

// Restore Position
Route::post('restore/{id}', [UserController::class, 'restore'])->name('restore');