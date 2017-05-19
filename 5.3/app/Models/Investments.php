<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class investments extends Model {

	protected $guarded = array();
	public $timestamps = false;


	public function user() {
        return $this->belongsTo('App\Models\User')->first();
    }
	
	
	public function startups() {
        return $this->belongsTo('App\Models\Startups')->first();
    }
}