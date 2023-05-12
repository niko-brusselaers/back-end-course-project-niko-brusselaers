
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

    Route::post('saveItem',[InventoryManagementController::class, "saveItem"])
        ->middleware(['can:view inventoryManagementIndex'])
        ->name("inventoryManagement.saveItem");
    Route::post('editItem',[InventoryManagementController::class, "editItem"])
        ->middleware(['can:edit item'])
        ->name("inventoryManagement.editItem");


    Route::get('deleteItem',[InventoryManagementController::class, "deleteItem"])->name('inventoryManagement.deleteItem');
});

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('', [AdminController::class, "index"])
        ->middleware(['can:view adminIndex'])
        ->name("admin.index");
    Route::get('user', [AdminController::class, "show"])
        ->middleware(['can:view users'])
        ->name('admin.show');
    Route::get('create', [AdminController::class, "create"])
        ->middleware(['can:create users'])
        ->name('admin.create');
    Route::get('edit', [AdminController::class, "edit"])
        ->middleware(['can:edit users'])
        ->name('admin.edit');

    Route::post('saveUser', [AdminController::class, "saveUser"])->name('admin.saveUser');
    Route::post('editUser', [AdminController::class, "updateUser"])->name('admin.updateUser');

    Route::get('deleteUser', [AdminController::class, 'deleteUser'])->name('admin.deleteUser');
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

    Route::post('create', "createLoan")
        ->middleware(['can:create item'])
        ->name('loanSystem.create');
    Route::post('edit', "editLoan")
        ->middleware(['can:edit item'])
        ->name('loanSystem.edit');


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
