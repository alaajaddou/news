<?php


use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\ContactController;
use App\Services\PostFetcher;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
	
    $fetcher = new PostFetcher();
    $fetcher->fetchAllSources();
    return view('welcome');
})->name('home');

Route::post('/contact' , [ContactController::class, 'submit'])->name('contact.submit');
Route::post('/login', [LoginController::class, 'login']);
Route::middleware('auth:api')->post('/logout', [LogoutController::class, 'logout']);

