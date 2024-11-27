<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('home');


Route::group(['namespace' => 'Post'], function() {
    Route::get('/posts', 'IndexController')->name('post.index');
    Route::get('/posts/create', 'CreateController')->name('post.create');
    
    Route::post('/posts', 'StoreController')->name('post.store');
    Route::get('/posts/{post}', 'ShowController')->name('post.show');
    Route::get('/posts/{post}/edit', 'EditController')->name('post.edit');
    Route::patch('/posts/{post}', 'UpdateController')->name('post.update');
    Route::delete('/posts/{post}', 'DestroyController')->name('post.delete');    
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware'=>'admin'], function() {
    Route::group(['namespace' => 'Post'], function() {
        Route::get('/post', 'IndexController')->name('admin.post.index');
        Route::get('/post/create', 'CreateController')->name('admin.post.create');

        Route::post('/post', 'StoreController')->name('admin.post.store');
        Route::get('/posts/{post}', 'ShowController')->name('admin.post.show');
        Route::get('/posts/{post}/edit', 'EditController')->name('admin.post.edit');
        Route::patch('/posts/{post}', 'UpdateController')->name('admin.post.update');
        Route::delete('/posts/{post}', 'DestroyController')->name('admin.post.delete');        
    });

});

Route::get('/posts/update', 'PostController@update');

Route::get('/posts/delete', 'PostController@delete');
Route::get('/posts/restore', 'PostController@restor');
Route::get('/posts/first_or_create', 'PostController@firstOrCreate');
Route::get('/posts/update_or_create', 'PostController@updateOrCreate');


Route::get('/main', 'MainController@index')->name('main.index');
Route::get('/contact', 'ContactController@index')->name('contact.index');
Route::get('/about', 'AboutController@index')->name('about.index');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
