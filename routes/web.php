<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

 Route::get('/' , [HomeController::class , 'index'])->name('home');

 Route::prefix('/student')->group(function(){

    Route::get('/' , [StudentController::class , 'index'])->name('student');
    Route::post('/store', [StudentController::class , 'store'])->name('student.store');
    Route::get('/edit' , [StudentController::class , 'edit'])->name('student.edit');
    Route::post('/{students_id}/update' , [StudentController::class , 'update'])->name('student.update');
    Route::get('/{students_id}/delete' , [StudentController::class , 'delete'])->name('student.delete');
    Route::get('/{students_id}/status' , [StudentController::class , 'status'])->name('student.status');
    });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
