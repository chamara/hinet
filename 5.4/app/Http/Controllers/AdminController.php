<?php  

//<<<<--- NAMESPACE --->>>>//
namespace App\Http\Controllers;

//<<<<--- USE --->>>>//
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\AdminSettings;
use App\Models\Startups;
use App\Models\Investments;
use App\Models\Categories;
use App\Helper;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Image;
use Mail;

//<<<<--- START CLASS --->>>>//
class AdminController extends Controller {

	// Construct Function
	public function __construct( AdminSettings $settings, Request $request) {
		$this->settings = $settings::first();
		$this->request = $request;
	}

	//<<<<--- USERS / MEMBERS --->>>>//
	
	// User Index Function
	public function index(Request $request) {
		$query = $request->input('q');

		// Query Data
		if( $query != '' && strlen( $query ) > 2 ) {
			$data = User::where('name', 'LIKE', '%'.$query.'%')
			->orderBy('id','desc')->paginate(20);
		}
		 // Else Data is
		else {
			$data = User::orderBy('id','desc')->paginate(20);
		}
		
		// Return View
		return view('admin.members', ['data' => $data,'query' => $query]);
	}

	// User Index Function
	public function investors(Request $request) {
		$query = $request->input('q');

		// Query Data
		if( $query != '' && strlen( $query ) > 2 ) {
			$data = User::where('role', 'investor')->where('name', 'LIKE', '%'.$query.'%')
			->orderBy('id','desc')->paginate(20);
		} 

		 // Else Data is
		else {
			$data = User::where('role', 'investor')->orderBy('id','desc')->paginate(20);
		}
		
		$title = 'Investors';
		// Return View
		return view('admin.members', ['data' => $data, 'title' => $title, 'query' => $query]);
	}

	// Edit User Function
	public function edit($id) {
		$data = User::findOrFail($id);
		
		// If Edit User
		if( $data->id == 1 || $data->id == Auth::user()->id ) {
			\Session::flash('info_message', 'Cannot be edited');
			return redirect('panel/admin/members');
		}

		// Return View
		return view('admin.edit-member')->withData($data);
	}

	// Update User Function
	public function update($id, Request $request) {

		// Set Variables
		$user = User::findOrFail($id);	
		$input = $request->all();

		// If Password Exists
		if( !empty( $request->password ) ) {
			// Set Validation Rules
			$rules = array(
				'name' => 'required|min:3|max:25',
				'email'     => 'required|email|unique:users,email,'.$id,
				'password' => 'min:6',
				);

			// Hash Password	
			$password = \Hash::make($request->password);
		} 

		// Else If Password doesn't exist
		else {

			// Set Validation Rules	
			$rules = array(
				'name' => 'required|min:3|max:25',
				'email'     => 'required|email|unique:users,email,'.$id,
				);

			// No Password Change	
			$password = $user->password;
		}

	  	// Validate Rules	
		$this->validate($request,$rules);

	  	// Update user
		$user->name = $request->name;
		$user->email = $request->email;
		$user->role = $request->role;
		$user->password = $password;
		$user->status = $request->status;
		$user->save();

      	// Success Message
		\Session::flash('success_message', 'Success');

    	// Return Redirect
		return redirect('panel/admin/members');
	}
	
	// Delete User Function
	public function destroy($id) {
    	// Find user
		$user = User::findOrFail($id);

		// If user exists
		if( $user->id == 1 || $user->id == Auth::user()->id ) {
			return redirect('panel/admin/members');
			exit;
		}

		// Finalize all user startup profiles
		$allstartups = startups::where('user_id',$id)->update(array('finalized' => '1'));
		
		// Delete avatar
		$fileAvatar = 'public/avatar/'.$user->avatar;
		
		// Delete avatar if not default.jpg
		if ( \File::exists($fileAvatar) && $user->avatar != 'default.jpg' ) {
			\File::delete($fileAvatar);	
		}
		
		// Delete user	
		$user->delete();

        // Redirect
		return redirect('panel/admin/members');
	}

    // Add User Function
	public function add_member() {
    	// Return View
		return view('admin.add-member');
	}

