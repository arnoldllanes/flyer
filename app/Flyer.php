<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flyer extends Model
{
	/**
	 * Fillable Fields for a flyer
	 *
	 * @var array
	 */
	protected $fillable = [
		'street',
		'city',
		'state',
		'country',
		'zip',
		'price',
		'description'
	];

	/**
	 * Find the flyer at the given address
	 *
	 * 
	 * @param string   $zip
	 * @param string   $street
	 * @return [type]
	 **/
	public static function locatedAt($zip, $street)
	{
		$street = str_replace('-', ' ',$street);

		return static::where(compact('zip', 'street'))->firstOrFail();
	}

	public function getPriceAttribute($price)
	{
		return '$' . number_format($price);
	}

	public function addPhoto(Photo $photo)
	{
		return $this->photos()->save($photo);
	}
	/**
	 * A flyer is composed of many photos
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 **/
    public function photos()
    {
    	return $this->hasMany('App\Photo');
    }

    /**
     * A flyer is owned by a user
     *
     * @var string
     **/
    public function owner()
    {
    	return $this->belongsTo('App\User', 'user_id');
    }

    /**
     * Determine if the given user created the flyer
     *
     * @var string
     **/
    public function ownedBy(User $user)
    {
    	return $this->user_id == $user->id;
    }
}
