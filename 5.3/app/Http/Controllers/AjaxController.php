<?php

//<<<<--- NAMESPACE --->>>>//
namespace App\Http\Controllers;

//<<<<--- USE --->>>>//
use Illuminate\Http\Request;
use App\Models\AdminSettings;
use App\Models\Startups;
use App\Models\Categories;
use App\Models\Investments;
use App\Models\Updates;

//<<<<--- START CLASS --->>>>//
class AjaxController extends Controller{
	
	// Contruct Function
	public function __construct( Request $request) {
		$this->request = $request;
	}
	
    /**
     *  
     * @return \Illuminate\Http\Response
     */
     
      

//<<<<--- STARTUPS --->>>>//

	// Startups Function
	public function startups()
    {  
		// Get Data
		$settings = AdminSettings::first();
		$data     = startups::where('status', 'active' )->orderBy('id','DESC')->paginate($settings->result_request);
		
		// Return View
		return view('ajax.startups',['data' => $data, 'settings' => $settings])->render();
	}


	// Startup Updates
    public function updatesstartup()
    {
       
       	// Get Data
	    $settings 	= AdminSettings::first();
		$page     	= $this->request->input('page');
		$id         = $this->request->input('id');
		$data     	= Updates::where('startups_id',$id)->orderBy('id','desc')->paginate(1);

		// Return View
 		return view('ajax.updates-startup',['data' => $data, 'settings' => $settings])->render();

    }

    // Search Startups
    public function search() {
		
		// Get Data
		$settings = AdminSettings::first();
		$q = $this->request->slug;
		$data = startups::where( 'title','LIKE', '%'.$q.'%' )
		->where('status', 'active' )
		->orWhere('location','LIKE', '%'.$q.'%')
		->where('status', 'active' )
		->groupBy('id')
		->orderBy('id', 'desc' )
		->paginate( $settings->result_request );
		
		// Return View
		return view('ajax.startups',['data' => $data, 'settings' => $settings, 'slug' => $q])->render();		
		
	}


//<<<<--- CATEGORIES --->>>>//


	// Categories Function
	public function category() {
		
		// Get Data
		$settings 		= AdminSettings::first(); 
		$slug 			= $this->request->slug;	
		$category 		= Categories::where('slug','=',$slug)->first();
	  	$data       	= startups::where('status', 'active')->where('categories_id',$category->id)->orderBy('id','DESC')->paginate($settings->result_request);
		
	  	// Return View
		return view('ajax.startups',['data' => $data, 'settings' => $settings, 'slug' => $category->slug])->render();			
	}
	

//<<<<--- INVESTMENTS --->>>>//

	// Investments Function
    public function investments()
    {
    	// Get Data
	    $settings 		= AdminSettings::first();
		$page  	 		= $this->request->input('page');
		$id        		= $this->request->input('id');
		$data    		= investments::where('startups_id',$id)->orderBy('id','desc')->paginate(10);

		// Return View
 		return view('ajax.investments',['data' => $data, 'settings' => $settings])->render();

    }



    
	
}
