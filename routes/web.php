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

Route::get('/', function () {
    return view('index');
});


Auth::routes();


Route::get('/', 'HomeController@index')->name('home');

Route::get('contact', 'PageController@contact')->name('contact');
//Route::get('job/show', 'PageController@jobshow')->name('jobshow');


Route::get('profile', 'PageController@profile')->name('profile');

Route::post('saveChanges', 'HomeController@saveChanges')->name('saveChanges');
Route::post('contact', 'HomeController@contact')->name('contact');

Route::get('testPage', 'HomeController@testPage')->name('testPage');
Route::post('search', 'HomeController@search')->name('search');
Route::get('search', 'HomeController@search')->name('search');
Route::get('jobsearch', 'JobOfferController@jobsearch')->name('jobsearch');


Route::resource('company', 'CompanyController');
Route::resource('job', 'JobOfferController');

Route::get('job/show/{id}', 'JobOfferController@jobShow')->name('jobShow');
Route::post('apply', 'JobOfferController@apply')->name('apply');
Route::post('applyFromInside', 'JobOfferController@applyFromInside')->name('applyFromInside');

//Route::post('/{vue_capture?}','JobOfferController@apply')->where('vue_capture', '[\/\w\.-]*');
//Route::post('{any}', 'JobOfferController@apply')->where('any', '.*');
