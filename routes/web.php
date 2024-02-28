<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChecklistItemController;

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

Route::get('/', [ChecklistItemController::class, 'index'])->name('checklist.index');
Route::post('/checklist', [ChecklistItemController::class, 'store'])->name('items.store');
Route::delete('/checklist/{id}', [ChecklistItemController::class, 'destroy'])->name('items.delete');
Route::put('/checklist/{id}', [ChecklistItemController::class, 'update'])->name('items.update');


