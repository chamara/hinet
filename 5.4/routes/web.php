<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


/*  
 |-----------------------------------
 | Index
 |-----------------------------------
 */

 
Route::get('/', 'IndexController@home');

Route::get('home', function(){
	return redirect('/');
});

/* 
 |
 |-----------------------------------
 | Categories List
 |--------- -------------------------
 */
Route::get('opportunities/{slug}','IndexController@category');

// Categories
Route::get('categories', function(){
 	
	$data = App\Models\Categories::where('mode','on')->orderBy('name')->get();
	
	return view('categories.categories')->withData($data);
});

/* 
 |
 |-----------------------------------
 | Opportunities
 |-----------------------------------
 */
Route::get('opportunities','IndexController@opportunities');

/* 
 |
 |-----------------------------------
 | Investors
 |-----------------------------------
 */
Route::get('investors','IndexController@investors');


/* 
 |
 |-----------------------------------
 | Startups
 |-----------------------------------
 */
Route::get('startups','IndexController@startups');



/* 
 |
 |-----------------------------------
 | Portfolio
 |-----------------------------------
 */
Route::get('portfolio','IndexController@portfolio');

/* 
 |
 |-----------------------------------
 | Verify Account
 |-----------------------------------
 */
Route::get('verify/account/{confirmation_code}', 'IndexController@getVerifyAccount')->where('confirmation_code','[A-Za-z0-9]+');

/* 
/* 
 |-----------------------------------
 | Authentication
 |-----------------------------------
 */	
Auth::routes();

// Logout
Route::get('/logout', 'Auth\LoginController@logout');

// Startup Register
Route::get('/register/startup', 'Auth\RegisterController@startup')->middleware('redirect');

// Investor Register
Route::get('/register/investor', 'Auth\RegisterController@investor')->middleware('redirect');

/* 
 |
 |-----------------------------------------------
 | Ajax Request
 |-----------------------------------------------
 */
Route::get('ajax/investments', 'AjaxController@investments');
Route::get('ajax/startup/updates', 'AjaxController@updatesstartup');
Route::get('ajax/startups', 'AjaxController@startups');
Route::get('ajax/category', 'AjaxController@category');
Route::get('ajax/search', 'AjaxController@search');

/* 
 |
 |-----------------------------------
 | Details startup
 |-----------------------------------
 */
Route::group(['middleware' => 'pending'], function() {

	Route::get('startup/{id}/{slug?}','startupsController@view');
});

/* 
 |
 |-----------------------------------
 | User Views 
 |-----------------------------------
 */
Route::group(['middleware' => 'auth'], function() {
	
	// Upload Logo
	Route::post('upload/logo','startupsController@upload_logo');

	// Upload Cover
	Route::post('upload/cover','startupsController@upload_cover');
	
	// Edit startup
	Route::get('edit/startup/{id}','startupsController@edit');
	Route::post('edit/startup/{id}','startupsController@post_edit');

	// Edit startup application
	Route::get('edit/startup/application/{id}','startupsController@edit_application');
	Route::post('edit/startup/application/{id}','startupsController@post_edit_application');

	// Post a document
	Route::get('edit/startup/documents/{id}','startupsController@edit_documents');
	Route::get('edit/startup/documents/add/{id}','startupsController@edit_documents_add');
	Route::post('edit/startup/documents/add/{id}','startupsController@post_edit_documents');
	Route::get('edit/startup/documents/delete/{id}','startupsController@deleteDocuments');

	// Post a team
	Route::get('edit/startup/teams/{id}','startupsController@edit_teams');
	Route::get('edit/startup/teams/add/{id}','startupsController@edit_teams_add');
	Route::post('edit/startup/teams/add/{id}','startupsController@post_edit_teams');
	Route::get('edit/startup/teams/delete/{id}','startupsController@deleteTeams');

	// Post an update
	Route::get('update/startup/{id}','startupsController@update');
	Route::post('update/startup/{id}','startupsController@post_update');

	// Edit post an Update
	Route::get('edit/update/{id}','startupsController@edit_update');
	Route::post('edit/update/{id}','startupsController@post_edit_update');
	
	Route::post('delete/image/updates','startupsController@delete_image_update');
	
	// Delete startup
	Route::get('delete/startup/{id}','startupsController@delete');
	
	// Account Settings
	Route::get('account','UserController@account');
	Route::post('account','UserController@update_account');
	
	// Password
	Route::get('account/password','UserController@password');
	Route::post('account/password','UserController@update_password');
	
	// Upload Avatar
	Route::post('upload/avatar','UserController@upload_avatar');
	
	// Startups
	Route::get('account/startups', function(){
	return view('users.startups');
	});
	
	// Portfolio
	Route::get('account/portfolio', function(){
	return view('users.investments');
	});
	
});
/* 
 |
 |-----------------------------------
 | Admin Panel
 |-----------------------------------
 */
