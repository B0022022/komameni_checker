<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () { return view('top'); })->name('top');

Route::get('/', [AppController::class, 'top'])->name('top');

// top→プログラム起動→表示
Route::get('output', [AppController::class, 'show'])->name('output');
// 各ユーザーごと
Route::get('output_user', [AppController::class, 'show'])->name('output_user');

Route::get('change', function () { return view('change'); })->name('change');

Route::get('display', [AppController::class, 'display'])->name('display');
Route::get('edit', [AppController::class, 'edit'])->name('edit');
Route::post('/output', [AppController::class, 'update'])->name('update');

// データ入力
Route::get('input', function () { return view('input'); })->name('input');
Route::post('input', [AppController::class, 'input']);


// ユーザ機能
Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
    Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('signin');
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});


//ヘルプページ表示
Route::get('help', function () { return view('help'); })->name('help');

// アップロードページ
Route::get('up', function () { return view('up'); })->name('up');
Route::post('/up', [AppController::class, 'run'])->name('run');

Route::get('upload', function () { return view('upload'); })->name('upload');
Route::post('upload', [AppController::class, 'upload']);
