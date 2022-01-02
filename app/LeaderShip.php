<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class LeaderShip extends Model
{
    use SoftDeletes, Translatable;
    protected $fillable  = ['image'];
    public $translatedAttributes = ['name', 'description', 'job'];

    public function getImageAttribute($image)
    {
        return is_null($image) ? null : asset('8plus/public/'.$image);
    }
}
