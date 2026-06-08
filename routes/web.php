<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/',[HomeController::class, 'index'])->name('home');
Route::get('/become-a-nurse',[HomeController::class, 'becomeaNurse'])->name('nurse.register');
Route::post('/become-a-nurse', [HomeController::class, 'store'])->name('nurse.register.store');

// Route::get('/category/{category_slug}-nurse-in-{area_slug}',[ServiceController::class, 'show'])->name('service.area');

// Route::get(
//     '/category/{category_slug}-in-{area_slug}',
//     [ServiceController::class, 'show']
// )->name('service.area');

// Route::get('/category/{category_slug}-in-{area_slug}', function () {
//     dd("asdasd");
// })->name('service.area');

// Route::get('/category/elder-care-in-kolkata', function () {
//     dd('Exact match works');
// });

Route::get('/{slug}', [ServiceController::class, 'show'])
    ->name('service.area');

Route::get('/category/{category_slug}-in-{area_slug}', function ($category_slug, $area_slug) {
    dd($category_slug, $area_slug);
})->name('service.area');



Route::fallback(function () {
    dd('Fallback caught: ' . request()->path());
});



Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/',[AuthController::class,'index'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.submit');

    Route::middleware(['auth','is_admin'])->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('logout', [AuthController::class, 'logout'])->name('logout');
        Route::get('profile', [ProfileController::class, 'index'])->name('profile');
        Route::post('profile', [ProfileController::class, 'update_profile'])->name('update_profile');
        Route::post('change_password', [ProfileController::class, 'change_password'])->name('change_password');


        Route::get('category', [CategoryController::class, 'index'])->name('category');
        Route::get('create', [CategoryController::class, 'create'])->name('category.create');
        Route::post('category', [CategoryController::class, 'store'])->name('category.store');
        Route::get('upload-areas', [CategoryController::class, 'upload_areas'])->name('category.upload_areas');
        
        
    });

    
});
