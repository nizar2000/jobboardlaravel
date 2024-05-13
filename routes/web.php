<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Guest\HomeController;
use App\Http\Controllers\Guest\JobsController;


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

Route::get('/login', function () {
    return view('auth.login');
});

Auth::routes();

Route::middleware(['auth','admin'])->group(function () {
Route::get('admin/users', [App\Http\Controllers\Admin\AdminController::class, 'user'])->name('admin.users');
Route::get('admin/dashboard', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin.dashboard');

Route::get('admin/categorie', [App\Http\Controllers\Admin\AdminController::class, 'categorie'])->name('categorie.index');
Route::post('admin/categorie/store', [App\Http\Controllers\Admin\AdminController::class, 'storecat'])->name('categorie.store');

Route::get('admin/categorie/create', [App\Http\Controllers\Admin\AdminController::class, 'createcat'])->name('categorie.create');
Route::get('admin/categorie/edit/{id}', [App\Http\Controllers\Admin\AdminController::class, 'editcat'])->name('categorie.edit');
Route::put('admin/categorie/edit/{id}', [App\Http\Controllers\Admin\AdminController::class, 'updatecat'])->name('categorie.update');
Route::delete('admin/categorie/destroy/{id}', [App\Http\Controllers\Admin\AdminController::class, 'destroycat'])->name('categorie.destroy');

Route::get('admin/jobs', [App\Http\Controllers\Admin\JobsController::class, 'index'])->name('jobs.index');

Route::get('admin/jobs/edit/{id}', [App\Http\Controllers\Admin\JobsController::class, 'edit'])->name('jobs.edit');
Route::put('admin/jobs/edit/{id}', [App\Http\Controllers\Admin\JobsController::class, 'update'])->name('jobs.update');
Route::delete('admin/jobs/destroy/{id}', [App\Http\Controllers\Admin\JobsController::class, 'destroy'])->name('jobs.destroy');
Route::get('block/{idUser}', [App\Http\Controllers\Admin\AdminController::class, 'Block'])->name('users.block');
Route::get('unblock/{idUser}', [App\Http\Controllers\Admin\AdminController::class, 'UnBlock'])->name('users.unblock');

    Route::get('/profile', [App\Http\Controllers\Admin\AdminController::class, 'profile'])->name('admin.profile');
    Route::post('/updateProfile', [App\Http\Controllers\Admin\AdminController::class, 'updateProfile'])->name('admin.updateProfile');
});
Route::middleware(['auth'])->group(function () {
    Route::middleware(['employer'])->group(function () {

        Route::get('employee/index', [App\Http\Controllers\Guest\JobsController::class, 'myJobs'])->name('employee.index');
        
        
        Route::get('employee/edit/{id}', [App\Http\Controllers\Guest\JobsController::class, 'edit'])->name('employee.edit');
        Route::put('employee/edit/{id}', [App\Http\Controllers\Guest\JobsController::class, 'update'])->name('employee.update');
        Route::delete('employee/destroy/{id}', [App\Http\Controllers\Guest\JobsController::class, 'destroy'])->name('employee.destroy');
        Route::post('employee/store', [App\Http\Controllers\Guest\JobsController::class, 'store'])->name('employee.store');
        Route::get('employee/app', [App\Http\Controllers\Guest\JobsController::class, 'myApps'])->name('employee.app');
        Route::get('app/interview/{idApp}', [App\Http\Controllers\Guest\JobsController::class, 'inter'])->name('app.inter');
        Route::get('app/reject/{idApp}', [App\Http\Controllers\Guest\JobsController::class, 'reject'])->name('app.reject');
        Route::get('employee/profile', [App\Http\Controllers\Guest\HomeController::class, 'profile'])->name('employee.profile');
        Route::post('employee/updateProfile', [App\Http\Controllers\Guest\HomeController::class, 'updateProfile'])->name('employee.updateProfile');
        Route::get('cv/download/{id}', [App\Http\Controllers\Guest\JobsController::class, 'download']);
        // Routes accessible only to employees
    }) ; 
    Route::get('employee/create', [App\Http\Controllers\Guest\JobsController::class, 'create'])->name('employee.create');
   




}) ;   
Route::get('/guest', [App\Http\Controllers\Guest\HomeController::class, 'index'])->name('guest.home');
Route::get('guest/show/{id}', [App\Http\Controllers\Guest\HomeController::class, 'show'])->name('guest.show');
Route::get('guest/shop', [App\Http\Controllers\Guest\HomeController::class, 'shop'])->name('guest.shop');
Route::get('guest/shop/{categoryId}/jobs',[App\Http\Controllers\Guest\HomeController::class, 'jobsByCategory'])->name('category.jobs');
Route::post('guest/home', [App\Http\Controllers\Guest\HomeController::class, 'search'])->name('guest.search');
Route::post('job/apply', [App\Http\Controllers\Guest\HomeController::class, 'apply'])->name('job.apply');
