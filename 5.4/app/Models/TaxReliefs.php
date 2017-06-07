<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaxReliefs extends Model {

	protected $guarded = array();
	public $timestamps = false;
	
	public function startups() {
		return $this->hasMany('App\Models\startups');
	}
}