	// Store User Function
	public function storeMember(Request $request) {
		// Validate Rules
		$this->validate($request, [
			'name' => 'required|min:3|max:30',
			'email'     => 'required|email|max:255|unique:users',
			'password' => 'required|confirmed|min:6',
			]);
		
		// Store User
		$user = new User;
		$user->name = $request->name;
		$user->email = $request->email;
		$user->role = $request->role;
		$user->avatar = 'default.jpg';

		// Create email confirmation token
		$user->token = str_random(80);

		// Hash password
		$user->password = \Hash::make($request->password);

		// Save
		$user->save();

		// Success Message
		\Session::flash('success_message', 'Success');

		// Return Redirect 
		return redirect('panel/admin/members');	
	}

	//<<<<--- ADMIN DASHBOARD --->>>>//

    // Dashboard Function
	public function admin() {
		// Return View Dashboard
		return view('admin.dashboard');
	}

	//<<<<--- SITE SETTINGS --->>>>//

	// Settings Function
	public function settings() {
		// Return View Settingss
		return view('admin.settings')->withSettings($this->settings);
	}
	
	// Site Settings Function
	public function saveSettings(Request $request) {
		// Validate Rules		
		$rules = array(
			'title'            		=> 'required',
			'welcome_text' 	   		=> 'required',
			'welcome_subtitle' 		=> 'required',
			'keywords'         		=> 'required',
			'description'      		=> 'required',
			'email_no_reply'   		=> 'required',
			'email_admin'      		=> 'required',
			'min_startup_amount'    => 'required|integer|min:1',
			'max_startup_amount'    => 'required|integer|min:1',
			'min_investment_amount' => 'required|integer|min:1',
			'max_investment_amount' => 'required|integer|min:1',
			);
		
		// Validate Request
		$this->validate($request, $rules);
		
		// Store Settings
		$sql                      	= AdminSettings::first();
		$sql->title               	= $request->title;
		$sql->welcome_text        	= $request->welcome_text;
		$sql->welcome_subtitle    	= $request->welcome_subtitle;
		$sql->keywords            	= $request->keywords;
		$sql->description         	= $request->description;
		$sql->email_no_reply      	= $request->email_no_reply;
		$sql->email_admin         	= $request->email_admin;
		$sql->auto_approve_startups = $request->auto_approve_startups;
		$sql->disable_startups_reg  = $request->disable_startups_reg;
		$sql->disable_investors_reg = $request->disable_investors_reg;
		$sql->captcha               = $request->captcha;
		$sql->email_verification 	= $request->email_verification;
		$sql->result_request      	= $request->result_request;
		$sql->file_size_allowed   	= $request->file_size_allowed;
		$sql->min_startup_amount   	= $request->min_startup_amount;
		$sql->max_startup_amount   	= $request->max_startup_amount;
		$sql->min_investment_amount = $request->min_investment_amount;
		$sql->max_investment_amount = $request->max_investment_amount;
		$sql->save();

		// Success Message
		\Session::flash('success_message', 'Success');

		// Return Redirect
		return redirect('panel/admin/settings');
	}

	//<<<<--- SOCIAL PROFILES --->>>>//

	// Social Profiles Function	
	public function profiles_social(){
		// Return View
		return view('admin.profiles-social')->withSettings($this->settings);
	}

	// Update Social Profiles Function	
	public function update_profiles_social(Request $request) {

		$sql = AdminSettings::find(1);

		// Validate Rules
		$rules = array(
			'twitter'    => 'url',
			'facebook'   => 'url',
			'googleplus' => 'url',
			'instagram'  => 'url',
			'linkedin'   => 'url',
			'angellist'  => 'url',
			);

		// Validate Request
		$this->validate($request, $rules);
		
		// Store Settings
		$sql->twitter       = $request->twitter;
		$sql->facebook      = $request->facebook;
		$sql->googleplus    = $request->googleplus;
		$sql->instagram     = $request->instagram;
		$sql->linkedin     	= $request->linkedin;
		$sql->angellist     = $request->angellist;

		// SQL Save
		$sql->save();

		// Success Message
		\Session::flash('success_message', 'Success');

		// Return Redirect
		return redirect('panel/admin/profiles-social');
	}

	//<<<<--- INVESTMENTS --->>>>//

	// Investments Function	
	public function investments() {
		// Get Data
		$data = investments::orderBy('id','DESC')->paginate(100);

		// Return View
		return view('admin.investments', ['data' => $data, 'settings' => $this->settings]);
	}
	
	// Single Investment Function
	public function investmentView($id) {
		// Get Data
		$data = investments::findOrFail($id);

		// Return View
		return view('admin.investment-view', ['data' => $data, 'settings' => $this->settings]);
	}

