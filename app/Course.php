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
		return $this->BelongsToMany('App\User');
	}

}
