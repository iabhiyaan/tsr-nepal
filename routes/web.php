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
use Illuminate\Http\Request;


Auth::routes([
  'register' => false,
  'reset' => false,
]);

Route::group(['middleware' => 'auth', 'namespace' => 'Admin', 'prefix' => 'admin'], function(){

//role  super admin related routes
Route::group(['middleware' => 'super_admin',], function() {
    Route::get('navigaiton/create/new', 'NavigationController@createNew')->name('createNew');

    Route::post('navigation/store/new', 'NavigationController@storeNewNav')->name('navigation.store.new');

});

/*
  *Dashboard
*/
Route::get('dashboard', 'DashboardController@index')->name('dashboard');

Route::put('dashboard/save/{id}', 'DashboardController@update')->name('dashboard.save');

/*
*Navigation
*/
Route::get('navigation/list', 'NavigationController@list')->name('navigation.list');

//sortable of parent menu
Route::post('navigation/sortable', 'NavigationController@navigationsortable')->name('sortableNavigation');

//sortable of child menu
Route::post('navigation/sortable/child', 'NavigationController@navigationsortableChild')->name('navigationsortableChild');

Route::get('navigation/edit/{id}', 'NavigationController@edit')->name('navigationEdit');

Route::put('navigation/save/{id}', 'NavigationController@update')->name('navigation.save');

Route::post('navigation/create', 'NavigationController@createStore')->name('navigationStore');

Route::delete('navigation/delete/{id}', 'NavigationController@deleteNavigation')->name('navigation.destroy');

/*
*Commodity
*/
Route::resource('commodity', 'CommoditiesController');

/*
*Video
*/
Route::resource('video', 'VideoController');

/*
*Pages
*/
Route::resource('pages', 'PagesController');

/*
*Category
*/
Route::resource('category', 'CategoryController');

/*
*ALl Articles
*/
Route::resource('allarticles', 'AllarticlesController');

/*
*Podcast
*/
Route::resource('podcast', 'PodcastController');

/*
*Openpress
*/
Route::resource('openpress', 'OpenpressController')->except(['show', 'create']);

/*-----------------------------------------------------------------old routes-------------------------------------*/
/*
*Articles
*/
// Route::resource('article', 'ArticleController');

/*
*Analysis
*/
// Route::resource('analysis', 'AnalysisController');

/*
*Library
*/
// Route::resource('library', 'LibraryController');

/*
*Commodity
*/
// Route::resource('market', 'MarketController');

/*
*Forum
*/
// Route::resource('forum', 'ForumController');

/*
*IpoFpo
*/
// Route::resource('ipofpo', 'IpofpoController');

/*----------------------------------------------------------------old route end----------------------------------------------------------------->*/

});



/*
<-------------------------------------------------------Back End Route End----------------------------------------------------------->

*Front End Route Begins
*/

Route::group(['namespace' => 'Front'], function() {

 /*
 *Home Page Index page
*/
Route::get('/', 'HomeController@index');
Route::get('home', 'HomeController@index')->name('home');


// Route::get('home', function(){
//     dd(debug_backtrace());
// })->name('home');

/*------------------------------------------------------old routes ------------------------------------------------------*/

/*
*Details And Listing Having Category
*/

// Route::get('details/{tablename}/title/{slug}', 'HomeController@detailsForCategory')->name('categoryDetailsPage');
// Route::get('list/{tablename}/category/{category}', 'HomeController@listForAllCategory')->name('categoryListPage');

/*
*Forum Related
*/
// Route::get('ipofpo/list', 'HomeController@ipofpoList')->name('ipofpoList');
// Route::get('ipofpo/details/{slug}', 'HomeController@ipofpoDetails')->name('ipofpoDetails');


/*
*IpoFpo Related
*/
// Route::get('forum/list', 'HomeController@forumList')->name('forumList');
// Route::get('forum/details/{slug}', 'HomeController@forumDetails')->name('forumDetails');


/*
*Video List
*/
// Route::get('video/list','HomeController@getVideoList')->name('videoList');

/*
*Details And Listing
*/
// Route::get('{tablename}/details/{slug}', 'HomeController@detailsForAll')->name('detailsPage');
// Route::get('list/{tablename}', 'HomeController@listForAll')->name('listPage');



/*---------------------------------------------------------------------------------old routes end ----------------------------------*/


/*
*Pages List
*/
Route::get('pages/{slug}','HomeController@getDynamicPages')->name('dynamicPages');

/*
*Trading View
*/
// Route::get('tradingview', function() {
//     return view('front.trading_view_api');
// })->name('tradingview');


/*
*New Dyanic Routes
*/
Route::post('store/open/press', 'HomeController@storeOpenpress')->name('openwrittingStore');

Route::get('{category}/{slug?}', 'HomeController@dyanamicNavigation')->name('dynamicNav');

});