	// Add Investment Function
	public function add_investment() {
		// Get Data
		$data = startups::where('status', 'active')->where('opportunity', '1')->orderBy('id','ASC')->paginate(100);

		$user = user::where('role', 'investor')->orderBy('name','ASC')->paginate(100);

    	// Return View
		return view('admin.add-investment', ['data' => $data, 'user' => $user, 'settings' => $this->settings] );
	}

	// Store Investment Function
	public function storeInvestment(Request $request) {
		$sql 					= new investments;
		$sql->startups_id     	= $this->request->startup_id;
		$sql->txn_id            = 'null';
		$sql->user_id           = Auth::user()->id;
		$sql->fullname          = $this->request->name;
		$sql->email             = $this->request->email;
		$sql->investment        = $this->request->amount;
		$sql->payment_gateway  	= 'Offline';
		$sql->comment           = $this->request->comment;
		$sql->anonymous         = '1';
		$sql->save();

		// Success Message
		\Session::flash('success_message', 'Success');

		// Return Redirect 
		return redirect('panel/admin/investments');	
	}

	//<<<<--- PAYMENT SETTINGS --->>>>//

	// Payment Settings Function
	public function payments() {
		//Return View
		return view('admin.payments-settings')->withSettings($this->settings);
	}


	// Store Payment Settings Function
	public function savePayments(Request $request) {
		// Set DB	
		$sql = AdminSettings::find(1);
		
		// Validate Rules
		$rules = array(
			'paypal_account'    => 'email',
			);

		// Validate Request
		$this->validate($request, $rules);

		// Different Currency Symbols ** Request from Guil 02/03/2017 **
		switch( $request->currency_code ) {
			case 'USD':
			$currency_symbol  = '$';
			break;
			case 'EUR':
			$currency_symbol  = '€';
			break;
			case 'GBP':
			$currency_symbol  = '£';
			break;
		}

		// Store Settings
		$sql->currency_symbol  		= $currency_symbol;
		$sql->currency_code    		= $request->currency_code;
		$sql->fee_investment 		= $request->fee_investment;
		$sql->stripe_secret_key    	= $request->stripe_secret_key;
		$sql->stripe_public_key    	= $request->stripe_public_key;
		$sql->save();

		// Success Message
		\Session::flash('success_message', 'Success');


		// Return redirect
		return redirect('panel/admin/payments');
	}

	//<<<<--- STARTUPS --->>>>//

	// // Startups Function
	// public function startups(){

	// 	// Get Data
	// 	$data = startups::orderBy('id','DESC')->paginate(50);

	// 	// Return View
	// 	return view('admin.startups', ['data' => $data, 'settings' => $this->settings]);
	// }

	// Add Investment Function
	public function add_startup() {
		// Get Data
		$user = user::where('role', 'startup')->orderBy('name','ASC')->paginate(100);

    	// Return View
		return view('admin.add-startup', ['user' => $user, 'settings' => $this->settings] );
	}

	// Store Investment Function
	public function storeStartup(Request $request) {

		// Decode HTML from textarea
		$description = html_entity_decode($request->description);
		
		// Remove <script> tags from textarea
		$description = Helper::removeTagScript($description);

		// Remove <iframe> tags from textarea
		$description = Helper::removeTagIframe($description);

		// Trim spaces from textarea
		$description = trim(Helper::spaces($description));

		// Remove line breaks from description
		$description = Helper::removeBR($description);

		$sql 				= new startups;
		$sql->title 		= $request->title;
		$sql->user_id 		= $request->member_name;
		$sql->goal 			= $request->goal;
		$sql->location 		= $request->location;
		$sql->status 		= $request->status;
		$sql->description 	= $description;
		$sql->categories_id = $request->category;
		$sql->featured 		= $request->featured;
		$sql->opportunity	= $request->opportunity;
		$sql->portfolio		= $request->portfolio;
		$sql->save();

		// Success Message
		\Session::flash('success_message', 'Success');

		// Return Redirect 
		return redirect('panel/admin/startups');	
	}	

	// Startups Function
	public function startups(Request $request) {
		$query = $request->input('q');

		// Query Data
		if( $query != '' && strlen( $query ) > 2 ) {
			$data = startups::where('title', 'LIKE', '%'.$query.'%')
			->orderBy('id','desc')->paginate(20);
		}

		 // Else Data is
		else {
			$data = startups::orderBy('id','DESC')->paginate(20);
		}
		
		// Return View
		return view('admin.startups', ['data' => $data,'query' => $query, 'settings' => $this->settings]);
	}

