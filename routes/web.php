<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\MedicineCategoryController;
use App\Http\Controllers\ShelfController;
use App\Http\Controllers\SuppliersController;
use App\Http\Controllers\MedicalStoreController;
use App\Http\Controllers\PurchaseController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function () {

    // Pages Routes
    Route::get('/medicines', [PageController::class, 'medicine']);
    Route::get('/stock', [PageController::class, 'stock']);
    Route::get('/purchases', [PageController::class, 'purchases']);
    Route::get('/sales', [PageController::class, 'sales']);
    Route::get('/users', [PageController::class, 'users']);

    // Medicine Routes
    Route::post('add-new-medicine', [MedicineController::class, 'add_medicine'])->name('add-new-medicine');
    Route::get('edit_medicine/{id}', [MedicineController::class, 'edit_medicine'])->name('edit_medicine');
    Route::put('update_medicine/{id}', [MedicineController::class, 'update_medicine'])->name('update_medicine');
    Route::post('delete_medicine', [MedicineController::class, 'delete_medicine'])->name('delete_medicine');
    
    // Categories Routes
    Route::get('/show_category', [MedicineCategoryController::class, 'show_category'])->name('show_category');
    Route::post('medicine_category', [MedicineCategoryController::class, 'medicine_category'])->name('medicine_category');
    Route::get('edit_category/{id}', [MedicineCategoryController::class, 'edit_category'])->name('edit_category');
    Route::put('update_category/{id}', [MedicineCategoryController::class, 'update_category'])->name('update_category');
    Route::post('delete_category', [MedicineCategoryController::class, 'delete_category'])->name('delete_category');

    // Shelf Routes
    Route::get('/show_shelves', [ShelfController::class, 'show_shelves'])->name('show_shelves');
    Route::post('medicine_shelf', [ShelfController::class, 'medicine_shelf'])->name('medicine_shelf');
    Route::get('edit_shelf/{id}', [ShelfController::class, 'edit_shelf'])->name('edit_shelf');
    Route::put('update_shelf/{id}', [ShelfController::class, 'update_shelf'])->name('update_shelf');
    Route::post('delete_shelf', [ShelfController::class, 'delete_shelf'])->name('delete_shelf');

    // Supplier Routes
    Route::get('/show_suppliers', [SuppliersController::class, 'show_suppliers'])->name('show_category');
    Route::post('/add_suppliers', [SuppliersController::class, 'add_suppliers'])->name('add_suppliers');
    Route::get('/edit_suppliers/{id}', [SuppliersController::class, 'edit_suppliers'])->name('edit_suppliers');
    Route::put('/update_suppliers/{id}', [SuppliersController::class, 'update_suppliers'])->name('update_suppliers');
    Route::post('/delete_suppliers', [SuppliersController::class, 'delete_suppliers'])->name('delete_suppliers');

    // Medical_Store Routes
    Route::get('/show_medical_store', [MedicalStoreController::class, 'show_medical_store'])->name('show_medical_store');
    Route::post('/add_medical_store', [MedicalStoreController::class, 'add_medical_store'])->name('add_medical_store');
    Route::get('/edit_medical_store/{id}', [MedicalStoreController::class, 'edit_medical_store'])->name('edit_medical_store');
    Route::put('/update_medical_store/{id}', [MedicalStoreController::class, 'update_medical_store'])->name('update_medical_store');
    Route::post('/delete_medical_store', [MedicalStoreController::class, 'delete_medical_store'])->name('delete_medical_store');

    //Purchase Routes
    Route::post('/add_purchase', [PurchaseController::class, 'add_purchase'])->name('add_purchase');
    Route::get('/edit_purchase/{id}', [PurchaseController::class, 'edit_purchase'])->name('edit_purchase');
    Route::put('/update_purchase/{id}', [PurchaseController::class, 'update_purchase'])->name('update_purchase');
    Route::post('/delete_purchase', [PurchaseController::class, 'delete_purchase'])->name('delete_purchase');
    Route::get('/delete_all_purchase', [PurchaseController::class, 'delete_all_purchase'])->name('delete_all_purchase');
});

require __DIR__.'/auth.php';
