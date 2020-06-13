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

Route::get('/', function () {
    return view('welcome');
});

Route::get('trangchu',[
  'as'=>'trangchu',
  'uses'=>'PageController@getIndex'
]);

Route::get('loai-san-pham/{type}',[
  'as'=>'loaisanpham',
  'uses'=>'PageController@getLoaiSp'
]);

Route::get('chi-tiet-sp/{id}',[
  'as'=>'chitietsp',
  'uses'=>'PageController@getChiTietSp'
]);

Route::get('thanh-toan',[
  'as'=>'thanhtoan',
  'uses'=>'PageController@getThanhToan'
]);

Route::get('lien-he',[
  'as'=>'lienhe',
  'uses'=>'PageController@getLienHe'
]);

Route::get('blog',[
  'as'=>'blog',
  'uses'=>'PageController@getBlog'
]);

Route::get('add-cart/{id}',[
  'as'=>'addcart',
  'uses'=>'PageController@getAddCart'
]);

Route::get('delete-cart/{id}',[
  'as'=>'deletecart',
  'uses'=>'PageController@getDeleteCart'
]);

Route::post('dat-hang',[
  'as'=>'dathang',
  'uses'=>'PageController@postDatHang'
]);

Route::get('dat-hang',[
  'as'=>'thanhtoan',
  'uses'=>'PageController@getDatHang'
]);

Route::get('dang-nhap',[
  'as'=>'dangnhap',
  'uses'=>'PageController@getDangNhap'
]);

Route::get('dang-ki',[
  'as'=>'dangki',
  'uses'=>'PageController@getDangKi'
]);

Route::post('dang-nhap',[
  'as'=>'dangnhap',
  'uses'=>'PageController@postDangNhap'
]);

Route::post('dang-ki',[
  'as'=>'dangki',
  'uses'=>'PageController@postDangKi'
]);

Route::get('dang-xuat',[
  'as'=>'dangxuat',
  'uses'=>'PageController@getDangXuat'
]);

Route::get('search',[
  'as'=>'search',
  'uses'=>'PageController@getSearch'
]);

Route::get('admin/dang-nhap',[
  'as'=>'dangnhapadmin',
  'uses'=>'AdminController@getDangnhapAdmin'
]);
Route::post('admin/dang-nhap','AdminController@postDangnhapAdmin');

Route::get('admin/dangxuat','AdminController@getDangxuatAdmin');

Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function (){

	Route::group(['prefix'=>'loai-san-pham'],function(){

		//admin/loaitin/them
		Route::get('danh-sach','LoaiSanPhamController@getDanhSach');

		Route::get('sua/{id}','LoaiSanPhamController@getSua');
		Route::post('sua/{id}','LoaiSanPhamController@postSua');

		Route::get('them','LoaiSanPhamController@getThem');
		Route::post('them','LoaiSanPhamController@postThem');

		Route::get('xoa/{id}','LoaiSanPhamController@getXoa');
	});

	Route::group(['prefix'=>'san-pham'],function(){

		//admin/tintuc/them
		Route::get('danh-sach','SanPhamController@getDanhSach');

		Route::get('sua/{id}','SanPhamController@getSua');
		Route::post('sua/{id}','SanPhamController@postSua');

		Route::get('them','SanPhamController@getThem');
		Route::post('them','SanPhamController@postThem');

		Route::get('xoa/{id}','SanPhamController@getXoa');
	});

	Route::group(['prefix'=>'slide'],function(){

		//admin/slide/them
		Route::get('danh-sach','SlideController@getDanhSach');

		Route::get('sua/{id}','SlideController@getSua');
		Route::post('sua/{id}','SlideController@postSua');
	});

	Route::group(['prefix'=>'user'],function(){

		//admin/user/them
		Route::get('danh-sach','UserController@getDanhSach');

		Route::get('sua/{id}','UserController@getSua');
		Route::post('sua/{id}','UserController@postSua');

		Route::get('them','UserController@getThem');
		Route::post('them','UserController@postThem');

		Route::get('xoa/{id}','UserController@getXoa');
	});
});