	// Edit Startup ** Request from Joseph 02/03/2017 - Admin override all content **
	public function editstartups($id){
		
		// Get Data
		$data = startups::findOrFail($id);

		// Return View
		return view('admin.edit-startup', ['data' => $data, 'settings' => $this->settings]);
	}
	
	// Post Edit Startups
	public function postEditstartups(Request $request) {
		// Set DB
		$sql = startups::findOrFail($request->id);
		
		// Decode HTML from textarea
		$description = html_entity_decode($request->description);
		
		// Remove <script> tags from textarea
		$description = Helper::removeTagScript($description);

		// Remove <iframe> tags from textarea
		$description = Helper::removeTagIframe($description);
		
		// Trim spaces from textarea
		$description = trim(Helper::spaces($description));

		// Remove line breaks from description
		$description = Helper::removeBR($description);

		// Store Request
		$sql->title 		= $request->title;
		$sql->goal 			= $request->goal;
		$sql->location 		= $request->location;
		$sql->description 	= $description;
		$sql->status 		= $request->status;
		$sql->categories_id = $request->category;
		$sql->featured 		= $request->featured;
		$sql->opportunity	= $request->opportunity;
		$sql->portfolio		= $request->portfolio;
		$sql->save();

		// Success Message
		\Session::flash('success_message', 'Success');
		return redirect('panel/admin/startups');
	}

	// Delete Startup Function
	public function deletestartup(Request $request) {
		// Get Data
		$data = startups::findOrFail($request->id);
		
		// Set File Paths for images
		$path_logo    	= 'public/startups/logo/'; 
		$path_cover     = 'public/startups/cover/';
		$path_updates 	= 'public/startups/updates/';
		
		// Get Startups Updates
		$updates = $data->updates()->get();
		
		//Delete Updates
		foreach ($updates as $key) {

			// Delete Update Images
			if ( \File::exists($path_updates.$key->image) ) {
				\File::delete($path_updates.$key->image);
			}

			// Delete Update	
			$key->delete();
		}
		
		// Delete Startup Logo
		if ( \File::exists($path_logo.$data->logo) && $data->logo != 'default.jpg'  ) {
			\File::delete($path_logo.$data->logo);
		}
		
		// Delete Startup Cover	
		if ( \File::exists($path_cover.$data->cover) && $data->cover != 'default.jpg' ) {
			\File::delete($path_cover.$data->cover);
		}
		
		// Delete Startup
		$data->delete();

		// Success Message 
		\Session::flash('success_message', 'Success');

		// Return Redirect 
		return redirect('panel/admin/startups');
	}

	//<<<<--- CATEGORIES --->>>>//

	// Categories Function
	public function categories() {
		// Get Data
		$categories      = Categories::orderBy('name')->get();
		$totalCategories = count( $categories );

		// Return View
		return view('admin.categories', compact( 'categories', 'totalCategories' ));
	}

	// Add Category Function
	public function addCategories() {
		// Return View
		return view('admin.add-categories');
	}

	// Store Category Function
	public function storeCategories(Request $request) {
		// Set Image Paths
		$temp            = 'public/temp/'; 
		$path            = 'public/img-category/';

		// Validate Characters
		Validator::extend('ascii_only', function($attribute, $value, $parameters){
			return !preg_match('/[^x00-x7F\-]/i', $value);
		});

		// Validate Rules
		$rules = array(
			'name'        => 'required',
			'slug'        => 'required|ascii_only|unique:categories',
			'thumbnail'   => 'mimes:jpg,gif,png,jpe,jpeg',
			);
		
		// Validate Request
		$this->validate($request, $rules);
		
		// If Has Thumbnail
		if( $request->hasFile('thumbnail') ) {

		// Set Image Data
			$extension              = $request->file('thumbnail')->getClientOriginalExtension();
			$type_mime_shot   		= $request->file('thumbnail')->getMimeType();
			$sizeFile               = $request->file('thumbnail')->getSize();
			$thumbnail              = $request->slug.'-'.str_random(32).'.'.$extension;

			// Move Thumbnail to temp folder
			if( $request->file('thumbnail')->move($temp, $thumbnail) ) {

				// Create Temp Image
				$image = Image::make($temp.$thumbnail);

				// If image is exact dimensions
				if(  $image->width() == 457 && $image->height() == 359 ) {
					// Copy to category foler and delete temp
					\File::copy($temp.$thumbnail, $path.$thumbnail);
					\File::delete($temp.$thumbnail);
				}

				else {
					// Fit Image to dimensions and save to temp folder
					$image->fit(457, 359)->save($temp.$thumbnail);

					// Copy to category foler and delete temp
					\File::copy($temp.$thumbnail, $path.$thumbnail);
					\File::delete($temp.$thumbnail);
				}
			}
		}
		
		// Store Category
		$sql               = New Categories;
		$sql->name         = $request->name;
		$sql->slug         = $request->slug;
		
		// If thumbnail
		if( $request->hasFile('thumbnail') ){
			$sql->image = $thumbnail;
		}

		else {
			$sql->image = 'default.jpg';
		}

		// Save
		$sql->save();

		// Success Message
		\Session::flash('success_message', 'Success');

		// Return Redirect
		return redirect('panel/admin/categories');
	}

