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
    Route::get('', [InventoryManagementController::class, "index"])->name("inventoryManagement.index");
    Route::get('create',[InventoryManagementController::class, "create"])->name("inventoryManagement.create");
    Route::get('item', [InventoryManagementController::class, "show"])->name("inventoryManagement.show");
    Route::get('edit', [inventoryManagementController::class, 'edit'])->name("inventoryManagement.edit");

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

Route::prefix('loanSystem')->controller(LoanSystemController::class)->group(function (){
    Route::get('', "index")->name("loanSystem.index");
    Route::get('loan', "show")->name('loanSystem.show');
    Route::get('create', "create")->name('loanSystem.create');
    Route::get('edit', "edit")->name('loanSystem.edit');

    Route::post('create', "createLoan")->name('loanSystem.create');
    Route::post('edit', "editLoan")->name('loanSystem.edit');


    Route::get('delete',  "delete")->name("loanSystem.delete");
});
