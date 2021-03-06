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

	public function status() {
	 	 return $this->belongsTo('App\Models\Statuses', 'status'); 
	 }

	public function taxRelief() {
	 	 return $this->belongsTo('App\Models\TaxReliefs', 'status'); 
	 }
	public function questions() {
	 	 //return $this->belongsTo('App\Models\Questions', 'questions_id');
		return $this->belongsToMany('App\Models\Questions');
	 }
}