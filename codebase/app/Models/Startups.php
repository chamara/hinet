<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class startups extends Model {

	protected $guarded = array();
	public $timestamps = false;
	
	public function user() {
        return $this->belongsTo('App\Models\User')->first();
    }
		
	public function investments(){
		return $this->hasMany('App\Models\Investments');
	}
	
	public function updates() {
		return $this->hasMany('App\Models\Updates');
	}
	
	public function documents() {
		return $this->hasMany('App\Models\Documents');
	}

	public function teams() {
		return $this->hasMany('App\Models\Teams');
	}
	
	public function category() {
	 	 return $this->belongsTo('App\Models\Categories', 'categories_id'); 
	 }
}