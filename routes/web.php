<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Client'], function() {
    Route::get('/', 'IndexController');
});

Route::group(['namespace' => 'Admin', 'prefix' => 'dash', 'as' => 'admin.'], function() {
    Route::get('/', 'IndexController')->name('home');

    Route::group(['namespace' => 'Category', 'as' => 'categories.', 'prefix' => 'categories'], function() {
        Route::get('/', 'IndexController')->name('index');
        Route::get('create', 'CreateController')->name('create');
        Route::post('/', 'StoreController')->name('store');
        Route::get('/{category}/edit', 'EditController')->name('edit');
        Route::patch('/{category}', 'UpdateController')->name('update');
        Route::delete('/{category}', 'DeleteController')->name('delete');
    });

    Route::group(['namespace' => 'Tag', 'as' => 'tags.', 'prefix' => 'tags'], function() {
        Route::get('/', 'IndexController')->name('index');
        Route::get('create', 'CreateController')->name('create');
        Route::post('/', 'StoreController')->name('store');
        Route::get('/{tag}/edit', 'EditController')->name('edit');
        Route::patch('/{tag}', 'UpdateController')->name('update');
        Route::delete('/{tag}', 'DeleteController')->name('delete');
    });

    Route::group(['namespace' => 'Post', 'as' => 'posts.', 'prefix' => 'posts'], function() {
        Route::get('/', 'IndexController')->name('index');
        Route::get('create', 'CreateController')->name('create');
        Route::post('/', 'StoreController')->name('store');
        Route::get('/{post}/edit', 'EditController')->name('edit');
        Route::patch('/{post}', 'UpdateController')->name('update');
        Route::delete('/{post}', 'DeleteController')->name('delete');
    });
});

