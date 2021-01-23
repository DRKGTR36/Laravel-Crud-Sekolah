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

// MAILTRAP

// Route::get('kirimemail', function(){
//     \Mail::raw('halo Siswa Baru', function ($message) {
//         $message->to('admin@gmail.com', 'David');
//         $message->subject('Pendaftaran Siswa');
//     });
// });



// FRONTEND

Route::get('/', 'SiteController@home');
Route::get('/register', 'SiteController@register');
Route::post('/postregister', 'SiteController@postregister');



// AUTH

Route::get('/login', 'AuthController@login')->name('login');
Route::post('/postlogin', 'AuthController@postlogin');
Route::get('/lockscreen', 'AuthController@lockscreen');
Route::post('/postlockscreen', 'AuthController@postlockscreen');
Route::get('/logout', 'AuthController@logout');



Route::group(['middleware' => ['auth', 'checkRole:admin,siswa,guru']],function(){

    // DASHBOARD

    Route::get('/dashboard', 'DashboardController@index');



    // SISWA

    Route::get('/siswa/{siswa}/edit','SiswaController@edit');



    // PROFILE

    Route::get('/profilesaya', 'SiswaController@profilesaya');



    // FORUM

    Route::get('/forum', 'ForumController@index');
    Route::post('/forum/create', 'ForumController@create');
    Route::get('/forum/{forum}/view', 'ForumController@view');
    Route::post('/forum/{forum}/view', 'ForumController@postkomentar');


});


Route::group(['middleware' => ['auth', 'checkRole:admin,guru']],function(){

    // SISWA

    Route::get('/siswa', 'SiswaController@index');
    Route::post('/siswa/create', 'SiswaController@create');
    Route::post('/siswa/{siswa}/update','SiswaController@update');
    Route::get('/siswa/{siswa}/delete', 'SiswaController@delete');
    Route::get('/siswa/{siswa}/profile', 'SiswaController@profile');
    Route::post('siswa/{siswa}/addnilai', 'SiswaController@addnilai');
    Route::get('/siswa/{siswa}/{idmapel}/deletenilai','SiswaController@deletenilai');
    Route::get('/siswa/exportexcel','SiswaController@exportExcel');
    Route::get('siswa/exportpdf','SiswaController@exportPdf');
    Route::post('siswa/import','SiswaController@importexcel')->name('siswa.import');



    // GURU

    Route::get('/guru','GuruController@index');
    Route::get('/guru/{id}/profile','GuruController@profile');



    // POSTS

    Route::get('/posts','PostController@index')->name('posts.index');
    Route::get('post/add',[
        'uses' => 'PostController@add',
        'as' => 'posts.add',
    ]);
    Route::post('post/create',[
        'uses' => 'PostController@create',
        'as' => 'posts.create',
    ]);
    Route::get('/posts/{post}/delete','PostController@delete');



});



// SLUG

Route::get('/{slug}',[
    'uses' => 'SiteController@singlepost',
    'as' => 'site.single.post'
]);

