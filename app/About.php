<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class About extends Model
{
    use SoftDeletes, Translatable;
    protected $guarded  = [];
    public $translatedAttributes = ['page_name', 'title', 'short_content', 'long_content'];

    public function images()
    {
        return $this->hasMany(AboutImage::class);
    }
}
