<?php

//<<<<--- NAMESPACE --->>>>//
namespace App\Http\Controllers;

//<<<<--- USE --->>>>//
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\AdminSettings;
use App\Models\Startups;
use App\Models\Investments;
use App\Models\User;
use App\Helper;
use Mail;

//<<<<--- START CLASS --->>>>//
class investmentsController extends Controller{
	// Construct Function
	public function __construct( AdminSettings $settings, Request $request) {
		$this->settings = $settings::first();
		$this->request = $request;
	}
	
    /**
     *  
     * @return \Illuminate\Http\Response
     */

    // Show Startup Function
    public function show($id, $slug = null){
    	// Get Data
    	$response = startups::where('id',$id)->where('status','active')->firstOrFail();

	   	// Redirect if startup campaign has ended
    	if( $response->finalized == 1 ) {
    		return redirect('startup/'.$response->id);
    	}

		// Set URI
    	$uristartup = $this->request->path();

		// Set slug URL
    	if( str_slug( $response->title ) == '' ) {
    		$slugUrl  = '';
    	} 

    	else {
    		$slugUrl  = '/'.str_slug( $response->title );
    	}

		// Set Startup URL
    	$url_startup = 'invest/'.$response->id.$slugUrl;

		//Redirect the user to real page
    	$uriCanonical = $url_startup;

    	if( $uristartup != $uriCanonical ) {
    		return redirect($uriCanonical);
    	}

		// Return invest view with response data	
    	return view('startups.invest')->withResponse($response);
    }


    // Make Investment Function
    public function send(){
    	// Validator Messages
    	$messages = array (
    		'amount.min' => 'Please enter at least the minimum investment of £500',
    		'amount.max' => 'You have exceeded the maximum investment of £1,000,000'
    		);

		// Get Startup Data
    	$startup = startups::findOrFail($this->request->_id);

		// Validate Request
    	$validator = Validator::make($this->request->all(), [
    		'amount' 		=> 'required|integer|min:'.$this->settings->min_investment_amount.'|max:'.$this->settings->max_investment_amount,
    		'full_name' 	=> 'required|max:25',
    		'email'     	=> 'required|max:100',
    		'country'   	=> 'required',
    		'postal_code'   => 'required|max:30',
    		'comment'     	=> 'max:100',
    		],$messages);

		// If validator fails show errors
    	if ($validator->fails()) {
    		return response()->json([
    			'success' => false,
    			'errors' => $validator->getMessageBag()->toArray(),
    			]);
    	}

		//<<<<--- STRIPE --->>>>//	

		// If payment gateway is Stripe
    	if( $this->settings->payment_gateway == 'Stripe' ) {

    		$email    		= $this->request->email;
    		$cents    		= bcmul($this->request->amount, 100);
    		$amount 		= (int)$cents;
    		$currency_code 	= $this->settings->currency_code;
    		$description 	= 'Investment in '.$startup->title;
    		$nameSite 		= $this->settings->title;

    		if( isset( $this->request->stripeToken ) ) {
    			\Stripe\Stripe::setApiKey($this->settings->stripe_secret_key);

				// Get the credit card details submitted by the form
    			$token = $this->request->stripeToken;

                //get the investor assigned to this investment
                //if( isset($token = $this->request->investor_id) ) {
                //    $investor_id = $this->request->investor_id;
                //}

                $token = $this->request->stripeToken;                
				// Create a charge
    			try {
    				$charge = \Stripe\Charge::create(array(
    					"amount" 		=> $amount,
    					"currency" 		=> strtolower($currency_code),
    					"source" 		=> $token,
    					"description" 	=> $description
    					));

    				if( !isset( $this->request->anonymous ) ) {
    					$this->request->anonymous = '0';
    				}

					// Store investment in DB
    				$sql 					= new investments;
    				$sql->startups_id     	= $startup->id;
    				$sql->txn_id            = 'null';
    				$sql->user_id           = Auth::user()->id;
    				$sql->fullname          = $this->request->full_name;
    				$sql->email             = $this->request->email;
    				$sql->country           = $this->request->country;
    				$sql->postal_code       = $this->request->postal_code;
    				$sql->investment        = $this->request->amount;
                    $sql->valuation         = $startup->valuation;
    				$sql->payment_gateway  	= 'Stripe';
    				$sql->comment           = $this->request->comment;
    				$sql->anonymous         = $this->request->anonymous;
    				$sql->save();

					// Send mail - Set data  
    				$sender           	= $this->settings->email_no_reply;
    				$titleSite        	= $this->settings->title;
    				$_emailUser    	  	= $this->request->email;
    				$startupID   		= $startup->id;
    				$fullNameUser 		= $this->request->fullname;

    				Mail::send('emails.thanks-investor', array( 'data' => $startupID, 'fullname' => $fullNameUser, 'title_site' => $titleSite ), 
    					function($message) use ( $sender, $fullNameUser, $titleSite, $_emailUser)
    					{
    						$message->from($sender, $titleSite)
    						->to($_emailUser, $fullNameUser)
    						->subject('Thank you for your investment - '.$titleSite );
    					});

    				return response()->json([
    					'success' 		=> true,
    					'stripeSuccess' => true,
    					'url'	 		=> url('stripe/investment/success',$startup->id)
    					]);

    			} catch(\Stripe\Error\Card $e) {
					// The card has been declined
    			}
    		} 

    		else {
    			return response()->json([
    				'success' 		=> true,
    				'stripeTrue' 	=> true,
    				"key" 			=> $this->settings->stripe_public_key,
    				"email" 		=> $email,
    				"amount" 		=> $amount,
    				"currency" 		=> strtoupper($currency_code),
    				"description" 	=> $description,
    				"name" 			=> $nameSite
    				]);
    		}

    	}
    }


    // Make Offline Investment Function
    public function offline(){
		// Get Startup Data
    	$startup = startups::findOrFail($this->request->startup_id);

		// Store investment in DB
    	$sql 					= new investments;
    	$sql->startups_id     	= $startup->id;
    	$sql->txn_id            = 'null';
    	$sql->user_id           = Auth::user()->id;
    	$sql->fullname          = $this->request->full_name;
    	$sql->email             = $this->request->email;
    	$sql->country           = $this->request->country;
    	$sql->postal_code       = $this->request->postal_code;
    	$sql->investment        = $this->request->amount;
    	$sql->payment_gateway  	= 'Stripe';
    	$sql->comment           = $this->request->comment;
    	$sql->anonymous         = $this->request->anonymous;
    	$sql->save();
    }
}
//<<<<--- END CLASS --->>>>//

