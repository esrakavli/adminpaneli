<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/anasayfa','App\Http\Controllers\front\indexController@index')->name('front.index');
Route::get('/anasayfa/kitap/detay/{selflink}','App\Http\Controllers\front\kitap\indexController@index')->name('kitap.detay');
Route::get('/kayitol',);
Route::group(['namespace'=>'App\Http\Controllers\admin'],function () {
    Route::get('/', 'indexController@index');


});

Route::group(['prefix'=>'yayinevi'],function (){

    Route::get('/','App\Http\Controllers\admin\yayinevi\indexController@index' )->name('index');
    Route::get('/ekle','App\Http\Controllers\admin\yayinevi\indexController@create' )->name('yayinevi.create');
    Route::post('/ekle','App\Http\Controllers\admin\yayinevi\indexController@store' )->name('yayinevi.create.post');
    Route::get('/duzenle/{id}','App\Http\Controllers\admin\yayinevi\indexController@edit')->name('yayinevi.edit');
    Route::post('/duzenle/{id}','App\Http\Controllers\admin\yayinevi\indexController@update')->name('yayinevi.edit.post');
    Route::get('/sil/{id}','App\Http\Controllers\admin\yayinevi\indexController@delete')->name('yayinevi.delete');
});

Route::group(['prefix'=>'yazar'],function (){

    Route::get('/','App\Http\Controllers\admin\yazar\indexController@index' )->name('yazar.index');
    Route::get('/ekle','App\Http\Controllers\admin\yazar\indexController@create' )->name('yazar.create');
    Route::post('/ekle','App\Http\Controllers\admin\yazar\indexController@store' )->name('yazar.create.post');
    Route::get('/duzenle/{id}','App\Http\Controllers\admin\yazar\indexController@edit')->name('yazar.edit');
    Route::post('/duzenle/{id}','App\Http\Controllers\admin\yazar\indexController@update')->name('yazar.edit.post');
    Route::get('/sil/{id}','App\Http\Controllers\admin\yazar\indexController@delete')->name('yazar.delete');
});

Route::group(['prefix'=>'kitap'],function (){

    Route::get('/','App\Http\Controllers\admin\kitap\indexController@index' )->name('kitap.index');
    Route::get('/ekle','App\Http\Controllers\admin\kitap\indexController@create' )->name('kitap.create');
    Route::post('/ekle','App\Http\Controllers\admin\kitap\indexController@store' )->name('kitap.create.post');
    Route::get('/duzenle/{id}','App\Http\Controllers\admin\kitap\indexController@edit')->name('kitap.edit');
    Route::post('/duzenle/{id}','App\Http\Controllers\admin\kitap\indexController@update')->name('kitap.edit.post');
    Route::get('/sil/{id}','App\Http\Controllers\admin\kitap\indexController@delete')->name('kitap.delete');
});

Route::group(['prefix'=>'kategori'],function (){

    Route::get('/','App\Http\Controllers\admin\kategori\indexController@index' )->name('kategori.index');
    Route::get('/ekle','App\Http\Controllers\admin\kategori\indexController@create' )->name('kategori.create');
    Route::post('/ekle','App\Http\Controllers\admin\kategori\indexController@store' )->name('kategori.create.post');
    Route::get('/duzenle/{id}','App\Http\Controllers\admin\kategori\indexController@edit')->name('kategori.edit');
    Route::post('/duzenle/{id}','App\Http\Controllers\admin\kategori\indexController@update')->name('kategori.edit.post');
    Route::get('/sil/{id}','App\Http\Controllers\admin\kategori\indexController@delete')->name('kategori.delete');
});

Route::group(['prefix'=>'slider'],function (){

    Route::get('/','App\Http\Controllers\admin\slider\indexController@index' )->name('slider.index');
    Route::get('/ekle','App\Http\Controllers\admin\slider\indexController@create' )->name('slider.create');
    Route::post('/ekle','App\Http\Controllers\admin\slider\indexController@store' )->name('slider.create.post');
    Route::get('/duzenle/{id}','App\Http\Controllers\admin\slider\indexController@edit')->name('slider.edit');
    Route::post('/duzenle/{id}','App\Http\Controllers\admin\slider\indexController@update')->name('slider.edit.post');
    Route::get('/sil/{id}','App\Http\Controllers\admin\slider\indexController@delete')->name('slider.delete');
});




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
