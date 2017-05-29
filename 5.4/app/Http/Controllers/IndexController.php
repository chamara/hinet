<?php

//<<<<--- NAMESPACE --->>>>//
namespace App\Http\Controllers;

//<<<<--- USE --->>>>//
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\AdminSettings;
use App\Models\Startups;
use App\Models\Categories;
use App\Models\User;

//<<<<--- START CLASS --->>>>//
class IndexController extends Controller{
    /**
     *  
     * @return \Illuminate\Http\Response
     */

//<<<<--- STARTUPS AND CATEGORIES --->>>>//
    
    // Home Index Function
    public function home()
    {

        // Get Data
	    $settings = AdminSettings::first();
	    $categories = Categories::where('mode','on')->orderBy('name')->get();
        $data = startups::where('status', 'active')->where('featured', '1')->where('opportunity', '1')->orderBy('id','DESC')->paginate(3);
		
		// Return View
		return view('index.home', ['data' => $data, 'categories' => $categories, 'settings' => $settings]);
    }
	

//<<<<--- USER VERIFICATION --->>>>//


    // Verify Account Funtion
	public function getVerifyAccount( $confirmation_code ) {
        
        // Session Inactive User ** Request from Joseph to manually approve all users before access **
		if( !Auth::check() ) {
		$user = User::where( 'confirmation_code', $confirmation_code )->where('status','pending')->first();
		
		// Session Inactive
		if( $user ) {
			
			$update = User::where( 'confirmation_code', $confirmation_code )
			->where('status','pending')
			->update( array( 'status' => 'active', 'confirmation_code' => '' ) );
	

			Auth::loginUsingId($user->id);
			
			 return redirect('/')
					->with([
						'success_verify' => true,
					]);
			} else {
			return redirect('/')
					->with([
						'error_verify' => true,
					]);
			}
		} 

		else {
			
			// Session Active
			$user = User::where( 'confirmation_code', $confirmation_code )->where('status','pending')->first();
			 if( $user ) {
			
			$update = User::where( 'confirmation_code', $confirmation_code )
			->where('status','pending')
			->update( array( 'status' => 'active', 'confirmation_code' => '' ) );
			
			 return redirect('/')
					->with([
						'success_verify' => true,
					]);
			} else {
			return redirect('/')
					->with([
						'error_verify' => true,
					]);
			}
		}
	}

//<<<<--- CATEGORIES --->>>>//

	public function category($slug) {
		
		// Get Data
		$settings 	= AdminSettings::first();
		$category 	= Categories::where('slug','=',$slug)->where('mode','on')->firstOrFail();
		$data       = startups::where('status', 'active')->where('opportunity', '1')->where('categories_id',$category->id)->orderBy('id','DESC')->paginate($settings->result_request);
		

		// Return View		
		return view('categories.category', ['data' => $data, 'category' => $category]);
		
	}


//<<<<--- PORTFOLIO --->>>>//
	public function portfolio()
    {

        // Get Data
        $settings = AdminSettings::first();
        $categories = Categories::where('mode','on')->orderBy('name')->get();
        $data = startups::where('status', 'active')->where('portfolio', '1')->orderBy('id','DESC')->paginate(100);
        
        // Return View
        return view('index.portfolio', ['data' => $data, 'categories' => $categories]);
    }




//<<<<--- INVESTORS --->>>>//
	public function investors()
    {

        // Get Data
        $settings = AdminSettings::first();
        $categories = Categories::where('mode','on')->orderBy('name')->get();
        $data = startups::where('status', 'active')->where('portfolio', '1')->orderBy('id','DESC')->paginate(100);
        
        // Return View
        return view('index.investors', ['data' => $data, 'categories' => $categories]);
    }




//<<<<--- STARTUPS --->>>>//
	public function startups()
    {

        // Get Data
        $settings = AdminSettings::first();
        $categories = Categories::where('mode','on')->orderBy('name')->get();
        $data = startups::where('status', 'active')->where('portfolio', '1')->orderBy('id','DESC')->paginate(100);
        
        // Return View
        return view('index.startups', ['data' => $data, 'categories' => $categories, 'settings' => $settings]);
    }




//<<<<--- OPPORTUNITIES --->>>>//
 public function opportunities()
    {

        // Get Data
        $settings = AdminSettings::first();
        $categories = Categories::where('mode','on')->orderBy('name')->get();
        $data = startups::where('status', 'active')->where('opportunity', '1')->orderBy('id','DESC')->paginate(3);
        
        // Return View
        return view('index.opportunities', ['data' => $data, 'categories' => $categories]);
    }


//<<<<--- NAVBAR --->>>>//
 public function navbar()
    {

        // Get Data
        $settings = AdminSettings::first();
        
        // Return View
        return view('includes.navbar', ['settings' => $settings]);
    }
 }
//<<<<--- END CLASS --->>>>//

