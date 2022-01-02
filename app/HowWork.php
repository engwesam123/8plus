<?php

namespace App;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HowWork extends Model
{
    use SoftDeletes, Translatable;
    protected $fillable  = ['image'];
    public $translatedAttributes = ['title', 'description', 'slug'];


    public function getImageAttribute($image)
    {
        return is_null($image) ? null : asset('8plus/public/'.$image);
    }
}
