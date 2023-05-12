
<?php

use App\Http\Controllers\inventoryManagementController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\LoanSystemController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('inventoryManagement')->middleware(['auth'])->group(function (){
    Route::get('', [InventoryManagementController::class, "index"])->name("inventoryManagement.index");
    Route::get('create',[InventoryManagementController::class, "create"])->name("inventoryManagement.create");
    Route::get('item', [InventoryManagementController::class, "show"])->name("inventoryManagement.show");
    Route::get('edit', [inventoryManagementController::class, 'edit'])->name("inventoryManagement.edit");

    Route::post('saveItem',[InventoryManagementController::class, "saveItem"])->name("inventoryManagement.saveItem");
    Route::post('editItem',[InventoryManagementController::class, "editItem"])->name("inventoryManagement.editItem");


    Route::get('deleteItem',[InventoryManagementController::class, "deleteItem"])->name('inventoryManagement.deleteItem');
});

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('', [AdminController::class, "index"])->name("admin.index");
    Route::get('user', [AdminController::class, "show"])->name('admin.show');
    Route::get('create', [AdminController::class, "create"])->name('admin.create');
    Route::get('edit', [AdminController::class, "edit"])->name('admin.edit');

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
