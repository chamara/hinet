<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Documents extends Model {

	protected $guarded = array();
	public $timestamps = false;
	
	public function startups() {
        return $this->belongsTo('App\Models\Startups')->first();
    }
}