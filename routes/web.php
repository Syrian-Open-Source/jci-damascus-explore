<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\UserController;

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

Route::middleware('WebsiteIsOpen')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home.index');
    Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
    Route::post('/login', [RegisterController::class, 'login'])->name('register.login');
});
Route::get('/website-is-closed', [HomeController::class, 'closed'])->name('closed');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    Route::post('check-activity', [QrCodeController::class, 'checkActivity'])->name('checkActivity');
    Route::get('qr-generate/{user}', [QrCodeController::class, 'QrGenerate'])->name('QrGenerate');
    Route::get('all-qr-generate', [QrCodeController::class, 'allQrGenerate'])->name('allQrGenerate');
    Route::get('qr-code', [QrCodeController::class, 'qrCode'])->name('qrCode');
    Route::get('users-export', [UserController::class, 'usersExport'])->name('UsersExport');
    Route::get('re-send-mail/{user}', [UserController::class, 'resendMail'])->name('ReSendMail');
    Route::get('toggle-approved/{user}', [UserController::class, 'toggleApproved'])->name('ToggleApproved');
});
