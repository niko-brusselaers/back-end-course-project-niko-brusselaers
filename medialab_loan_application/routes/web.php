<?php

use App\Http\Controllers\inventoryManagementController;
use App\Http\Controllers\adminController;
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
    Route::get('', [inventoryManagementController::class, "getIndex"])->name("inventoryManagement.index");
    Route::get('create',[inventoryManagementController::class, "createView"])->name("inventoryManagement.create");
    Route::get('item', [inventoryManagementController::class, "getItem"])->name("inventoryManagement.getItem");
    Route::get('edit', [inventoryManagementController::class, 'editView'])->name("inventoryManagement.editView");

    Route::post('saveItem',[inventoryManagementController::class, "saveItem"])->name("inventoryManagement.saveItem");
    Route::post('editItem',[inventoryManagementController::class, "editItem"])->name("inventoryManagement.editItem");


    Route::get('deleteItem',[inventoryManagementController::class, "deleteItem"])->name('inventoryManagement.deleteItem');
});

Route::prefix('admin')->group(function (){
    Route::get('', [adminController::class, "getIndex"]) ->name("admin.index");
    Route::get('user',[adminController::class , "getUser"])->name('admin.getUser');
    Route::get('createUser', [adminController::class , "createUser"])->name('admin.createUser');
    Route::get('editUser', [adminController::class , "EditUser" ])->name('admin.editUser');

    Route::post('createUser', [adminController::class, "saveUser"])->name('admin.saveUser');


});
