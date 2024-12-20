<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Option extends Model
{
    use Translatable;

    /**
     * The attributes that can be translated
     *
     * @var array
     */
    public $translatedAttributes = [
        'option', 'description', 'motivation', 'status', 'funding', 'color', 'flair'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'salt', 'created_at', 'updated_at'
    ];

    /**
     * Get the question that the option belongs to.
     */
    public function question()
    {
        return $this->belongsTo('App\Question');
    }

    /**
     * Get the result for the option.
     */
    public function result()
    {
        return $this->hasOne('App\Result');
    }
}
