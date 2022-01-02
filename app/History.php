<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class History extends Model
{
    use SoftDeletes, Translatable;
    protected $fillable  = ['image'];
    public $translatedAttributes = ['content'];

    public function getImageAttribute($image)
    {
        return is_null($image) ? null : asset('8plus/public/'.$image);
    }

    public function dates()
    {
        return $this->hasMany(HistoryDate::class);
    }
}
