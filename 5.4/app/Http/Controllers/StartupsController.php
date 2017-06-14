<?php 

//<<<<--- NAMESPACE --->>>>//
namespace App\Http\Controllers;

//<<<<--- USE --->>>>//
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\AdminSettings;
use App\Models\Startups;
use App\Models\Updates;
use App\Models\Documents;
use App\Models\Teams;
use App\Models\User;
use App\Helper;
use Carbon\Carbon;
use Image;
use Mail;

//<<<<--- START CLASS --->>>>//
class startupsController extends Controller{
	
	// Construct Function
	public function __construct( AdminSettings $settings, Request $request) {
		// Get settings
		$this->settings = $settings::first();
		// Get request
		$this->request = $request;
	}
	
	// View Startup Function
	public function view($id, $slug = null){

		// Get Data
		$response = startups::where('id',$id)->where('status','active')->firstOrFail();
		
		// Get Startup Path
		$uristartup = $this->request->path();

		if( str_slug( $response->title ) == '' ) {
			$slugUrl  = '';
		} 

		else {
			$slugUrl  = '/'.str_slug( $response->title );
		}

		// Get URL		
		$url_startup = 'startup/'.$response->id.$slugUrl;

		// Redirect
		$uriCanonical = $url_startup;
		
		// Redirect
		if( $uristartup != $uriCanonical ) {
			return redirect($uriCanonical);
		}
		
		// Return View	
		return view('startups.view')->withResponse($response);
	}

	// Upload Logo Function
	public function upload_logo(Request $request){

		// Get Settings	
		$settings  = AdminSettings::first();

		// Set SQL
		$sql = startups::where('id',$this->request->id)->where('finalized','0')->first();

		// Set Paths
		$temp    = 'public/temp/';
		$path    = 'public/startups/logo/'; 
		$imgOld  = $path.$sql->logo;


		// Check if request has photo
		if( $request->hasFile('photo') ){


	    	// Set image exstension
			$extension  = $request->file('photo')->getClientOriginalExtension();

			// Set filename
			$logo       = strtolower(Auth::user()->id.time().str_random(15).'.'.$extension );
			
			// Move file to temp folder
			if( $request->file('photo')->move($temp, $logo) ) {
				
				// No timeouts
				set_time_limit(0);
				
				// Resize image to fit square
				Helper::resizeImageFixed( $temp.$logo, 300, 300, $temp.$logo );
				
				// Move file to logo folder and delete temp
				if ( \File::exists($temp.$logo) ) {
					\File::copy($temp.$logo, $path.$logo);
					\File::delete($temp.$logo);
				}
				
				// Delete old logo if it exists
				if ( \File::exists($imgOld) && $imgOld != $path.'default.jpg' ) {
					\File::delete($temp.$logo);	
					\File::delete($imgOld);
				}
				
				// Update Database
				startups::where( 'id',$this->request->id)->update( array( 'logo' => $logo ) );
				
				// Return succes message and new logo
				return response()->json([
					'success' => true,
					'logo' => url($path.$logo),
					]);

			}
		}	
	}


	// Upload Cover Function
	public function upload_cover(Request $request){

		// Get Settings	
		$settings  = AdminSettings::first();

		// Set SQL
		$sql = startups::where('id',$this->request->id)->where('finalized','0')->first();

		// Set Paths
		$temp    = 'public/temp/';
		$path    = 'public/startups/cover/'; 
		$imgOld  = $path.$sql->cover;


		// Check if request has photo
		if( $request->hasFile('photo') ){


	    	// Set image exstension
			$extension  = $request->file('photo')->getClientOriginalExtension();

			// Set filename
			$cover       = strtolower(Auth::user()->id.time().str_random(15).'.'.$extension );
			
			// Move file to temp folder
			if( $request->file('photo')->move($temp, $cover) ) {
				
				// No timeouts
				set_time_limit(0);
				
				// Resize image to fit ?? Cover Size?
				// Helper::resizeImageFixed( $temp.$cover, 300, 300, $temp.$cover );
				
				// Move file to cover folder and delete temp
				if ( \File::exists($temp.$cover) ) {
					\File::copy($temp.$cover, $path.$cover);
					\File::delete($temp.$cover);
				}
				
				// Delete old cover if it exists
				if ( \File::exists($imgOld) && $imgOld != $path.'default.jpg' ) {
					\File::delete($temp.$cover);	
					\File::delete($imgOld);
				}
				
				// Update Database
				startups::where( 'id',$this->request->id)->update( array( 'cover' => $cover ) );
				
				// Return succes message and new cover
				return response()->json([
					'success' => true,
					'cover' => url($path.$cover),
					]);

			}
		}	
	}


	// Edit Startup Function
	public function edit($id){
		
		// Get Data where startup is not finalized and user is creator
		$data = startups::where('id', $this->request->id)
		->where('finalized', '0')
		->where('user_id', Auth::user()->id)
		->firstOrFail();

		// Return edit view with existing data	
		return view('startups.edit')->withData($data);
	}
	

