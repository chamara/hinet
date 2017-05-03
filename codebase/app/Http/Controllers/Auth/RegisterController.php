<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Startups;
use Validator;
use App\Models\AdminSettings;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Helper;
use Carbon\Carbon;
use Mail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
    	$messages = array (
		'countries_id.required' => 'Please Select Country',
	);
	
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ],$messages);
    }

    //<<<<--- STARTUP REGISTER --->>>>//

    public function startup() {
        
        // Return View      
        return view('auth.register-startup');
        
    }

    //<<<<--- INVESTOR REGISTER --->>>>//

    public function investor() {
        
        // Return View      
        return view('auth.register-investor');
        
    }
	

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data){
    	$settings    = AdminSettings::first();
		
        // Startup Register
        if ($data['role'] == 'startup') {
        
        $token = str_random(75);
        $startuptoken = str_random(200);
        
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'countries_id' => '1',
            'avatar' => 'default.jpg',
            'status' => 'active',
            'role' => $data['role'],
            'token' => $token,
        ]);

        Startups::create([
            'user_id' => $user->id,
            'title' => $data['startup'],
            'date' => Carbon::now(),
            'status' => 'active',
            'token_id' => $startuptoken
        ]);

        return $user;
        }

        // Investor Register
        else{
        $token = str_random(75);
        
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'countries_id' => '1',
            'avatar' => 'default.jpg',
            'status' => 'pending',
            'role' => $data['role'],
            'token' => $token,
        ]);
        return $user;
        }
    }
}
