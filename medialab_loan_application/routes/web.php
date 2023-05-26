
<?php

use App\Http\Controllers\InventoryManagementController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoanSystemController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', [ProfileController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::prefix('inventoryManagement')->middleware(['auth'])->group(function (){
    Route::get('', [InventoryManagementController::class, "index"])
        ->middleware(['can:view inventoryManagementIndex'])
        ->name("inventoryManagement.index");
    Route::get('create',[InventoryManagementController::class, "create"])
        ->middleware(['can:create item'])
        ->name("inventoryManagement.create");
    Route::get('item', [InventoryManagementController::class, "show"])
        ->middleware(['can:view item'])
        ->name("inventoryManagement.show");
    Route::get('edit', [inventoryManagementController::class, 'edit'])
        ->middleware(['can:edit item'])
        ->name("inventoryManagement.edit");

    Route::post('save',[InventoryManagementController::class, "save"])
        ->middleware(['can:view inventoryManagementIndex'])
        ->name("inventoryManagement.save");
    Route::post('update',[InventoryManagementController::class, "update"])
        ->middleware(['can:edit item'])
        ->name("inventoryManagement.update");


    Route::get('deleteItem',[InventoryManagementController::class, "delete"])->name('inventoryManagement.delete');
});

Route::prefix('admin')->controller(AdminController::class)->middleware(['auth'])->group(function () {
    Route::get('', "index")
        ->middleware(['can:view adminIndex'])
        ->name("admin.index");
    Route::get('user',  "show")
        ->middleware(['can:view users'])
        ->name('admin.show');
    Route::get('create',  "create")
        ->middleware(['can:create users'])
        ->name('admin.create');
    Route::get('edit', "edit")
        ->middleware(['can:edit users'])
        ->name('admin.edit');

    Route::post('save', "save")->name('admin.save');
    Route::post('update', "update")->name('admin.update');

    Route::get('delete', 'delete')->name('admin.delete');
});

Route::prefix('loanSystem')->controller(LoanSystemController::class)->group(function (){
    Route::get('', "index")
        ->middleware(['can:view lendingServiceIndex'])
        ->name("loanSystem.index");
    Route::get('loan', "show")
        ->middleware(['can:view item'])
        ->name('loanSystem.show');
    Route::get('create', "create")
        ->middleware(['can:create item'])
        ->name('loanSystem.create');
    Route::get('edit', "edit")
        ->middleware(['can:edit item'])
        ->name('loanSystem.edit');

    Route::post('save', "save")
        ->middleware(['can:create item'])
        ->name('loanSystem.save');
    Route::post('update', "update")
        ->middleware(['can:edit item'])
        ->name('loanSystem.update');


    Route::get('delete',  "delete")->name("loanSystem.delete");
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
