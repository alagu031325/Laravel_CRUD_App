<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Expr\PostDec;

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
    return view('welcome');
});

//new method added to resource controller should be placed before the main resource route
Route::get('/posts/trash',[PostController::class, 'trashed'])->name('posts.trashed');

Route::get('/posts/{id}/restore',[PostController::class,'restore'])->name('posts.restore');

Route::delete('/posts/{id}/force-delete',[PostController::class,'forceDelete'])->name('posts.force_delete');

//Resource controller - creates all routes for us which can be seen by running 'php artisan route:list' - eg, for create it is posts.create - is the route name
Route::resource('posts',PostController::class);

//Removing data from cache storage - can also use artisan command to delete cache - php artisan cache:clear
Route::get('forget-cache',function(){
    Cache::forget('posts');
});