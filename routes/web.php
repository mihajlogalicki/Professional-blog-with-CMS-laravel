<?php

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

// FRONT-END
Route::get('/', [
    'uses' => 'BlogController@index',
])->name('pages.index');

Route::post('/comment-blog/{id}', [
    'uses' => 'CommentController@store'
])->name('blog.comment');

Route::get('/preview-blog/{id}', [
    'uses' => 'BlogController@preview'
])->name('preview-blog');


Route::get('/category/{id}', [
    'uses' => 'BlogController@category',
])->name('category');


Route::get('/author/{id}', [
    'uses' => 'BlogController@author',
])->name('author');

Route::get('/tag/{id}', [
    'uses' => 'BlogController@tag'
])->name('tag');


// BACK-END
Route::group(['middleware' => 'role:ROLE_ADMIN'], function () {
    Route::get('/categories', [
        'uses' => 'Backend\CategoriesController@index',
    ])->name('admin.categories.index');
    
    Route::get('/add-categorie', [
        'uses' => 'Backend\CategoriesController@create',
    ])->name('admin.categories.create');
    
    Route::post('/store-categorie', [
        'uses' => 'Backend\CategoriesController@store',
    ])->name('admin.categories.store');
    
    Route::get('/edit-categorie/{id}', [
        'uses' => 'Backend\CategoriesController@edit',
    ])->name('admin.categories.edit');
    
    Route::put('/update-categorie/{id}', [
        'uses' => 'Backend\CategoriesController@update',
    ])->name('admin.categories.update');
    
    Route::get('/delete-categorie/{id}', [
        'uses' => 'Backend\CategoriesController@destroy',
    ])->name('admin.categories.delete');
    
    Route::get('/users', [
        'uses' => 'Backend\UsersController@index',
    ])->name('admin.user.index');
    
    Route::get('/add-user', [
        'uses' => 'Backend\UsersController@create',
    ])->name('admin.user.create');
    
    Route::post('/store-user', [
        'uses' => 'Backend\UsersController@store',
    ])->name('admin.user.store');
    
    Route::get('/edit-user/{id}', [
        'uses' => 'Backend\UsersController@edit',
    ])->name('admin.user.edit');
    
    Route::put('/update-user/{id}', [
        'uses' => 'Backend\UsersController@update',
    ])->name('admin.update');
    
    Route::delete('/delete-user/{id}', [
        'uses' => 'Backend\UsersController@destroy',
    ])->name('admin.destroy');

    Route::get('/delete-confirm/{id}', [
        'uses' => 'Backend\UsersController@confirm',
    ])->name('admin.confirm');
});


Route::group(['middleware' => ['role:ROLE_AUTHOR' AND 'role:ROLE_ADMIN']], function () {
    Route::get('/all-posts', [
        'uses' =>'Backend\BlogController@index'
    ])->name('admin.index');

    Route::get('/create', [
        'uses' => 'Backend\BlogController@create',
    ])->name('admin.create.blog');
    
    Route::post('/store', [
        'uses' => 'Backend\BlogController@store',
    ])->name('admin.store.blog');
    
    Route::get('/edit/{id}', [
        'uses' => 'Backend\BlogController@edit',
    ])->name('admin.edit.blog');
    
    Route::put('/update/{id}', [
        'uses' => 'Backend\BlogController@update',
    ])->name('admin.update.blog');
    
    Route::get('/delete{id}', [
        'uses' => 'Backend\BlogController@destroy',
    ])->name('admin.delete.blog');
});

Auth::routes();

Route::get('/home', 'Backend\HomeController@index')->name('home');
