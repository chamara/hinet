<?php

//<<<<--- NAMESPACE --->>>>//
namespace App\Http\Controllers;

//<<<<--- USE --->>>>//
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\AdminSettings;
use App\Models\Startups;
use App\Helper;

//<<<<--- START CLASS --->>>>//
class UserController extends Controller{

	// Validator Function
	protected function validator(array $data, $id = null) {
	 	
	 	// ASCII only
    	Validator::extend('ascii_only', function($attribute, $value, $parameters){
    		return !preg_match('/[^x00-x7F\-]/i', $value);
		});
		
		// Validate if one letter
		Validator::extend('letters', function($attribute, $value, $parameters){
    		return preg_match('/[a-zA-Z0-9]/', $value);
		});
	
		// Please select country
		$messages = array (
		);
	
		// Validation rules
		return Validator::make($data, [
	      	'full_name' 	=> 'required|min:3|max:25',
			'email'     	=> 'required|email|unique:users,email,'.$id,
	   	],$messages);	
    }
    


   	// User Account Function
    public function account(){

    	// Return view user account
		return view('users.account');
    }
	

	// Update User Account Function
	public function update_account(Request $request){
       
		// Set input as request
	   	$input = $request->all();

	   	// Set id as current user
	   	$id = Auth::user()->id;


	   	// Validate this request	   
	  	$validator = $this->validator($input,$id);
	   
	   	// If validator fails show why
	   	if ($validator->fails()) {
	    	$this->throwValidationException(
	            $request, $validator
	        );
	  	}
	   
	   	// Store user data
	   	$user 				= User::find($id);
	   	$user->name        	= $input['full_name'];
	   	$user->email        = trim($input['email']);
	   	$user->save();
	   
	   	// Show success message
	   	\Session::flash('notification','Success');
	   
	   	// Redirect to account
	   	return redirect('account');  
	}
	
	// User Password Function
	public function password(){

		// Return view user password
		return view('users.password');
    }

    // Update Password Function
    public function update_password(Request $request){
		
    	// Set input as request
		$input = $request->all();

		// Set id as current user
	   	$id = Auth::user()->id;
	   
	   	// Validator
		$validator = Validator::make($input, [
			'old_password' => 'required|min:6',
	        'password'     => 'required|min:6',        
    	]);
	   
		// If validator fails show why
	   	if ($validator->fails()) {
	        $this->throwValidationException(
	            $request, $validator
	        );
	    }
	   
	   	// Check if old password matches 
	  	if (!\Hash::check($input['old_password'], Auth::user()->password) ) {

	  		// If it doesnt match return incorrect password error
		    return redirect('account/password')->with( array( 'incorrect_pass' => 'Incorrect Password' ) );
		}

	   	// Update to new password   
	   	$user = User::find($id);
	   	$user->password  = \Hash::make($input[ "password"] );
	   	$user->save();
	   
	   	// Show success message
	   	\Session::flash('notification','Success');
	   
	   	return redirect('account/password');  
	}
	
	// Delete User Account Function
	public function delete(){
    	
    	// If user id is 1 (Admin) redirect to account
    	if( Auth::user()->id == 1 ) {
    		return redirect('account');
    	}
		
		// Else return view users delete
		return view('users.delete');
    }
	

	// Delete Account Function
	public function delete_account(){
    	
    	// If user id is 1 (Admin) redirect to account
    	if( Auth::user()->id == 1 ) {
    		return redirect('account');
    	}
		
		// Set id as current user
		$id = Auth::user()->id;
		
		// Find User
    	$user = User::find($id);
		
		// Finalize all startups owned by user
		$allstartups = startups::where('user_id',$id)->update(array('finalized' => '1'));
		
		// Delete avatar
		$fileAvatar    = 'public/avatar/'.Auth::user()->avatar;
		
		// If not default.jpg then delete	
		if ( \File::exists($fileAvatar) && Auth::user()->avatar != 'default.jpg' ) {
			 \File::delete($fileAvatar);	
		}
		
		// Logout
		\Session::flush();
		Auth::logout();
		
		// Delete user from DB	
        $user->delete();

        // Redirect to homepage
		return redirect('/');	
    }
    

    // Upload avatar function
	public function upload_avatar(Request $request){
	   
	   	// Get settings
	   	$settings  = AdminSettings::first();
	   	   
		// Set paths
		$temp    	= 'public/temp/';
	    $path    	= 'public/avatar/'; 
		$imgOld     = $path.Auth::user()->avatar;

		// If request has photo
	    if( $request->hasFile('photo') ){
	    	
	    	// Set image extension
			$extension  = $request->file('photo')->getClientOriginalExtension();
			
			// Set filename
			$avatar       = strtolower(Auth::user()->id.time().str_random(15).'.'.$extension );
			
			// Move to temp folder
			if( $request->file('photo')->move($temp, $avatar) ) {
				
				// No timeouts
				set_time_limit(0);
				
				// Resize image to avatar size
				Helper::resizeImageFixed( $temp.$avatar, 125, 125, $temp.$avatar );
				
				// Copy to avatar folder and delete temp
				if ( \File::exists($temp.$avatar) ) {	
					\File::copy($temp.$avatar, $path.$avatar);
					\File::delete($temp.$avatar);
				}
				
				// Delete old avatar if not defkault.jpg
				if ( \File::exists($imgOld) && $imgOld != $path.'default.jpg' ) {
					\File::delete($temp.$avatar);	
					\File::delete($imgOld);
				}
				
				// Update Database
				User::where( 'id', Auth::user()->id )->update( array( 'avatar' => $avatar ) );
				
				// Return success message and new avatar
				return response()->json([
				        'success' => true,
				        'avatar' => url($path.$avatar),
				    ]);
					
			}
	    }
    }    	
}
//<<<<--- END CLASS --->>>>//
