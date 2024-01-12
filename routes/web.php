<?php

use App\Http\Controllers\RayonController;
use App\Http\Controllers\LatesController;
use App\Http\Controllers\RombelController;
use App\Http\Controllers\StudentsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::middleware('IsGuest')->group(function(){
    Route::get('/', function() {
        return view('login');
    })->name('login');
    Route::post('/login', [UserController::class, 'loginAuth'])->name('login.auth');
});

Route::middleware(['IsLogin'])->group(function(){
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/home', function() {
        return view('test');
    })->name('dashboard.page');
});


Route::get('/error-permission', function() {
    return view('errors.permission');
})->name('error.permission');

Route::middleware(['IsLogin','IsAdmin'])->group(function(){

Route::prefix('/dashboard')->name('dashboard.')->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('home');
});

Route::prefix('/users')->name('users.')->group(function(){
    Route::get('/', [UserController::class, 'index'])->name('home');
    Route::get('/create', [UserController::class, 'create'])->name('create');
    Route::post('/store', [UserController::class, 'store'])->name('store');
    Route::get('/{id}', [UserController::class, 'edit'])->name('edit');
    Route::patch('/{id}', [UserController::class, 'update'])->name('update');
    Route::delete('/{id}', [UserController::class, 'destroy'])->name('delete');
});
Route::prefix('/rayons')->name('rayons.')->group(function(){
    Route::get('/', [RayonController::class, 'index'])->name('home');
    Route::get('/create', [RayonController::class, 'create'])->name('create');
    Route::post('/store', [RayonController::class, 'store'])->name('store');
    Route::get('/{id}', [RayonController::class, 'edit'])->name('edit');
    Route::patch('/{id}', [RayonController::class, 'update'])->name('update');
    Route::delete('/{id}', [RayonController::class, 'destroy'])->name('delete');
});
Route::prefix('/rombels')->name('rombels.')->group(function(){
    Route::get('/', [RombelController::class, 'index'])->name('home');
    Route::get('/create', [RombelController::class, 'create'])->name('create');
    Route::post('/store', [RombelController::class, 'store'])->name('store');
    Route::get('/{id}', [RombelController::class, 'edit'])->name('edit');
    Route::patch('/{id}', [RombelController::class, 'update'])->name('update');
    Route::delete('/{id}', [RombelController::class, 'destroy'])->name('delete');
});

Route::prefix('/lates')->name('lates.')->group(function(){
    Route::get('/', [LatesController::class, 'index'])->name('home');
    Route::get('/rekap', [LatesController::class, 'rekap'])->name('rekap');
    Route::get('/create', [LatesController::class, 'create'])->name('create');
    Route::post('/store', [LatesController::class, 'store'])->name('store');
    Route::get('/{id}', [LatesController::class, 'edit'])->name('edit');
    Route::patch('/{id}', [LatesController::class, 'update'])->name('update');
    Route::delete('/{id}', [LatesController::class, 'destroy'])->name('delete');
    Route::get('/{id}/detail', [LatesController::class, 'detail'])->name('detail');
    Route::get('/{id}/generate-pdf', [LatesController::class, 'generatePDF'])->name('generatePDF');
    Route::get('/download/excel', [LatesController::class, 'exportExcel'])->name('export-excel');
});
Route::prefix('/students')->name('students.')->group(function(){
    Route::get('/', [StudentsController::class, 'index'])->name('home');
    Route::get('/create', [StudentsController::class, 'create'])->name('create');
    Route::post('/store', [StudentsController::class, 'store'])->name('store');
    Route::get('/{id}', [StudentsController::class, 'edit'])->name('edit');
    Route::patch('/{id}', [StudentsController::class, 'update'])->name('update');
    Route::delete('/{id}', [StudentsController::class, 'destroy'])->name('delete');
});

});

Route::middleware(['IsLogin', 'IsPs'])->group(function(){

Route::prefix('/ps')->name('ps.')->group(function(){
Route::prefix('/lates')->name('lates.')->group(function(){
    Route::get('/', [LatesController::class, 'indexPs'])->name('home');
    Route::get('/rekap', [LatesController::class, 'rekapPs'])->name('rekap');
    Route::get('/{id}/detail', [LatesController::class, 'detailPs'])->name('detail');
    Route::get('/{id}/generate-pdf', [LatesController::class, 'generatePDFPS'])->name('generatePDF');
    Route::get('/download-excel', [LatesController::class, 'exportExcel'])->name('export-excel');
});
Route::prefix('/students')->name('students.')->group(function(){
    Route::get('/', [StudentsController::class, 'indexPs'])->name('home');
    Route::get('/create', [StudentsController::class, 'create'])->name('create');
    Route::post('/store', [StudentsController::class, 'store'])->name('store');
    Route::get('/{id}', [StudentsController::class, 'edit'])->name('edit');
    Route::patch('/{id}', [StudentsController::class, 'update'])->name('update');
    Route::delete('/{id}', [StudentsController::class, 'destroy'])->name('delete');
});
});
});

Route::middleware('IsPs')->group(function(){
Route::prefix('/dashboard')->name('dashboard.ps.')->group(function(){
    Route::get('/', [DashboardController::class, 'indexPS'])->name('home.ps');
});
});
