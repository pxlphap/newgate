<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckBlogType;

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


Route::get('/',[
	'as' => 'trang-chu',
	'uses' => 'PageController@getIndex'
]);

Route::get('/trang-chu', 'PageController@getIndex')->name('page.trangchu');

Route::get('game/{type}',[
	'as' => 'loaiblog',
	'uses' => 'PageController@getLoaiSp'
]);

Route::get('chi-tiet-bai-viet/{id}', [
    'as' => 'chitietbaiviet',
    'uses' => 'PageController@getChitiet'
]);

Route::post('chi-tiet-bai-viet/{id}',[
	'as' => 'chitietbaiviet',
	'uses' => 'PageController@postComment'
]);
Route::get('lien-he',[
	'as' => 'lienhe',
	'uses' => 'PageController@getLienHe'
]);

Route::post('lien-he',[
	'as' => 'lienhe',
	'uses' => 'PageController@postLienHe'
]);


Route::get('faqs',[
	'as' => 'gioithieu',
	'uses' => 'PageController@getGioiThieu'
]);

Route::get('dang-nhap',[
	'as'=>'login',
	'uses'=>'PageController@getLogin'
]);
Route::post('dang-nhap',[
	'as'=>'login',
	'uses'=>'PageController@postLogin'
]);
Route::get('dang-ky',[
	'as'=>'signin',
	'uses'=>'PageController@getSignin'
]);

Route::post('dang-ky',[
	'as'=>'signin',
	'uses'=>'PageController@postSignin'
]);

Route::get('dang-xuat',[
	'as'=>'logout',
	'uses'=>'PageController@postLogout'
]);


//backend
Route::get('/admin',[
	'as' => 'indexadmin',
	'uses' => 'AdminController@index'
]);

Route::get('/admin/dashboard', 'AdminController@dashboard')->name('admin.dashboard');

Route::get('search',[
	'as'=>'search',
	'uses'=>'PageController@getSearch'
]);
Route::get('/dashboard','AdminController@show_dashboard');
Route::get('/dashboard_admin','AdminController@show_dashboardAdmin');
Route::post('/admin-dashboard','AdminController@dashboard');
Route::get('/logout','AdminController@logout');

//category

Route::get('/add-category-blog','Categoryblog@add_category_blog');
Route::get('/edit-category-blog/{category_blog_id}','Categoryblog@edit_category_blog');
Route::get('/delete-category-blog/{category_blog_id}','Categoryblog@delete_category_blog');
Route::get('/all-category-blog','Categoryblog@all_category_blog');


Route::get('/unactive-category-blog/{category_blog_id}','Categoryblog@unactive_category_blog');
Route::get('/active-category-blog/{category_blog_id}','Categoryblog@active_category_blog');


Route::post('/save-category-blog','Categoryblog@save_category_blog');
Route::post('/update-category-blog/{category_blog_id}','Categoryblog@update_category_blog');

//blog

Route::get('/add-blog','BlogsController@add_blog');
Route::get('/edit-blog/{blog_id}','BlogsController@edit_blog');
Route::get('/delete-blog/{blog_id}','BlogsController@delete_blog');
Route::get('/all-blog','BlogsController@all_blog');


Route::get('/unactive-blog/{blog_id}','BlogsController@unactive_blog');
Route::get('/active-blog/{blog_id}','BlogsController@active_blog');


Route::post('/save-blog','BlogsController@save_blog');
Route::post('/update-blog/{blog_id}','BlogsController@update_blog');

//nhanvien
Route::get('/add-user','UserController@add_user');
Route::get('/edit-user/{user_id}','UserController@edit_user');
Route::get('/delete-user/{user_id}','UserController@delete_user');
Route::get('/all-user','UserController@all_user');
Route::post('/save-user','UserController@save_user');
Route::post('/update-user/{user_id}','UserController@update_user');


//thành viên
Route::get('/add-customer','UserController@add_customer');
Route::get('/edit-user/{user_id}','UserController@edit_customer');
Route::get('/delete-user/{user_id}','UserController@delete_customer');
Route::get('/all-customer','UserController@all_customer');
Route::post('/save-customer','UserController@save_customer');
Route::post('/update-customer/{user_id}','UserController@update_customer');


//Spam

Route::get('/add-spam','BlogsController@add_spam');
Route::get('/all-spam','BlogsController@all_spam');
Route::get('/all-spam-comment','BlogsController@all_spam_comment');
Route::get('/edit-spam/{spam_id}','BlogsController@edit_spam');
Route::post('/save-spam','BlogsController@save_spam');
Route::post('/update-spam/{spam_id}', 'BlogsController@update_spam');
Route::get('/delete-spam/{spam_id}','BlogsController@delete_spam');
Route::get('/delete-spam-comment/{com_id}','BlogsController@delete_spam');


//Search
Route::post('/search-danh-muc', 'Categoryblog@search_danh_muc');
Route::post('/search-blogs', 'BlogsController@search_blogs');
Route::post('/search-nhan-vien', 'UserController@search_nhan_vien');
Route::post('/search-thanh-vien', 'UserController@search_thanh_vien');
Route::post('/search-spam-text', 'BlogsController@search_spam_text');
Route::post('/search-spam-comment', 'BlogsController@search_spam_comment');