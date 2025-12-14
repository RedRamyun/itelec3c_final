<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VoterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Voter Routes
Route::get('/register-voter', [VoterController::class, 'create'])->name('register.voter');
Route::post('/register-voter', [VoterController::class, 'store'])->name('register.voter.store');
Route::get('/voters', [VoterController::class, 'index'])
    ->middleware('auth')
    ->name('voters.list');
Route::get('/voters/{id}/edit', [VoterController::class, 'edit'])->name('voters.edit');
Route::put('/voters/{id}', [VoterController::class, 'update'])->name('voters.update');
Route::delete('/voters/{id}', [VoterController::class, 'destroy'])->name('voters.destroy');
Route::post('/voters/{id}/disable', [VoterController::class, 'disable'])->name('voters.disable');
Route::post('/voters/{id}/enable', [VoterController::class, 'enable'])->name('voters.enable');

// Other Routes
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