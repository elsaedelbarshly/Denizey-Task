<?php

use Illuminate\Support\Facades\Route;


// eamil Denizey@gmail.com
// password 123456789


Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){

    Route::get('/login','LoginController@getLoginForm')->name('admin.login');
    Route::post('/login','LoginController@login')->name('admin.login.post');
    Route::get('/logout', 'LoginController@logout')->name('admin.logout');

    Route::group(['middleware'=>['auth:admin']],function(){
        Route::get('/',function(){
            return view('admin.dashBoard');
        })->name('admin.dashBoard');
    });

    Route::group(['namespace'=>'Auth'],function(){
        Route::get('/change-password','ChangePasswordController@changePassword')->name('admin.password.change');
        Route::post('update-password','ChangePasswordController@updatePassword')->name('admin.password.update');
    });


    Route::group(['prefix'=>'Admins'],function(){
        Route::get('/','AdminController@index')->name('show-admin');
        Route::get('/create','AdminController@create')->name('create-admin');
        Route::post('/store','AdminController@store')->name('store-admin');
        Route::get('/edit/{id}','AdminController@edit')->name('edit-admin');
        Route::post('/update/{id}','AdminController@update')->name('update-admin');
        Route::get('/delete/{id}','AdminController@destroy')->name('delete-admin');
    });

    Route::group(['prefix'=>'sikll'],function(){
        Route::get('/','SkillController@index')->name('show-skill');
        Route::get('/create','SkillController@create')->name('create-skill');
        Route::post('/store','SkillController@store')->name('store-skill');
        Route::get('/edit/{id}','SkillController@edit')->name('edit-skill');
        Route::post('/update/{id}','SkillController@update')->name('update-skill');
        Route::get('/delete/{id}','SkillController@destroy')->name('delete-skill');
    });

    Route::group(['prefix'=>'category'],function(){
        Route::get('/','CategoryController@index')->name('show-category');
        Route::get('/create','CategoryController@create')->name('create-category');
        Route::post('/store','CategoryController@store')->name('store-category');
        Route::get('/edit/{id}','CategoryController@edit')->name('edit-category');
        Route::post('/update/{id}','CategoryController@update')->name('update-category');
        Route::get('/delete/{id}','CategoryController@destroy')->name('delete-category');
    });

    Route::group(['prefix'=>'subcategory'],function(){
        Route::get('/','SubCategoryController@index')->name('show-subcategory');
        Route::get('/create','SubCategoryController@create')->name('create-subcategory');
        Route::post('/store','SubCategoryController@store')->name('store-subcategory');
        Route::get('/edit/{id}','SubCategoryController@edit')->name('edit-subcategory');
        Route::post('/update/{id}','SubCategoryController@update')->name('update-subcategory');
        Route::get('/delete/{id}','SubCategoryController@destroy')->name('delete-subcategory');
    });

    Route::group(['prefix'=>'quize'],function(){
        Route::get('/','QuizeController@index')->name('show-quize');
        Route::get('/create','QuizeController@create')->name('create-quize');
        Route::post('/store','QuizeController@store')->name('store-quize');
        Route::get('/edit/{id}','QuizeController@edit')->name('edit-quize');
        Route::post('/update/{id}','QuizeController@update')->name('update-quize');
        Route::get('/delete/{id}','QuizeController@destroy')->name('delete-quize');
    });

});    