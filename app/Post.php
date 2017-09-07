<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    //
	use SoftDeletes;
	protected $dates = ['deleted_at'];
	protected $fillable = [
		'title',
		'content'
	];
	
	public function user(){
		return $this->belongsTo('App\user');
	}
	
	public function role(){
		return $this->belongsTo('App\role');
	}
	
	public function role_user(){
		return $this->belongsTo('App\role_user');
	}
	
}
