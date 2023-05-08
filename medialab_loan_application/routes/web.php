<?php

use App\Http\Controllers\inventoryManagementController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\LoanSystemController;
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
    Route::get('', [InventoryManagementController::class, "getIndex"])->name("inventoryManagement.index");
    Route::get('create',[InventoryManagementController::class, "createView"])->name("inventoryManagement.create");
    Route::get('item', [InventoryManagementController::class, "getItem"])->name("inventoryManagement.getItem");
    Route::get('edit', [inventoryManagementController::class, 'editView'])->name("inventoryManagement.editView");

    Route::post('saveItem',[InventoryManagementController::class, "saveItem"])->name("inventoryManagement.saveItem");
    Route::post('editItem',[InventoryManagementController::class, "editItem"])->name("inventoryManagement.editItem");


    Route::get('deleteItem',[InventoryManagementController::class, "deleteItem"])->name('inventoryManagement.deleteItem');
});

Route::prefix('admin')->group(function (){
    Route::get('', [AdminController::class, "getIndex"]) ->name("admin.index");
    Route::get('user',[AdminController::class , "getUser"])->name('admin.getUser');
    Route::get('createUser', [AdminController::class , "createUser"])->name('admin.createUser');
    Route::get('editUser', [AdminController::class , "EditUser" ])->name('admin.editUser');

    Route::post('saveUser', [AdminController::class, "saveUser"])->name('admin.saveUser');
    Route::post('editUser', [AdminController::class, "updateUser"])->name('admin.updateUser');

    Route::get('deleteUser', [AdminController::class, 'deleteUser'])->name('admin.deleteUser');


});

Route::prefix('loanSystem')->group(function (){
    Route::get('', [LoanSystemController::class, "index"])->name("loanSystem.index");
    Route::get('loan',[LoanSystemController::class , "get"])->name('loanSystem.get');
    Route::get('create', [LoanSystemController::class , "create"])->name('loanSystem.create');
    Route::get('editr', [LoanSystemController::class , "edit" ])->name('loanSystem.edit');
});
