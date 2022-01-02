<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AboutTranslation extends Model
{

    use SoftDeletes;
    public $timestamps = false;
    protected $fillable = ['page_name', 'title', 'short_content', 'long_content'];
}