Route::group(['middleware' => 'role'], function() {
	
    // Upgrades
	Route::get('update/{version}','UpgradeController@update');
	
	// Dashboard
	Route::get('panel/admin','AdminController@admin');
	
	// Settings
	Route::get('panel/admin/settings','AdminController@settings');
	Route::post('panel/admin/settings','AdminController@saveSettings');
		
	// Startups
	Route::get('panel/admin/startups','AdminController@startups');
	Route::post('panel/admin/startups','AdminController@saveStartups');

	// Add Startup
	Route::get('panel/admin/startup/add','AdminController@addStartup');
	Route::post('panel/admin/startup/add','AdminController@storeStartup');
	Route::post('panel/admin/startups/edit/{id}','AdminController@post_edit_application');

	// Edit Startup
	Route::get('panel/admin/startups/edit/{id}','AdminController@editStartups');
	Route::post('panel/admin/startups/edit/{id}','AdminController@postEditStartups');
	Route::get('edit/startup/application/{id}','startupsController@edit_application');
	
			
	// Delete Startup
	Route::post('panel/admin/startup/delete','AdminController@deleteStartup');
	
	// Investments
	Route::get('panel/admin/investments','AdminController@investments');
	Route::get('panel/admin/investments/{id}','AdminController@investmentView');


	Route::post('panel/admin/investment/add','AdminController@storeInvestment');
	

	// Add Investment
	Route::get('panel/admin/investment/add','AdminController@addInvestment');
	

	// Members
	Route::resource('panel/admin/members', 'AdminController', 
		['names' => [
		    'edit'    => 'user.edit',
		    'destroy' => 'user.destroy'
		 ]]
	);

	// Investors
	Route::resource('panel/admin/investors', 'AdminController@investors', 
		['names' => [
		    'edit'    => '.edit',
		    'destroy' => '.destroy'
		 ]]
	);
	
	// Add Member
	Route::get('panel/admin/member/add','AdminController@addMember');
	Route::post('panel/admin/member/add','AdminController@storeMember');
	
	// Pages
	Route::resource('panel/admin/pages', 'PagesController', 
		['names' => [
		    'edit'    => 'pages.edit',
		    'destroy' => 'pages.destroy'
		 ]]
	);
	
	// Payments Settings
	Route::get('panel/admin/payments','AdminController@payments');
	Route::post('panel/admin/payments','AdminController@savePayments');
	
	// Profiles Social
	Route::get('panel/admin/social-profiles','AdminController@profiles_social');
	Route::post('panel/admin/social-profiles','AdminController@update_profiles_social');

	// Admin categories
	Route::get('panel/admin/categories','AdminController@categories');
	Route::get('panel/admin/categories/add','AdminController@addCategories');
	Route::post('panel/admin/categories/add','AdminController@storeCategories');
	Route::get('panel/admin/categories/edit/{id}','AdminController@editCategories')->where(array( 'id' => '[0-9]+'));
	Route::post('panel/admin/categories/update','AdminController@updateCategories');
	Route::get('panel/admin/categories/delete/{id}','AdminController@deleteCategories')->where(array( 'id' => '[0-9]+'));

	// Admin statuses
	Route::get('panel/admin/statuses','AdminController@statuses');
	Route::get('panel/admin/statuses/add','AdminController@addStatuses');
	Route::post('panel/admin/statuses/add','AdminController@storeStatuses');
	Route::get('panel/admin/statuses/edit/{id}','AdminController@editStatuses')->where(array( 'id' => '[0-9]+'));
	Route::post('panel/admin/statuses/update','AdminController@updateStatuses');
	Route::get('panel/admin/statuses/delete/{id}','AdminController@deleteStatuses')->where(array( 'id' => '[0-9]+'));

	// Admin Tax-Reliefs
	Route::get('panel/admin/tax-reliefs','AdminController@taxReliefs');
	Route::get('panel/admin/tax-reliefs/add','AdminController@addTaxRelief');
	Route::post('panel/admin/tax-reliefs/add','AdminController@storeTaxRelief');
	Route::get('panel/admin/tax-reliefs/edit/{id}','AdminController@editTaxRelief')->where(array( 'id' => '[0-9]+'));
	Route::post('panel/admin/tax-reliefs/update','AdminController@updateTaxRelief');
	Route::get('panel/admin/tax-reliefs/delete/{id}','AdminController@deleteTaxRelief')->where(array( 'id' => '[0-9]+'));	

	// Admin questions
	Route::get('panel/admin/questions','AdminController@questions');
	Route::get('panel/admin/questions/add','AdminController@addQuestions')->middleware('startupQuestionsCount');
	Route::post('panel/admin/questions/add','AdminController@storeQuestions');
	Route::get('panel/admin/questions/edit/{id}','AdminController@editQuestions')->where(array( 'id' => '[0-9]+'));
	Route::post('panel/admin/questions/update','AdminController@updateQuestions');
	Route::get('panel/admin/questions/delete/{id}','AdminController@deleteQuestions')->where(array( 'id' => '[0-9]+'));
});

/* 
 |
 |-----------------------------------
 | Investments
 |-----------------------------------
 */
Route::get('invest/{id}/{slug?}','investmentsController@show');
Route::post('invest/{id}','investmentsController@send');


	Route::get('stripe/investment/success/{id}', function($id){
			
			session()->put('investment_success', 'Investment Successful');
			return redirect("startup/".$id);
	});
	

	Route::get('stripe/investment/cancel/{id}', function($id){
			
			session()->put('investment_cancel', 'Investment Unsuccessful');
	       return redirect("startup/".$id);
	});
	
/* 
 |
 |------------------------
 | Pages Static Custom
 |------------------------
 */
Route::get('page/{page}', function( $page ){
	
	$response = App\Models\Pages::where( 'slug','=', $page )->first();
	
	$total = count( $response );
	
	if( $total == 0 ) {
		abort(404);
	} else {
		
		$title = $response->title.' - ';
		return view('pages.home', compact('response', 'title'));
	}

})->where('page','[^/]*' );



