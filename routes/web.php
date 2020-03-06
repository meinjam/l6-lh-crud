<?php

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get(md5('/contact'), 'PagesController@contact')->name('/contact');


// Category Controller
Route::get('/category', 'CategoriesController@index');
Route::get('/addcategory', 'CategoriesController@create');
Route::post('/storecategory', 'CategoriesController@store')->name('store.category');
Route::get('/category/{id}', 'CategoriesController@show');
Route::get('/category/{id}/delete/', 'CategoriesController@destroy');
Route::get('/category/{id}/edit/', 'CategoriesController@edit');
Route::post('/updatecategory/{id}', 'CategoriesController@update')->name('update.category');

// Posts Controller
Route::get('/posts', 'PostsController@index');
Route::get('/newpost', 'PostsController@create');
Route::post('/storepost', 'PostsController@store')->name('store.post');
Route::get('posts/{id}', 'PostsController@show');
Route::get('/posts/{id}/delete', 'PostsController@destroy');
Route::get('/posts/{id}/edit', 'PostsController@edit');
Route::post('posts/{id}/update', 'PostsController@update');

// Students
Route::get('/student', 'StudentsController@index');
Route::get('/student/create', 'StudentsController@create');
Route::post('/storestudent', 'StudentsController@store')->name('store.student');
Route::get('/student/{id}/delete', 'StudentsController@destroy');
Route::get('/student/{id}/edit', 'StudentsController@edit');
Route::post('/student/{id}/update', 'StudentsController@update');