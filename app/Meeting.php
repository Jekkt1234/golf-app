<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model {

	protected $fillable = [
		'scheduled_for',
		'course_id'
	];


	/**
	 *	A meeting is taking place at a course.
	 *
	 *	
	 *	@return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */

	public function course(){
		return $this->belongsTo('App\Course');
	}


	/**
	 *	Get the users associated with the given meeting.
	 *
	 *	
	 *	@return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */

	public function users(){
		return $this->belongsToMany('App\User');
	}	

}
