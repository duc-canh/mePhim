<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\WebController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\GenreController;
use App\Http\Controllers\Admin\MovieController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\EpisodeController;
use App\Http\Controllers\Admin\CategoryController;

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

Route::get('/', [WebController::class,'index'])->name('web.home');
Route::get('danh-muc/{slug}',[WebController::class,'category'])->name('web.category');
Route::get('the-loai/{slug}',[WebController::class,'genre'])->name('web.genre');
Route::get('dat-nuoc/{slug}',[WebController::class,'country'])->name('web.country');
Route::get('phim/{slug}',[WebController::class,'movie'])->name('web.movie');
Route::get('xem-phim/{slug}',[WebController::class,'watch'])->name('web.watch');
Route::get('episode/{slug}/{episodes}',[WebController::class,'episode'])->name('web.episode');

Route::post('search',[WebController::class,'search'])->name('web.search');

Route::post('addComment',[WebController::class,'addComment'])->name('web.addComment');

Route::prefix('admin')->group(function(){
    Route::get('login',[AuthController::class,'login'])->name('admin.login');
    Route::post('login',[AuthController::class,'checkLogin'])->name('admin.checkLogin');

    Route::get('signup',[WebController::class,'signup'])->name('admin.user.signup');
    Route::post('store',[UserController::class,'store'])->name('admin.user.store');

    Route::get('logout',[AuthController::class,'logout'])->name('admin.logout');
});

Route::prefix('admin')->middleware('admin.login')->group(function(){

  

    Route::get('profile',[AuthController::class,'profile'])->name('admin.profile');
    Route::put('proflie',[AuthController::class,'update_profile'])->name('admin.update_profile');

    Route::prefix('category')->group(function(){
        Route::get('/',[CategoryController::class,'index'])->name('admin.category.index');

        Route::get('create',[CategoryController::class,'create'])->name('admin.category.create');
        Route::post('store',[CategoryController::class,'store'])->name('admin.category.store');

        Route::get('edit/{id}',[CategoryController::class,'edit'])->name('admin.category.edit');
        Route::put('update/{id}',[CategoryController::class,'update'])->name('admin.category.update');

        Route::get('/delete/{id}',[CategoryController::class,'delete'])->name('admin.category.delete');
    });

    Route::prefix('country')->group(function(){
        Route::get('/',[CountryController::class,'index'])->name('admin.country.index');

        Route::get('create',[CountryController::class,'create'])->name('admin.country.create');
        Route::post('store',[CountryController::class,'store'])->name('admin.country.store');

        Route::get('edit/{id}',[CountryController::class,'edit'])->name('admin.country.edit');
        Route::put('update/{id}',[CountryController::class,'update'])->name('admin.country.update');

        Route::get('/delete/{id}',[CountryController::class,'delete'])->name('admin.country.delete');
    });

    Route::prefix('genre')->group(function(){
        Route::get('/',[GenreController::class,'index'])->name('admin.genre.index');

        Route::get('create',[GenreController::class,'create'])->name('admin.genre.create');
        Route::post('store',[GenreController::class,'store'])->name('admin.genre.store');

        Route::get('edit/{id}',[GenreController::class,'edit'])->name('admin.genre.edit');
        Route::put('update/{id}',[GenreController::class,'update'])->name('admin.genre.update');

        Route::get('/delete/{id}',[GenreController::class,'delete'])->name('admin.genre.delete');
    });

    Route::prefix('movie')->group(function(){
        Route::get('/',[MovieController::class,'index'])->name('admin.movie.index');

        Route::get('create',[MovieController::class,'create'])->name('admin.movie.create');
        Route::post('store',[MovieController::class,'store'])->name('admin.movie.store');

        Route::get('edit/{id}',[MovieController::class,'edit'])->name('admin.movie.edit');
        Route::put('update/{id}',[MovieController::class,'update'])->name('admin.movie.update');

        Route::get('/delete/{id}',[MovieController::class,'delete'])->name('admin.movie.delete');
    });

    Route::prefix('episode')->group(function(){
        Route::get('/',[EpisodeController::class,'index'])->name('admin.episode.index');

        Route::get('create',[EpisodeController::class,'create'])->name('admin.episode.create');
        Route::post('store',[EpisodeController::class,'store'])->name('admin.episode.store');

        Route::get('edit/{id}',[EpisodeController::class,'edit'])->name('admin.episode.edit');
        Route::put('update/{id}',[EpisodeController::class,'update'])->name('admin.episode.update');

        Route::get('/delete/{id}',[EpisodeController::class,'delete'])->name('admin.episode.delete');
    });

    Route::prefix('user')->group(function(){
        Route::get('/',[UserController::class,'index'])->name('admin.user.index');

        Route::get('create',[UserController::class,'create'])->name('admin.user.create');
        

        Route::get('edit/{id}',[UserController::class,'edit'])->name('admin.user.edit');
        Route::put('update/{id}',[UserController::class,'update'])->name('admin.user.update');

        Route::get('/delete/{id}',[UserController::class,'delete'])->name('admin.user.delete');
    });

    Route::prefix('contact')->group(function(){
        Route::get('/',[ContactController::class,'index'])->name('admin.contact.index');

        Route::get('create',[ContactController::class,'create'])->name('admin.contact.create');
        Route::post('store',[ContactController::class,'store'])->name('admin.contact.store');
        Route::get('/delete/{id}',[ContactController::class,'delete'])->name('admin.contact.delete');
    });
    Route::prefix('comment')->group(function(){
        Route::get('/',[ContactController::class,'comment_index'])->name('admin.comment.index');
        Route::get('/delete/{id}',[ContactController::class,'comment_delete'])->name('admin.comment.delete');

    });
});
