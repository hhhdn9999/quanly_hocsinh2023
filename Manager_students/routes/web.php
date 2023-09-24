<?php

use Illuminate\Support\Facades\Route;

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
    return view('layouts.master');
});
//=============================================LOP
Route::get('/lop', 'App\Http\Controllers\AdminController@lop')->name('admin.get.list.lop');;
Route::get('/lop/create','App\Http\Controllers\AdminController@create_lop')->name('admin.get.create.lop');
Route::post('/lop/create','App\Http\Controllers\AdminController@store_lop');
Route::get('/lop/update/{id}','App\Http\Controllers\AdminController@edit_lop')->name('admin.get.edit.lop');
Route::post('/lop/update/{id}','App\Http\Controllers\AdminController@update_lop');
Route::get('/lop/delete/{id}','App\Http\Controllers\AdminController@delete_lop')->name('admin.get.delete.lop');

//=============================================MONHOC
Route::get('/monhoc', 'App\Http\Controllers\AdminController@monhoc')->name('admin.get.list.monhoc');;
Route::get('/monhoc/create','App\Http\Controllers\AdminController@create_monhoc')->name('admin.get.create.monhoc');
Route::post('/monhoc/create','App\Http\Controllers\AdminController@store_monhoc');
Route::get('/monhoc/update/{id}','App\Http\Controllers\AdminController@edit_monhoc')->name('admin.get.edit.monhoc');
Route::post('/monhoc/update/{id}','App\Http\Controllers\AdminController@update_monhoc');
Route::get('/monhoc/delete/{id}','App\Http\Controllers\AdminController@delete_monhoc')->name('admin.get.delete.monhoc');

//=============================================DIEMDANH
Route::get('/diemdanh', 'App\Http\Controllers\AdminController@diemdanh')->name('admin.get.list.diemdanh');;
Route::get('/diemdanh/create','App\Http\Controllers\AdminController@create_diemdanh')->name('admin.get.create.diemdanh');
Route::post('/diemdanh/create','App\Http\Controllers\AdminController@store_diemdanh');
// Route::get('/diemdanh/update/{id}','App\Http\Controllers\AdminController@edit_diemdanh')->name('admin.get.edit.diemdanh');
// Route::post('/diemdanh/update/{id}','App\Http\Controllers\AdminController@update_diemdanh');
Route::get('/diemdanh/delete/{id}','App\Http\Controllers\AdminController@delete_diemdanh')->name('admin.get.delete.diemdanh');

//=============================================HOCSINH
Route::get('/hocsinh', 'App\Http\Controllers\AdminController@hocsinh')->name('admin.get.list.hocsinh');
Route::get('/hocsinh/create','App\Http\Controllers\AdminController@create_hocsinh')->name('admin.get.create.hocsinh');
Route::post('/hocsinh/create','App\Http\Controllers\AdminController@store_hocsinh');
Route::get('/hocsinh/update/{id}','App\Http\Controllers\AdminController@edit_hocsinh')->name('admin.get.edit.hocsinh');
Route::post('/hocsinh/update/{id}','App\Http\Controllers\AdminController@update_hocsinh');
Route::get('/hocsinh/delete/{id}','App\Http\Controllers\AdminController@delete_hocsinh')->name('admin.get.delete.hocsinh');

//=============================================THU PHÍ
Route::get('/thuphi', 'App\Http\Controllers\AdminController@thuphi')->name('admin.get.list.thuphi');
//=============================================Thu Phí Detail
Route::get('/thuphi/detail/{id}', 'App\Http\Controllers\AdminController@index_detail_thuno')->name('admin.get.thanhtoan_detail.thuno');
Route::get('/printer/detail/{id}', 'App\Http\Controllers\AdminController@detail_printer')->name('admin.get.printer.detail.thuno');
Route::get('/thuphi/detail/thanhtoan/{id}', 'App\Http\Controllers\AdminController@thanhtoan')->name('admin.get.thanhtoan.detail.thuno');

//=============================================Nợ
Route::get('/no', 'App\Http\Controllers\AdminController@no')->name('admin.get.list.no');
Route::get('/no/detail/{id}', 'App\Http\Controllers\AdminController@no_detail')->name('admin.get.edit.no.detail');
Route::get('/no/create/{id}','App\Http\Controllers\AdminController@create_no')->name('admin.get.create.no');
Route::post('/no/create/{id}','App\Http\Controllers\AdminController@store_no');
Route::get('/no/detail/update/{id}','App\Http\Controllers\AdminController@detail_update')->name('admin.get.edit.no.detail.update');


Route::get('/no/update/{id}','App\Http\Controllers\AdminController@edit_no')->name('admin.get.edit.no');
Route::post('/no/update/{id}','App\Http\Controllers\AdminController@update_no');
Route::get('/no/delete/{id}','App\Http\Controllers\AdminController@delete_no')->name('admin.get.delete.no');

//=============================================Xem những ai còn nợ nhanh // và tổng đã nộp
Route::get('/con/no', 'App\Http\Controllers\AdminController@conno')->name('admin.get.list.conno');
Route::get('/danop', 'App\Http\Controllers\AdminController@danop')->name('admin.get.list.danop');
Route::get('/check/hocphi', 'App\Http\Controllers\AdminController@check_hocphi')->name('admin.get.list.check.hocphi');

//=============================================Xem LÝ DO VẮNG CỦA DETAIL HỌC SINH
Route::get('/hocsinh/vang/lydo', 'App\Http\Controllers\AdminController@vang')->name('admin.get.list.vang');
Route::get('/hocsinh/vang/lydo/detail', 'App\Http\Controllers\AdminController@vang')->name('admin.get.list.vang_detail');

//=============================================Số lượng học sinh của môn
Route::get('/soluong/hocsinh/of/monhoc', 'App\Http\Controllers\AdminController@soluong')->name('admin.get.list.soluong.mon');

