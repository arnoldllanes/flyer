<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
	protected $table = 'flyer_photos';

	protected $fillable = ['photo'];
	/**
	 * A Photo is part of a flyer
	 *
	 * @return \Illuminate\Databases\Relations\BelongsTo
	 **/
    public function flyer()
    {
    	return $this->belongsTo('App\Flyer');
    }
}
