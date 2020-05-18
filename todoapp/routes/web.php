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

//リスト一覧画面
Route::get('/','ListingsController@index');

//リスト新規画面
Route::get('/new', 'ListingsController@new')->name('new');

//リスト新規作成処理 
Route::post('/listings','ListingsController@store');

//リスト編集画面
Route::get('/listingsedit/{listing_id}', 'ListingsController@edit');

//リスト編集後更新処理
Route::post('/listing/edit', 'ListingsController@update');

//リスト削除処理
Route::get('/listingsdelete/{listing_id}', 'ListingsController@destroy');


//カード新規画面
Route::get('/listing/{listing_id}/card/new', 'CardsController@new');

//カード新規作成処理 
Route::post('/cards','CardsController@store'); //urlは ↑ みたいにlistingから始めたほうがよい？

//カード詳細画面
Route::get('/listing/{listing_id}/card/{card_id}', 'CardsController@show');//listing_idは、Cardでリレーションしてたら使わなくて済む？

//カード編集画面
Route::get('/cardsedit/{card_id}', 'CardsController@edit');

//カード編集後更新処理
Route::post('/card/edit', 'CardsController@update');

//カード削除処理
Route::get('/cardsdelete/{card_id}', 'CardsController@destroy');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
