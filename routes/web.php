<?php
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\productController;
use App\Http\Controllers\Admin\catagoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;

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
    return view('auth.login');
});

Route::get('/dashboard', function () {
    $c = Category::all();
    $p = Product::all();
    $u = User::all();
    return view('dashboard',compact('c','p','u'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
//เมนู User
Route::get('admin/user/index',[UserController::class,'user']) ->name('u.index');
//เมนู Product
Route::get('admin/product/index',[productController::class,'product']) ->name('p.index');
Route::get('admin/product/create',[productController::class,'create']) ->name('p.create');
Route::post('admin/product/insert',[productController::class,'insert']);
Route::get('admin/product/edit/{id}',[ProductController::class,'edit'])->name('p.edit');
Route::post('admin/product/update/{id}',[ProductController::class,'update']);
Route::get('admin/product/delete/{id}',[ProductController::class,'delete']);
//เมนู Catagory
Route::get('admin/catagory/index',[catagoryController::class,'index']) ->name('c.index');
Route::get('admin/catagory/create',[catagoryController::class,'create']) ->name('c.create');
Route::post('admin/catagory/insert',[catagoryController::class,'insert']) ;
Route::get('admin/catagory/edit/{id}',[catagoryController::class,'edit']) ;
Route::post('admin/catagory/update/{id}',[CatagoryController::class,'update']);
Route::get('admin/catagory/delete/{id}',[CatagoryController::class,'delete']);

