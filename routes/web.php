<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/','front\post@home');
Route::get('/post/{id}','front\post@post');

Route::view('/admin/login','admin.login');
Route::post('admin/login_submit','Admin_auth@login_submit');

Route::get('/page/{slug}','front\post@page');

Route::get('/admin/logout','Admin_auth@logout');

Route::group(['middleware'=>['admin_auth']],function(){
    Route::get('/admin/post/list','admin\post@listing');
    Route::post('admin/post/submit','admin\post@submit');
    Route::view('/admin/post/add','admin.post.add');
    Route::get('/admin/post/delete/{id}','admin\post@delete');
    Route::get('/admin/post/edit/{id}','admin\post@edit');
    Route::post('/admin/post/update/{id}','admin\post@update');

    // this  is for page section

    Route::get('/admin/page/list','admin\page@listing');
    Route::post('admin/page/submit','admin\page@submit');
    Route::view('/admin/page/add','admin.page.add');
    Route::get('/admin/page/delete/{id}','admin\page@delete');
    Route::get('/admin/page/edit/{id}','admin\page@edit');
    Route::post('/admin/page/update/{id}','admin\page@update');

    // this is for contact section
    Route::get('/admin/contact/list','admin\contact@listing');



});