	// Post Edit Startup Function	
	public function post_edit(){
		
		// Set database row to current startup
		$sql = startups::where('id',$this->request->id)->where('finalized','0')->first();

		// Set input as request
		$input      = $this->request->all();

		// Update database
		$sql->title         = trim($this->request->title);
		$sql->location      = trim($this->request->location);
		$sql->oneliner      = trim($this->request->oneliner);
		$sql->description   = trim($this->request->description);
		$sql->categories_id = $this->request->categories_id;
		$sql->website  		= $this->request->website;
		$sql->twitter  		= $this->request->twitter;
		$sql->facebook  	= $this->request->facebook;
		$sql->linkedin  	= $this->request->linkedin;
		$sql->video  		= $this->request->video;
		$sql->save();


		// Set Startup ID
		$id_startup = $sql->id;

	    // Return Success Method
		return response()->json([
			'success' => true,
			'target' => url('startup',$id_startup),				        
			]);	
	}


	// Edit Startup Function
	public function edit_application($id){
		
		// Get Data where startup is not finalized and user is creator
		$data = startups::where('id', $this->request->id)
		->where('finalized', '0')
		->where('user_id', Auth::user()->id)
		->firstOrFail();

		// Return edit view with existing data	
		return view('startups.edit-application')->withData($data);
	}
	

	// Post Edit Startup Function	
	public function post_edit_application(){
		
		// Set database row to current startup
		$sql = startups::where('id',$this->request->id)->where('finalized','0')->first();

		// Set input as request
		$input = $this->request->all();

	 	// Remove stuff from description
		// $description = html_entity_decode($this->request->description);
		// $description = Helper::removeTagScript($description);
		// $description = Helper::removeTagIframe($description);
		// $description = trim(Helper::spaces($description));

		// Update database
		$sql->goal          = trim($this->request->goal);
		$sql->equity        = trim($this->request->equity);
		$sql->valuation 	= trim($this->request->valuation);
		$sql->tax		 	= trim($this->request->tax);
		$sql->response_1	= trim($this->request->response_1);
		$sql->response_2	= trim($this->request->response_2);
		$sql->response_3	= trim($this->request->response_3);
		$sql->response_4	= trim($this->request->response_4);
		$sql->response_5	= trim($this->request->response_5);
		$sql->response_6	= trim($this->request->response_6);
		$sql->response_7	= trim($this->request->response_7);
		$sql->response_8	= trim($this->request->response_8);
		$sql->response_9	= trim($this->request->response_9);
		$sql->response_10	= trim($this->request->response_10);
		$sql->response_11	= trim($this->request->response_11);
		$sql->response_12	= trim($this->request->response_12);
		$sql->response_13	= trim($this->request->response_13);
		$sql->response_14	= trim($this->request->response_14);
		$sql->response_15	= trim($this->request->response_15);
		$sql->save();
		
		// Set Startup ID
		$id_startup = $sql->id;

	    // Return Success Method
		return response()->json([
			'success' => true,
			'target' => url('startup'),				        
			]);	
	}

	// Edit Document Startup Function
	public function edit_documents($id){
		
		// Get Data where startup is not finalized and user is creator
		$data = startups::where('id', $this->request->id)
		->where('finalized', '0')
		->where('user_id', Auth::user()->id)
		->firstOrFail();

		// Return edit view with existing data	
		return view('startups.edit-documents')->withData($data);
	}

	// Edit Document Startup Function
	public function edit_documents_add($id){
		
		// Get Data where startup is not finalized and user is creator
		$data = startups::where('id', $this->request->id)
		->where('finalized', '0')
		->where('user_id', Auth::user()->id)
		->firstOrFail();

		// Return edit view with existing data	
		return view('startups.edit-documents-add')->withData($data);
	}

	// Post Edit Document Startup Function
	public function post_edit_documents(){
		
		// Set Paths
		$temp    = 'public/temp/';
		$path    = 'public/startups/documents/'; 
		
	    // Set exstension
		$extension  = $this->request->file('document')->getClientOriginalExtension();
		$filesize	= ($this->request->file('document')->getClientSize() / 1000000);

		// Set filename
		$document  = strtolower($this->request->filename.'-sfc-'.str_random(5).'.'.$extension );

		// Move file to temp folder
		if( $this->request->file('document')->move($path, $document) ) {
			// No timeouts
			set_time_limit(0);
		}

	    // Save in db
		$sql                 	= new Documents;
		$sql->filename    		= trim($this->request->filename);
		$sql->startups_id 		= $this->request->id;
		$sql->path 				= $document;
		$sql->type 		        = $extension;
		$sql->filesize 		    = $filesize;
		$sql->token_id         	= str_random(200);
		$sql->save();

		// Return success message and redirect	    	    
		return response()->json([
			'success' => true,
			'target' => url('startup',$this->request->id),
			]);
	}


	// Delete Document Function
	public function deleteDocuments($id){
		
		// Get data
		$documents        = Documents::find( $id );
		$file         = 'public/startups/documents/'.$documents->path;
		$startup     = $documents->startups_id; 
		
		// If null
		if( !isset($documents) ) {

			// Retrun Redirect
			return redirect('edit/startup/documents/'.$startup);
		} 

		else {

			// Delete Document	
			$documents->delete();
			
			// Delete Thumbnail
			if ( \File::exists($file) ) {
				\File::delete($file);	
			}
			
			// Return Redirect
			return redirect('edit/startup/documents/'.$startup);
		}	
	}


