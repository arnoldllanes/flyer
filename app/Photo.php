<?php

namespace App;

use Image;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Photo extends Model
{
    /**
     * The associated table.
     *
     * @var string
     **/
	protected $table = 'flyer_photos';

    /**
     * Fillable fields for a photo.
     *
     * @var array
     **/
	protected $fillable = ['path', 'name', 'thumbnail_path' ];

	/**
	 * A Photo is part of a flyer
	 *
	 * @return \Illuminate\Databases\Relations\BelongsTo
	 **/
    public function flyer()
    {
    	return $this->belongsTo('App\Flyer');
    }

    /**
     * Get the base directory for photo uploads
     *
     * @return string
     **/
    public function baseDir()
    {
        return 'flyers/photos';
    }

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = $name;
        $this->path = $this->baseDir() .'/'. $name;
        $this->thumbnail_path = $this->baseDir() .'/tn-'. $name;
    }

    public function delete()
    {
        \File::delete([
            $this->path,
            $this->thumbnail_path
        ]);

        parent::delete();
    }

    
}
