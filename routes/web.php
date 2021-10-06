<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Models\Brand;
use App\Models\User;
use Illuminate\Support\Facades\DB;
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
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    //$Users= User::all(); //elequant 
    $Users =DB::table('users')->get(); //query builder 
    return view('dashboard',compact("Users"));
})->name('dashboard');
Route::get('/category/all', [CategoryController::class,'AllCat'])->name("all.category");
Route::post('/category/add', [CategoryController::class,'AddCat'])->name("store.category");
Route::get('/category/edit/{id}', [CategoryController::class,'edit']);
Route::post('/category/update/{id}', [CategoryController::class,'update']);
Route::get('softdelete/category/{id}', [CategoryController::class,'softDelete']);
Route::get('/category/restore/{id}', [CategoryController::class,'Restore']);
Route::get('/category/pdelete/{id}', [CategoryController::class,'pdelete']);
 // for Brand 
 Route::get('/brand/all', [BrandController::class,'AllBrand'])->name("all.brand");
 Route::post('/brand/add', [BrandController::class,'StoreBrand'])->name("store.brand");
 Route::get('/brand/edit/{id}', [BrandController::class,'edit']);
 Route::post('/brand/update/{id}', [BrandController::class,'update']);
 Route::get('/brand/delete/{id}', [BrandController::class,'delete']);

