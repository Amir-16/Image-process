<?php

use App\Http\Controllers\ImageProcessController;
use Illuminate\Support\Facades\Route;

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

Route::get('/{any}', function () {
    return view('welcome');
})->where('any','.*');

Route::controller(ImageProcessController::class)->group( function(){
    Route::post('upload', 'processImage')->name('process-image');
});


