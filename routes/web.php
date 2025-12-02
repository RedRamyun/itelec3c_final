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

Route::get('/display-positions', [UserController::class, 'PositionsDisplay'])->name('display.positions');

Route::get('/display-vote-counts', [UserController::class, 'VoteCountsDisplay'])->name('display.vote.counts');