	// Edit Category Function
	public function editCategories($id) {
		// Get Data
		$categories        = Categories::find( $id );

		// Return View
		return view('admin.edit-categories')->with('categories',$categories);
	}

	// Update Existing Category Function
	public function updateCategories( Request $request ) {
		// Get Data
		$categories        = Categories::find( $request->id );

		// Set File Paths
		$temp            = 'public/temp/'; 
		$path            = 'public/img-category/';

	    // If category is null
		if( !isset($categories) ) {
	    	// Return Redirect
			return redirect('panel/admin/categories');
		}
		
		// Validate characters	
		Validator::extend('ascii_only', function($attribute, $value, $parameters){
			return !preg_match('/[^x00-x7F\-]/i', $value);
		});
		
		// Validate Rules
		$rules = array(
			'name'        => 'required',
			'slug'        => 'required|ascii_only|unique:categories,slug,'.$request->id,
			'thumbnail'   => 'mimes:jpg,gif,png,jpe,jpeg',
			);
		
		// Validate Request
		$this->validate($request, $rules);

		// If rquest has thumbnail
		if( $request->hasFile('thumbnail') )	{

			// Set data
			$extension              = $request->file('thumbnail')->getClientOriginalExtension();
			$type_mime_shot   		= $request->file('thumbnail')->getMimeType();
			$sizeFile               = $request->file('thumbnail')->getSize();
			$thumbnail              = $request->slug.'-'.str_random(32).'.'.$extension;

			// Move Thumbnail to temp folder
			if( $request->file('thumbnail')->move($temp, $thumbnail) ) {
				// Create Temp Image
				$image = Image::make($temp.$thumbnail);

				// If image is exact dimensions
				if(  $image->width() == 457 && $image->height() == 359 ) {
					// Copy to category foler and delete temp
					\File::copy($temp.$thumbnail, $path.$thumbnail);
					\File::delete($temp.$thumbnail);
				} 

				else {
					// Fit Image to dimensions and save to temp folder
					$image->fit(457, 359)->save($temp.$thumbnail);

					// Copy to category foler and delete temp
					\File::copy($temp.$thumbnail, $path.$thumbnail);
					\File::delete($temp.$thumbnail);
				}

				// Delete Old Image if exists
				\File::delete($path.$categories->thumbnail);
			}
		}

		else {
			// If no thumbnail in request image remains the same
			$thumbnail = $categories->image;
		}	
		
		// Store data
		$categories->name         = $request->name;
		$categories->slug         = $request->slug;

		// If thumbnail
		if( $request->hasFile('thumbnail') ) {
			$categories->image         = $thumbnail;
		}

		// Save
		$categories->save();

		// Success Message
		\Session::flash('success_message', 'Success');

		// Return Redirect
		return redirect('panel/admin/categories');
	}
	
	// Delete Category Function
	public function deleteCategories($id) {
		// Get data
		$categories        = Categories::find( $id );
		$thumbnail         = 'public/img-category/'.$categories->thumbnail;
		
		// If null
		if( !isset($categories) ) {
			// Retrun Redirect
			return redirect('panel/admin/categories');
		} 

		else {
			// Delete Category	
			$categories->delete();
			
			// Delete Thumbnail
			if ( \File::exists($thumbnail) ) {
				\File::delete($thumbnail);	
			}
			
			// Return Redirect
			return redirect('panel/admin/categories');
		}	
	}
}
//<<<<--- END CLASS --->>>>//