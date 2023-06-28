<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserAdminController;
 
 
Route::get('/', function () {
    return view('welcome');
});
 
Route::group(['middleware' => ['web','guest']], function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('registerPost');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('loginPost');

});

Route::group(['middleware' => 'auth'], function () {
    
        Route::get('/admin/register', [AuthController::class, 'registerAdmin'])->name('admin.register');
        Route::post('admin/register', [AuthController::class, 'registerPostAdmin'])->name('admin.register.submit');
        Route::get('/users/mostrar', [HomeController::class, 'mostrarusuarios'])->name('users.mostrar');
        Route::delete('usuarios/{user}', [UserAdminController::class,'destroy'])->name('user.destroy');
        
    });
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [HomeController::class, 'index']);
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/UserAdmin', [UserAdminController::class, 'index']);

});
