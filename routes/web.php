<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\mediaController;
use App\Http\Controllers\journalistController;

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
Route::get('4', function () {
   return view('journalist.journalist');
});

// Route::get('/', [mediaController::class, 'add'])
//     ->name('home');

Route::prefix('media')
    ->middleware('auth')
    ->controller(mediaController::class)
    ->name('media.')
    ->group(function () {
        Route::get('add',  'add')
            ->name('add');
        Route::post('add', 'addData')
            ->name('add.data');
        Route::get('edit/{idMedia?}', 'Edit')
            ->where('idMedia', '[0-9]+')
            ->name('edit');
        Route::post('edit', 'EditData')
            ->name('edit.data');
        Route::post('edit-save', 'EditDataSave')
            ->name('edit.save');
        Route::post('delete', 'DeleteData')
            ->name('delete');
        Route::get('show', 'ShowMediaForm')
            ->name('showForm');
        Route::post('show', 'ShowMedia')
            ->name('show');
        Route::post('show/ajax/', 'ShowMediaAjax')
            ->name('showAjax');
        Route::get('show-table', 'showTable')
            ->name('showTable');
});

Route::prefix('journalist')
    ->middleware('auth')
    ->controller(journalistController::class)
    ->name('journalist.')
    ->group(function (){
        Route::get('add','Add')
            ->name('add');
        Route::post('add', 'AddData')
            ->name('add.data');
        Route::get('edit/', 'Edit')
            ->name('edit');
        Route::post('edit', 'EditData')
            ->name('edit.data');
        Route::get('edit/{id?}',  'EditData')
            ->name('editDataLink');
        Route::post('edit-save', 'SaveData')
            ->name('save.data');
        Route::get('showTable', 'showTable')
            ->name('showTable');
    });


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/delete/user', [App\Http\Controllers\Auth\DeleteUserController::class, 'delete'])->name('userDelete');
Route::post('/delete/user', [App\Http\Controllers\Auth\DeleteUserController::class, 'confirmDelete'])->name('confirmUserDelete');
Route::post('/delete/userOK', [App\Http\Controllers\Auth\DeleteUserController::class, 'deleteUser'])->name('deleteUserOk');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home2');