	// Edit Team Startup Function
	public function edit_teams($id){
		
		// Get Data where startup is not finalized and user is creator
		$data = startups::where('id', $this->request->id)
		->where('finalized', '0')
		->where('user_id', Auth::user()->id)
		->firstOrFail();

		// Return edit view with existing data	
		return view('startups.edit-teams')->withData($data);
	}

	// Edit Team Startup Function
	public function edit_teams_add($id){
		
		// Get Data where startup is not finalized and user is creator
		$data = startups::where('id', $this->request->id)
		->where('finalized', '0')
		->where('user_id', Auth::user()->id)
		->firstOrFail();

		// Return edit view with existing data	
		return view('startups.edit-teams-add')->withData($data);
	}
	
	// Post Edit Document Startup Function
	public function post_edit_teams(){
		
		// Set Paths
		$path    = 'public/startups/teams/'; 
		
	    // Set exstension
		$extension  = $this->request->file('avatar')->getClientOriginalExtension();

		// Set filename
		$avatar  = strtolower($this->request->name.'-sfc-'.str_random(5).'.'.$extension );

		// Move file to temp folder
		if( $this->request->file('avatar')->move($path, $avatar) ) {
			// No timeouts
			set_time_limit(0);
		}

	    // Save in db
		$sql                 	= new Teams;
		$sql->name    			= trim($this->request->name);
		$sql->startups_id 		= $this->request->id;
		$sql->avatar 			= $avatar;
		$sql->title 		    = trim($this->request->title);
		$sql->linkedin 		    = trim($this->request->linkedin);
		$sql->email 		    = trim($this->request->email);
		$sql->bio 		        = trim($this->request->bio);
		$sql->shareholding 		= $this->request->shareholding;
		$sql->token_id         	= str_random(200);
		$sql->save();

		// Return success message and redirect	    	    
		return response()->json([
			'success' => true,
			'target' => url('startup',$this->request->id),
			]);
	}


	// Delete Document Function
	public function deleteTeams($id){
		
		// Get data
		$teams       = Teams::find( $id );
		$path        ='public/startups/teams/';
		$avatar      ='public/startups/teams/'.$teams->avatar;
		$startup     = $teams->startups_id; 
		
		// If null
		if( !isset($teams) ) {

			// Retrun Redirect
			return redirect('edit/startup/teams/'.$startup);
		} 

		else {

			// Delete Document	
			$teams->delete();
			
			// Delete Thumbnail 
							
			if ( \File::exists($avatar) && $avatar !=  $path.'default.jpg' ) {
				\File::delete($avatar);	
			}
			
			// Return Redirect
			return redirect('edit/startup/teams/'.$startup);
		}	
	}


	// Update Startup Function
	public function update($id){

		// Get data	
		$data = startups::where('id', $this->request->id)
		->where('user_id', Auth::user()->id)
		->firstOrFail();

		// Return View with data
		return view('startups.update')->withData($data);
	}



	// Post Update Startup Function
	public function post_update(){

		// Set input as request
		$input 	= $this->request->all();

		// Set validator
		$validator = Validator::make($input, [
			'description'  => 'required|min:20',	        
			]);

		// If validator fails display error messages
		if ($validator->fails()) {
			return response()->json([
				'success' => false,
				'errors' => $validator->getMessageBag()->toArray(),
				]); 
		}

	    // Save in db
		$sql                 	= new Updates;
		$sql->description     	= trim(Helper::checkTextDb($this->request->description));
		$sql->startups_id 		= $this->request->id;
		$sql->token_id         	= str_random(200);
		$sql->save();

		// Return success message and redirect	    	    
		return response()->json([
			'success' => true,
			'target' => url('startup',$this->request->id),
			]);

	}

	// Edit Update Function
	public function edit_update($id){

		// Get data	
		$data = Updates::where('id', $id)->firstOrFail();

		// If data is not from current user 404 abort
		if(  $data->startups()->user_id != Auth::user()->id ){
			abort('404');
		}

		// Return view with data
		return view('startups.edit-update')->withData($data);
	}


	// Post Edit Update Function
	public function post_edit_update(){

		// Set database row
		$sql = Updates::find($this->request->id);

		// Set input as request
		$input      = $this->request->all();

		// Set Validator
		$validator = Validator::make($input, [
			'description'  => 'required|min:20',	        
			]);

		// If validator fails display  error messages		
		if ($validator->fails()) {
			return response()->json([
				'success' => false,
				'errors' => $validator->getMessageBag()->toArray(),
				]); 
		}

	    // Store in database
		$sql->description = trim(Helper::checkTextDb($this->request->description));
		$sql->save();

		// Return success message and redirect target
		return response()->json([
			'success' => true,
			'target' => url('startup',$sql->startups_id),
			]);

	}
}
//<<<<--- END CLASS --->>>>//
