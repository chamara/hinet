<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Statuses extends Model {

	protected $guarded = array();
	public $timestamps = false;
	
	public function startups() {
		return $this->hasMany('App\Models\startups')->where('table','startups');
	}

	public function users() {
		return $this->hasMany('App\Models\user')->where('table','users');
	}	
}