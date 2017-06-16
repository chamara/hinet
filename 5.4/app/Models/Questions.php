<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model {

	protected $guarded = array();
	public $timestamps = false;
	
	public function startups() {
		//return $this->hasMany('App\Models\startups')->where('status','active');
		return $this->belongsToMany('App\Models\Startups')->where('status','active')->withTimestamps()->withPivot('response_1', 'response_2');
	}
}