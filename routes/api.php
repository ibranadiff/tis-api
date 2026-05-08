<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\PublicPostController;



Route::prefix('books')->group(function(){
    Route::get('/', [BookController::class, 'getAll'])->name('books.all');
    Route::get('/{id}', [BookController::class, 'getOne']);
    Route::post('/', [BookController::class, 'create']);
    Route::put('/{id}', [BookController::class, 'update']);
    Route::delete('/{id}', [BookController::class, 'delete']);
});

Route::get('/filterByParam/{author}/{year}', [BookController::class, 'filterBooksByParam']);
Route::get('/filterByQuery', [BookController::class, 'filterBooksByQuery']);

Route::get(
    '/filterByParam/{author}/{year}',
    [BookController::class, 'filterBooksByParam']
)->middleware('validate.year');

Route::prefix('posts')->group(function () {
    Route::post('/', [PostController::class, 'createPost']);
    Route::get('/{id}', [PostController::class, 'getPostById']);
    Route::put('/{id}/tag/{tagid}', [PostController::class, 'addTag']);
});

Route::prefix('comments')->group(function () {
    Route::post('/', [CommentController::class, 'createComment']);
});


Route::prefix('tags')->group(function () {
    Route::post('/', [TagController::class, 'createTag']);
});

Route::get('/public-posts', [PublicPostController::class, 'getAllPosts']);
