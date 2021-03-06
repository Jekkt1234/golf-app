<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model {

	protected $fillable = [
		'name',
		'email',
		'phone'
	];



	/**
	*	Get the users associated with the given course.
	*
	*	
	*	@return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	*/

	public function users(){
		return $this->belongsToMany('App\User');
	}


	/**
	*	Get the meetings scheduled for the given course.
	*
	*	
	*	@return \Illuminate\Database\Eloquent\Relations\HasMany
	*/

	public function meetings(){
		return $this->hasMany('App\Meeting');
	}

}
