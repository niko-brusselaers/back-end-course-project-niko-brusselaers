<?php

use App\Http\Controllers\InventoryManagementController;
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
    Route::get('edit', [InventoryManagementController::class, 'editView'])->name("inventoryManagement.editView");

    Route::post('saveItem',[InventoryManagementController::class, "saveItem"])->name("inventoryManagement.saveItem");
    Route::post('editItem',[InventoryManagementController::class, "editItem"])->name("inventoryManagement.editItem");


    Route::get('deleteItem',[InventoryManagementController::class, "deleteItem"])->name('inventoryManagement.deleteItem');
});
