<?php 

//<<<<--- NAMESPACE --->>>>//
namespace App\Http\Controllers;

//<<<<--- USE --->>>>//
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Models\User;
use App\Models\Pages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

//<<<<--- START CLASS --->>>>//
class PagesController extends Controller {
	
	//<<<<--- PAGES --->>>>//

	// Validator Function
	protected function validator(array $data, $id = null) {
	 	
	 	// Check if ASCII only
    	Validator::extend('ascii_only', function($attribute, $value, $parameters){
    		return !preg_match('/[^x00-x7F\-]/i', $value);
		});
				
		// Create Rules for Validator

		// If page doesn't already exist
		if( $id == null ) {
			return Validator::make($data, [
        	'title'      =>      'required',
			'slug'       =>      'required|ascii_only|alpha_dash|unique:pages',
			'content'    =>      'required',
        ]);
		
		// Else add slug and id	
		} else {
			return Validator::make($data, [
	        	'title'      =>      'required',
				'slug'       =>      'required|ascii_only|alpha_dash|unique:pages,slug,'.$id,
				'content'    =>      'required',
	        ]);
		}	
    }
	 

	// Index function
	public function index() {
	 	
	 	// Get data
	 	$data = Pages::all();
	
		// Return View with Data		
    	return view('admin.pages')->withData($data);
	 }
	 


	 // Create Page Function
	 public function create() {

	 	// Retrun View
    	return view('admin.add-page');
	 }
	 

	// Store Page
	public function store( Request $request ) {
		
		// Get Data
		$input = $request->all();
		
		// Set Validator
	    $validator = $this->validator($input);


		// If Validator fails show error message
	    if ($validator->fails()) {
	        $this->throwValidationException(
	            $request, $validator
	        );
	    }
		
		// Create page from data
		Pages::create($input);
		
		// Success Message
		\Session::flash('success_message','Success');
		
		// Return Redirect
		return redirect('panel/admin/pages');
		
	}
	

	// Show Page Function
	public function show($page) {

		// Set response as page
		$response = Pages::where( 'slug','=', $page )->firstOrFail();


		// Return View 
    	return view('pages.show')->withResponse($response);
		
	}
	

	// Edit Page Function
	public function edit($id) {
		
		// Get Data
		$data = Pages::findOrFail($id);

		// Return View
    	return view('admin.edit-page')->withData($data);
	
	}
	

	// Update Page Function
	public function update($id, Request $request) {
 
 		// Set Page   	
    	$page = Pages::findOrFail($id);
		
		// Set Input	
		$input = $request->all();
		
		// Set Validator
		$validator = $this->validator($input,$id);
	
		if ($validator->fails()) {
			$this->throwValidationException(
				$request, $validator
	        );
	    }
		
		// Update Page with input
		$page->fill($input)->save();

		// Success Message
    	\Session::flash('success_message', 'Success');

    	// Return Redirect
    	return redirect('panel/admin/pages');
	
	}
	
	// Destroy Function 
	public function destroy($id){

	  // Set Page
	  $page = Pages::findOrFail($id);

	  // Delete Page
      $page->delete();

      // Return Redirect
      return redirect('panel/admin/pages'); 
	}
}
//<<<<--- END CLASS --->>>>//

