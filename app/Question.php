<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Question extends Model
{
    use Translatable;

    /**
     * The attributes that can be translated
     *
     * @var array
     */
    public $translatedAttributes = [
        'question', 'description', 'html'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    /**
     * Get the edition that the question belongs to.
     */
    public function edition()
    {
        return $this->belongsTo('App\Edition');
    }

    /**
     * Get the options in the question.
     */
    public function options()
    {
        return $this->hasMany('App\Option');
    }

    /**
     * Get the results for the options beloging to the question.
     */
    public function results()
    {
        return $this->hasMany('App\Result');
    }
}
