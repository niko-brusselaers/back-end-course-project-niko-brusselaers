<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('inventoryManagement')->group(function (){
    Route::get('', [\App\Http\Controllers\inventoryManagementController::class, "getIndex"])->name("inventoryManagement.index");
    Route::get('create',[\App\Http\Controllers\inventoryManagementController::class, "createView"])->name("inventoryManagement.create");
    Route::get('item', [\App\Http\Controllers\inventoryManagementController::class, "getItem"])->name("inventorymanagement.getItem");

    Route::post('saveItem',[\App\Http\Controllers\inventoryManagementController::class, "saveItem"])->name("inventoryManagement.saveItem");

    Route::get('deleteItem',[\App\Http\Controllers\inventoryManagementController::class, "deleteItem"])->name('inventoryManagement.deleteItem');
});
